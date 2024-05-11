<?php

namespace App\Http\Controllers;

use App\Models\flores;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;


class FloresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
       $dadosFlores = flores::All();
  
       $contador = $dadosFlores->count();
       
       return'FLores no Estoque: '.$contador.$dadosFlores.Response()->json([],Response::HTTP_NO_CONTENT);
    }
    
    /**moto
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //envia daodos
       $dadosFlores = $request->All();
       $validarDados = Validator::make($dadosFlores,[
        'nome' => 'required',
        'epoca' => 'required',
        'cor' => 'required',
        'preco' => 'required',
       ]);

       if($validarDados->fails()){
        return 'Dados Invalidos.'.$validarDados->error(true). 500;
       } 

       $floresCadastrar = flores::create($dadosFlores);

       if($floresCadastrar){
        return'Dados cadastrados com Suceso'.Response()->json([],Response::HTTP_NO_CONTENT); 
       }
       else{
        return'Dados NAO  cadastrados com Suceso'.Response()->json([],Response::HTTP_NO_CONTENT);
       }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        //encontra o id
        $flore = flores::Find($id);
//localiza o id
        if($flore){
            return'Flor Localizada'.$flore; 
        }
        else{
         return'FLor Não L0calizada'.Response()->json([],Response::HTTP_NO_CONTENT);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dadosFlores = $request->All();
        $validarDados = Validator::make($dadosFlores,[
            'nome' => 'required',
            'epoca' => 'required',
            'cor' => 'required',
            'preco' => 'required',
           ]);

           if($validarDados->fails()){
            return 'Dados Invalidos.'.$validarDados->error(true). 500;
           } 
           //procura o id 
           $flore = flores::Find($id);
           $flore->nome = $dadosFlores['nome']; 
           $flore->epoca = $dadosFlores['epoca']; 
           $flore->cor = $dadosFlores['cor']; 
           $flore->preco = $dadosFlores['preco']; 

           //para alterar
           $retorno = $flore->save();
            
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
      $dadosFlores = flores::Find($id);
      
      if($dadosFlores->delete()){
        return 'A flor foi Eliminada :)'.Response()->json([],Response::HTTP_NO_CONTENT); ;
      }
      //response chama o json
      return 'A flor Não foi Eliminada'.Response()->json([],Response::HTTP_NO_CONTENT);

    }
}
