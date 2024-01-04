<?php

namespace App\Http\Controllers;
use App\Models\Responsavel;
use Illuminate\Http\Request;
use Auth;

class ResponsavelController extends Controller
{
    public function index()
    {
        $responsaveis = Responsavel::all();

    return view('pages.responsavel.index', compact('responsaveis'));
    } 

    public function create()
    {

        
        return view('pages.responsavel.create');
    }


    public function store(Request $request)
{
    //  dd($request->all());

    $responsavel_id = Auth::user()->id;
    $responsavel = new Responsavel;
    $responsavel->nome =  $request->nome;
    $responsavel->telefone = $request->telefone;
    $responsavel->email = $request->email;
    $responsavel->save();

    // Redireciona para a página de índice com uma mensagem de sucesso
    return redirect()->route('responsavel.index')->with('success', 'Responsável criado com sucesso!');
}

public function edit($id)
{
    $responsavel = Responsavel::find($id);

    return view('pages.responsavel.edit', compact('responsavel'));
}

public function update(Request $request, $id)
    {
        $responsavel = Responsavel::find($id); 
        $responsavel->nome = $request->nome; 
        $responsavel->email = $request->email;  
        $responsavel->telefone = $request->telefone;
        $responsavel->save(); 
         return redirect('/responsavel'); 
    }

    public function destroy($id)
    {
        $responsavel = Responsavel::findOrFail($id);
        $responsavel->delete(); 

        // return redirect()->route('pages.user.index');
    }
}
