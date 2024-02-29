<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Post(
 *     path="/api/employees",
 *     summary="Создание",
 *     tags={"Employee"},
 *     security={{ "bearerAuth": {} }},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             @OA\Property(property="lastname", type="string", example="Тахиров"),
 *             @OA\Property(property="firstname", type="string", example="Далер"),
 *             @OA\Property(property="patronymic", type="string", example="Рахимович"),
 *             @OA\Property(property="address", type="string", example="Худжанд, 20мкр"),
 *             @OA\Property(property="phone", type="integer", example=923002000),
 *             @OA\Property(property="salary", type="float", example= 5000.00),
 *             @OA\Property(property="date_of_birthday", type="date", example="2000-09-14"),
 *             @OA\Property(property="position", type="string", example="Работник"),
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
 *     path="/api/employees",
 *     summary="Список",
 *     tags={"Employee"},
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
 *     path="/api/employees/{employee}",
 *     summary="Список по ID",
 *     tags={"Employee"},
 *     security={{ "bearerAuth": {} }},
 *
 *     @OA\Parameter(
 *         description="ID клиент",
 *         in="path",
 *         name="employee",
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
 *     path="/api/employees/{employee}",
 *     summary="Обновление",
 *     tags={"Employee"},
 *     security={{ "bearerAuth": {} }},
 *
 *     @OA\Parameter(
 *         description="ID клиент",
 *         in="path",
 *         name="employee",
 *         required=true,
 *         example=2,
 *     ),
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             @OA\Property(property="lastname", type="string", example="Тахиров"),
 *             @OA\Property(property="firstname", type="string", example="Далер"),
 *             @OA\Property(property="patronymic", type="string", example="Рахимович"),
 *             @OA\Property(property="address", type="string", example="Худжанд, 20мкр"),
 *             @OA\Property(property="phone", type="integer", example=923002000),
 *             @OA\Property(property="salary", type="float", example= 5000.00),
 *             @OA\Property(property="date_of_birthday", type="date", example="2000-09-14"),
 *             @OA\Property(property="position", type="string", example="Работник"),
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
 *     path="/api/employees/{employee}",
 *     summary="Удаление",
 *     tags={"Employee"},
 *     security={{ "bearerAuth": {} }},
 * 
 *     @OA\Parameter(
 *         description="ID клиент",
 *         in="path",
 *         name="employee",
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

class EmployeeController extends Controller
{

}
