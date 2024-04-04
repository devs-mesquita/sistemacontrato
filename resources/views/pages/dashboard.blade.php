@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
<link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Contratos'])
    <div class="card">
        <div class="card-body">
            <iframe
                src="{{$iframeUrl}}"
                frameborder="0"
                width="100%"
                height="1000"
                allowtransparency>
            </iframe>
        </div>
    </div>
    @include('layouts.footers.auth.footer')
@endsection

@push('js')

@endpush

