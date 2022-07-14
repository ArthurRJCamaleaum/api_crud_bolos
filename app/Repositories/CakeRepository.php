<?php

namespace App\Repositories;

use App\Models\Cake;

class CakeRepository
{
    protected $entity;

    public function __construct(Cake $cake)
    {
        $this->entity = $cake;
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

    public function update($id, array $data)
    {
        $cake = $this->getOne($id);

        return $cake->update($data);
    }

    public function delete($id)
    {
        $cake = $this->getOne($id);

        return $cake->delete();
    }
}