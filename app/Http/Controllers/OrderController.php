<?php

namespace App\Http\Controllers;

use App\Exports\OrderExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\Order\StoreRequest;
use App\Http\Requests\Order\UpdateRequest;
use App\Http\Resources\OrderResource;
use App\Models\Client;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return OrderResource::collection($orders);
    }

    /**
     * Filter orders by shipment date.
     */
    public function filterByDate(Request $request)
    {
        try {
            $request->validate([
                'from_date' => 'required|date',
                'to_date' => 'required|date|after_or_equal:from_date',
            ]);

            $fromDate = $request->input('from_date');
            $toDate = $request->input('to_date');
            $filteredOrders = Order::whereBetween('date_of_shipment', [$fromDate, $toDate])->get();

            if ($filteredOrders->isEmpty()) {
                return response()->json(['message' => 'Заказы с такими периодами не найдены']);
            }

            return OrderResource::collection($filteredOrders);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Произошла ошибка при фильтрации заказов по дате'], 500);
        }
    }


    /**
     * Filter orders by units_of_measurement.
     */
    public function filterByunits(Request $request)
    {
        try {
            $request->validate([
                'units_of_measurement' => 'required|string',
            ]);

            $units_of_measurement = $request->input('units_of_measurement');
            $filteredorders = Order::where('units_of_measurement', 'LIKE', $units_of_measurement . '%')->get();

            if ($filteredorders->isEmpty()) {
                return response()->json(['message' => 'Единицы измерения с таким названием не найдены']);
            }

            return OrderResource::collection($filteredorders);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Произошла ошибка при фильтрации заказов по единицам измерения'], 500);
        }
    }

    /**
     * Filter orders by productname.
     */
    public function filterBynameproduct(Request $request)
    {
        try {
            $request->validate([
                'product_name' => 'required|string',
            ]);

            $productName = $request->input('product_name');

            $filteredOrders = Order::whereHas('product.type_product', function ($query) use ($productName) {
                $query->where('product_name', 'LIKE', $productName . '%');
            })->get();

            if ($filteredOrders->isEmpty()) {
                return response()->json(['message' => 'Продукт с таким названием не найден']);
            }

            return OrderResource::collection($filteredOrders);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Произошла ошибка при фильтрации заказов по названию продукта'], 500);
        }
    }


    /**
     * Filter orders by typeofsale.
     */
    public function filterTypeOfSale(Request $request)
    {
        try {
            $request->validate([
                'type_of_sale' => 'required|string',
            ]);

            $typeSale = $request->input('type_of_sale');
            $filteredOrders = Order::where('type_of_sale', 'LIKE', $typeSale . '%')->get();

            if ($filteredOrders->isEmpty()) {
                return response()->json(['message' => 'Тип продажи с такими не найден']);
            }

            return OrderResource::collection($filteredOrders);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Произошла ошибка при фильтрации заказов по типу продажи'], 500);
        }
    }


    public function get_order_data()
    {
        return Excel::download(new OrderExport, 'orders.xlsx');
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
            $client = Client::findOrFail($request->id_client);

            if ($client->status == 1) {
                $data = $request->validated();

                // Получаем информацию о продукте
                $product = Product::findOrFail($request->id_product);

                // Проверяем, достаточно ли продуктов на складе
                if ($request->quantity <= $product->quantity) {
                    // Создаем заказ
                    $order = Order::create($data);

                    // Уменьшаем количество продукта на складе
                    $product->quantity -= $request->quantity;
                    $product->save();

                    return OrderResource::make($order);
                } else {
                    return response()->json(['error' => 'Недостаточно продуктов на складе'], 403);
                }
            } else {
                return response()->json(['error' => 'This client cannot place orders'], 403);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => $id], 404);
        } else {
            return OrderResource::make($order);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Order $order)
    {
        $data = $request->validated();
        $order->update($data);

        return OrderResource::make($order);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return response()->json([
            'message' => 'Deleted'
        ]);
    }
}
