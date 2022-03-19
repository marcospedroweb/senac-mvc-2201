<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\clientes;

class ClientesController extends Controller
{
    public function __construct(){
        //Só usuario logado pode acessar
        // $this->middleware('auth');
        // [$this->middleware('auth');] Vai verificar se o usuario esta logado, se não tive logado ele não tem acesso a pagina e retorna para a pagina de login
    }

    public function listar(){
        $clientes = Clientes::all();
        return view('clientes.listar', ['clientes' => $clientes]);
    }
}
