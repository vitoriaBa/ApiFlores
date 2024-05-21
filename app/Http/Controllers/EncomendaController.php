<?php

namespace App\Http\Controllers;

use App\Models\encomenda;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;


class EncomendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
       $dadosEncomenda = encomenda::All();
  
       $contador = $dadosEncomenda->count();
       
       return'Encomenda: '.$contador.$dadosEncomenda.Response()->json([],Response::HTTP_NO_CONTENT);
    }
    
    /**moto
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //envia daodos
       $dadosEncomenda = $request->All();
       $validarDados = Validator::make($dadosEncomenda,[
        'id' => 'required',
        'preco' => 'required',
        'tamanho' => 'required',
       ]);

       if($validarDados->fails()){
        return 'Dados Invalidos.'.$validarDados->error(true). 500;
       } 

       $encomendaCadastrar = encomenda::create($dadosEncomenda);

       if($encomendaCadastrar){
        return'Dados cadastrados com Suceso'.Response()->json([],Response::HTTP_NO_CONTENT); 
       }
       else{
        return'Dados NAO cadastrados com Suceso'.Response()->json([],Response::HTTP_NO_CONTENT);
       }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        //encontra o id
        $encomenda = encomenda::Find($id);
//localiza o id
        if($encomenda){
            return'Encomenda Localizada'.$encomenda; 
        }
        else{
         return'Encomenda Não Localizada'.Response()->json([],Response::HTTP_NO_CONTENT);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dadosEncomenda = $request->All();
        $validarDados = Validator::make($dadosEncomenda,[
            'id' => 'required',
            'preco' => 'required',
            'tamanho' => 'required',
           ]);

           if($validarDados->fails()){
            return 'Dados Invalidos.'.$validarDados->error(true). 500;
           } 
           //procura o id 
           $encomenda = encomenda::Find($id);
           $encomenda->id = $dadosEncomenda['id']; 
           $encomenda->preco = $dadosEncomenda['preco']; 
           $encomenda->tamanho = $dadosEncomenda['tamanho']; 

           //para alterar
           $retorno = $encomenda->save();
            
           if($retorno){
            return'Dados atualizados com Suceso'.Response()->json([],Response::HTTP_NO_CONTENT); 
        }
        else{
         return'Dados NAO  atualizados '.Response()->json([],Response::HTTP_NO_CONTENT);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //encontrar o id
      $dadosEncomenda = encomenda::Find($id);
      
      if($dadosEncomenda->delete()){
        return 'A Encomenda cancelada :)'.Response()->json([],Response::HTTP_NO_CONTENT); ;
      }
      //response chama o json
      return 'A não foi possivel cancelar a Encomenda'.Response()->json([],Response::HTTP_NO_CONTENT);

    }
}
