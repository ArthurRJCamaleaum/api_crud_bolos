<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Resources\CakeResource;
use App\Http\Resources\CakeCollection;
use App\Services\CakeService;
use App\Http\Controllers\Controller;
use App\Http\Requests\CakeRequest;

class CakeController extends Controller
{
    protected $service;

    public function __construct(CakeService $cakeService)
    {
        $this->service = $cakeService;
    }

    public function index()
    {
        $cakes = $this->service->getCakes();

        return new CakeCollection($cakes);
    }

    public function show($id)
    {
        $cake = $this->service->getCake($id);

        return new CakeResource($cake);
    }

    public function store(CakeRequest $request)
    {
        $cake = $this->service->createCake($request->validated());

        return new CakeResource($cake);
    }

    public function update($id, CakeRequest $request)
    {
        $this->service->updateCake($id, $request->safe()->only('name','weight','price','quantity'));

        return response()->json([
            'updated' => true
        ]);
    }

    public function destroy($id)
    {
        $this->service->deleteCake($id);

        return response()->json([], 204);
    }
}
