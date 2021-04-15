@extends('layouts.app')

@section('banner_page')

    @include('partials.search_bar')

@endsection

@section('content')


    <section class="site-section">

        <div class="container">

            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="section-title mb-2">Decouvrez nos catégories</h2>
                </div>
            </div>

            <div class="row">
                @foreach($categories as $categorie)
                    <div class=" col-md-3" >
                        <img src="{{ asset('storage/'.$categorie->image) }}" class="card-img-top" alt="" width="10" height="180">
                        <div class="card-body">
                            <h5 class="card-title"><a href="#" onclick="event.preventDefault();" class="text-dark" style="text-decoration: none;"><strong>{{ $categorie->titre }}</strong></a></h5>
                            @foreach( $categorie->sous_categories as $sous_categorie)
                                <p class="card-text"><a href="{{ route('show_category',$sous_categorie) }}" class="text-dark" style="text-decoration: none;">{{ $sous_categorie->titre}}</a></p>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="section-title mb-2">Annonces récentes</h2>
                </div>
            </div>

           @include('partials.list_annonce')

        </div>
    </section>

@endsection

