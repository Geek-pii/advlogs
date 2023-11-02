<?php

namespace App\Repositories;

use App\Models\Account;
use App\Models\Contact;
use App\Repositories\ContactRepository;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class ContactRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ContactRepositoryEloquent extends BaseRepository implements ContactRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Account::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {
        //
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function datatable($companyId = null)
    {
        return $this->model->where('company_id', $companyId)->select('*');
    }

    public function update(array $input, $id)
    {
        $model = $this->model->findOrFail($id);

        $model->update($input);

        return $model;
    }

    public function delete($id)
    {
        $model = $this->model->findOrFail($id);

        $model->delete();

        return true;
    }
}
