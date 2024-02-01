<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Post(
 *     path="/api/recipes",
 *     summary="Создание",
 *     tags={"Recipe"},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             @OA\Property(property="id_type_product", type="integer", example= 1),
 *             @OA\Property(property="id_raw_material", type="integer", example= 1),
 *             @OA\Property(property="unit", type="string", example="кг"),
 *             @OA\Property(property="quantity", type="integer", example= 9),
 *             @OA\Property(property="description", type="string", example="Описание"),
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
 *     path="/api/recipes",
 *     summary="Список",
 *     tags={"Recipe"},
 *
 *
 *     @OA\Response(
 *         response=200,
 *         description="Ok"
 *     ),
 * ),
 *
 * @OA\Get(
 *     path="/api/recipes/{recipe}",
 *     summary="Список по ID",
 *     tags={"Recipe"},
 *     @OA\Parameter(
 *         description="ID recipe",
 *         in="path",
 *         name="recipe",
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
 *     path="/api/recipes/{recipe}",
 *     summary="Обновление",
 *     tags={"Recipe"},
 *     @OA\Parameter(
 *         description="ID recipe",
 *         in="path",
 *         name="recipe",
 *         required=true,
 *         example=2,
 *     ),
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             @OA\Property(property="id_type_product", type="integer", example= 1),
 *             @OA\Property(property="id_raw_material", type="integer", example= 1),
 *             @OA\Property(property="unit", type="string", example="кг"),
 *             @OA\Property(property="quantity", type="integer", example= 9),
 *             @OA\Property(property="description", type="string", example="Описание"),
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
 *     path="/api/recipes/{recipe}",
 *     summary="Удаление",
 *     tags={"Recipe"},
 *     @OA\Parameter(
 *         description="ID recipe",
 *         in="path",
 *         name="recipe",
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

class RecipeController extends Controller
{
    //
}
