<?php

namespace App\Http\Controllers;
use App\Models\Contrato;
use Illuminate\Http\Request;
use App\Models\Fiscal;
use App\Models\Aditivo;
use App\Models\Setor;
use Illuminate\Support\Facades\Hash;
use Auth;
use Carbon\Carbon;

class ContratoController extends Controller
{
    public function index()
    {

        // dd(Auth::user());
        $contratos = Contrato::with('setor')->get();  
        // dd($contratos);

        return view('pages.contratos.index', compact('contratos'));
    } 

    public function create()
    {
        
        $setor = Setor::all();
        return view('pages.contratos.create', compact ('setor'));
    } 

    public function edit($id)
    {
       
        $contrato = Contrato::with('fiscais')->find($id);
        $setor = Setor::all();
    
        return view('pages.contratos.edit', compact('contrato','setor'));

        
    }

    public function updateContrato(Request $request, $id)
{
    // Encontrar o contrato pelo ID com seus fiscais relacionados
    $contrato = Contrato::with('fiscais')->find($id);
    // dd($contrato);
    // Atualizar os dados do contrato
    $contrato->numero = $request->numero;
    $contrato->processo = $request->processo;
    $contrato->data = $request->data;
    $contrato->publicado = $request->publicado;
    $contrato->fim = $request->fim;
    $contrato->classe = $request->classe;
    $contrato->empresa = $request->empresa;
    $contrato->objeto = $request->objeto;
    $contrato->setor_id = $request->setor_id;
    
    $contrato->save();
    // Deletar todos os fiscais associados ao contrato
    $contrato->fiscais()->delete();
  
        if (is_array($request->fiscal)) {
            for($i = 0; $i < count($request->fiscal); $i++){
                if($request->fiscal[$i] != null){
                    Fiscal::create([
                        'nome'  => $request->fiscal[$i],
                        'email' => $request->email[$i],
                        'telefone'  => $request->telefone[$i],
                        'contrato_id'   => $contrato->id,
                    ]);
                }
            }
        }

        return redirect('/contrato');
    }

    public function store(Request $request)
    {
    //    dd($request->all());
       $user_id = Auth::user()->id;
       $contrato = new Contrato;
       $dados = $request;
       $contrato->numero = $request->numero;
       $contrato->processo = $request->processo;
       $contrato->data = $request->data;
       $contrato->publicado = $request->publicado; 
       $contrato->fim =  $request->fim;
       $contrato->classe =  $request->classe;
       $contrato->empresa = $request->empresa;
       $contrato->objeto = $request->objeto;
       $contrato->user_id  = $user_id;
       $contrato->setor_id = $request->setor_id;
       $contrato -> save();

        for($i = 0; $i < count($dados['fiscal']); $i++)
        {
            Fiscal::create([
                'nome' => $dados['fiscal'][$i],
                'email' => $dados['email'][$i],
                'telefone' => $dados['telefone'][$i],
                'contrato_id' => $contrato->id,
            ]);
        }
    
        return redirect('/contrato',);
    } 
    public function show($id)
    {
        $contrato = Contrato::with('fiscais', 'aditivo', 'setor')->find($id);

        if(count($contrato->aditivo) > 0)
        {
            $qtd = count($contrato->aditivo);
        }else{
            $qtd = 0;
        }

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


        Aditivo::create([
                'contrato_id'=> $contrato->id,
                'data_anterior' => $contrato->fim
        ]);

        $data = Carbon::parse($contrato->fim)->addMonths(+$request->meses);
        $contrato->fim = $data;
        $contrato->save();

        return response()->json(["contrato" => $contrato]);
    }

    public function alterastatus(Request $request)
    {
        $contrato = Contrato::find($request->id);

        $contrato->status = $request->status;
        $contrato->motivo = $request->motivo;

        $contrato->save();
    }

    public function NotificaEmail()
    {
        
        // PEGAR TODOS OS CONTRATOS NÃO ARQUIVADOS (ARQUIVADOS = DELETED AT NOT NULL)

        // FAZER O CALCULO DE DATAS

        // 90 DIAS

        // 60 DIAS

        // 30 DIAS

        // 15 DIAS

        // 5 DIAS


        // $dataparapremium = Carbon::now('America/Sao_Paulo');

        // $expirationDate = strtotime($contrato->fim);

        // $today = strtotime(now());

        // $diffMonths = floor(($expirationDate - $today) / (30 * 24 * 60 * 60));

        // $data_inicio = new DateTime('now');
        // $data_fim = new DateTime($contrato->fim);
        // $dateInterval = $data_inicio->diff($data_fim);

        // $contratos = Contrato::all();

        // foreach($contratos as $contrato)
        // {   

        // }


    }
    
}


