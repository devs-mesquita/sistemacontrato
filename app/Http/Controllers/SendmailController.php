<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Contrato;
use App\Models\Responsavel;
use App\Mail\Sendmail;
use Carbon\Carbon;


class SendmailController extends Controller
{

      public static function enviarEmail()
      {
            $data_inicio = new Carbon('now');

            $contratos = Contrato::with('fiscais','setor')->get();
            $responsaveis = Responsavel::all();

            foreach($contratos as $contrato)
            {
                  $data_fim = new Carbon($contrato->fim,'America/Sao_Paulo');
                  // dd($data_fim);
                  $dateInterval = $data_inicio->diff($data_fim);
                  // dd($dateInterval->days);

                  if($dateInterval->days == '90'){

                        $dias = '90 Dias';
                        // dd($contrato);
                        foreach($contrato->fiscais as $fiscal){
                              Mail::to($fiscal->email)->send(new Sendmail($contrato,$dias));
                        }

                        foreach($responsaveis as $responsavel){
                              Mail::to($responsavel->email)->send(new Sendmail($contrato,$dias));
                        }
                  }

                  if($dateInterval->days == '60'){
                        // dd('60 dias');
                        $dias = '60 dias';
                        // dd($contrato);
                        foreach($contrato->fiscais as $fiscal){
                              Mail::to($fiscal->email)->send(new Sendmail($contrato,$dias));
                        }
                        foreach($responsaveis as $responsavel){
                              Mail::to($responsavel->email)->send(new Sendmail($contrato,$dias));
                        }
                  }

                  if($dateInterval->days == '30'){
                        // dd('30 dias');
                        $dias = '30 dias';
                        // dd($contrato);
                        foreach($contrato->fiscais as $fiscal){
                              Mail::to($fiscal->email)->send(new Sendmail($contrato,$dias));
                        }
                        foreach($responsaveis as $responsavel){
                              Mail::to($responsavel->email)->send(new Sendmail($contrato,$dias));
                        }
                  }

                  if($dateInterval->days == '15'){
                        // dd('15 dias');
                        $dias = '15 dias';
                        // dd($contrato);
                        foreach($contrato->fiscais as $fiscal){
                              Mail::to($fiscal->email)->send(new Sendmail($contrato,$dias));
                        }
                        foreach($responsaveis as $responsavel){
                              Mail::to($responsavel->email)->send(new Sendmail($contrato,$dias));
                        }
                  }

                  if($dateInterval->days == '10'){
                        // dd('10 dias');
                        $dias = '10 dias';
                        // dd($contrato);
                        foreach($contrato->fiscais as $fiscal){
                              Mail::to($fiscal->email)->send(new Sendmail($contrato,$dias));
                        }
                        foreach($responsaveis as $responsavel){
                              Mail::to($responsavel->email)->send(new Sendmail($contrato,$dias));
                        }
                  }

                  if($dateInterval->days == '5'){
                        // dd('5 dias');
                        $dias = '5 dias';
                        // dd($contrato);
                        foreach($contrato->fiscais as $fiscal){
                              Mail::to($fiscal->email)->send(new Sendmail($contrato,$dias));
                        }
                        foreach($responsaveis as $responsavel){
                              Mail::to($responsavel->email)->send(new Sendmail($contrato,$dias));
                        }
                  }

                  if($dateInterval->days == '3'){
                        // dd('3 dias');
                        $dias = '3 dias';
                        // dd($contrato);
                        foreach($contrato->fiscais as $fiscal){
                              Mail::to($fiscal->email)->send(new Sendmail($contrato,$dias));
                        }
                        foreach($responsaveis as $responsavel){
                              Mail::to($responsavel->email)->send(new Sendmail($contrato,$dias));
                        }
                  }

                  if($dateInterval->days == '1'){
                        // dd('1 dia');
                        $dias = '1 dia';
                        // dd($contrato);
                        foreach($contrato->fiscais as $fiscal){
                              Mail::to($fiscal->email)->send(new Sendmail($contrato,$dias));
                        }
                        foreach($responsaveis as $responsavel){
                              Mail::to($responsavel->email)->send(new Sendmail($contrato,$dias));
                        }
                  }

                  // dd($dateInterval->days);

            }


            // pegar todos os contratos, setor_id
            // verificar as datas "fim"
            // if = 90 enviar o primeiro email
            // if = 60 enviar o segundo email
            // if = 30 enviar o terceiro email
            // if = 15 enviar email
            // if = 10 enviar email
            // if = 5 enviar email
            // if = 3 enviar email
            // if = 1 enviar email

            // o fiscal e os resposaveis atribuidos ao contrato recebem o email
            // tabela fiscais_contrato , contrato_id, email
            // tabela responsavel_secretaria, id

            // fim


      }



//  public function store(Request $request)
//  {
//        $numero = $request->numero;
//        $data = $request->data;
//        $processo = $request->processo; 
//        $fim = $request->fim;
//        $secretaria = $request-> secretaria;

//        $data = [
//         'numero' => $numero,
//         'data'  => $data,
//         'processo' => $processo,
//         'fim'=> $fim,
//         'secretaria'=> $secretaria
//        ];

//        Mail::to($email)->send(new Sendmail($data));

//        dd('E-mail enviado com sucesso!');
//  }
}



