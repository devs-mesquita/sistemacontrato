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
                    <form action="{{route('updateContrato')}}"  method="post">
                        {{ csrf_field() }} 
                        <input type="hidden" id="id" name="id" value="{{$contrato->id}}" value="PUT"> 
                    <p class="text-uppercase text-sm">Informações do Contrato</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">N° do Contrato</label>
                                <input class="form-control" type="number" placeholder="Número do Contrato" name="numero" id="numero" value="{{$contrato->numero}}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Data Publicação</label>
                                <input required class="form-control datepicker" name="publicado" id="publicado" type="date" placeholder="dd/mm/aaaa" value="{{$contrato->publicado}}" required>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Término do Contrato</label>
                                <input required class="form-control datepicker" name="fim" id="fim" type="date" placeholder="dd/mm/aaaa" value="{{$contrato->fim}}" required>
                            </div>
                        </div>
                        <div class="col-md-6"> 
                                <label for="example-text-input" class="form-control-label">Data da Homologação</label>
                                <input required class="form-control datepicker" name="data" id="data" type="date" placeholder="dd/mm/aaaa" value="{{$contrato->data}}" required>
                            </div>
                            
                        <div class="col-md-12">
                                <label for="example-text-input" class="form-control-label">Secretaria Destinada :</label>
                                <select required class="form-select" name="secretaria" id="secretaria">
                                    <option value="{{$contrato->secretaria}}" selected >{{$contrato->secretaria}}</option>
                                    <option value="Arquivo Público Municipal">Arquivo Público Municipal</option>
                                    <option value="Comissão Permanente de Licitação">Comissão Permanente de Licitação</option>
                                    <option value="Conselho Municipal de Assistência Social">Conselho Municipal de Assistência Social</option>
                                    <option value="Conselho Tutelar">Conselho Tutelar</option>
                                    <option value="Controladoria Geral do Município">Controladoria Geral do Município</option>
                                    <option value="Coordenadoria de Comunicação Social">Coordenadoria de Comunicação Social</option>
                                    <option value="Coordenadoria de Ordem Pública">Coordenadoria de Ordem Pública</option>
                                    <option value="Coordenadoria de Políticas para Mulheres">Coordenadoria de Políticas para Mulheres</option>
                                    <option value="Departamento de Compras">Departamento de Compras</option>
                                    <option value="Departamento de Contabilidade">Departamento de Contabilidade</option>
                                    <option value="Departamento de Cultura">Departamento de Cultura</option>
                                    <option value="Departamento de Defesa Civil">Departamento de Defesa Civil</option>
                                    <option value="Departamento de Dívida Ativa">Departamento de Dívida Ativa</option>
                                    <option value="Departamento de Material e Patrimônio">Departamento de Material e Patrimônio</option>
                                    <option value="Departamento de Orçamento e Finanças">Departamento de Orçamento e Finanças</option>
                                    <option value="Departamento de Pagamento">Departamento de Pagamento</option>
                                    <option value="Departamento de Planejamento e Análise Econômica">Departamento de Planejamento e Análise Econômica</option>
                                    <option value="Departamento de Projetos">Departamento de Projetos</option>
                                    <option value="Departamento de Recursos Humanos">Departamento de Recursos Humanos</option>
                                    <option value="Departamento de Serviços Públicos">Departamento de Serviços Públicos</option>
                                    <option value="Departamento de Trânsito">Departamento de Trânsito</option>
                                    <option value="Gabinete do Prefeito">Gabinete do Prefeito</option>
                                    <option value="Gabinete do Secretário de Governança">Gabinete do Secretário de Governança</option>
                                    <option value="Gabinete do Secretário de Infraestrutura, Mobilidade e Serviços Públicos">Gabinete do Secretário de Infraestrutura, Mobilidade e Serviços Públicos</option>
                                    <option value="Gabinete do Subsecretário de Obras">Gabinete do Subsecretário de Obras</option>
                                    <option value="Gabinete do Subsecretário de Trabalho, Desenvolvimento Econômico">Gabinete do Subsecretário de Trabalho, Desenvolvimento Econômico</option>
                                    <option value="Gabinete do Vice-Prefeito">Gabinete do Vice-Prefeito</option>
                                    <option value="Guarda Civil Municipal">Guarda Civil Municipal</option>
                                    <option value="Junta de Alistamento Militar">Junta de Alistamento Militar</option>
                                    <option value="PROCON - Órgão Municipal de Proteção, Orientação e Defesa do Consumidor">PROCON - Órgão Municipal de Proteção, Orientação e Defesa do Consumidor</option>
                                    <option value="Procuradoria Geral">Procuradoria Geral</option>
                                    <option value="Secretaria Municipal de Educação">Secretaria Municipal de Educação</option>
                                    <option value="Secretaria Municipal de Saúde">Secretaria Municipal de Saúde</option>
                                    <option value="Setor de Meio Ambiente">Setor de Meio Ambiente</option>
                                    <option value="Setor de Protocolo Geral">Setor de Protocolo Geral</option>
                                    <option value="Setor de Urbanismo">Setor de Urbanismo</option>
                                    <option value="Subsecretaria de Fazenda">Subsecretaria de Fazenda</option>
                                    <option value="Subsecretaria de Tecnologia da Informação">Subsecretaria de Tecnologia da Informação</option>
                                    <option value="Subsecretaria Municipal de Administração">Subsecretaria Municipal de Administração</option>
                                    <option value="Subsecretaria Municipal de Assistência Social">Subsecretaria Municipal de Assistência Social</option>
                                    <option value="Subsecretaria Municipal de Planejamento Estratégico e Gestão">Subsecretaria Municipal de Planejamento Estratégico e Gestão</option>
                                    <option value="Superintendência de Arrecadação Mercantil e Fiscalização">Superintendência de Arrecadação Mercantil e Fiscalização</option>
                                </select>
                            </div>
                    </div>
                   
                            <div class="col-md-12 margin-top-5 text-center" style="padding-top: 20px"> 
                                <button type="submit" id="btn_salvar" class="botoes-acao btn btn-round buttondelete btn-primary ">
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

<script src="{{asset('assets/js/plugins/chartjs.min.js')}}";></script>
@push('js')
   
@endpush
