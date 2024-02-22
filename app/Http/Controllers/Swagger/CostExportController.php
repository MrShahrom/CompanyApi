<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Get(
 *     path="/api/cost_export",
 *     summary="Экспорт в excel",
 *     tags={"Cost"},
 *     @OA\Response(
 *         response=200,
 *         description="Ok"
 *     ),
 * )
 */

class CostExportController extends Controller
{
    //
}
