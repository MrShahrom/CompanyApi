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
        $productId = $request->input('productId');
        $recipes = Recipe::where('id_type_product', $productId)->get();

        if ($recipes->isEmpty()) {
            return response()->json(['error' => 'Отсутствуют рецепты для указанного типа продукта'], 404);
        }

        $totalCost = 0;
        $totalQuantityProduced = 0;

        foreach ($recipes as $recipe) {

            $rawMaterial = $recipe->rawmaterial; //Получаем информацию о сырье, необходимом для производства продукта, из связанной модели RawMaterial

            if ($rawMaterial) {
                $materialCost = $rawMaterial->purchase_price * $recipe->quantity; //Найдем общую сумму материалов (сырья), использованных для этого типа продуктов
                $totalCost += $materialCost;
                $totalQuantityProduced += $recipe->typeproduct->quantity_produced; //Найдем количество производенный тип продукта
            } else {
                return response()->json(['error' => 'Отсутствует информация о сырье для рецепта'], 404);
            }
        }

        if ($totalQuantityProduced > 0) {
            // Рассчитываем себестоимость общего продукта
            $total = $totalCost * $totalQuantityProduced;
            // Рассчитываем себестоимость одного продукта
            $costPerProduct = $total / $totalQuantityProduced;
        } else {
            $costPerProduct = 0;
        }
        //Себестоимост одного продукта
        return $costPerProduct;
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
