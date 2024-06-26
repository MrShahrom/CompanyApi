<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CostController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RawMaterialController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SkladController;
use App\Http\Controllers\TypeProductController;
use App\Http\Controllers\GetCountObjectController;
use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Логин
Route::post('login', [AuthController::class, 'login']);


Route::group(['middleware' => 'jwt.auth'], function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

    Route::group(['middleware' => 'CheckAdmin'], function () {

        //resource
        Route::resource('clients', ClientController::class);
        Route::resource('employees', EmployeeController::class);
        Route::resource('suppliers', SupplierController::class);
        Route::resource('sklads', SkladController::class);
        Route::resource('typeproducts', TypeProductController::class);
        Route::resource('rawmaterials', RawMaterialController::class);
        Route::resource('recipes', RecipeController::class);
        Route::resource('products', ProductController::class);
        Route::resource('orders', OrderController::class);
        Route::resource('costs', CostController::class);
        //
        Route::post('/products/{id}', [ProductController::class, 'update']);

        //Фильтр по дату
        Route::post('/orders/filterByDate', [OrderController::class, 'filterByDate']);

        //Фильтр по названия поставщика
        Route::post('/suppliers/filterByname', [SupplierController::class, 'filterByname']);

        //Фильтр по единицы измерение
        Route::post('/orders/filterByunits', [OrderController::class, 'filterByunits']);

        //Фильтр по название продукта
        Route::post('/orders/filterBynameproduct', [OrderController::class, 'filterBynameproduct']);

        //Фильтр по тип продажи продукта
        Route::post('/orders/filterTypeOfSale', [OrderController::class, 'filterTypeOfSale']);

        //Калкульятор рассчета
        Route::post('/products/calculate-cost', [CostController::class, 'calculateCost']);

        //Экспорт заказы
        Route::get('order_export', [OrderController::class, 'get_order_data'])->name('order_export');

        //Экспорт сырье
        Route::get('rawmaterial_export', [RawMaterialController::class, 'get_rawMaterial_data'])->name('rawmaterial_export');

        //Экспорт расходы
        Route::get('cost_export', [CostController::class, 'get_cost_data'])->name('cost_export');

        // Маршруты для получения количества объектов
        Route::get('/count/costs', [GetCountObjectController::class, 'getCountCosts']);
        Route::get('/count/recipes', [GetCountObjectController::class, 'getCountRecipes']);
        Route::get('/count/clients', [GetCountObjectController::class, 'getCountClients']);
        Route::get('/count/employees', [GetCountObjectController::class, 'getCountEmployees']);
        Route::get('/count/orders', [GetCountObjectController::class, 'getCountOrders']);
        Route::get('/count/products', [GetCountObjectController::class, 'getCountProducts']);
        Route::get('/count/rawmaterials', [GetCountObjectController::class, 'getCountRawMaterials']);
        Route::get('/count/sklads', [GetCountObjectController::class, 'getCountSklads']);
        Route::get('/count/suppliers', [GetCountObjectController::class, 'getCountSuppliers']);
        Route::get('/count/typeproducts', [GetCountObjectController::class, 'getCountTypeProducts']);
    });

    Route::group(['middleware' => 'CheckTechnolog'], function () {

        //resource
        Route::resource('suppliers', SupplierController::class);
        Route::resource('sklads', SkladController::class);
        Route::resource('typeproducts', TypeProductController::class);
        Route::resource('rawmaterials', RawMaterialController::class);
        Route::resource('recipes', RecipeController::class);
        Route::resource('products', ProductController::class);

        //Фильтр по названия поставщика
        Route::post('/suppliers/filterByname', [SupplierController::class, 'filterByname']);

        //Экспорт сырье
        Route::get('rawmaterial_export', [RawMaterialController::class, 'get_rawMaterial_data'])->name('rawmaterial_export');
    });
});
