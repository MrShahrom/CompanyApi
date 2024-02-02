<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Post(
 *     path="/api/salaries",
 *     summary="Создание",
 *     tags={"Salary"},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             @OA\Property(property="id_employee", type="integer", example=2),
 *             @OA\Property(property="amount", type="float", example=5000.00),
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
 *     path="/api/salaries",
 *     summary="Список",
 *     tags={"Salary"},
 *
 *
 *     @OA\Response(
 *         response=200,
 *         description="Ok"
 *     ),
 * ),
 *
 * @OA\Get(
 *     path="/api/salaries/{salary}",
 *     summary="Список по ID",
 *     tags={"Salary"},
 *     @OA\Parameter(
 *         description="ID salary",
 *         in="path",
 *         name="salary",
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
 *     path="/api/salaries/{salary}",
 *     summary="Обновление",
 *     tags={"Salary"},
 *     @OA\Parameter(
 *         description="ID salary",
 *         in="path",
 *         name="salary",
 *         required=true,
 *         example=2,
 *     ),
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             @OA\Property(property="id_employee", type="integer", example=2),
 *             @OA\Property(property="amount", type="float", example=5000.00),
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
 *     path="/api/salaries/{salary}",
 *     summary="Удаление",
 *     tags={"Salary"},
 *     @OA\Parameter(
 *         description="ID salary",
 *         in="path",
 *         name="salary",
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

class SalaryController extends Controller
{
    //
}
