<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Areainteresse;
use App\Chavebusca;
use Illuminate\Http\Request;

use App\Cliente;
use App\Licitacoes;
use App\User;


use Carbon\Traits\Timestamp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Continue_;

class ControladorClientes extends Controller
{
    


    #public function __construct(){
    #    $this->middleware('auth:admin');
    #}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        #$clts = Cliente::all();
        $clts = Cliente::with('areaInteresse')->get();
        #$area = Areainteresse::with('chaveBuscaArea')->get();
        #return $clts->toJson();
        
        return view('clientes', compact('clts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('cadastrarclientes');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    


    public function store(Request $request)
    {

        $regras = [
            'nome' => 'required',
            'cnpj' => 'required|min:13|max:13',
            'key_1' => 'required|min:3'
        ];

        $mensagem = [
            'required' => ' O campo :attribute não pode ser vazio',
            'min' => 'O campo :attribute deve ter no mínimo :min caracteres',
            'max' => 'O campo :attribute deve ter no máximo :max caracteres'

        ];

        $request->validate($regras, $mensagem);

        
        #$user = [
        #    $request->input('perfil'),
        #    $request->input('email'),
        #    $request->input('password')
        #];
        
        $user = new User();
        $user->perfil = $request->input('perfil');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        #User::create()

        $cliente  = new Cliente();
        $cliente->nome = $request->input('nome');
        $cliente->cnpj = $request->input('cnpj');
        $cliente->save();

        $area = new Areainteresse();
        $area->nome_interesse = $request->input('nomeArea');
        $cliente->areaInteresse()->save($area);

        $chave = new Chavebusca();
        $chave->nome_chave = $request->input('key_1');
        $area->chaveBuscaArea()->save($chave);

        $chave = new Chavebusca();
        $chave->nome_chave = $request->input('key_2');
        $area->chaveBuscaArea()->save($chave);

        $chave = new Chavebusca();
        $chave->nome_chave = $request->input('key_3');
        $area->chaveBuscaArea()->save($chave);

        $chave = new Chavebusca();
        $chave->nome_chave = $request->input('key_4');
        $area->chaveBuscaArea()->save($chave);
        
        $chave = new Chavebusca();
        $chave->nome_chave = $request->input('key_5');
        $area->chaveBuscaArea()->save($chave);

        
        
        

        return redirect('/clientes');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showUser($id)
    {
        if($id == Auth::id()){
            $clts = Cliente::find($id);
        
            if(isset($clts)){
             return view('homeuser' ,compact(('clts')));
            }
        }
        else{
            return back()->withInput();
        }
    }

    public function showLicitacoes($cliente_id)
    {
        if($cliente_id == Auth::id()){
            $clts = DB::table('licitacoes')
                    ->where('cliente_id', $cliente_id)
                    ->paginate(20);
            #dd($clts);
            if(isset($clts)){
                return ($clts);
                #return view('licitacoes' ,compact(('clts')));
            }
        }
        else{
            return back()->withInput();
        }
        
    }





    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clts = Cliente::find($id);
        if(isset($clts)){
            return view('editarcliente', compact(('clts')));
        }
        redirect('/clientes');
    }

   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $clts = Cliente::find($id);
        if(isset($clts)){
            $clts->nome = $request->input('nome');
            $clts->CNPJ = $request->input('cnpj');
            $clts->key_1 = $request->input('key_1');
            $clts->key_2 = $request->input('key_2');
            $clts->key_3 = $request->input('key_3');
            $clts->key_4 = $request->input('key_4');
            $clts->key_5 = $request->input('key_5');
            $clts->save();
           
        }
        return redirect('/clientes');
    }

    public function updateAutoEdit(Request $request, $id_user, $id_area)
    {
        #dd($request->all());

        #$clts = Cliente::with('areaInteresse')->get();
        $clts = Cliente::find($id_user);
        $area = Areainteresse::find($id_area);
        $chave = Chavebusca::where('areainteresse_id', $id_area)->get();
        
        #foreach($chave as $chaves){
        #dd($chave);
       # }           
        $cont = ($request->all());
        dd($cont);
        if(isset($clts)){
            $clts->nome = $request->input('nome');
            $clts->cnpj = $request->input('cnpj');
                                                    
            $area->nome_interesse = $request->input('nome_interesse');
            $area->mineracao = $request->input('mineracao');
            $area->save();    
                        
            $chave[0]->nome_chave = $request->input("nome_chave0");
            $chave[0]->save();
            $chave[1]->nome_chave = $request->input("nome_chave1");
            $chave[1]->save();
            $chave[2]->nome_chave = $request->input("nome_chave2");
            $chave[2]->save();
            $chave[3]->nome_chave = $request->input("nome_chave3");
            $chave[3]->save();
            $chave[4]->nome_chave = $request->input("nome_chave4");
            $chave[4]->save();
             
        }
            #return redirect("/homeuser/$id_user");
            return view('success', compact(('clts')));
                    
            
                
                        
    }               

           
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)

    {
        $user = User::find($id);
            if(isset ($user)){
                $user->delete();
            }

       $clts = Cliente::find($id);
       if (isset($clts)){
           $clts->delete();
       }
       return redirect('/clientes');

    }

    public function adicionaNovaArea($id)
    {
        $clts = Cliente::find($id);
        if(isset($clts)){
            return view('novaareainteresse', compact(('clts')));
        }
        redirect('/clientes');
    }


    public function storeNovaArea(Request $request, $id)
    {
        $clts = Cliente::find($id);
        if(isset($clts)){
            $area = new Areainteresse();
            $area->nome_interesse = $request->input('nomeArea');
            $clts->areaInteresse()->save($area);

            $chave = new Chavebusca();
            $chave->nome_chave = $request->input('key_1');
            $area->chaveBuscaArea()->save($chave);

            $chave = new Chavebusca();
            $chave->nome_chave = $request->input('key_2');
            $area->chaveBuscaArea()->save($chave);
            
            $chave = new Chavebusca();
            $chave->nome_chave = $request->input('key_3');
            $area->chaveBuscaArea()->save($chave);

            $chave = new Chavebusca();
            $chave->nome_chave = $request->input('key_4');
            $area->chaveBuscaArea()->save($chave);
            
            $chave = new Chavebusca();
            $chave->nome_chave = $request->input('key_5');
            $area->chaveBuscaArea()->save($chave);

                               
        }
        
    }




}
