<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeProduct\StoreRequest;
use App\Http\Requests\TypeProduct\UpdateRequest;
use App\Http\Resources\TypeProductResource;
use App\Models\TypeProduct;
use Illuminate\Http\Request;

class TypeProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $typeproducts = TypeProduct::all();
        return TypeProductResource::collection($typeproducts);
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
        $typeproduct = TypeProduct::create($data);

        return TypeProductResource::make($typeproduct);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $typeProduct = TypeProduct::find($id);

        if (!$typeProduct) {
            return response()->json(['message' => 'Тип продукта не найден'], 404);
        }

        return TypeProductResource::make($typeProduct);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypeProduct $typeProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id)
    {
        $typeProduct = TypeProduct::find($id);
        $data = $request->validated();
        $typeProduct->update($data);

        return TypeProductResource::make($typeProduct);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $typeProduct = TypeProduct::find($id);
        $typeProduct->delete();
        return response()->json([
            'message' => 'Deleted'
        ]);
    }
}
