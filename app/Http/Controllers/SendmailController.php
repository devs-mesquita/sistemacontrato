<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendmailController extends Controller
{
 public function store(Request $request)
 {
       $numero = $request->numero;
       $data = $request->data;
       $publicado = $request->publicado; 
       $fim = $request->fim;
       $secretaria = $request-> secretaria;

       $data = [
        'numero' => $numero,
        'data'  => $data,
        'publicado' => $publicado,
        'fim'=> $fim,
        'secretaria'=> $secretaria
       ];

       Mail::to($email)->send(new Sendmail($data));

       dd('E-mail enviado com sucesso!');
 }
}



