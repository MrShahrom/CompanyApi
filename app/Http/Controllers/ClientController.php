<?php

namespace App\Http\Controllers;

use App\Http\Requests\Client\StoreRequest;
use App\Http\Requests\Client\UpdateRequest;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        return ClientResource::collection($clients);
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
        try {
            $data = $request->validated();
            $client = Client::create($data);

            return ClientResource::make($client);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Произошла ошибка при создании клиента'], 500);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $client = Client::find($id);
        if (!$client) {
            return response()->json(['message' => $id], 404);
        } else {
            return ClientResource::make($client);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Client $client)
    {
        try {
            $data = $request->validated();
            $client->update($data);

            return ClientResource::make($client);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Произошла ошибка при обновлении клиента'], 500);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return response()->json([
            'message' => 'Deleted'
        ]);
    }
}
