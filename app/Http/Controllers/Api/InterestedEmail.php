<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Resources\CakeResource;
use App\Http\Resources\CakeCollection;
use App\Services\CakeService;
use App\Http\Controllers\Controller;
use App\Http\Requests\CakeRequest;

class InterestedController extends Controller
{
    protected $service;

    public function __construct(CakeService $cakeService)
    {
        $this->service = $cakeService;
    }

    public function index()
    {
        //..
    }

    public function store(CakeRequest $request)
    {
        $cake = $this->service->createCake($request->validated());

        return new CakeResource($cake);
    }
}