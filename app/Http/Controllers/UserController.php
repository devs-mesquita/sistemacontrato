<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserController extends Controller
{
    public function index()
    {     
        $users = User::all();
        return view('pages.user.index', compact('users'));
    }

    public function create()
    {
        return view('pages.user.create');
    }

    public function store()
    {
        $data = request();
        $user = new User;
        $user->name = $data->name;
        $user->email = $data->email;
        $user->cpf = $data->cpf;
        $user->telefone = $data->telefone;
        $user->nivel = $data->nivel;
        $user->password = bcrypt('pmm123456');

        // dd($user);
        $user->save();
        return redirect('/user');
    }   

    public function AlteraSenha()
    {
        $usuario = Auth::user();
        return view('pages.user.alterasenha',compact('usuario'));       
    }

    public function postalterasenha(Request $request)
    {
        $this->validate($request, [
            'password_atual'        => 'required',
            'password'              => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        ]);
        $usuario = User::find(Auth::user()->id);
        if (Hash::check($request->password_atual, $usuario->password))
        {
            $usuario->update(['password' => bcrypt($request->password)]);            
            return redirect('/')->with('sucesso','Senha alterada com sucesso.');
        }
        else
        {
            return back()->withErrors('Senha atual não confere');
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        if(Auth::user()->nivel == 'USUARIO'){
            return redirect('/user'); 

        }
    return view('pages.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id); 
        $user->name = $request->name; 
        $user->email = $request->email;  
        $user->nivel = $request->nivel;
        $user->cpf = $request->cpf;
        $user->telefone = $request->telefone;
        $user->save(); 
         return redirect('/user'); 
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete(); 

        // return redirect()->route('pages.user.index');
    }
}