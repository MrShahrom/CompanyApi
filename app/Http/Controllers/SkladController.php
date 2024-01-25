<?php

namespace App\Http\Controllers;

use App\Http\Requests\Sklad\StoreRequest;
use App\Http\Requests\Sklad\UpdateRequest;
use App\Http\Resources\SkladResource;
use App\Models\Sklad;
use Illuminate\Http\Request;

class SkladController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sklads = Sklad::all();
        return SkladResource::collection($sklads);
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
        $sklad = Sklad::create($data);

        return SkladResource::make($sklad);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sklad $sklad)
    {
        return SkladResource::make($sklad);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sklad $sklad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Sklad $sklad)
    {
        $data = $request->validated();
        $sklad->update($data);

        return SkladResource::make($sklad);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sklad $sklad)
    {
        $sklad->delete();
        return response()->json([
            'message' => 'Deleted'
        ]);
    }
}
