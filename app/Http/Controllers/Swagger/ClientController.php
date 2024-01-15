<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Post(
 *     path="/api/clients",
 *     summary="Создание",
 *     tags={"Client"},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             @OA\Property(property="lastname", type="string", example="Алиев"),
 *             @OA\Property(property="firstname", type="string", example="Вали"),
 *             @OA\Property(property="patronymic", type="string", example="Валиевич"),
 *             @OA\Property(property="address", type="string", example="Худжанд, ул. И.Сомони 10а"),
 *             @OA\Property(property="phone", type="integer", example=925640020),
 *             @OA\Property(property="email", type="string", example="vali@mail.ru"),
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
 *     path="/api/clients",
 *     summary="Список",
 *     tags={"Client"},
 *
 *
 *     @OA\Response(
 *         response=200,
 *         description="Ok"
 *     ),
 * ),
 *
 * @OA\Get(
 *     path="/api/clients/{client}",
 *     summary="Список по ID",
 *     tags={"Client"},
 *     @OA\Parameter(
 *         description="ID клиент",
 *         in="path",
 *         name="client",
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
 *     path="/api/clients/{client}",
 *     summary="Обновление",
 *     tags={"Client"},
 *     @OA\Parameter(
 *         description="ID клиент",
 *         in="path",
 *         name="client",
 *         required=true,
 *         example=2,
 *     ),
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             @OA\Property(property="lastname", type="string", example="Алиев"),
 *             @OA\Property(property="firstname", type="string", example="Вали"),
 *             @OA\Property(property="patronymic", type="string", example="Валиевич"),
 *             @OA\Property(property="address", type="string", example="Худжанд, ул. И.Сомони 10а"),
 *             @OA\Property(property="phone", type="integer", example=925640020),
 *             @OA\Property(property="email", type="string", example="vali@mail.ru"),
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
 *     path="/api/clients/{client}",
 *     summary="Удаление",
 *     tags={"Client"},
 *     @OA\Parameter(
 *         description="ID клиент",
 *         in="path",
 *         name="client",
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
class ClientController extends Controller
{

}
