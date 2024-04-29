<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cost;
use App\Models\Recipe;
use App\Models\Client;
use App\Models\Employee;
use App\Models\Order;
use App\Models\Product;
use App\Models\RawMaterial;
use App\Models\Sklad;
use App\Models\Supplier;
use App\Models\TypeProduct;

class GetCountObjectController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/count/costs",
     *     summary="Количество затраты",
     *     tags={"GetObjectCount"},
     *     security={{ "bearerAuth": {} }},
     *
     *     @OA\Response(
     *         response=200,
     *         description="Ok"
     *     ),
     * )
     */
    public function getCountCosts()
    {
        $count = Cost::count();
        return response()->json(['count' => $count]);
    }

    /**
     * @OA\Get(
     *     path="/api/count/recipes",
     *     summary="Количество рецепты",
     *     tags={"GetObjectCount"},
     *     security={{ "bearerAuth": {} }},
     *
     *     @OA\Response(
     *         response=200,
     *         description="Ok"
     *     ),
     * )
     */
    public function getCountRecipes()
    {
        $count = Recipe::count();
        return response()->json(['count' => $count]);
    }

    /**
     * @OA\Get(
     *     path="/api/count/clients",
     *     summary="Количество клиентов",
     *     tags={"GetObjectCount"},
     *     security={{ "bearerAuth": {} }},
     *
     *     @OA\Response(
     *         response=200,
     *         description="Ok"
     *     ),
     * )
     */
    public function getCountClients()
    {
        $count = Client::count();
        return response()->json(['count' => $count]);
    }

    /**
     * @OA\Get(
     *     path="/api/count/employees",
     *     summary="Количество сотрудников",
     *     tags={"GetObjectCount"},
     *     security={{ "bearerAuth": {} }},
     *
     *     @OA\Response(
     *         response=200,
     *         description="Ok"
     *     ),
     * )
     */
    public function getCountEmployees()
    {
        $count = Employee::count();
        return response()->json(['count' => $count]);
    }

    /**
     * @OA\Get(
     *     path="/api/count/orders",
     *     summary="Количество заказов",
     *     tags={"GetObjectCount"},
     *     security={{ "bearerAuth": {} }},
     *
     *     @OA\Response(
     *         response=200,
     *         description="Ok"
     *     ),
     * )
     */
    public function getCountOrders()
    {
        $count = Order::count();
        return response()->json(['count' => $count]);
    }

    /**
     * @OA\Get(
     *     path="/api/count/products",
     *     summary="Количество продуктов",
     *     tags={"GetObjectCount"},
     *     security={{ "bearerAuth": {} }},
     *
     *     @OA\Response(
     *         response=200,
     *         description="Ok"
     *     ),
     * )
     */
    public function getCountProducts()
    {
        $count = Product::count();
        return response()->json(['count' => $count]);
    }

    /**
     * @OA\Get(
     *     path="/api/count/rawmaterials",
     *     summary="Количество сырье",
     *     tags={"GetObjectCount"},
     *     security={{ "bearerAuth": {} }},
     *
     *     @OA\Response(
     *         response=200,
     *         description="Ok"
     *     ),
     * )
     */
    public function getCountRawMaterials()
    {
        $count = RawMaterial::count();
        return response()->json(['count' => $count]);
    }

    /**
     * @OA\Get(
     *     path="/api/count/sklads",
     *     summary="Количество складов",
     *     tags={"GetObjectCount"},
     *     security={{ "bearerAuth": {} }},
     *
     *     @OA\Response(
     *         response=200,
     *         description="Ok"
     *     ),
     * )
     */
    public function getCountSklads()
    {
        $count = Sklad::count();
        return response()->json(['count' => $count]);
    }

    /**
     * @OA\Get(
     *     path="/api/count/suppliers",
     *     summary="Количество поставщиков",
     *     tags={"GetObjectCount"},
     *     security={{ "bearerAuth": {} }},
     *
     *     @OA\Response(
     *         response=200,
     *         description="Ok"
     *     ),
     * )
     */
    public function getCountSuppliers()
    {
        $count = Supplier::count();
        return response()->json(['count' => $count]);
    }

    /**
     * @OA\Get(
     *     path="/api/count/typeproducts",
     *     summary="Количество тип продуктов",
     *     tags={"GetObjectCount"},
     *     security={{ "bearerAuth": {} }},
     *
     *     @OA\Response(
     *         response=200,
     *         description="Ok"
     *     ),
     * )
     */
    public function getCountTypeProducts()
    {
        $count = TypeProduct::count();
        return response()->json(['count' => $count]);
    }
}
