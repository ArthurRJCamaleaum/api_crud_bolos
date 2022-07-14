<?php

namespace App\Services;

use App\Repositories\CakeRepository;

class CakeService
{
    protected $repository;

    public function __construct(CakeRepository $cakeRepository)
    {
        $this->repository = $cakeRepository;
    }

    public function getCakes()
    { 
        return $this->repository->getAll();
    }

    public function getCake($id)
    {
        return $this->repository->getOne($id);
    }

    public function createCake(array $data)
    {   
        return $this->repository->createOne($data);
    }

    public function updateCake($id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    public function deleteCake($id)
    {
        return $this->repository->delete($id);
    }
}
