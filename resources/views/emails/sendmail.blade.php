<x-mail::message>
    {{-- # Mensagem de {{ $contrato['numero'] }} --}}
    # ATENÇÃO
    O CONTRATO {{ $contrato['numero'] }} IRÁ EXPIRAR EM {{$dias}}
    Data do Contrato: {{ date('d/m/Y', strtotime($contrato['data'])) }}
    Numero do  Processo: {{ $contrato['processo'] }}
    Termino do Contrato: {{ date('d/m/Y', strtotime($contrato['fim'])) }}
    Secretaria Destinada: {{ $contrato['setor']['nome'] }}
    

    

    {{-- <x-mail::button :url="'https://contratos.mesquita.rj.gov.br'">
        Clique aqui para ir para o site!
    </x-mail::button> --}}

    {{-- Obrigado,<br>
    {{ config('app.name') }} --}}
</x-mail::message>
