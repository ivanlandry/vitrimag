@extends('pages.annonces')

@section('banner_page')
    @include('partials.titre_page',['name_page'=>$sous_category->category->titre.'/'.$sous_category->titre])
@endsection
