<?php

namespace App\Repositories;

use App\Models\GetAQuote;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\GetAQuoteRepository;

/**
 * Class GetAQuoteRepositoryEloquent
 * @package namespace App\Repositories;
 */
class GetAQuoteRepositoryEloquent extends BaseRepository implements GetAQuoteRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return GetAQuote::class;
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

    public function datatable()
    {
        return $this->model->select('*');
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
