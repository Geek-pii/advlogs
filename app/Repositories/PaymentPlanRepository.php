<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface DepartmentRepository
 * @package namespace App\Repositories;
 */
interface PaymentPlanRepository extends RepositoryInterface
{
    public function datatable();

    public function create(array $input);

    public function update(array $input, $id);

    public function delete($id);
}
