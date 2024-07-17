<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public readonly User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function index()
    {
        $users = $this->user->all();
        return view('users', ['users' => $users]);
    }


    public function create()
    {
        return view('user_create');
    }


    public function store(Request $request)
    {
        $created = $this->user->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => password_hash($request->input('password'), PASSWORD_DEFAULT),
        ]);

        if($created){
            return redirect()->back()->with('message', 'Usuário cadastrado com sucesso!');
        }else{
            return redirect()->back()->with('message', 'Erro: Usuário não foi cadastrado.');
        }

        /* var_dump('store user'); */
    }

        public function show(string $id)
    {
        //
    }


    public function edit(User $user)
    {
        return view('user_edit', ['user' => $user]);
    }


    public function update(Request $request, string $id)
    {
        $updated = $this->user->where('id', $id)->update($request->except(['_token', '_method']));
        //var_dump($request->except(['_token', '_method']));

        if($updated){
            return redirect()->back()->with('message', 'User updated successfully');
        }else{
            return redirect()->back()->with('message', 'User not updated');
        }
    }


    public function destroy(string $id)
    {
        //
    }
}
