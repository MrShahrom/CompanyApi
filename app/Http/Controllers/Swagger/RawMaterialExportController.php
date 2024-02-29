<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Get(
 *     path="/api/rawmaterial_export",
 *     summary="Экспорт в excel",
 *     tags={"RawMaterial"},
 *     security={{ "bearerAuth": {} }},
 * 
 *     @OA\Response(
 *         response=200,
 *         description="Ok"
 *     ),
 * )
 */

class RawMaterialExportController extends Controller
{
    //
}
