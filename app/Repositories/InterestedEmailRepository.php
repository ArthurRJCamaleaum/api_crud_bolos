<?php

namespace App\Repositories;

use App\Models\InterestedEmail;

class InterestedEmailRepository
{
    protected $entity;

    public function __construct(InterestedEmail $interestedEmail)
    {
        $this->entity = $interestedEmail;
    }

    public function getAll()
    {
        return $this->entity->all();
    }

    public function getOne($id)
    {
        return $this->entity->findOrFail($id);
    }
    
    public function createOne(array $data)
    {
        return $this->entity->create($data);
    }
}