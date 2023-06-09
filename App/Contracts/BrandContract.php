<?php

namespace App\Contracts;

/**
 * Interface BrandContract
 */
interface BrandContract
{
    /**
     * @return mixed
     */
    public function listBrands(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @return mixed
     */
    public function findBrandById(int $id);

    /**
     * @return mixed
     */
    public function createBrand(array $params);

    /**
     * @return mixed
     */
    public function updateBrand(array $params);

    /**
     * @return bool
     */
    public function deleteBrand($id);
}
