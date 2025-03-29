<?php

namespace App\Http\Controllers;

use App\Models\AiModel;
use App\Http\Requests\StoreAiModelRequest;
use App\Http\Requests\UpdateAiModelRequest;

class AiModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAiModelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AiModel $aiModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAiModelRequest $request, AiModel $aiModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AiModel $aiModel)
    {
        //
    }
}
