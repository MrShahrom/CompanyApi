<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Post(
 *     path="/api/sklads",
 *     summary="Создание",
 *     tags={"Sklad"},
 *     security={{ "bearerAuth": {} }},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             @OA\Property(property="name", type="string", example="Склад 1"),
 *             @OA\Property(property="address", type="string", example="Гафуров, 13а"),
 *             @OA\Property(property="type", type="string", example="Готовые продукты"),
 *             @OA\Property(property="phone", type="integer", example=4040),
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
 *     path="/api/sklads",
 *     summary="Список",
 *     tags={"Sklad"},
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
 *     path="/api/sklads/{sklad}",
 *     summary="Список по ID",
 *     tags={"Sklad"},
 *     security={{ "bearerAuth": {} }},
 *
 *     @OA\Parameter(
 *         description="ID sklad",
 *         in="path",
 *         name="sklad",
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
 *     path="/api/sklads/{sklad}",
 *     summary="Обновление",
 *     tags={"Sklad"},
 *     security={{ "bearerAuth": {} }},
 *
 *     @OA\Parameter(
 *         description="ID sklad",
 *         in="path",
 *         name="sklad",
 *         required=true,
 *         example=2,
 *     ),
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             @OA\Property(property="name", type="string", example="Склад 1"),
 *             @OA\Property(property="address", type="string", example="Гафуров, 13а"),
 *             @OA\Property(property="type", type="string", example="Готовые продукты"),
 *             @OA\Property(property="phone", type="integer", example=4040),
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
 *     path="/api/sklads/{sklad}",
 *     summary="Удаление",
 *     tags={"Sklad"},
 *     security={{ "bearerAuth": {} }},
 *
 *     @OA\Parameter(
 *         description="ID sklad",
 *         in="path",
 *         name="sklad",
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

class SkladController extends Controller
{
    //
}
