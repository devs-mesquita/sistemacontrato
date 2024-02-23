@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
<link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
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
                                    <h6 class="mb-0">Editar Usuario</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="row">
                                <form action="{{ route('users.update', $user->id) }}" method="post">
                                    <input type="hidden" name="_method" value="PUT">
                                    {{ csrf_field() }}

                                    <div class="card-body pt-4 p-3">

                                        <div class="form-group row">
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label class="control-label">Nome</label>
                                                <input type="text" id="name" name="name" class="form-control"
                                                    placeholder="Nome" value="{{ $user->name }}" minlength="4"
                                                    maxlength="100" required>
                                            </div>

                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label class="control-label">Email</label>
                                                <input type="email" id="email" name="email" class="form-control"
                                                    placeholder="Email" value="{{ $user->email }}" minlength="4"
                                                    maxlength="100" required>
                                            </div>
                                            <div class="form-group col-md-4 col-sm-6 col-xs-12">
                                                <label class="control-label">CPF</label>
                                                <input type="text" id="cpf" name="cpf" class="form-control"
                                                    placeholder="CPF" value="{{ $user->cpf }}" minlength="4"
                                                    maxlength="15" required>
                                            </div>
                                            <div class="form-group col-md-4 col-sm-6 col-xs-12">
                                                <label class="control-label">Telefone</label>
                                                <input type="telefone" id="telefone" name="telefone" class="form-control"
                                                    value="{{ $user->telefone }}" placeholder="Telefone" required>
                                            </div>
                                            
                                            <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                                <label class="control-label">Permissão</label>
                                                <select class="form-control" name="nivel" id="nivel" required>
                                                    @if ($user->nivel == 'ADMIN')
                                                        <option selected value="ADMIN">Administrador</option>
                                                        <option value="USUARIO">Fiscal</option>
                                                    @endif

                                                    @if ($user->nivel == 'USUARIO')
                                                        <option value="ADMIN">Administrador</option>
                                                        <option selected value="USUARIO">Fiscal</option>
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="example-text-input" class="form-control-label">Setor Responsável </label>
                                                <select required class="form-select" name="setor" id="setor">
                                                    <option value="{{$user->setor_id}}" selected>{{$user->setor->nome}}</option>
                                                    @foreach ($setor as $setores)
                                                    <option value="{{$setores->id}}">{{$setores->nome}}</option>
                                                    @endforeach
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
    <script src="{{ asset('/assets/js/vanillaMasker.min.js') }}"></script>
    <script>

        VMasker(document.querySelector("#cpf")).maskPattern("999.999.999-99");
        VMasker(document.querySelector("#telefone")).maskPattern("(99) 99999-9999");

    </script>
@endpush
