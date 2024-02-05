@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
<link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Usuarios'])

    <div class="container-fluid px-2">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 mb-lg-0 mb-4">
                    <div class="card mt-4">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="mb-0">Editar Responsável</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="row">
                                <form action="{{ route('responsavel.update', $responsavel->id) }}" method="post">
                                    <input type="hidden" name="_method" value="PUT">
                                    {{ csrf_field() }}

                                    <div class="card-body pt-4 p-3">

                                        <div class="form-group row">
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label class="control-label">Nome</label>
                                                <input type="text" id="nome" name="nome" class="form-control"
                                                    placeholder="Nome" value="{{ $responsavel->nome }}" minlength="4"
                                                    maxlength="100" required>
                                            </div>

                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label class="control-label">Email</label>
                                                <input type="email" id="email" name="email" class="form-control"
                                                    placeholder="Email" value="{{ $responsavel->email }}" minlength="4"
                                                    maxlength="100" required>
                                            </div>
    
                                            <div class="form-group col-md-4 col-sm-6 col-xs-12">
                                                <label class="control-label">Telefone</label>
                                                <input type="telefone" id="telefone" name="telefone" class="form-control"
                                                    value="{{ $responsavel->telefone }}" placeholder="Telefone" required>
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <label class="control-label">Secretaria Responsável</label>
                            <select id="responsavel_secretaria" name="responsavel_secretaria[]" multiple class="form-control">
                                @foreach ($responsavel->responsavel_secretaria as $respsecretaria)
                                <option  value="{{$respsecretaria->nome}}" selected>{{$respsecretaria->nome}}</option>
                                @endforeach
                                <option value="Arquivo Público Municipal">Arquivo Público Municipal</option>
                                        <option value="Comissão Permanente de Licitação">Comissão Permanente de Licitação
                                        </option>
                                        <option value="Conselho Municipal de Assistência Social">Conselho Municipal de
                                            Assistência Social</option>
                                        <option value="Conselho Tutelar">Conselho Tutelar</option>
                                        <option value="Controladoria Geral do Município">Controladoria Geral do Município
                                        </option>
                                        <option value="Coordenadoria de Comunicação Social">Coordenadoria de Comunicação
                                            Social</option>
                                        <option value="Coordenadoria de Ordem Pública">Coordenadoria de Ordem Pública
                                        </option>
                                        <option value="Coordenadoria de Políticas para Mulheres">Coordenadoria de Políticas
                                            para Mulheres</option>
                                        <option value="Gabinete do Prefeito">Gabinete do Prefeito</option>
                                        <option value="Gabinete do Secretário de Governança">Gabinete do Secretário de
                                            Governança</option>
                                        <option
                                            value="Gabinete do Secretário de Infraestrutura, Mobilidade e Serviços Públicos">
                                            Gabinete do Secretário de Infraestrutura, Mobilidade e Serviços Públicos
                                        </option>
                                        <option value="Gabinete do Subsecretário de Obras">Gabinete do Subsecretário de
                                            Obras</option>
                                        <option value="Gabinete do Subsecretário de Trabalho, Desenvolvimento Econômico">
                                            Gabinete do Subsecretário de Trabalho, Desenvolvimento Econômico</option>
                                        <option value="Gabinete do Vice-Prefeito">Gabinete do Vice-Prefeito</option>
                                        <option value="Guarda Civil Municipal">Guarda Civil Municipal</option>
                                        <option value="Junta de Alistamento Militar">Junta de Alistamento Militar</option>
                                        <option
                                            value="PROCON - Órgão Municipal de Proteção, Orientação e Defesa do Consumidor">
                                            PROCON - Órgão Municipal de Proteção, Orientação e Defesa do Consumidor</option>
                                        <option value="Procuradoria Geral">Procuradoria Geral</option>
                                        <option value="Secretaria Municipal de Educação">Secretaria Municipal de Educação
                                        </option>
                                        <option value="Secretaria Municipal de Saúde">Secretaria Municipal de Saúde</option>
                                        <option value="Setor de Meio Ambiente">Setor de Meio Ambiente</option>
                                        <option value="Setor de Protocolo Geral">Setor de Protocolo Geral</option>
                                        <option value="Setor de Urbanismo">Setor de Urbanismo</option>
                                        <option value="Subsecretaria de Fazenda">Subsecretaria de Fazenda</option>
                                        <option value="Subsecretaria de Tecnologia da Informação">Subsecretaria de
                                            Tecnologia da Informação</option>
                                        <option value="Subsecretaria Municipal de Administração">Subsecretaria Municipal de
                                            Administração</option>
                                        <option value="Subsecretaria Municipal de Assistência Social">Subsecretaria
                                            Municipal de Assistência Social</option>
                                        <option value="Subsecretaria Municipal de Planejamento Estratégico e Gestão">
                                            Subsecretaria Municipal de Planejamento Estratégico e Gestão</option>
                                        <option value="Superintendência de Arrecadação Mercantil e Fiscalização">
                                            Superintendência de Arrecadação Mercantil e Fiscalização</option>
        
                            </select>
                        </div>

                                    
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="ln_solid"> </div>
                                    <div class="footer text-center">
                                        <button type="submit" id="btn_salvar"
                                            class="botoes-acao btn btn-round btn-success ">
                                            <span class="icone-botoes-acao mdi mdi-send"></span>
                                            <span class="texto-botoes-acao"> SALVAR </span>
                                            <div class="ripple-container"></div>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footers.auth.footer')
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
    <script src="{{ asset('/assets/js/vanillaMasker.min.js') }}"></script>
    <script>
        VMasker(document.querySelector("#telefone")).maskPattern("(99) 99999-9999");

    </script>
    <script>
        new TomSelect('#responsavel_secretaria', {
            sortField: 'text'
        });
    </script>
@endpush
