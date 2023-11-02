<?php

namespace App\Repositories;

use App\Models\PaymentPlan;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class ContactRepositoryEloquent
 * @package namespace App\Repositories;
 */
class PaymentPlanRepositoryEloquent extends BaseRepository implements PaymentPlanRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PaymentPlan::class;
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

    public function groupedPlans()
    {
        $paymentPlansNotUseFactor = $this->model->where('use_factory', 'N')->where(function ($query) {
            $query->whereRaw('((now() between offer_start and offer_expiration)) or (now() > offer_start and offer_expiration is null)');
        })->orderBy('fee', 'desc')->orderBy('days_paid', 'desc')->get();
        $paymentPlansUseFactor = $this->model->where('use_factory', 'Y')->where(function ($query) {
            $query->whereRaw('((now() between offer_start and offer_expiration)) or (now() > offer_start and offer_expiration is null)');
        })->orderBy('fee', 'desc')->orderBy('days_paid', 'desc')->get();
        return [
            'use_factor' => $paymentPlansUseFactor,
            'not_use_factor' => $paymentPlansNotUseFactor
        ];
    }

    public function datatable()
    {
        return $this->model->select('*')->orderBy('id','desc');
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
