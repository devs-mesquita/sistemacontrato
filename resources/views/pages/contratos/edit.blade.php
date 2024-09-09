@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('tomselect/tom-select.bootstrap4.css') }}">
@section('content')
    <style>
        .hidden {
            display: none;
        }
    </style>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header pb-0">
                    
                    </div>
                    <div class="card-body">
                        <form action="{{ route('updateContrato', $contrato->id) }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" id="id" name="id" value="{{ $contrato->id }}" value="PUT">
                            <p class="text-uppercase text-sm">Informações do Contrato</p>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">N° do Contrato:</label>
                                        <input class="form-control" type="text" placeholder="Número do Contrato"
                                            name="numero" id="numero" value="{{ $contrato->numero }}" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">N° do Processo:</label>
                                        <input class="form-control" type="text" placeholder="Número do Processo"
                                            name="processo" id="processo" value="{{ $contrato->processo }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Data Publicação:</label>
                                        <input required class="form-control datepicker" name="publicado" id="publicado"
                                            type="date" placeholder="dd/mm/aaaa" value="{{ $contrato->publicado }}"
                                            required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Término do
                                            Contrato:</label>
                                        <input required class="form-control datepicker" name="fim" id="fim"
                                            type="date" placeholder="dd/mm/aaaa" value="{{ $contrato->fim }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="example-text-input" class="form-control-label">Data da Homologação:</label>
                                    <input required class="form-control datepicker" name="data" id="data"
                                        type="date" placeholder="dd/mm/aaaa" value="{{ $contrato->data }}" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="setor_id" class="form-control-label">Secretaria Destinada:</label>
                                    <select class="form-select" id="setor_id" name="setor_id" required autocomplete="off">
                                        
                                        <option value="">Selecione o Setor</option>
                                        @foreach ($setor as $setores)
                                        <option value="{{ $setores->id }}">{{ $setores->nome }}</option>
                                    @endforeach
                                    </select>
                                </div> 
                                



                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Tipos de Contrato
                                            :</label>
                                        <select required class="form-select" name="classe" id="classe">
                                            <option value="{{ $contrato->classe }}" selected>{{ $contrato->classe }}
                                            </option>

                                            <option value="Prestação de Serviço"> Prestacao de Servico</option>
                                            <option value="Fornecimento">Fornecimento</option>
                                            <option value="Aquisição"> Aquisicao</option>
                                            <option value="Locação de Imóvel">Locacao de Imovel</option>
                                            <option value="Locação de Equipamento">Locacao de Equipamento</option>
                                            <option value="Obra">Obra</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Nome da Empresa :</label>
                                        <input class="form-control" type="text" placeholder="Nome da Empresa"
                                            name="empresa" id="empresa" value="{{ $contrato->empresa }}" required>

                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Objeto do Contrato
                                            :</label>
                                        <input class="form-control" type="text" placeholder="Objeto do Contrato"
                                            name="objeto" id="objeto" value="{{ $contrato->objeto }}">

                                        </option>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <p class="text-uppercase text-sm">Informações do Fiscal</p>

                            @foreach ($contrato->fiscais as $fisca)
                                <div class="col-md-12">
                                    <div>
                                        <div class="row contact-default">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Nome do
                                                        Fiscal</label>
                                                    <input class="form-control" type="text" name="fiscal[]"
                                                        id="fiscal" value="{{ $fisca->nome }}" readonly required>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">E-mail do
                                                        Fiscal</label>
                                                    <input class="form-control" type="text" name="email[]"
                                                        id="email" value="{{ $fisca->email }}" readonly required>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Telefone do
                                                        Fiscal</label>
                                                    <input class="form-control" type="text" readonly name="telefone[]"
                                                        id="telefone" value="{{ $fisca->telefone }}" required>
                                                </div>
                                            </div>


                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-danger btn-rounded btn-sm btn-icon"
                                                    style="margin-top:35px" onclick="contactCloseMe(this);"> <i
                                                        class="fa fa-fw fa-trash"></i>
                                                </button>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            @endforeach


                            <div class="col-md-12">
                                <div id="add_rendimento">
                                    <div class="row contact-default">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label" hidden>Nome do
                                                    Fiscal</label>
                                                <input class="form-control" type="text" name="fiscal[]"
                                                    id="fiscal" hidden>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label" hidden>E-mail
                                                    do
                                                    Fiscal</label>
                                                <input class="form-control" type="text" name="email[]" id="email"
                                                    hidden>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label" hidden>Telefone
                                                    do
                                                    Fiscal</label>
                                                <input class="form-control" type="text" name="telefone[]"
                                                    id="telefone" hidden>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- @foreach ($contrato->fiscais as $key => $fiscal)
                                <div class="dados">
                                    <div class="d-flex flex-column">
                                        <div class="form-group row dados">
                                            <input type="hidden" id="fiscal[][fiscal_id]"
                                                name="fiscal[{{ $key }}][fiscal_id]"
                                                value="{{ $fiscal->id }}">
                                            <div class="form-group col-md-6">
                                                <label for="example-text-input" class="form-control-label">Nome do
                                                    Fiscal</label>
                                                <input class="form-control" type="text"
                                                    name="fiscal[{{ $key }}][nome]" id="fiscal[]"
                                                    placeholder="Nome do Fiscal" value="{{ $fiscal->nome }}" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="example-text-input" class="form-control-label">E-mail do
                                                    Fiscal</label>
                                                <input class="form-control" type="email" placeholder="Digite o E-mail"
                                                    name="fiscal[{{ $key }}][email]" id="email[]"
                                                    value="{{ $fiscal->email }}" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="example-text-input" class="form-control-label">Telefone do
                                                    Fiscal</label>
                                                <input class="form-control" type="telefone"
                                                    placeholder="Digite o telefone"
                                                    name="fiscal[{{ $key }}][telefone]" id="telefone"
                                                    value="{{ $fiscal->telefone }}" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <button
                                                    class="btn btn-link text-danger text-gradient px-3 mb-0 btn_remove">
                                                    <i class="far fa-trash-alt me-2" aria-hidden="true"></i>Remover
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach --}}

                    </div>


                    <div class="container">
                        <div class="row justify-content-center align-items-center">
                            <div style="text-align: center">
                                <button type="button" class="btn btn-primary"
                                    onclick="contactAddMoreField('add_rendimento')">Adicionar
                                    Fiscal</button>
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

