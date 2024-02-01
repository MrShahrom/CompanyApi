<?php

namespace App\Http\Controllers;

use App\Http\Requests\RawMaterial\StoreRequest;
use App\Http\Requests\RawMaterial\UpdateRequest;
use App\Http\Resources\RawMaterialResource;
use App\Models\RawMaterial;
use Illuminate\Http\Request;

class RawMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rawMaterial = RawMaterial::all();
        return RawMaterialResource::collection($rawMaterial);
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
        $rawMaterial = RawMaterial::create($data);

        return RawMaterialResource::make($rawMaterial);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $rawMaterial = RawMaterial::find($id);

        if (!$rawMaterial) {
            return response()->json(['message' => $id], 404);
        } else {
            return RawMaterialResource::make($rawMaterial);
        }
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RawMaterial $rawMaterial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, RawMaterial $rawMaterial)
    {
        $data = $request->validated();
        $rawMaterial->update($data);

        return RawMaterialResource::make($rawMaterial);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RawMaterial $rawMaterial)
    {
        $rawMaterial->delete();
        return response()->json([
            'message' => 'Deleted'
        ]);
    }
}
