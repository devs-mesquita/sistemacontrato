@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header pb-0">
                        {{-- <div>
                        <ul class="nav navbar-right panel_toolbox">
                        <a href="{{url('contrato/create')}}" class="btn btn-primary btn-md  ms-auto" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Nova Sala">Salvar Contrato</a> 
                    </div> --}}
                    </div>
                    <div class="card-body">
                        <form action="{{ route('updateContrato', $contrato->id) }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" id="id" name="id" value="{{ $contrato->id }}" value="PUT">
                            <p class="text-uppercase text-sm">Informações do Contrato</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">N° do Contrato</label>
                                        <input class="form-control" type="text" placeholder="Número do Contrato"
                                            name="numero" id="numero" value="{{ $contrato->numero }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Data Publicação</label>
                                        <input required class="form-control datepicker" name="publicado" id="publicado"
                                            type="date" placeholder="dd/mm/aaaa" value="{{ $contrato->publicado }}"
                                            required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Término do
                                            Contrato</label>
                                        <input required class="form-control datepicker" name="fim" id="fim"
                                            type="date" placeholder="dd/mm/aaaa" value="{{ $contrato->fim }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="example-text-input" class="form-control-label">Data da Homologação</label>
                                    <input required class="form-control datepicker" name="data" id="data"
                                        type="date" placeholder="dd/mm/aaaa" value="{{ $contrato->data }}" required>
                                </div>

                                <div class="col-md-12">
                                    <label for="example-text-input" class="form-control-label">Secretaria Destinada
                                        :</label>
                                    <select required class="form-select" name="secretaria" id="secretaria">
                                        <option value="{{ $contrato->secretaria }}" selected>{{ $contrato->secretaria }}
                                        </option>
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
                                        <option value="Departamento de Compras">Departamento de Compras</option>
                                        <option value="Departamento de Contabilidade">Departamento de Contabilidade</option>
                                        <option value="Departamento de Cultura">Departamento de Cultura</option>
                                        <option value="Departamento de Defesa Civil">Departamento de Defesa Civil</option>
                                        <option value="Departamento de Dívida Ativa">Departamento de Dívida Ativa</option>
                                        <option value="Departamento de Material e Patrimônio">Departamento de Material e
                                            Patrimônio</option>
                                        <option value="Departamento de Orçamento e Finanças">Departamento de Orçamento e
                                            Finanças</option>
                                        <option value="Departamento de Pagamento">Departamento de Pagamento</option>
                                        <option value="Departamento de Planejamento e Análise Econômica">Departamento de
                                            Planejamento e Análise Econômica</option>
                                        <option value="Departamento de Projetos">Departamento de Projetos</option>
                                        <option value="Departamento de Recursos Humanos">Departamento de Recursos Humanos
                                        </option>
                                        <option value="Departamento de Serviços Públicos">Departamento de Serviços Públicos
                                        </option>
                                        <option value="Departamento de Trânsito">Departamento de Trânsito</option>
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
                            <br>
                            <p class="text-uppercase text-sm">Informações do Fiscal</p>

                            @foreach ($contrato->fiscais as $key => $fiscal)
                            
                            <div class="dados">
                                <div class="d-flex flex-column">
                                    <div class="form-group row dados">
                                        <input type="hidden" id="fiscal[][fiscal_id]" name="fiscal[{{$key}}][fiscal_id]" value="{{$fiscal->id}}">
                                        <div class="form-group col-md-5">
                                            <label for="example-text-input" class="form-control-label">Nome do Fiscal</label>
                                            <input class="form-control" type="text" name="fiscal[{{$key}}][nome]" id="fiscal[]" placeholder="Nome do Fiscal" value="{{$fiscal->nome}}" required>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label for="example-text-input" class="form-control-label">E-mail do Fiscal</label>
                                            <input class="form-control" type="email" placeholder="Digite o E-mail" name="fiscal[{{$key}}][email]" id="email[]" value="{{$fiscal->email}}" required> 
                                        </div>
                                        <div class="form-group col-md-2">
                                            <button class="btn btn-link text-danger text-gradient px-3 mb-0 btn_remove">
                                                <i class="far fa-trash-alt me-2" aria-hidden="true"></i>Remover
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <div class="novadiv"></div>

                    </div>


                    <div class="container">
                        <div class="row justify-content-center align-items-center" style="height: 5vh;">
                            <div class="col-md-4">
                                <div class="text-center">
                                    <button type="button" class="btn btn-primary clonador">Adicionar Fiscal</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 margin-top-5 text-center" style="padding-top: 20px">
                        <button type="submit" id="btn_salvar"
                            class="botoes-acao btn btn-round buttondelete btn-primary ">
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
    @include('layouts.footers.auth.footer')
@endsection

<script src="{{ asset('assets/js/plugins/chartjs.min.js') }}" ;></script>
@push('js')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        let i = 25;

        $('.clonador').click(function(e) {
            console.log(i);
            e.preventDefault();
            $('.novadiv').append(
                '<div class="dados"> <div class="d-flex flex-column"><div class="form-group row dados"><div class="form-group col-md-5"><label for="example-text-input" class="form-control-label">Nome do Fiscal</label><input class="form-control" type="text" name="fiscal[' +
                i +
                '][nome]" id="fiscal" placeholder="Nome do Fiscal"></div><div class="form-group col-md-5"><label for="example-text-input" class="form-control-label">E-mail do Fiscal</label><input class="form-control" type="email"  placeholder="Digite o E-mail" name="fiscal[' +
                i +
                '][email]" id="email">   </div><div class="form-group col-md-2"><button class="btn btn-link text-danger text-gradient px-3 mb-0 btn_remove"><i class="far fa-trash-alt me-2" aria-hidden="true"></i>Remover</button></div></div></div></div><div></div></div>'
                );
            i++;
        });

        $('form').on('click', '.btn_remove', function(e) {
            e.preventDefault();
            if ($('.dados').length > 1) {
                $(this).parents('.dados').remove();
            }
        });
    </script>
@endpush
