@extends('layouts.app')

@section('title')
    @parent
    | toutes les annonces
@endsection
@section('banner_page')

    @include('partials.titre_page',['name_page'=>'Toutes les annonces'])

@endsection


@section('content')

    <section class="site-section">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-md-7">
                    <h2 class="section-title mb-2">Toutes les annonces</h2>
                </div>
                <div class="col-md-5">
                    <h6>Filtrer par :
                        <a href="" style="text-decoration: none; color: black;"
                           id="tout_annonce">Date</a>
                        <a href="" style="text-decoration: none;" id="annonce_attente">
                          | Prix</a>
                    </h6>
                </div>
            </div>

            <ul class="job-listings mb-5">
                @foreach($annonces as $annonce)
                    <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                        <a href="{{ route('show_annonce',$annonce) }}"></a>
                        <div class="job-listing-logo">
                            <img src="{{ asset('storage/'.$annonce->img_1) }}"
                                 alt="Free Website Template by Free-Template.co"
                                 class="img-fluid" style="width: 320px; height: 170px;">
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
                                <span
                                    class="badge badge-danger">postée {{ $annonce->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>


        </div>
    </section>

@endsection