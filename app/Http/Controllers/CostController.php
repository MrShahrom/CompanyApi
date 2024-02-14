<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cost\StoreRequest;
use App\Http\Requests\Cost\UpdateRequest;
use App\Http\Resources\CostResource;
use App\Models\Cost;
use Illuminate\Http\Request;

class CostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $costs = Cost::all();
        return CostResource::collection($costs);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $cost = Cost::create($data);

        return CostResource::make($cost);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cost = Cost::find($id);

        if (!$cost) {
            return response()->json(['message' => $id], 404);
        } else {
            return CostResource::make($cost);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cost $cost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Cost $cost)
    {
        $data = $request->validated();
        $cost->update($data);

        return CostResource::make($cost);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cost $cost)
    {
        $cost->delete();
        return response()->json([
            'message' => 'Deleted'
        ]);
    }
}
