<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Post(
 *     path="/api/products",
 *     summary="Создание",
 *     tags={"Product"},
 *     security={{ "bearerAuth": {} }},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             @OA\Property(property="name", type="string", example="Дег"),
 *             @OA\Property(property="id_sklad", type="integer", example=1),
 *             @OA\Property(property="selling_price", type="float", example= 200.00),
 *             @OA\Property(property="id_type_product", type="integer", example= 2),
 *             @OA\Property(property="quantity", type="integer", example= 10),
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
 *     path="/api/products",
 *     summary="Список",
 *     tags={"Product"},
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
 *     path="/api/products/{product}",
 *     summary="Список по ID",
 *     tags={"Product"},
 *     security={{ "bearerAuth": {} }},
 *
 *     @OA\Parameter(
 *         description="ID product",
 *         in="path",
 *         name="product",
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
 * @OA\Patch(
 *     path="/api/products/{product}",
 *     summary="Обновление",
 *     tags={"Product"},
 *     security={{ "bearerAuth": {} }},
 *
 *     @OA\Parameter(
 *         description="ID product",
 *         in="path",
 *         name="product",
 *         required=true,
 *         example=2,
 *     ),
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             @OA\Property(property="name", type="string", example="Дег"),
 *             @OA\Property(property="id_sklad", type="integer", example=1),
 *             @OA\Property(property="selling_price", type="float", example= 200.00),
 *             @OA\Property(property="id_type_product", type="integer", example= 2),
 *             @OA\Property(property="quantity", type="integer", example= 10),
 *             @OA\Property(property="status", type="boolean", example= 1),
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
 *     path="/api/products/{product}",
 *     summary="Удаление",
 *     tags={"Product"},
 *     security={{ "bearerAuth": {} }},
 * 
 *     @OA\Parameter(
 *         description="ID product",
 *         in="path",
 *         name="product",
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

class ProductController extends Controller
{
    //
}
