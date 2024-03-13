<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Setor;
use Illuminate\Support\Facades\Hash;
use Auth;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index()
    {     
        $users = User::all();
        return view('pages.user.index', compact('users'));
    }

    public function create()
    {
        $setor = Setor::all();
        return view('pages.user.create', compact('setor'));
    }

    public function store(Request $request)
    {

        $verifica_email = User::withTrashed()->where('email',$request->email)->first();

        $verifica_cpf = User::where('cpf',$request->cpf)->first();

        if($verifica_cpf != null){
            // colocar uma mnesagem que o cpf existe
            return redirect('/user');
        }

        if($verifica_email != null){
            $verifica_email->name = $request->name;
            $verifica_email->email = $request->email;
            $verifica_email->cpf = $request->cpf;
            $verifica_email->telefone = $request->telefone;
            $verifica_email->nivel = $request->nivel;
            $verifica_email->setor_id = $request->setor;
            $verifica_email->password = bcrypt('pmm123456');
            $verifica_email->deleted_at = null;

            $verifica_email->save();
            return redirect('/user');
        }


        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->cpf = $request->cpf;
        $user->telefone = $request->telefone;
        $user->nivel = $request->nivel;
        $user->setor_id = $request->setor;
        $user->password = bcrypt('pmm123456');

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
    
        $setor = Setor::all();
        $user = User::with('setor')->find($id);

        // dd($user);
        if(Auth::user()->nivel == 'USUARIO'){
            
        }
    return view('pages.user.edit', compact('user','setor'));
    }

    public function update(Request $request, $id)
    {


        $user = User::find($id); 
        $user->name = $request->name; 
        $user->email = $request->email;  
        $user->nivel = $request->nivel;
        $user->cpf = $request->cpf;
        $user->telefone = $request->telefone;
        $user->setor_id = $request->setor;
        // dd($user);
        $user->save(); 
         return redirect('/user'); 
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->cpf = null;
        $user->deleted_at = Carbon::now('America/Sao_Paulo');

        $user->save();
        // $user->delete(); 

        // return redirect()->route('pages.user.index');
    }
}