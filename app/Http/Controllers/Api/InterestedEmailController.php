<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Resources\InterestedEmailResource;
use App\Http\Resources\InterestedEmailCollection;
use App\Services\InterestedEmailService;
use App\Http\Controllers\Controller;
use App\Http\Requests\InterestedEmailRequest;

class InterestedEmailController extends Controller
{
    protected $service;

    public function __construct(InterestedEmailService $interestedEmailService)
    {
        $this->service = $interestedEmailService;
    }

    public function index()
    {
        $interestedEmail = $this->service->getInterestedEmails();

        return new InterestedEmailCollection($interestedEmail);
    }

    public function show($id)
    {
        $interestedEmail = $this->service->getInterestedEmail($id);

        return new InterestedEmailResource($interestedEmail);
    }

    public function store(InterestedEmailRequest $request)
    {
        $interestedEmail = $this->service->createInterestedEmail($request->validated());

        return new InterestedEmailResource($interestedEmail);
    }
}