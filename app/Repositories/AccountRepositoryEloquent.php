<?php

namespace App\Repositories;

use App\Models\Role;
use App\Models\Account;
use App\Repositories\AccountRepository;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class AccountRepositoryEloquent.
 *
 * @package namespace App\Repositories\Models;
 */
class AccountRepositoryEloquent extends BaseRepository implements AccountRepository
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
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function datatable($companyId = null)
    {
        if ($companyId) {
            return $this->model->where('company_id', $companyId)->select('*')->with('roles', 'company')->orderBy('id', 'desc');
        } 
        return $this->model->select('*')->with('roles', 'company')->orderBy('id', 'desc');
    }

    public function bindAccountToCompany($accountId, $companyId)
    {
        $account = $this->model->findOrFail($accountId);
        $account->company_id = $companyId;
        if ($account->type == 'business') {
            $role = Role::where('slug', 'biz.alternative')->first();
            $account->step_progress = 'setted-billing-info';
        }
        if ($account->type == 'carrier') {
            $role = Role::where('slug', 'dispatch.alternative')->first();
            $account->step_progress = 'setted-up-payment_step_6';
        }
        
        $account->save();
        
        $account->attachRole($role, $companyId);
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
