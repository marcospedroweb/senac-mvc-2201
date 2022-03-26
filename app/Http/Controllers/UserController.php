<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Hash;

use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::orderBy('id', 'DESC')->paginate(5);
        return view('users.index', compact('data'))->with('i', ($request->input('page', 1) - 1) * 5); // Lista os usuarios fazendo a paginação
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('users.create', compact('roles')); //Traz a view com os perfils para cadastro
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required',
                                   'email' => 'required|email|unique:users,email',
                                   'password' => 'required|same:confirm-password',
                                   'roles' => 'required']);// Valida todos os dados que o usuario está enviando
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);// Criptografa a senha
        $user = User::create($input); // Cadastra no banco
        $user->assignRole($request->input('roles'));// Utiliza o proprio dado que veio do front para determina a role do usuario
        // session()->flash('success', 'Usuario criado com sucesso');
        return redirect(route('users.index'))->with('success', 'Usuario criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //quando se clica em determinado usuario, o [show()] é responsavel por mostrar esse usuario
        $user = User::find($id); //[Model::find($ValorQueBusca)] Usado para retornar algum dado de acordo com o valor da coluna
        return view('users.show', compact('user')); // [compact()] cria um array contendo os valores
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Usado para retorna o dado que quer editar
        $user = find::all($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all(); //Retorna as roles do usuario, The pluck method retrieves all of the values for a given key:
        //You may also specify how you wish the resulting collection to be keyed:
        //pluck('name', 'name')
        return view('users.edit', compact('user', 'roles', 'userRole'));
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
        $this->validate($request, ['name' => 'required',
                                   'email' => 'required|email|unique:users,email',
                                   'password' => 'required|same:confirm-password',
                                   'roles' => 'required']);// Valida todos os dados que o usuario está enviando
        $input = $request->all();
        if(!empty($input['password']))//Verifica se a senha está vazia
            $input['password'] = Hash::make($input['password']);
        else
            $input = Arr::except($input, array('password'));
        $user = User::find($id); //Busca usuario pelo id
        $user->update($input); // Atualiza o usuario no banco
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index')->with('success', 'Usuario atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('user.index')->with('success', 'Usuario removido com sucesso');
    }
}
