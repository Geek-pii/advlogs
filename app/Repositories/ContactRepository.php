<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ContactRepository
 * @package namespace App\Repositories;
 */
interface ContactRepository extends RepositoryInterface
{
    public function datatable($companyId);
    
    public function update(array $input, $id);

    public function delete($id);
}
