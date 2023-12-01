@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
<link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Contratos'])
    <div class="card">
        <div class="card-body">

            <table id="scc" class="display">
                <div>
                    <ul class="nav navbar-right panel_toolbox">
                        <a href="{{ url('contrato/create') }}" class="btn btn-primary btn-md  ms-auto" data-toggle="tooltip"
                            data-placement="bottom" title="" data-original-title="Nova Sala">Cadastrar Contrato </a>
                    </ul>
                </div>
                <thead>

                    <tr>
                        <th>Número do Contrato</th>
                        <th>Data da Publicação</th>
                        <th>Término do Contrato</th>
                        <th>Data da Homologação</th>
                        <th>Secretaria destinada </th>
                        <th>Ações</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($contratos as $contrato)
                        <tr>
                            <td>{{$contrato->numero}}</td>
                            
                            <td> 
                                @if ($contrato->publicado == null)
                                    ---
                                @else
                                    {{date('d/m/Y', strtotime($contrato->publicado))}}
                                @endif       
                            </td>


                           
                        @php
                            $expirationDate = strtotime($contrato->fim);
                            $today = strtotime(now());
                            $diffMonths = floor(($expirationDate - $today) / (30 * 24 * 60 * 60));
                        @endphp
                        
                        @if ($diffMonths <= 1)
                            <td class="text-danger">
                        @elseif ($diffMonths <= 2)
                            <td class="text-warning">
                        @elseif ($diffMonths == 3)
                            <td style="color: orange;">
                        @else
                            <td>
                        @endif
                          <b>{{ date('d/m/Y', $expirationDate) }}</b>  
                        </td>
                        

                                {{-- {{date('d/m/Y', strtotime($contrato->fim.'-3 month'))}}
                                --}}
                                {{-- @if ({{date('d/m/Y', strtotime($contrato->fim.'-3 month' ))}} < {{date('d/m/Y', strtotime($contrato->fim))}})
                                    ain
                                
                                @endif --}}
                        

                                {{-- @if ({{date('d/m/Y'),strtotime($contrato->fim)}}  < {{$data_mes_tres}})
                                    a
                                @elseif(strtotime($contrato->fim) <= {{$data_mes_dois}})
                                    b
                                @elseif(strtotime($contrato->fim) <= {{$data_mes_um}})
                                    c
                                @endif --}}
                            {{-- CALCULAR -3 NO MES PARA PEGAR 90 DIAS --}}

                            {{-- CALCULAR -2 NO MES PARA PEGAR 60 DIAS --}}

                            {{-- CALCULAR -1 NO MES PARA PEGAR 30 DIAS --}}



                            </td>
                            
                            
                            {{-- <td>{{date('d/m/Y', strtotime($contrato->fim))}}</td> --}}

                            <td>
                                @if ($contrato->data == null)
                                    ---
                                @else 
                                    {{date('d/m/Y', strtotime($contrato->data))}}
                                @endif
                            </td>

                            <td>{{$contrato->secretaria}}</td>
                            <td class="text-center">
                                <div style="display:flex; gap: 8px; align-items: center;">
                                    @if (Auth::user()->nivel == 'ADMIN')
                                        <a id="btn_show" style="margin: 0;"
                                            href="{{ route('contrato.edit', ['contrato' => $contrato->id]) }}"
                                            title="Editar">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                    @endif

                                    <a id="btn_show" style="margin: 0;" {{-- class="btn btn-primary btn-xs action botao_acao btn_vizualiza" --}}
                                        href="{{ route('contrato.show', ['contrato' => $contrato->id]) }}"
                                        title="Visualizar">
                                        <i class="fa fa-fw fa-eye" aria-hidden="true"></i>
                                    </a>
                                    @if (Auth::user()->nivel != 'USUARIO')
                                        <a id="btn_exclui_solicitacao" style="margin: 0;" {{-- class="btn btn-danger btn-xs action botao_acao btn_excluir" --}}
                                            data-arquivar="{{ $contrato->id }}" href="#" title="Arquivar">
                                            <i class="ni ni-archive-2"></i>
                                        </a>
                                    @endif
                                    <a id="btn_aditiva_contrato" style="margin: 0;" {{-- class="btn btn-danger btn-xs action botao_acao btn_excluir" --}}
                                        {{-- data-arquivar="{{$contrato->id}}" --}} data-aditivar="{{ $contrato->id }}" href="#"
                                        title="Aditivar">
                                        <i class="ni ni-fat-add"></i>
                                    </a>
                                </div>
                                </td>
                    @endforeach
                </tbody>
            </table>
        
        </div>

    </div>
  
@include('layouts.footers.auth.footer')
@endsection

@push('js')
    <script src="//code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        var table = new DataTable('#scc', {
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json',
            },
        });
    </script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $("table#scc").on("click", "#btn_exclui_solicitacao", function() {
            let id = $(this).data('arquivar');
            // console.log(id);
            let btn = $(this);
            Swal.fire({
                title: 'Você tem certeza que deseja arquivar o contrato?',
                text: "Você não poderá reverter isso!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, arquive isso!'
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log(id);
                    $.post("{{ url('/contrato') }}/" + id, {
                        id: id,
                        _method: "DELETE",
                        _token: "{{ csrf_token() }}"
                    }).done(function() {
                        location.reload();
                    });

                    //    $.post("{{ url('/solicitacao') }}/" + id, {
                    //    id: id,
                    //    _method: "DELETE",
                    //    _token: "{{ csrf_token() }}"

                    //    }).done(function() {
                    //    location.reload();
                    //    });

                }
            })

        });
    </script>
    <script>
        $("table#scc").on("click", "#btn_aditiva_contrato", function() {
            let id = $(this).data('aditivar');
            // console.log(id);
            let btn = $(this);
            Swal.fire({
                title: 'Insira a quantidade de meses desejada para a renovação de contrato.',
                //text: "Você não poderá reverter isso!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, aditive isso!',
                html: ` <input
                                    type="number"
                                    value="1"
                                     min="1"
                                     step="1"
                                    class="swal2-input"
                                    id="range-value">`,
            }).then((result) => {
                if (result.isConfirmed) {
                    const inputNumber = Swal.getHtmlContainer().querySelector('#range-value')
                    console.log(result, inputNumber.value)
                    console.log(id);
                    $.post("{{ url('/contrato') }}/" + id, {
                        meses: inputNumber.value,
                        id: id,
                        _method: "PATCH",
                        _token: "{{ csrf_token() }}"
                    }).done(function() {
                        location.reload();
                    });

                    //    $.post("{{ url('/solicitacao') }}/" + id, {
                    //    id: id,
                    //    _method: "DELETE",
                    //    _token: "{{ csrf_token() }}"

                    //    }).done(function() {
                    //    location.reload();
                    //    });

                }
            })


        });
    </script>
@endpush
