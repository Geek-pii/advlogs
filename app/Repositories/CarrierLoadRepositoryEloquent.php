<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CarrierLoadRepository;
use App\Models\CarrierLoad;

/**
 * Class AccountRepositoryEloquent.
 *
 * @package namespace App\Repositories\Models;
 */
class CarrierLoadRepositoryEloquent extends BaseRepository implements CarrierLoadRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CarrierLoad::class;
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
        if ($companyId) {
            return $this->model->where('company_id', $companyId)->select('*')->orderBy('id', 'desc');
        }
        return $this->model->select('*')->orderBy('id', 'desc');
    }

    public function findByCompanyID($companyId)
    {
        return $this->model->where('company_id', $companyId)->with('company')->first();
    }

    public function update(array $inputs, $id)
    {
        $model = $this->model->findOrFail($id);
        $data = [];
        $truckHaveWinch = isset($inputs['truck_have_winch']) ? $inputs['truck_have_winch'] : null;
        if (!empty($truckHaveWinch)) {
            $data['truck_have_winch'] = $truckHaveWinch;
        }
        $equipmentCapacity = array_only($inputs, [
            'total_trucks',
            'capacity_1_quantity',
            'capacity_1_apply',
            'capacity_3_quantity',
            'capacity_3_apply',
            'capacity_5_quantity',
            'capacity_5_apply',
            'capacity_7_quantity',
            'capacity_7_apply',
            'capacity_9_quantity',
            'capacity_9_apply'
        ]);
        if (!empty($equipmentCapacity)) {
            $data['equipment_capacity'] = $equipmentCapacity;
        }
        $vehicleTypes = array_only($inputs, ['vehicle_types_hauled', 'vehicle_types_hauled_selected']);
        if (!empty($vehicleTypes)) {
            $data['vehicle_types'] = $vehicleTypes;
        }

        $noFutureLoads = isset($inputs['no_future_loads']) ? $inputs['no_future_loads'] : null;
        if (!empty($noFutureLoads)) {
            $data['no_future_loads'] = $noFutureLoads;
        }

        $routes = array_only($inputs, [
            'routes'
        ]);
        if (count($routes) > 0) {
            $data['routes'] = $routes['routes'];
        }
        $sendTo = isset($inputs['send_to']) ? $inputs['send_to'] : null;
        if (!empty($sendTo)) {
            $data['send_offer'] = $sendTo;
        }
        
        $maxOffers = isset($inputs['max_load_offers']) ? $inputs['max_load_offers'] : null;
        if (!empty($maxOffers)) {
            $data['max_offers'] = $maxOffers;
        }
        $model->update($data);

        return $model;
    }

    public function delete($id)
    {
        $model = $this->model->findOrFail($id);

        $model->delete();

        return true;
    }
}
