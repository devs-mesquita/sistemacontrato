<?php

namespace App\Http\Controllers;
use App\Models\Setor;
use Illuminate\Http\Request;

class SetorController extends Controller
{
    public function index()
    {
        $setores = Setor::all();
        return view('pages.setor.index', compact('setores'));
    }


    public function create()
    {
        
        return view('pages.setor.create');
    }
    
    public function store(Request $request)
{
    //   dd($request->all());

    $setor = new Setor;
    $setor->nome =  $request->nome;
    $setor->save();

    return redirect()->route('setor.index')->with('success', 'Setor criado com sucesso!');
}
 
public function destroy($id)
{
    $setor  = Setor::findOrFail($id);
    $setor->delete(); 

    // return redirect()->route('pages.user.index');
}
}