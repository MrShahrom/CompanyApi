<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Post(
 *     path="/api/costs",
 *     summary="Создание",
 *     tags={"Cost"},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             @OA\Property(property="id_product", type="string", example= 1),
 *             @OA\Property(property="description", type="string", example="Описание"),
 *             @OA\Property(property="amount", type="float", example=750.00),
 *             @OA\Property(property="date", type="datetime", example= "2024-02-14 15:00:15"),
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
 *     path="/api/costs",
 *     summary="Список",
 *     tags={"Cost"},
 *
 *
 *     @OA\Response(
 *         response=200,
 *         description="Ok"
 *     ),
 * ),
 *
 * @OA\Get(
 *     path="/api/costs/{cost}",
 *     summary="Список по ID",
 *     tags={"Cost"},
 *     @OA\Parameter(
 *         description="ID cost",
 *         in="path",
 *         name="cost",
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
 *     path="/api/products/calculate-cost",
 *     summary="Калькулятор расчета себестоимости продукта",
 *     tags={"Cost"},
 *     @OA\Parameter(
 *         name="productId",
 *         in="query",
 *         required=true,
 *         description="id тип продукта",
 *         @OA\Schema(
 *             type="integer",
 *             example="1"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description=" "
 *     ),
 * )
 *
 * @OA\Patch(
 *     path="/api/costs/{cost}",
 *     summary="Обновление",
 *     tags={"Cost"},
 *     @OA\Parameter(
 *         description="ID cost",
 *         in="path",
 *         name="cost",
 *         required=true,
 *         example=2,
 *     ),
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             @OA\Property(property="id_product", type="string", example= 1),
 *             @OA\Property(property="description", type="string", example="Описание"),
 *             @OA\Property(property="amount", type="float", example=900.00),
 *             @OA\Property(property="date", type="datetime", example="2024-02-14 15:00:15"),
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
 *     path="/api/costs/{cost}",
 *     summary="Удаление",
 *     tags={"Cost"},
 *     @OA\Parameter(
 *         description="ID cost",
 *         in="path",
 *         name="cost",
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

class CostController extends Controller
{
    //
}
