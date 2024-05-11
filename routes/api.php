<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use App\Http\Controllers\FloresController;


route::get('/', function () {return response()->json(['Sucesso heeee!!!'=>true]);});
route::get('/flores',[FloresController::class,'index']);

route::get('/flores/{id}',[FloresController::class,'show']);
route::post('/flores',[FloresController::class,'store']);
route::delete('/flores/{id}',[FloresController::class,'destroy']);
//alterar
route::put('/flores/{id}',[FloresController::class,'update']);




