<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Post(
 *     path="/api/orders",
 *     summary="Создание",
 *     tags={"Order"},
 *     security={{ "bearerAuth": {} }},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             @OA\Property(property="id_client", type="integer", example= 1),
 *             @OA\Property(property="id_product", type="integer", example= 1),
 *             @OA\Property(property="date_of_shipment", type="datetime", example="2024-02-02 12:25:48"),
 *             @OA\Property(property="units_of_measurement", type="string", example= "сомони"),
 *             @OA\Property(property="price_per_unit", type="float", example= 500.00),
 *             @OA\Property(property="total_amount", type="float", example= 8000),
 *             @OA\Property(property="quantity", type="integer", example= 16),
 *             @OA\Property(property="type_of_sale", type="string", example= "Долг"),
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="Ok"
 *     ),
 * ),
 *
 * @OA\Get(
 *     path="/api/orders",
 *     summary="Список",
 *     tags={"Order"},
 *     security={{ "bearerAuth": {} }},
 *
 *
 *     @OA\Response(
 *         response=200,
 *         description="Ok"
 *     ),
 * ),
 *
 * @OA\Get(
 *     path="/api/orders/{order}",
 *     summary="Список по ID",
 *     tags={"Order"},
 *     security={{ "bearerAuth": {} }},
 *
 *     @OA\Parameter(
 *         description="ID order",
 *         in="path",
 *         name="order",
 *         required=true,
 *         example=1,
 *     ),
 *
 *
 *     @OA\Response(
 *         response=200,
 *         description="Ok"
 *     ),
 * ),
 *
 * @OA\Post(
 *     path="/api/orders/filterByDate",
 *     summary="Список заказов с фильтрацией по дате отгрузки",
 *     tags={"Order"},
 *     security={{ "bearerAuth": {} }},
 *
 *     @OA\Parameter(
 *         name="from_date",
 *         in="query",
 *         required=true,
 *         description="Дата начала периода",
 *         @OA\Schema(
 *             type="string",
 *             format="date",
 *             example="2024-01-01"
 *         )
 *     ),
 *     @OA\Parameter(
 *         name="to_date",
 *         in="query",
 *         required=true,
 *         description="Дата конца периода",
 *         @OA\Schema(
 *             type="string",
 *             format="date",
 *             example="2024-12-31"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Список заказов, удовлетворяющих условиям фильтрации"
 *     ),
 * )
 *
 * @OA\Post(
 *     path="/api/orders/filterByunits",
 *     summary="Список заказов с фильтрацией по единица измерения",
 *     tags={"Order"},
 *     security={{ "bearerAuth": {} }},
 *
 *     @OA\Parameter(
 *         name="units_of_measurement",
 *         in="query",
 *         required=true,
 *         description="Единица измерения",
 *         @OA\Schema(
 *             type="string",
 *             example="Сомони"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Список заказов, удовлетворяющих условиям фильтрации"
 *     ),
 * )
 *
 * @OA\Post(
 *     path="/api/orders/filterBynameproduct",
 *     summary="Список заказов с фильтрацией по название продукты",
 *     tags={"Order"},
 *     security={{ "bearerAuth": {} }},
 *
 *     @OA\Parameter(
 *         name="product_name",
 *         in="query",
 *         required=true,
 *         description="Название продукты",
 *         @OA\Schema(
 *             type="string",
 *             example="Дег 3л"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Список заказов, удовлетворяющих условиям фильтрации"
 *     ),
 * )
 *
 * @OA\Post(
 *     path="/api/orders/filterTypeOfSale",
 *     summary="Список заказов с фильтрацией по тип продажи продукта",
 *     tags={"Order"},
 *     security={{ "bearerAuth": {} }},
 *
 *     @OA\Parameter(
 *         name="type_of_sale",
 *         in="query",
 *         required=true,
 *         description="Тип продажи продукта",
 *         @OA\Schema(
 *             type="string",
 *             example="Долг"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Список заказов, удовлетворяющих условиям фильтрации"
 *     ),
 * )
 *
 * @OA\Patch(
 *     path="/api/orders/{order}",
 *     summary="Обновление",
 *     tags={"Order"},
 *     security={{ "bearerAuth": {} }},
 *
 *     @OA\Parameter(
 *         description="ID order",
 *         in="path",
 *         name="order",
 *         required=true,
 *         example=2,
 *     ),
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             @OA\Property(property="id_client", type="integer", example= 1),
 *             @OA\Property(property="id_product", type="integer", example= 1),
 *             @OA\Property(property="date_of_shipment", type="datetime", example="2024-02-02 12:25:48"),
 *             @OA\Property(property="units_of_measurement", type="string", example= "сомони"),
 *             @OA\Property(property="price_per_unit", type="float", example= 500.00),
 *             @OA\Property(property="total_amount", type="float", example= 8000),
 *             @OA\Property(property="quantity", type="integer", example= 16),
 *             @OA\Property(property="type_of_sale", type="string", example= "Долг"),
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="Ok"
 *     ),
 * ),
 *
 * @OA\Delete(
 *     path="/api/orders/{order}",
 *     summary="Удаление",
 *     tags={"Order"},
 *     security={{ "bearerAuth": {} }},
 * 
 *     @OA\Parameter(
 *         description="ID order",
 *         in="path",
 *         name="order",
 *         required=true,
 *         example=1,
 *     ),
 *
 *
 *     @OA\Response(
 *         response=200,
 *         description="Ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="done")
 *         ),
 *     ),
 * ),
 *
 */

class OrderController extends Controller
{
    //
}
