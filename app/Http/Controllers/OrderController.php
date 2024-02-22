<?php

namespace App\Http\Controllers;

use App\Exports\OrderExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\Order\StoreRequest;
use App\Http\Requests\Order\UpdateRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
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
        $request->validate([
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
        ]);
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');
        $filteredOrders = Order::whereBetween('date_of_shipment', [$fromDate, $toDate])->get();

        if ($filteredOrders->isEmpty()) {
            return response()->json(['message' => 'Заказы с такими периодами не найден']);
        }

        return OrderResource::collection($filteredOrders);
    }

    /**
     * Filter orders by units_of_measurement.
     */
    public function filterByunits(Request $request)
    {
        $request->validate([
            'units_of_measurement' => 'required|string',
        ]);

        $units_of_measurement = $request->input('units_of_measurement');
        $filteredorders = Order::where('units_of_measurement', 'LIKE', $units_of_measurement . '%')->get();

        if ($filteredorders->isEmpty()) {
            return response()->json(['message' => 'Единицы измерение с таким названием не найден']);
        }

        return OrderResource::collection($filteredorders);
    }

    /**
     * Filter orders by productname.
     */
    public function filterBynameproduct(Request $request)
    {
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
    }

    /**
     * Filter orders by typeofsale.
     */
    public function filterTypeOfSale(Request $request)
    {
        $request->validate([
            'type_of_sale' => 'required|string',
        ]);

        $typeSale = $request->input('type_of_sale');
        $filteredorders = Order::where('type_of_sale', 'LIKE', $typeSale . '%')->get();

        if ($filteredorders->isEmpty()) {
            return response()->json(['message' => 'Тип продажи с такими не найден']);
        }

        return OrderResource::collection($filteredorders);
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
        $data = $request->validated();
        $order = Order::create($data);

        return OrderResource::make($order);
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
