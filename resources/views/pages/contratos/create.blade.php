@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
<link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
@section('content')
    @include('layouts.navbars.auth.topnav')
    <div class="container-fluid py-2">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header pb-0">
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('contrato.store') }}">
                            {{ csrf_field() }}
                            <p class="text-uppercase text-sm">Informações do Contrato</p>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">N° do Contrato</label>
                                        <input class="form-control" type="text" placeholder="Número do Contrato"
                                            name="numero" id="numero" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">N° do Processo</label>
                                        <input class="form-control" type="text" placeholder="Número do Processo"
                                            name="processo" id="processo" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Data Publicação</label>
                                        <input required class="form-control datepicker" name="publicado" id="publicado"
                                            type="date" placeholder="dd/mm/aaaa" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Término do
                                            Contrato</label>
                                        <input required class="form-control datepicker" name="fim" id="fim"
                                            type="date" placeholder="dd/mm/aaaa" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Data da
                                            Homologação</label>
                                        <input required class="form-control datepicker" name="data" id="data"
                                            type="date" placeholder="dd/mm/aaaa" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="example-text-input" class="form-control-label">Setor Responsável </label>
                                    <select required class="form-select" name="setor_id" id="setor_id">
                                        @foreach ($setor as $setores)
                                            <option value="{{ $setores->id }}">{{ $setores->nome }}</option>
                                        @endforeach


                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Tipos de Contrato
                                        </label>
                                        <select required class="form-select" name="classe" id="classe">
                                            <option value="" selected>Selecione o tipo de Contrato</option>
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
                                        <label for="example-text-input" class="form-control-label">Nome da Empresa </label>
                                        <input class="form-control" type="text" placeholder="Nome da Empresa"
                                            name="empresa" id="empresa" required>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Objeto do Contrato
                                            (Assunto) </label>
                                        <input class="form-control" type="text" placeholder="Objeto do Contrato"
                                            name="objeto" id="objeto" required>
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark">


                            <p class="text-uppercase text-sm">Informações do Fiscal</p>
                            <div class="col-md-12">
                                <div id="add_rendimento">
                                    <div class="row contact-default">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Nome do
                                                    Fiscal</label>
                                                <input class="form-control" type="text" name="fiscal[]"
                                                    id="fiscal" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">E-mail do
                                                    Fiscal</label>
                                                <input class="form-control" type="text" name="email[]" id="email"
                                                    required>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Telefone do
                                                    Fiscal</label>
                                                <input class="form-control" type="text" name="telefone[]"
                                                    id="telefone" required>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            {{-- <div class="novadiv"></div> --}}

                            <div class="container">
                                <div class="row justify-content-center align-items-center">
                                    <div class="col-md-4" style="text-align: center">
                                        <div>
                                            <button type="button" class="btn btn-primary"
                                                onclick="contactAddMoreField('add_rendimento')">Adicionar
                                                Fiscal</button>
                                        </div>
                                        {{-- <div class="text-center">
                                            <button type="button" class="btn btn-primary clonador">Adicionar
                                                Fiscal</button>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>

                    </div>
                    {{-- FIM --}}
                    {{-- <div class="clearfix"></div>
                            <div class="ln_solid"> </div> --}}
                    <div class="footer text-center">


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
            @include('layouts.footers.auth.footer')
        @endsection

        @push('js')
            <script src="https://code.jquery.com/jquery-3.7.1.min.js"
                integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
            <script src="{{ asset('/assets/js/vanillaMasker.min.js') }}"></script>
            <script>
                $('#fiscal').keyup(function() {
                    this.value = this.value.toLocaleUpperCase();
                });
            </script>
            <script>
                function contactCloseMe(element) {
                    $(element).closest(".row").remove();
                }

                function contactAddMoreField(setion_id) {
                    var container = $('#' + setion_id);
                    var item = container.find('.contact-default').clone();

                    item.find('input[readonly]').removeAttr('readonly');
                    item.find('input').val('');

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
                VMasker(document.querySelector("#telefone")).maskPattern("(99) 99999-9999");
            </script>
        @endpush
