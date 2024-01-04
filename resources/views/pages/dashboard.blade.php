@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Home'])
        @include('layouts.footers.auth.footer')
   
@endsection
<script src="{{asset('assets/js/plugins/chartjs.min.js')}}"></script>
@push('js')
   
@endpush
