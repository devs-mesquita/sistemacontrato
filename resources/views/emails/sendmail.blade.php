<x-mail::message>
# Mensagem de {{ $data ['numero']}}

<p>Data do Contrato {{$data['data]']}}
     </p>
     <p>Data da Publicacao {{$data['publicado]']}}
    </p>
    <p>Termino do Contrato {{$data['fim]']}}
    </p>
    <p>Secretaria Destinada {{$data['secretaria]']}}
    </p>
<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
