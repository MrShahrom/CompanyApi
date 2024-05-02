<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Post(
 *     path="/api/products",
 *     summary="Создание продукта",
 *     tags={"Product"},
 *     security={{ "bearerAuth": {} }},
 *
 *     @OA\RequestBody(
 *         required=true,
 *         description="Данные для создания продукта",
 *         @OA\MediaType(
 *             mediaType="multipart/form-data",
 *             @OA\Schema(
 *                 required={"name", "id_sklad", "selling_price", "id_type_product", "quantity", "status", "image"},
 *                 @OA\Property(property="name", type="string", example="Дег"),
 *                 @OA\Property(property="id_sklad", type="integer", example=1),
 *                 @OA\Property(property="selling_price", type="float", format="double", example=200.00),
 *                 @OA\Property(property="id_type_product", type="integer", example=2),
 *                 @OA\Property(property="quantity", type="integer", example=10),
 *                 @OA\Property(property="status", type="integer", example=1),
 *                 @OA\Property(property="image", type="string", format="binary", description="Выберите файл изображения продукта")
 *             )
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="Успешное создание продукта",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Продукт успешно создан")
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Неверный формат данных",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Некоторые обязательные поля отсутствуют или имеют неверный формат")
 *         )
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Внутренняя ошибка сервера",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Ошибка при создании продукта")
 *         )
 *     )
 * ),
 *
*
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
 *     summary="Обновление продукта",
 *     tags={"Product"},
 *     security={{ "bearerAuth": {} }},
 *
 *     @OA\Parameter(
 *         description="ID продукта",
 *         in="path",
 *         name="product",
 *         required=true,
 *         example=2,
 *         @OA\Schema(
 *             type="integer"
 *         )
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         description="Данные для обновления продукта",
 *         @OA\JsonContent(
 *             required={"name", "id_sklad", "selling_price", "id_type_product", "quantity", "status", "image"},
 *             @OA\Property(property="name", type="string", example="Дег"),
 *             @OA\Property(property="id_sklad", type="integer", example=1),
 *             @OA\Property(property="selling_price", type="number", format="float", example=200.00),
 *             @OA\Property(property="id_type_product", type="integer", example=2),
 *             @OA\Property(property="quantity", type="integer", example=10),
 *             @OA\Property(property="status", type="boolean", example=true),
 *             @OA\Property(property="image", type="string", format="binary", description="Новое изображение продукта")
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="Успешное обновление продукта"
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Неверный формат данных",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Некоторые обязательные поля отсутствуют или имеют неверный формат")
 *         )
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Внутренняя ошибка сервера",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Ошибка при обновлении продукта")
 *         )
 *     )
 * ),
 *
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
