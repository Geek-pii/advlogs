<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PickUpInfoRepository;
use App\Models\PickUpInfo;
use App\Validators\PickUpInfoValidator;

/**
 * Class PickUpInfoRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PickUpInfoRepositoryEloquent extends BaseRepository implements PickUpInfoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PickUpInfo::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return PickUpInfoValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
