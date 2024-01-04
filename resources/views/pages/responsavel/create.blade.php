@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
<link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"/>
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Usuarios'])
    @if (Auth::user()->nivel != 'USUARIO')
    <div class="container-fluid px-2">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 mb-lg-0 mb-4">
                    <div class="card mt-4">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="mb-0">Novo Responsável</h6>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="card-body p-3">
                            <div class="row">
                                <form action="{{url('/responsavel')}}"  method="POST"> 
                                    {{ csrf_field() }}
    
                                    <div class="card-body pt-4 p-3">
                                        
                                        <div class="form-group row">
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label class="control-label" >Nome</label>
                                                <input type="text" id="nome" name="nome"  class="form-control" placeholder="Nome" minlength="4" maxlength="100" required >	
                                            </div>

                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label class="control-label" >Email</label>
                                                <input type="email" id="email" name="email"  class="form-control" placeholder="Email" minlength="4" maxlength="100" required >	
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label class="control-label" >Telefone</label>
                                                <input type="telefone" id="telefone" name="telefone"  class="form-control" placeholder="Telefone" minlength="4"  required >	
                                            </div>
                                          
                                            

                                        </div>

                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="ln_solid"> </div>
                                        <div class="footer text-center"> 
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
    </div>
  
    @include('layouts.footers.auth.footer')
    @endsection
    
            
    @push('js')
    <script src="{{ asset('/assets/js/vanillaMasker.min.js') }}"></script>
    <script>

        
        VMasker(document.querySelector("#telefone")).maskPattern("(99) 99999-9999");

    </script>
@endpush
   