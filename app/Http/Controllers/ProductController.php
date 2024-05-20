<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return ProductResource::collection($product);
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

            // Обработка изображения
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images', 'public');
                $data['image'] = $imagePath;
            }

            $product = Product::create($data);

            return ProductResource::make($product);
        } catch (\Exception $e) {
            Log::error('Error while storing product: ' . $e->getMessage());
            return response()->json(['message' => 'Error occurred while storing product'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => $id], 404);
        } else {
            return ProductResource::make($product);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        try {
            // Валидация данных запроса
            $validatedData = $request->validate([
                'name' => 'required|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'id_sklad' => 'required|integer',
                'selling_price' => 'required|numeric|regex:/^\d+(\.\d{1,4})?$/',
                'id_type_product' => 'required|integer',
                'quantity' => 'required|integer',
                'status' => 'required|boolean',
            ]);

            // Извлечение продукта из базы данных
            $product = Product::findOrFail($id);

            // Обработка загруженного изображения
            if ($request->hasFile('image')) {
                // Удаление старого изображения, если оно существует
                if ($product->image) {
                    Storage::disk('public')->delete($product->image);
                }

                // Сохранение нового изображения
                $imagePath = $request->file('image')->store('images', 'public');
                $validatedData['image'] = $imagePath;
            }

            // Обновление данных продукта
            $product->update($validatedData);

            return response()->json(['message' => 'Продукт успешно обновлен'], 200);
        } catch (ValidationException $e) {
            Log::error('Ошибка валидации: ' . $e->getMessage());
            return response()->json(['message' => 'Ошибка валидации', 'errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            Log::error('Ошибка при обновлении продукта: ' . $e->getMessage());
            return response()->json(['message' => 'Ошибка при обновлении продукта'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json([
            'message' => 'Deleted'
        ]);
    }
}
