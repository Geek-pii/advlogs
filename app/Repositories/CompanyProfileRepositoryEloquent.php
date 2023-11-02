<?php

namespace App\Repositories;

use App\Helper\Helper;
use Illuminate\Support\Str;
use App\Models\Company;
use Illuminate\Support\Facades\Http;
use App\Validators\CompanyProfileValidator;
use App\Repositories\CompanyProfileRepository;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class CompanyProfileRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CompanyProfileRepositoryEloquent extends BaseRepository implements CompanyProfileRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Company::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return CompanyProfileValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function datatable()
    {
        return $this->model->select('*')->with('accounts.roles')->orderBy('id', 'desc');
    }

    public function getIrsToken()
    {
        $private_key = file_get_contents(base_path('credentials/irs/private_key.pem'));
        $client_id   = config('services.irs.client_id');
        $user_id = config('services.irs.api_user_id');
        $jwt = Helper::generateJWT($private_key, $client_id, $user_id, config('services.irs.api_url'), null, null, Str::uuid()->toString());
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post('https://api.alt.www4.irs.gov/auth/oauth/v2/token', [
            'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
            'assertion' => $jwt,
            'client_assertion_type' => 'urn:ietf:params:oauth:client-assertion-type:jwt-bearer',
            'client_assertion' => $jwt
        ]);
        dd($response->body());
    }
    
}
