<?php

namespace App\Http\Controllers;

use App\Models\Bet;
use App\Http\Requests\StoreBetRequest;
use App\Http\Requests\UpdateBetRequest;

class BetController extends Controller
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
    public function store(StoreBetRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Bet $bet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBetRequest $request, Bet $bet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bet $bet)
    {
        //
    }
}
