<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CostController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RawMaterialController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SkladController;
use App\Http\Controllers\TypeProductController;
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


Route::post('login', [AuthController::class, 'login']);


Route::group(['middleware' => 'api', 'prefix' => 'auth'], function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});


Route::resource('clients', ClientController::class)->middleware('jwt.auth');
Route::resource('employees', EmployeeController::class)->middleware('jwt.auth');
Route::resource('suppliers', SupplierController::class)->middleware('jwt.auth');
Route::resource('sklads', SkladController::class)->middleware('jwt.auth');
Route::resource('typeproducts', TypeProductController::class)->middleware('jwt.auth');
Route::resource('rawmaterials', RawMaterialController::class)->middleware('jwt.auth');
Route::resource('recipes', RecipeController::class)->middleware('jwt.auth');
Route::resource('products', ProductController::class)->middleware('jwt.auth');
Route::resource('orders', OrderController::class)->middleware('jwt.auth');
Route::resource('costs', CostController::class)->middleware('jwt.auth');

//Фильтр по дату
Route::post('/orders/filterByDate', [OrderController::class, 'filterByDate'])->middleware('jwt.auth');

//Фильтр по названия поставщика
Route::post('/suppliers/filterByname', [SupplierController::class, 'filterByname'])->middleware('jwt.auth');

//Фильтр по единицы измерение
Route::post('/orders/filterByunits', [OrderController::class, 'filterByunits'])->middleware('jwt.auth');

//Фильтр по название продукта
Route::post('/orders/filterBynameproduct', [OrderController::class, 'filterBynameproduct'])->middleware('jwt.auth');

//Фильтр по тип продажи продукта
Route::post('/orders/filterTypeOfSale', [OrderController::class, 'filterTypeOfSale'])->middleware('jwt.auth');

//Калкульятор рассчета
Route::post('/products/calculate-cost', [CostController::class, 'calculateCost'])->middleware('jwt.auth');

//Экспорт заказы
Route::get('order_export',[OrderController::class, 'get_order_data'])->name('order_export')->middleware('jwt.auth');

//Экспорт сырье
Route::get('rawmaterial_export',[RawMaterialController::class, 'get_rawMaterial_data'])->name('rawmaterial_export')->middleware('jwt.auth');

//Экспорт расходы
Route::get('cost_export',[CostController::class, 'get_cost_data'])->name('cost_export')->middleware('jwt.auth');

