<?php

namespace App\Http\Controllers;

use App\Http\Requests\Recipe\StoreRequest;
use App\Http\Requests\Recipe\UpdateRequest;
use App\Http\Resources\RecipeResource;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipe = Recipe::all();
        return RecipeResource::collection($recipe);
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
        $recipe = Recipe::create($data);

        return RecipeResource::make($recipe);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $recipe = Recipe::find($id);

        if (!$recipe) {
            return response()->json(['message' => $id], 404);
        } else {
            return RecipeResource::make($recipe);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Recipe $recipe)
    {
        $data = $request->validated();
        $recipe->update($data);

        return RecipeResource::make($recipe);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return response()->json([
            'message' => 'Deleted'
        ]);
    }
}
