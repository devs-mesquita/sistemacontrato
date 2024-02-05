<?php

namespace App\Http\Controllers;
use App\Models\Responsavel;
use App\Models\Responsavel_Secretaria;
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

    $responsavel = new Responsavel;
    $responsavel->nome =  $request->nome;
    $responsavel->telefone = $request->telefone;
    $responsavel->email = $request->email;
    $responsavel->save();



    $array_bugado = $request->responsavel_secretaria;


    if($request->responsavel_secretaria != null){
        foreach($array_bugado as $desbuga)
        {   

            
            $respsecretaria = new Responsavel_Secretaria;

            $respsecretaria->nome = $desbuga;
            $respsecretaria->responsavel_id = $responsavel->id;

            $respsecretaria->save();
        }
    }


    

    // Redireciona para a página de índice com uma mensagem de sucesso
    return redirect()->route('responsavel.index')->with('success', 'Responsável criado com sucesso!');
}

public function edit($id)
{
    $responsavel = Responsavel::with('responsavel_secretaria')->find($id);

    return view('pages.responsavel.edit', compact('responsavel'));
}

public function update(Request $request, $id)
    {

        // dd($request->all());
        $responsavel = Responsavel::find($id); 
        $responsavel->nome = $request->nome; 
        $responsavel->email = $request->email;   
        $responsavel->telefone = $request->telefone;
        
        $responsavel->save();


    $setores = Responsavel_Secretaria::where('responsavel_id',$id)->get();
    foreach($setores as $setor)
    {
        $setor->delete();
    }
    
    foreach($request->responsavel_secretaria as $responsavelSecretaria)
    {
        // dd($responsavelSecretaria);
        $setor = new Responsavel_Secretaria;
        $setor->nome = $responsavelSecretaria;
        $setor->responsavel_id = $responsavel->id;
        $setor->save();

        // $responsavelSecretaria = new Responsavel_Secretaria ;
        // $responsavelSecretaria->nome = $request->responsavel_secretaria;
        // $responsavelSecretaria->save();
    }

         return redirect('/responsavel'); 
    }

}
