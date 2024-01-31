<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Post(
 *     path="/api/rawmaterials",
 *     summary="Создание",
 *     tags={"RawMaterial"},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             @OA\Property(property="name", type="string", example="Алюминия"),
 *             @OA\Property(property="unit", type="string", example="кг"),
 *             @OA\Property(property="quantity", type="integer", example=6000),
 *             @OA\Property(property="purchase_price", type="float", example=96000.00),
 *             @OA\Property(property="units_of_measurement", type="float", example=16),
 *             @OA\Property(property="id_supplier", type="integer", example= 1),
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
 *     path="/api/rawmaterials",
 *     summary="Список",
 *     tags={"RawMaterial"},
 *
 *
 *     @OA\Response(
 *         response=200,
 *         description="Ok"
 *     ),
 * ),
 *
 * @OA\Get(
 *     path="/api/rawmaterials/{rawmaterial}",
 *     summary="Список по ID",
 *     tags={"RawMaterial"},
 *     @OA\Parameter(
 *         description="ID сырье",
 *         in="path",
 *         name="rawmaterial",
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
 *     path="/api/rawmaterials/{rawmaterial}",
 *     summary="Обновление",
 *     tags={"RawMaterial"},
 *     @OA\Parameter(
 *         description="ID сырье",
 *         in="path",
 *         name="rawmaterial",
 *         required=true,
 *         example=2,
 *     ),
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             @OA\Property(property="name", type="string", example="Алюминия"),
 *             @OA\Property(property="unit", type="string", example="кг"),
 *             @OA\Property(property="quantity", type="integer", example=6000),
 *             @OA\Property(property="purchase_price", type="float", example=96000.00),
 *             @OA\Property(property="units_of_measurement", type="float", example=16),
 *             @OA\Property(property="id_supplier", type="integer", example= 1),
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
 *     path="/api/rawmaterials/{rawmaterial}",
 *     summary="Удаление",
 *     tags={"RawMaterial"},
 *     @OA\Parameter(
 *         description="ID сырье",
 *         in="path",
 *         name="rawmaterial",
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

class RawMaterialController extends Controller
{
    //
}
