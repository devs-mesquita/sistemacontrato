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
                            <p class="text-uppercase text-sm">Informações do Contrato</p>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">N° do Contrato</label>
                                        <input class="form-control" type="text" placeholder="Número do Contrato" name="numero" id="numero" disabled value="{{$contrato->numero}}"  required >
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">N° do Processo</label>
                                        <input class="form-control" type="text" placeholder="Número do Processo" name="processo" id="processo" disabled value="{{$contrato->processo}}"  required >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Data Publicação</label>
                                        <input required class="form-control datepicker" name="publicado" id="publicado" type="date" placeholder="dd/mm/aaaa" disabled value="{{$contrato->publicado}}"  required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Término do Contrato</label>
                                        <input required class="form-control datepicker" name="fim" id="fim" type="date" placeholder="dd/mm/aaaa" disabled value="{{$contrato->fim}}"  required>
                                    </div>
                                </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Data da Homologação</label>
                                            <input required class="form-control datepicker" name="data" id="data" type="date" placeholder="dd/mm/aaaa" disabled value ="{{$contrato->data}}"required>
                                        </div>
                                    </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Setor Destinado</label>
                                        <input class="form-control" name="setor_id" id="setor_id" type="text" placeholder="Secretaria Destinada" disabled value="{{$contrato->setor->nome}}" required>
                                    </div>
                                </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Tipo de Contrato</label>
                                        <input class="form-control" name="classe" id="classe" type="text" placeholder="Tipos de Contrato" disabled value="{{$contrato->classe}}" required>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Nome da Empresa </label>
                                        <input class="form-control" type="text" placeholder="Nome da Empresa" name="empresa" id="empresa" disabled value="{{$contrato->empresa}}" required>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Objeto do Contrato (Assunto) </label>
                                        <input class="form-control" type="text" placeholder="Objeto do Contrato" name="objeto" id="objeto" disabled value="{{$contrato->objeto}}" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Quantidade de Aditivos</label>
                                        <input required class="form-control" name="tipo" id="tipo" type="number" placeholder="Quantidade de Aditivos" disabled value="{{$qtd}}" required >
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Status do Contrato</label>
                                        <input required class="form-control" name="status" id="status" type="text" disabled value="{{$contrato->status}}" required >
                                    </div>
                                </div>
                            
                            <div class="form-group col-md-6">
                                <label for="example-text-input" class="form-control-label">Motivo do status</label>
                                <input class="form-control" type="text"  placeholder="Digite o motivo" name="motivo" id="motivo" disabled value="{{$contrato->motivo}}" required>   
                            </div>
                                <div class="col-md-9 p-2">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Histórico de Aditivos</label>
                                        <div>
                                            <ul class="nav navbar-right panel_toolbox">
                                            {{-- <a href="#" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Nova Sala"> <i class="fas fa-list"></i></a> --}}
                                            <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="fas fa-list"></i>
                                              </button> 
                                        </div>
                                       
                                           
                                        {{-- <input required class="form-control" name="tipo" id="tipo" type="number" placeholder="Quantidade de Aditivos" disabled value="{{$qtd}}" required > --}}
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <p class="text-uppercase text-sm">Informações do Fiscal</p>


                            @foreach ($contrato->fiscais as $fiscal)
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Nome do Fiscal</label>
                                            <input class="form-control" type="text" name="fiscal" id="fiscal" placeholder="Nome do Fiscal" disabled value="{{$fiscal->nome}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">E-mail do Fiscal</label>
                                            <input class="form-control" type="email"  placeholder="Digite o E-mail " name="email" id="email" disabled value="{{$fiscal->email}}" required>   
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="example-text-input" class="form-control-label">Telefone do Fiscal</label>
                                        <input class="form-control" type="telefone"  placeholder="Digite o telefone" name="telefone" id="telefone" disabled value="{{$fiscal->telefone}}" required>   
                                    </div>
                                </div>
                            @endforeach
                            
                            
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Historico de Aditivos</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    @foreach ($contrato->aditivo as $aditivo)
                                    @if($loop->index == 0)
                                    <h6 class="mb-0">Data Inicial:</h6>

                                    <p> {{ date('d/m/Y', strtotime($aditivo->data_anterior))}}</p>
                                        
                                    @else
                                    <h6 class="mb-0">Aditivo {{ $loop->index  }}</h6>

                                    <p> {{ date('d/m/Y', strtotime($aditivo->data_anterior))}}</p>
                                    @endif
                                    @endforeach
                                </div>
                                {{-- <div class="modal-footer">
                                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn bg-gradient-primary">Save changes</button>
                                </div> --}}
                            </div>
                            </div>
                        </div>
                                   
                                
                        
@endsection

@push('js')
<script src="{{ asset('/assets/js/vanillaMasker.min.js') }}"></script>

<script>
    VMasker(document.querySelector("#telefone")).maskPattern("(99) 99999-9999");
</script>
@endpush
   