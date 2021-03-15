 @extends('layouts.app')

 @section('content')

     <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section">
         <div class="container">
             <div class="row">
                 <div class="col-md-7">
                     <h1 class="text-white font-weight-bold">{{ $annonce->titre }}</h1>
                     <div class="custom-breadcrumbs">
                         <a href="{{route('home')}}">Accueil</a> <span class="mx-2 slash">/</span>
                         <a href="{{ route('all_annonce') }}">Annonces</a> <span class="mx-2 slash">/</span>
                         <span class="text-white"><strong>{{ $annonce->titre }}</strong></span>
                     </div>
                 </div>
             </div>
         </div>
     </section>


     <section class="site-section">
         <div class="container">
             <div class="row align-items-center mb-5">
                 <div class="col-lg-8 mb-4 mb-lg-0">
                     <div class="d-flex align-items-center">

                         <div>
                             <h2>{{ $annonce->titre }}</h2>

                         </div>
                     </div>
                 </div>
                 <div class="col-lg-4">
                     <div class="row">
                         <div class="col-6">
                             <a href="#" class="btn btn-block btn-light btn-md"><span class="icon-heart-o mr-2 text-danger"></span>favoris</a>
                         </div>
                         <div class="col-6">
                             <a href="#" class="btn btn-block btn-primary btn-md">Contacter par email</a>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-lg-8">
                     <div class="mb-5">
                         <figure class="mb-5">
                             <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                 <ol class="carousel-indicators">
                                     <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                     <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                     <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                 </ol>
                                 <div class="carousel-inner">
                                     <div class="carousel-item active">
                                         <img src="{{ asset('storage/'.$annonce->img_1) }}" alt="Image" class="img-fluid rounded" style="width: 800px; height: 300px;">
                                     </div>
                                     <div class="carousel-item">
                                         <img src="{{ asset('storage/'.$annonce->img_2) }}" alt="Image" class="img-fluid rounded"   style="width: 800px; height: 300px;">
                                     </div>
                                     <div class="carousel-item">
                                         <img src="{{ asset('storage/'.$annonce->img_3) }}" alt="Image" class="img-fluid rounded"   style="width: 800px; height: 300px;">
                                     </div>
                                 </div>
                                 <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                     <span class="sr-only">Previous</span>
                                 </a>
                                 <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                     <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                     <span class="sr-only">Next</span>
                                 </a>
                             </div>
                         </figure>
                         <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-align-left mr-3"></span>Description</h3>
                         <p>{{ $annonce->description }}</p>

                     </div>

                     <div class="row mb-5">
                         <div class="col-6">
                             <a href="#" class="btn btn-block btn-light btn-md"><span class="icon-heart-o mr-2 text-danger"></span>Save Job</a>
                         </div>
                         <div class="col-6">
                             <a href="#" class="btn btn-block btn-primary btn-md">Contacter par email</a>
                         </div>
                     </div>

                 </div>
                 <div class="col-lg-4">
                     <div class="bg-light p-3 border rounded mb-4">
                         <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Details</h3>
                         <ul class="list-unstyled pl-3 mb-0">
                             <li class="mb-2"><strong class="text-black">Postée le:</strong> {{ $annonce->created_at->format('d/m/Y à H:m') }}</li>
                             <li class="mb-2"><strong class="text-black">Catégorie:</strong> {{ $annonce->sous_category->titre }}</li>
                             <li class="mb-2"><strong class="text-black">Ville:</strong> {{ $annonce->ville }}</li>
                             <li class="mb-2"><strong class="text-black">Prix:</strong> {{$annonce->prix}} FCFA</li>

                         </ul>
                     </div>

                     <div class="bg-light p-3 border rounded">
                         <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Partager</h3>
                         <div class="px-3">
                             <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
                             <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                             <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                             <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-pinterest"></span></a>
                         </div>
                     </div>

                 </div>
             </div>
         </div>
     </section>

     <section class="site-section" id="next">
         <div class="container">

             <div class="row mb-5 justify-content-center">
                 <div class="col-md-7 text-center">
                     <h2 class="section-title mb-2">Annonces similaires</h2>
                 </div>
             </div>

             <ul class="job-listings mb-5">
                @foreach($annonces_similaires as $annonce_similaire)
                     <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                         <a href="{{ route('show_annonce',$annonce_similaire) }}"></a>
                         <div class="job-listing-logo">
                             <img src="{{ asset('storage/'.$annonce_similaire->img_1) }}"
                                  alt="Free Website Template by Free-Template.co"
                                  class="img-fluid" style="width: 100px; height: 100px;">
                         </div>

                         <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                             <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                                 <h2>{{$annonce_similaire->titre}}</h2>
                                 <strong>{{ $annonce_similaire->sous_category->titre }}</strong>
                             </div>
                             <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                                 <span class="icon-room"></span> {{ $annonce_similaire->ville }}
                             </div>
                             <div class="job-listing-meta">
                                 <span class="badge badge-danger">postée le {{ $annonce_similaire->created_at->format('d/m/Y à H:m') }}</span>
                             </div>
                         </div>
                     </li>
                 @endforeach

             </ul>

             <div class="row pagination-wrap">
                 <div class="col-md-6 text-center text-md-left mb-4 mb-md-0">
                     <span>Showing 1-7 Of 22,392 Jobs</span>
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