@push('js')
    <script src="{{ asset('/assets/js/vanillaMasker.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        function contactCloseMe(element) {
            $(element).closest(".row").remove();
        }

        function contactAddMoreField(setion_id) {
            var container = $('#' + setion_id);
            var item = container.find('.contact-default').clone();

            item.find('label[hidden]').removeAttr('hidden');
            item.find('input[hidden]').removeAttr('hidden').attr('required', 'required');

            item.removeClass('contact-default').removeClass('d-none').addClass('clone_rendimento');

            container.append(item);

            VMasker(item.find("#telefone")).maskPattern("(99) 99999-9999");

            item.find('#fiscal').keyup(function() {
                this.value = this.value.toLocaleUpperCase();
            });

            var newButton =
                '<div class="col-md-2"><button type="button" class="btn btn-danger btn-rounded btn-sm btn-icon" style="margin-top:35px" onclick="contactCloseMe(this);"> <i class="fa fa-fw fa-trash"></i> </button></div>';
            item.append(newButton);
        }
    </script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        new TomSelect('#setor_id', {
            plugins: ['input_autogrow'],
            create: false,
            sortField: {
                field: 'text',
                direction: 'asc'
            },
            placeholder: "Selecione o Setor",
            maxOptions: 1000,
        });
    });
    </script>
    <script>
        VMasker(document.querySelector("#telefone")).maskPattern("(99) 99999-9999");
    </script>
@endpush
