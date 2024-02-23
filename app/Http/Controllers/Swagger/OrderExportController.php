<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Get(
 *     path="/api/order_export",
 *     summary="Экспорт в excel",
 *     tags={"Order"},
 *     @OA\Response(
 *         response=200,
 *         description="Ok"
 *     ),
 * )
 */

class OrderExportController extends Controller
{
    //
}
