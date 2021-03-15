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
                    <div class=" col-md-3" style="width: 15rem;">
                        <img src="{{ asset('storage/'.$categorie->image) }}" class="card-img-top" alt="" width="10" height="180">
                        <div class="card-body">
                            <h5 class="card-title"><a href="#" class="text-dark" style="text-decoration: none;"><strong>{{ $categorie->titre }}</strong></a></h5>
                            @foreach( $categorie->sous_categories as $sous_categorie)
                                <p class="card-text"><a href="" class="text-dark" style="text-decoration: none;">{{ $sous_categorie->titre}}</a></p>
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

            <ul class="job-listings mb-5">
                @foreach($annonces as $annonce)
                    <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                        <a href="{{ route('show_annonce',$annonce) }}"></a>
                        <div class="job-listing-logo">
                            <img src="{{ asset('storage/'.$annonce->img_1) }}"
                                 alt="Free Website Template by Free-Template.co"
                                 class="img-fluid" style="width: 100px; height: 100px;">
                        </div>

                        <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                            <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                                <h2>{{$annonce->titre}}</h2>
                                <strong>{{ $annonce->sous_category->titre }}</strong>
                            </div>
                            <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                                <span class="icon-room"></span> {{ $annonce->ville }}
                            </div>
                            <div class="job-listing-meta">
                                <span class="badge badge-danger">publié le {{ $annonce->created_at }}</span>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>

            <div class="row pagination-wrap">
                <div class="col-md-6 text-center text-md-left mb-4 mb-md-0">
                    <span>Showing 1-7 Of 43,167 Jobs</span>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <div class="custom-pagination ml-auto">
                        <a href="#" class="prev">Prev</a>
                        <div class="d-inline-block">
                            <a href="#" class="active">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#">4</a>
                        </div>
                        <a href="#" class="next">Next</a>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection

