<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 *
 * @OA\Post(
 *     path="/api/login",
 *     summary="Логин",
 *     tags={"Login"},
 *     security={{ "bearerAuth": {} }},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             @OA\Property(property="email", type="string", example="example@gmail.com"),
 *             @OA\Property(property="password", type="string", example="12345678"),
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="Ok"
 *     ),
 * ),
 *
 */

class LoginController extends Controller
{
    //
}
