@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
<link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"/>
@section('content')
    @include('layouts.navbars.auth.topnav')
    <div class="container-fluid py-2">
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
                        <form method="post" action="{{ route('contrato.store')}}">
                        {{ csrf_field() }} 
                        <p class="text-uppercase text-sm">Informações do Contrato</p>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">N° do Contrato</label>
                                    <input class="form-control" type="number" placeholder="Número do Contrato" name="numero" id="numero" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">N° do Processo</label>
                                    <input class="form-control" type="text" placeholder="Número do Processo" name="processo" id="processo" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Data Publicação</label>
                                    <input required class="form-control datepicker" name="publicado" id="publicado" type="date" placeholder="dd/mm/aaaa" required>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Término do Contrato</label>
                                    <input required class="form-control datepicker" name="fim" id="fim" type="date" placeholder="dd/mm/aaaa" required>
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Data da Homologação</label>
                                    <input required class="form-control datepicker" name="data" id="data" type="date" placeholder="dd/mm/aaaa" required>
                                </div>
                            </div>
                                
                            <div class="col-md-6">
                                    <label for="example-text-input" class="form-control-label">Secretaria Responsável </label>
                                    <select required class="form-select" name="secretaria" id="secretaria">
                                        <option value="" selected>Selecione a Secretaria Responsável</option>
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
                                        <option value="Secretaria de Governança">Secretaria de Governança</option>
                                        <option value="Secretaria de Infraestrutura, Mobilidade e Serviços Públicos">Secretaria de Infraestrutura, Mobilidade e Serviços Públicos</option>
                                        <option value="Secretaria de Obras">Secretaria de Obras</option>
                                        <option value="Secretaria de Trabalho e Desenvolvimento Econômico">Secretaria de Trabalho e Desenvolvimento Econômico</option>
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
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Tipos de Contrato </label>
                                    <select required class="form-select" name="classe" id="classe">
                                        <option value="" selected>Selecione o tipo de Contrato</option>
                                        <option value="Jagunco">Jagunco</option>
                                        <option value="Baiano">Baiano</option>
                                        <option value="Sisifo"> Sisifo</option>
                                        <option value="Murdock">Murdock</option>
                                        <option value="Marco">Marco</option>
                                        <option value="Marcos">Marcos</option>
                                        <option value="du">Du</option>
                                        <option value="dudu">Dudu</option> 
                                    </select>
                                </div>  
                            </div>
                               
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nome da Empresa </label>
                                <input class="form-control" type="text" placeholder="Nome da Empresa" name="empresa" id="empresa" required>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Objeto do Contrato </label>
                                <input class="form-control" type="text" placeholder="Objeto do Contrato" name="objeto" id="objeto" required>
                            </div>
                        </div>
                        </div>
                        <hr class="horizontal dark">

                        
                        <p class="text-uppercase text-sm" id="fiscal">Informações do Fiscal</p>
                        <div class="dados">
                            <div class="d-flex flex-column">
                                <div class="form-group row dados">
                                    <div class="form-group col-md-4">
                                        <label for="example-text-input" class="form-control-label">Nome do Fiscal</label>
                                        <input class="form-control" type="text" name="fiscal[]" id="fiscal[]" placeholder="Nome do Fiscal" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="example-text-input" class="form-control-label">E-mail do Fiscal</label>
                                        <input class="form-control" type="email"  placeholder="Digite o E-mail" name="email[]" id="email[]" required>   
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="example-text-input" class="form-control-label">Telefone do Fiscal</label>
                                        <input class="form-control" type="text"  placeholder="Digite o telefone" name="telefone[]" id="telefone" required>   
                                    </div>
                                        {{-- <div class="form-group col-md-2">
                                            <button class="btn btn-link text-danger text-gradient px-3 mb-0 btn_remove">
                                                <i class="far fa-trash-alt me-2" aria-hidden="true">
                                                </i>Remover
                                            </button>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                
                        <div class="novadiv"></div>

                        <div class="container">
                            <div class="row justify-content-center align-items-center" style="height: 5vh;">
                                <div class="col-md-4">
                                    <div class="text-center">
                                        <button type="button" class="btn btn-primary clonador">Adicionar Fiscal</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>
                    {{-- FIM --}}
                            {{-- <div class="clearfix"></div>
                            <div class="ln_solid"> </div> --}}
                                <div class="footer text-center"> 
                            
                            
                                    <button type="submit" id="btn_salvar" class="botoes-acao btn btn-round buttondelete btn-primary ">
                                        <span class="icone-botoes-acao mdi mdi-send"></span>
                                        <span class="texto-botoes-acao"> SALVAR </span>
                                        <div class="ripple-container"></div>
                                    </button>
                                </div>


                    </form>
                    </div>
                </div>
                    @include('layouts.footers.auth.footer')
                        
@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="{{ asset('/assets/js/vanillaMasker.min.js') }}"></script>
  <script>
    $('.clonador').click(function(e){
        e.preventDefault();
        
        $('.novadiv').append('<div class="dados"><div class="d-flex flex-column"><div class="form-group row dados"><div class="form-group col-md-4"><label for="example-text-input" class="form-control-label">Nome do Fiscal</label><input class="form-control" type="text" name="fiscal[]" id="fiscal[]" placeholder="Nome do Fiscal" required></div><div class="form-group col-md-4"><label for="example-text-input" class="form-control-label">E-mail do Fiscal</label><input class="form-control" type="email"  placeholder="Digite o E-mail" name="email[]" id="email[]" required>   </div><div class="form-group col-md-4"><label for="example-text-input" class="form-control-label">Telefone do Fiscal</label><input class="form-control" type="telefone"  placeholder="Digite o telefone" name="telefone[]" id="telefone" required></div> <div class="form-group col-md-4"><button class="btn btn-link text-danger text-gradient px-3 mb-0 btn_remove"><i class="far fa-trash-alt me-2" aria-hidden="true"></i>Remover</button></div></div></div></div><div></div></div>') 
     
    });
    $('form').on('click', '.btn_remove', function(e){
            e.preventDefault();
            if ($('.dados').length > 1) {
            $(this).parents('.dados').remove();
            } 
    });
</script>
<script>
    VMasker(document.querySelector("#telefone")).maskPattern("(99) 99999-9999");
</script>
@endpush
   