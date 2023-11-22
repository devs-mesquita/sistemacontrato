<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl
        {{ str_contains(Request::url(), 'virtual-reality') == true ? ' mt-3 mx-3 bg-primary' : '' }}"
    id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">


        </nav>
        <div class="top_nav">
            <div class="nav_menu align-right" style="
            padding-right: 30px;
        ">
                <ul class="nav navbar-nav navbar-right">

                    <div class="dropdown">
                        <button class="btn bg-gradient-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Menu
                        </button>
                        <ul style="top: 0rem !important;" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a style="color: black" class="dropdown-item" href="{{route('alterasenha')}}">Alterar Senha</a></li>
                            <li>
                                <form role="form" method="post" action="{{ route('logout') }}" id="logout-form">
                                    @csrf
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                        class="nav-link text-white font-weight-bold px-0">
                                        <i class="fa fa-user me-sm-1"></i>
                                        <span class="d-sm-inline d-none" style="color: black">Sair</span>
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>

                    {{-- <li class="nav-item d-flex align-items-center">
                    <form role="form" method="post" action="{{ route('logout') }}" id="logout-form">
                        @csrf
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="nav-link text-white font-weight-bold px-0">
                            <i class="fa fa-user me-sm-1"></i>
                            <span class="d-sm-inline d-none">Sair</span>
                        </a>
                        <div class="collapse navbar-collapse mt-sm1 mt2 me-md2 me-sm-3">
                        <a href="" class="nav-link text-white font-weight-bold px-0">
                            <i class="fa fa-lock me-sm-1"></i>
                            <span class="d-sm-inline d-none">Alterar Senha</span>
                        </a>
                        </div>
                    </form>
                </li> --}}






                    </li>
                </ul>
            </div>
        </div>
</nav>
</div>



<!-- End Navbar -->
