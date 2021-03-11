@extends('layouts.app')

@section('title')
    @parent

@endsection

@section('content')

@endsection

@section('extra-script')
    <script !src="">
        @if(session()->get('message_auth'))
        toastr.success('{{ session()->get('message_auth') }}');
        @endif
    </script>
@endsection
