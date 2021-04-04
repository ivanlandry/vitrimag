@extends('pages.annonces')

@section('search')

    @if(count($annonces)==0)
        <h3>Not found</h3>
    @else
        @parent
    @endif

@endsection
