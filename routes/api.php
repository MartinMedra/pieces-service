<?php

use App\Http\Controllers\Api\V1\ProyectoController;
use App\Http\Controllers\Api\V1\BloqueController;
use App\Http\Controllers\Api\V1\PiezaController;
use App\Http\Controllers\Api\V1\RegistroFabricacionController;
use App\Http\Controllers\Api\V1\ReporteController;
use Illuminate\Support\Facades\Route;


Route::middleware('jwt.verificacion')->prefix('v1')->group(function () {

    Route::apiResource('proyectos', ProyectoController::class);

    Route::apiResource('proyectos.bloques', BloqueController::class);

    Route::apiResource('bloques.piezas', PiezaController::class);

    Route::apiResource('piezas.registros', RegistroFabricacionController::class)
         ->except(['destroy']);

    Route::prefix('reportes')->group(function () {
        Route::get('piezas-pendientes', [ReporteController::class, 'piezasPendientesPorProyecto']);
        Route::get('totales-por-estado', [ReporteController::class, 'totalesPorEstado']);
    });
});
