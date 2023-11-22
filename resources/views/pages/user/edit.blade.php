@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
<link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"/>
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
                                <form action="{{route('users.update', $user->id)}}"  method="post">
                                    <input type="hidden" name="_method" value="PUT"> 
                                    {{ csrf_field() }}
    
                                    <div class="card-body pt-4 p-3">
                                        
                                        <div class="form-group row">
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label class="control-label" >Nome</label>
                                                <input type="text" id="name" name="name"  class="form-control" placeholder="Nome" value="{{$user->name}}" minlength="4" maxlength="100" required >	
                                            </div>

                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label class="control-label" >Email</label>
                                                <input type="email" id="email" name="email"  class="form-control" placeholder="Email" value="{{$user->email}}" minlength="4" maxlength="100" required >	
                                            </div>
                                            

                                            <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                                <label class="control-label" >Permissão</label>
                                                <select class="form-control" name="nivel" id="nivel"  required>
                                                    
                                                    {{-- <option value="">Selecione uma Permissão</option> --}}
                                                    @if ($user->nivel == 'ADMIN')
                                                    <option selected value="ADMIN">Administrador</option>
                                                    <option value="USUARIO">Fiscal</option>
                                                    @endif
                                                    {{-- <option value="">Selecione uma Permissão</option> --}}
                                                    @if ($user->nivel == 'USUARIO')
                                                    <option  value="ADMIN">Administrador</option>
                                                    <option selected value="USUARIO">Fiscal</option>
                                                    @endif
                                                    
                                        
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                     
                                <div class="clearfix"></div>
                                    <div class="ln_solid"> </div>
                                        <div class="footer text-center"> 
                                            {{-- <button hidden type="submit"></button>
                                            <button id="btn_cancelar" class="botoes-acao btn btn-round btn-warning" >
                                                <span class="icone-botoes-acao mdi mdi-backburger"></span>   
                                                <span class="texto-botoes-acao"> CANCELAR </span>
                                                <div class="ripple-container"></div>
                                            </button> --}}
                                    
                                            <button type="submit" id="btn_salvar" class="botoes-acao btn btn-round btn-success ">
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
    {{-- <script src="{{ asset('js/vanillaMasker.min.js')}}"></script> --}}

    <script src="//code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>   
    <script> table = new DataTable('#scc'); </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
<script>
    $(document).ready(function(){
        $('.cpf').inputmask('999.999.999-99');
    });
</script>




@endpush