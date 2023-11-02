<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface GetAQuoteRepository
 * @package namespace App\Repositories;
 */
interface GetAQuoteRepository extends RepositoryInterface
{
    public function datatable();

    public function update(array $input, $id);

    public function delete($id);
}
