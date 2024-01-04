<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendmailController extends Controller
{
 public function store(Request $request)
 {
       $numero = $request->numero;
       $data = $request->data;
       $processo = $request->processo; 
       $fim = $request->fim;
       $secretaria = $request-> secretaria;

       $data = [
        'numero' => $numero,
        'data'  => $data,
        'processo' => $processo,
        'fim'=> $fim,
        'secretaria'=> $secretaria
       ];

       Mail::to($email)->send(new Sendmail($data));

       dd('E-mail enviado com sucesso!');
 }
}



