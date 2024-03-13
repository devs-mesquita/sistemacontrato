@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
<link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"/>
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Usuarios'])
  <div class="card">
       <div class="card-body">
<table id="scc" class="display">
    <div>
    
        <ul class="nav navbar-right panel_toolbox">
            @if (Auth::user()->nivel == 'SUPERADMIN'|| Auth::user()->nivel == 'ADMIN')
        <a href="{{url('setor/create')}}" class="btn btn-primary btn-md  ms-auto" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Nova Sala">Cadastrar Setor </a> 
   @endif

        <thead>
       
            <tr>
                <th>Nome do Setor </th>
                <th>Ações </th>
                
            </tr>
            </thead>

            @foreach ($setores as $setor)
              <tr>
              <td>{{$setor->nome}}</td>         
              <td class="text-center">
                @if (Auth::user()->nivel == 'SUPERADMIN'|| Auth::user()->nivel == 'ADMIN')
                        <a id="btn_exclui_setor" style="margin: 4;"
                        href="#"
                        data-excluir='{{$setor->id}}'
                        title="Excluir">
                        <i class="fa fa-trash" ></i> 
                    </a>
            </td>     
           @endif
            </tr>

        @endforeach
      </ul>
    </div>

</table>
    
</div>
  </div>
    
    
</table>
  
    @include('layouts.footers.auth.footer')
    @endsection
            
    @push('js')
      
      <script src="//code.jquery.com/jquery-3.7.1.min.js"></script>
      <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>   
      <script>var table = new DataTable('#scc', {
      language: {
          url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json',
      },  
  }); </script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
$("table#scc").on("click", "#btn_exclui_setor" ,function(){
let id = $(this).data('excluir');
     // console.log(id);
     let btn = $(this);
        Swal.fire({
                    title: 'Você tem certeza que deseja excluir o setor?',
                    text: "Você não poderá reverter isso!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, exclua isso!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        console.log(id);
                        $.post("{{ url('/setor')}}/" + id, {
                            id: id,
                            _method: "DELETE",
                            _token:"{{csrf_token()}}"
                            }).done(function() {
                                location.reload();
                            });
                    }
                 })             
});
</script> 
     

 

@endpush