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

        // dd($contratos);
    
        // $data_mes_tres = Carbon::now('America/Sao_Paulo')->subMonths(3)->format('d/m/Y');

        // $data_mes_dois = Carbon::now('America/Sao_Paulo')->subMonths(2)->format('d/m/Y');

        // $data_mes_um = Carbon::now('America/Sao_Paulo')->subMonths(1)->format('d/m/Y');

        // dd($data_mes_tres);

        return view('pages.contratos.index', compact('contratos'));
    } 

    public function create()
    {
        return view('pages.contratos.create');
    } 

    public function edit($id)
    {
        $contrato = Contrato::find($id);
    
        return view('pages.contratos.edit', compact('contrato'));

        
    }

    public function updateContrato(Request $request, $id)
{
    // dd($request->all());
    // Validar os dados recebidos
    $request->validate([
        'numero' => 'required',
        'data' => 'required|date',
        'publicado' => 'required|date',
        'fim' => 'required|date',
        'secretaria' => 'required',
        'fiscal' => 'required|array',
        'email.*' => 'required|email',
    ]);

    // Encontrar o contrato pelo ID com seus fiscais relacionados
    $contrato = Contrato::with('fiscais')->find($id);

    // Atualizar os dados do contrato
    $contrato->numero = $request->numero;
    $contrato->data = $request->data;
    $contrato->publicado = $request->publicado;
    $contrato->fim = $request->fim;
    $contrato->secretaria = $request->secretaria;
    $contrato->save();
    // Deletar todos os fiscais associados ao contrato
    $contrato->fiscais()->delete();
    // Criar e associar os novos fiscais
    if (is_array($request->fiscal)) {
        foreach ($request->fiscal as $index => $fisca) {
            Fiscal::create([
                'nome' => $fisca['nome'],
                'email' => $fisca['email'],
                'contrato_id' => $contrato->id,
            ]);
        }
    }
    // Redirecionar para a página de contratos
    return redirect('/contrato');
//     Adicionei validação para garantir que os dados recebidos sejam válidos.
// Utilizei a função delete() para remover todos os fiscais associados ao contrato.
// Utilizei um loop foreach para criar e associar os novos fiscais ao contrato.
// Simplifiquei a estrutura do código para torná-lo mais legível.

}

    public function store(Request $request)
    {
    //    dd($request->all());
       $user_id = Auth::user()->id;
       $contrato = new Contrato;
       $dados = $request;
       $contrato->numero = $request->numero;
       $contrato->data = $request->data;
       $contrato->publicado = $request->publicado; 
       $contrato->fim =  $request->fim;
       $contrato->secretaria =  $request->secretaria;

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


