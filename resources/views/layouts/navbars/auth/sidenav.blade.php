<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 " style="text-align: center;" href="{{ route('home') }}"
            >
            <img src="{{asset("img/brasao.png")}}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">SCC</span>
        </a>
    </div>
            <hr class="horizontal dark mt-0">
            <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" href="{{ route('home') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Inicio</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'contrato.index' ? 'active' : '' }}" href="{{ route('contrato.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-folder-17 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Contratos</span>
                </a>
            </li>
            @if (Auth::user()->nivel != 'USUARIO')
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'responsavel.index' ? 'active' : '' }}" href="{{ route('responsavel.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-badge text-primary text-sm opacity-10"></i>
                    </div>
                    
                    <span class="nav-link-text ms-1">Responsáveis</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'setor.index' ? 'active' : '' }}" href="{{ route('setor.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-bullet-list-67 text-primary text-sm opacity-10"></i>
                    </div>
                    
                    <span class="nav-link-text ms-1">Setores</span>
                </a>
            </li>
          
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'user.index' ? 'active' : '' }}" href="{{ route('user.index') }}">
                   
                    <div
                
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Usuarios</span>
                </a>
            </li>
        </ul>
        @endif
    </div>
    
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>


<div>
    <a type="button"  class="sidebar-footer hidden-small"  data-bs-toggle="modal" data-bs-target="#atualizaModal" style="text-align: center font-size: 15px; color: #bfa15f;padding-bottom:15px">
       Notas de Atualização
    </a> 

</div>

      <div class="modal fade" id="atualizaModal" tabindex="-1" role="dialog" aria-labelledby="atualizaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="atualizaModalLabel">Notas de Atualização</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <h4>Versão Beta 1.0</h4>
                <p> Essa versão contem as funcionalidades basicas do sistema</p>
                <li>Criar novos Contratos</li>
                <li>Trocar status do Contrato</li>
                <li>Criar novos Consultores</li>
                <p></p>
                <h4>Versão Beta 2.0</h4>
                <li>Adicionado Lista de Responsáveis</li>
                <li>Adicionado CPF no cadastro do Usuário</li>
                <li>Adicionado telefone no cadastro do Fiscal</li>
                <li>Adicionado novas informações na tela principal.</li>
                <li>Adicionado botao alterar status, com o motivo da alteração.</li>
                <li>Lista de criação de setores.</li>
                <li>Alteração de ícones barra de navegação.</li>
            </div>
        </div>
        </div>
    </div>


</aside>




