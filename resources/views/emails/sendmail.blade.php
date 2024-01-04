<x-mail::message>
# Mensagem de {{ $data ['numero']}}

<p>Data do Contrato {{$data['data]']}}
     </p>
     <p>Data da Publicacao {{$data['processo]']}}
    </p>
    <p>Termino do Contrato {{$data['fim]']}}
    </p>
    <p>Secretaria Destinada {{$data['secretaria]']}}
    </p>
<x-mail::button :url="'https://contratos.mesquita.rj.gov.br'">
Clique aqui para ir para o site ! 
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
