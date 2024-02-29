<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Post(
 *     path="/api/typeproducts",
 *     summary="Создание",
 *     tags={"TypeProduct"},
 *     security={{ "bearerAuth": {} }},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             @OA\Property(property="product_name", type="string", example="Дег 3л"),
 *             @OA\Property(property="quantity_produced", type="integer", example=100),
 *             @OA\Property(property="description", type="string", example="Описание"),
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
 *     path="/api/typeproducts",
 *     summary="Список",
 *     tags={"TypeProduct"},
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
 *     path="/api/typeproducts/{typeproduct}",
 *     summary="Список по ID",
 *     tags={"TypeProduct"},
 *     security={{ "bearerAuth": {} }},
 *
 *     @OA\Parameter(
 *         description="ID тип продукта",
 *         in="path",
 *         name="typeproduct",
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
 *     path="/api/typeproducts/{typeproduct}",
 *     summary="Обновление",
 *     tags={"TypeProduct"},
 *     security={{ "bearerAuth": {} }},
 *
 *     @OA\Parameter(
 *         description="ID тип продукта",
 *         in="path",
 *         name="typeproduct",
 *         required=true,
 *         example=2,
 *     ),
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             @OA\Property(property="product_name", type="string", example="Дег 3л"),
 *             @OA\Property(property="quantity_produced", type="integer", example=100),
 *             @OA\Property(property="description", type="string", example="Описание"),
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
 *     path="/api/typeproducts/{typeproduct}",
 *     summary="Удаление",
 *     tags={"TypeProduct"},
 *     security={{ "bearerAuth": {} }},
 * 
 *     @OA\Parameter(
 *         description="ID тип продукта",
 *         in="path",
 *         name="typeproduct",
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

class TypeProductController extends Controller
{
    //
}
