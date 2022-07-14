<?php

namespace App\Services;

use App\Repositories\InterestedEmailRepository;

class InterestedEmailService
{
    protected $repository;

    public function __construct(InterestedEmailRepository $InterestedEmailRepository)
    {
        $this->repository = $InterestedEmailRepository;
    }

    public function getInterestedEmails()
    { 
        return $this->repository->getAll();
    }

    public function getInterestedEmail($id)
    {
        return $this->repository->getOne($id);
    }

    public function createInterestedEmail(array $data)
    {   
        return $this->repository->createOne($data);
    }
}