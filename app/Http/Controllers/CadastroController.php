<?php

namespace App\Http\Controllers;

use App\Models\cadastro;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;


class CadastroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
       $dadosCadastro = cadastro::All();
  
       $contador = $dadosCadastro->count();
       
       return'Cadastro: '.$contador.$dadosCadastro.Response()->json([],Response::HTTP_NO_CONTENT);
    }
    
    /**moto
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //envia daodos
       $dadosCadastro = $request->All();
       $validarDados = Validator::make($dadosCadastro,[
        'nome' => 'required',
        'email' => 'required',
        'endereco' => 'required',
       ]);

       if($validarDados->fails()){
        return 'Dados Invalidos.'.$validarDados->error(true). 500;
       } 

       $cadastroCadastrar = cadastro::create($dadosCadastro);

       if($cadastroCadastrar){
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
        $cadastro = cadastro::Find($id);
//localiza o id
        if($cadastro){
            return'Cadastro Localizado'.$cadastro; 
        }
        else{
         return'Cadastro Não Localizado'.Response()->json([],Response::HTTP_NO_CONTENT);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dadosCadastro = $request->All();
        $validarDados = Validator::make($dadosCadastro,[
            'nome' => 'required',
            'email' => 'required',
            'endereco' => 'required',
           ]);

           if($validarDados->fails()){
            return 'Dados Invalidos.'.$validarDados->error(true). 500;
           } 
           //procura o id 
           $cadastro = cadastro::Find($id);
           $cadastro->nome = $dadosCadastro['nome']; 
           $cadastro->email = $dadosCadastro['email']; 
           $cadastro->endereco = $dadosCadastro['endereco']; 

           //para alterar
           $retorno = $cadastro->save();
            
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
      $dadosCadastro = cadastro::Find($id);
      
      if($dadosCadastro->delete()){
        return 'A Cadastro desfeito :)'.Response()->json([],Response::HTTP_NO_CONTENT); ;
      }
      //response chama o json
      return 'A não foi possivel eliminar o Cadastro'.Response()->json([],Response::HTTP_NO_CONTENT);

    }
}
