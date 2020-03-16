<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\TipoUsuario;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index(User $model)
    {
        $titulo = 'Usuários';
        $ds_pagina = 'Configurações > Usuários';


        $users = User::with('tipo_usuario')
                      ->paginate(6);

        return view('users.index', compact('ds_pagina', 'titulo', 'users'));
    }


    public function create()
    {
        $ds_pagina = 'Configurações > Usuários';
        $tipoUsuarios = TipoUsuario::where('ativo',1)
                                   ->get();
        return view('users.create', compact('tipoUsuarios', 'ds_pagina'));
    }


    public function store(UserRequest $request, User $model)
    {
        $model->create($request->merge(['password' => Hash::make($request->get('password'))])->all());

        return redirect()->route('user.index')->withStatus(__('Usuário criado com sucesso.'));
    }


    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }


    public function update(UserRequest $request, User  $user)
    {
        $user->update(
            $request->merge(['password' => Hash::make($request->get('password'))])
                ->except([$request->get('password') ? '' : 'password']
        ));

        return redirect()->route('user.index')->withStatus(__('User successfully updated.'));
    }


    public function destroy(User  $user)
    {
        $user->delete();

        return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
    }


}
