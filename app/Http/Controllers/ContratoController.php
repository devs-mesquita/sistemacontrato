<?php

namespace App\Http\Controllers;
use App\Models\Contrato;
use Illuminate\Http\Request;
use App\Models\Fiscal;
use App\Models\Aditivo;
use Illuminate\Support\Facades\Hash;
use Auth;
use Carbon\Carbon;

class ContratoController extends Controller
{
    public function index()
    {
        // $contrato = $request -> all(); 
        $contratos = Contrato::all();
    
        return view('pages.contratos.index', compact('contratos'));
    } 

    public function create()
    {
        return view('pages.contratos.create');
    } 

    public function edit($id)
    {
        $contrato = Contrato::find($id);
    {
        return view('pages.contratos.edit', compact('contrato'));

        }
    }

    public function updateContrato(Request $request)
    {
        // dd( $request['numero']);
        $contrato = Contrato::find($request->id); 
        $contrato->numero = $request['numero'];
        $contrato->data = $request['data'];
        $contrato->publicado = $request['publicado']; 
        $contrato->fim = $request['fim'];
        $contrato->secretaria = $request['secretaria'];
        $contrato->save(); 

         return redirect('/contrato'); 
    }

    public function store(Request $request)
    {
    //    dd($request->all());
       $dados = $request->all();
       $user_id = Auth::user()->id;
       $contrato = new Contrato;

       $contrato->numero = $dados['numero'];
       $contrato->data = $dados['data'];
       $contrato->publicado = $dados['publicado']; 
       $contrato->fim = $dados['fim'];
       $contrato->secretaria = $dados['secretaria'];
    //    $contrato->tipo = $dados['aditivo'];
    //    $contrato->fiscal = $abacaxi['fiscal'];
       
       $contrato->user_id  = $user_id;
        $contrato -> save();

        for($i = 0; $i < count($dados['fiscal']); $i++)
        {
            Fiscal::create([
                'nome' => $dados['fiscal'][$i],
                'email' => $dados['email'][$i],
                'contrato_id' => $contrato->id,
            ]);
        }
    
    //    foreach($contrato->fiscais as $fiscal)
    //    {

    //     Fiscal::create([
    //         'name' => $fiscal->nome,
    //         'email' => $fiscal->email,
    //         'contrato_id' => $contrato->id,
    //     ])

    //     $fiscal = new Fiscal;
    //     $fiscal->name
    //     $fiscal->email
    //     $fiscal-> contrato_id = $contrato->id;

    //     $fiscal->save();

    //    }
    
    //    $contrato->save();


        return redirect('/contrato');
    } 
    public function show($id)
    {
        $contrato = Contrato::with('fiscais', 'aditivo')->find($id);

        if(count($contrato->aditivo) > 0)
        {
            $qtd = count($contrato->aditivo);
        }else{
            $qtd = 0;
        }


// dd($contrato);
        
        return view('pages.contratos.show', compact('contrato','qtd'));
    } 


    public function destroy($id)
    {
    
        $contrato = Contrato::findOrFail($id);
        $contrato->delete(); 

        return redirect()->route('contrato.index');
    }
public function update(Request $request)

{ 
    $contrato = Contrato::findOrFail($request -> id);
    // $data = Carbon::parse($contrato->fim)->addMonths(+$request->meses);
    // $contrato->fim = $data;

  Aditivo::create([
        'contrato_id'=> $contrato->id,
        'data_anterior' => $contrato->fim
  ]);
     $data = Carbon::parse($contrato->fim)->addMonths(+$request->meses);
    $contrato->fim = $data;
    $contrato->save();

    return response()->json(["contrato" => $contrato]);
}
    
}


