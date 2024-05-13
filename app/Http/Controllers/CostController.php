<?php

namespace App\Http\Controllers;

use App\Exports\CostExport;
use App\Http\Requests\Cost\StoreRequest;
use App\Http\Requests\Cost\UpdateRequest;
use App\Http\Resources\CostResource;
use App\Models\Cost;
use App\Models\TypeProduct;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
     * Display a listing of the resource.
     */
    public function calculateCost(Request $request)
    {
        try {
            $productId = $request->input('productId');
            $recipes = Recipe::where('id_type_product', $productId)->get();

            if ($recipes->isEmpty()) {
                return response()->json(['error' => 'Отсутствуют рецепты для указанного типа продукта'], 404);
            }

            $totalCost = 0;
            $totalQuantityProduced = 0;

            foreach ($recipes as $recipe) {

                $rawMaterial = $recipe->rawmaterial;

                if ($rawMaterial) {
                    $materialCost = $rawMaterial->purchase_price * $recipe->quantity;
                    $totalCost += $materialCost;
                    $totalQuantityProduced += $recipe->typeproduct->quantity_produced;
                } else {
                    return response()->json(['error' => 'Отсутствует информация о сырье для рецепта'], 404);
                }
            }

            if ($totalQuantityProduced > 0) {
                $total = $totalCost * $totalQuantityProduced;
                $costPerProduct = $total / $totalQuantityProduced;
            } else {
                $costPerProduct = 0;
            }

            return $costPerProduct;
        } catch (\Exception $e) {
            return response()->json(['error' => 'Произошла ошибка при расчете себестоимости продукта'], 500);
        }
    }


    public function get_cost_data()
    {
        return Excel::download(new CostExport, 'orders.xlsx');
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
            $cost = Cost::create($data);

            return CostResource::make($cost);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Произошла ошибка при создании стоимости'], 500);
        }
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
        try {
            $data = $request->validated();
            $cost->update($data);

            return CostResource::make($cost);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Произошла ошибка при обновлении стоимости'], 500);
        }
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
