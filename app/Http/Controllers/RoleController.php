<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
// use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function __construct()
    {
        //Determinados as roles possiveis
        $this->middleware(
            'permission:role-list|role-create|role-edit|role-delete',
            ['only' => ['index', 'store']]
        );
        $this->middleware(
            'permission:role-create',
            ['only' => ['create', 'store']]
        );
        $this->middleware(
            'permission:role-edit',
            ['only' => ['edit', 'update']]
        );
        $this->middleware(
            'permission:role-delete',
            ['only' => ['destroy']]
        );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::orderBy('id', 'DESC')->paginate(5);
        return view('roles.index', compact('roles'))->with('i', ($request->input('page', 1) - 1) * 5); // Lista os usuarios fazendo a paginação
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();
        return view('roles.create', compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required'
        ]);
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('roles.index')->with('success', 'Perfil criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join(
            'role_has_permissions',
            'role_has_permissions.permission_id',
            '=',
            'permission_id'
        )->where('role_has_permission.role_id', $id)->get();
        return view('roles.show', compact('role', 'rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id); // Encontrado aquela role com o id que veio da interface
        $permission = Permission::get(); // Pegandos as permissoes
        $rolePermissions = DB::table('role_has_permissions')
            ->where('role_has_permissions.role.id', $id)
            ->pluck('role_has_permissions.permission_id')->all(); // Retornando todas a permissoes de um determinado perfil

        return view('roles.edit', compact('role', 'permission', 'rolePermissions')); //Retornando para a view, o perfil, as permissoes e permissoes daquele cargo
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
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required'
        ]);
        $role = Role::find($id); // Encontra aquele perfil com aquele id
        $role->name = $request->input('name'); // Altera no nome do perfil
        $role->save(); // Salva
        $role->syncPermissions($request->input('permission')); // E sincroniza

        return redirect()->route('roles.index')->with('success', 'Perfil atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('roles')->where('id', $id)->delete(); //Procura no database aquele perfil com aquele id e deleta ele
        return redirect()->route('roles.index')->with('success', 'Perfil apagado com sucesso');
    }
}
