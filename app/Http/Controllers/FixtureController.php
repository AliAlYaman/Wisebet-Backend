<?php

namespace App\Http\Controllers;

use App\Models\Fixture;
use App\Http\Requests\StoreFixtureRequest;
use App\Http\Requests\UpdateFixtureRequest;

class FixtureController extends Controller
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
    public function store(StoreFixtureRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Fixture $fixture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFixtureRequest $request, Fixture $fixture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fixture $fixture)
    {
        //
    }
}
