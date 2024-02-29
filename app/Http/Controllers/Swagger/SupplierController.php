<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Post(
 *     path="/api/suppliers",
 *     summary="Создание",
 *     tags={"Supplier"},
 *     security={{ "bearerAuth": {} }},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             @OA\Property(property="name", type="string", example="ЧДММ Алюминчи"),
 *             @OA\Property(property="address", type="string", example="Худжанд, 3мкр"),
 *             @OA\Property(property="phone", type="integer", example=80800),
 *             @OA\Property(property="email", type="string", example="alumin@mail.ru"),
 *             @OA\Property(property="status", type="boolean", example=1),
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
 *     path="/api/suppliers",
 *     summary="Список",
 *     tags={"Supplier"},
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
 *     path="/api/suppliers/{supplier}",
 *     summary="Список по ID",
 *     tags={"Supplier"},
 *     security={{ "bearerAuth": {} }},
 *
 *     @OA\Parameter(
 *         description="ID клиент",
 *         in="path",
 *         name="supplier",
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
 *     path="/api/suppliers/filterByname",
 *     summary="Список поставщиков с фильтрацией по название",
 *     tags={"Supplier"},
 *     security={{ "bearerAuth": {} }},
 *
 *     @OA\Parameter(
 *         name="name",
 *         in="query",
 *         required=true,
 *         description="Название",
 *         @OA\Schema(
 *             type="string",
 *             example="ЧДММ"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Список заказов, удовлетворяющих условиям фильтрации"
 *     ),
 * )
 *
 * @OA\Patch(
 *     path="/api/suppliers/{supplier}",
 *     summary="Обновление",
 *     tags={"Supplier"},
 *     security={{ "bearerAuth": {} }},
 *
 *     @OA\Parameter(
 *         description="ID клиент",
 *         in="path",
 *         name="supplier",
 *         required=true,
 *         example=2,
 *     ),
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             @OA\Property(property="name", type="string", example="ЧДММ Алюминчи"),
 *             @OA\Property(property="address", type="string", example="Худжанд, 3мкр"),
 *             @OA\Property(property="phone", type="integer", example=80800),
 *             @OA\Property(property="email", type="string", example="alumin@mail.ru"),
 *             @OA\Property(property="status", type="boolean", example=1),
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
 *     path="/api/suppliers/{supplier}",
 *     summary="Удаление",
 *     tags={"Supplier"},
 *     security={{ "bearerAuth": {} }},
 * 
 *     @OA\Parameter(
 *         description="ID клиент",
 *         in="path",
 *         name="supplier",
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

class SupplierController extends Controller
{

}
