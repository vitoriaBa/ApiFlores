<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use App\Http\Controllers\FloresController;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\EncomendaController;


route::get('/', function () {return response()->json(['Sucesso heeee!!!'=>true]);});
route::get('/flores',[FloresController::class,'index']);

route::get('/flores/{id}',[FloresController::class,'show']);
route::post('/flores',[FloresController::class,'store']);
route::delete('/flores/{id}',[FloresController::class,'destroy']);
//alterar
route::put('/flores/{id}',[FloresController::class,'update']);



route::get('/cadastro',[CadastroController::class,'index']);

route::get('/cadastro/{id}',[CadastroController::class,'show']);
route::post('/cadastro',[CadastroController::class,'store']);
route::delete('/cadastro/{id}',[CadastroController::class,'destroy']);
//alterar
route::put('/cadastro/{id}',[CadastroController::class,'update']);





route::get('/encomenda',[EncomendaController::class,'index']);

route::get('/encomenda/{id}',[EncomendaController::class,'show']);
route::post('/encomenda',[EncomendaController::class,'store']);
route::delete('/encomenda/{id}',[EncomendaController::class,'destroy']);
//alterar
route::put('/encomenda/{id}',[EncomendaController::class,'update']);




