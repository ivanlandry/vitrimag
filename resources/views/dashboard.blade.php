@extends('layouts.app')

@section('title')
    @parent
    tableau de bord
@endsection

@section('banner_page')
    @include('partials.titre_page',['name_page'=>'Mon compte'])

@endsection
@section('content')
    <section class="site-section mb-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="card card-primary card-tabs">

                        <div class="card-header p-0 pt-1">
                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-one-a-annonce-tab" data-toggle="pill"
                                       href="#custom-tabs-one-a-annonce" role="tab"
                                       aria-controls="custom-tabs-one-annonce"
                                       aria-selected="true">Mes annonces ({{ count($annonces) }})</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-favoris-tab" data-toggle="pill"
                                       href="#custom-tabs-one-favoris"
                                       role="tab" aria-controls="custom-tabs-one-favoris" aria-selected="false">Mes
                                        favoris</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-parametre-tab" data-toggle="pill"
                                       href="#custom-tabs-one-parametre" role="tab"
                                       aria-controls="custom-tabs-one-parametre"
                                       aria-selected="false">Paramètres</a>
                                </li>

                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-one-a-annonce" role="tabpanel"
                                     aria-labelledby="custom-tabs-one-a-annonce-tab">

                                    <ul class="job-listings mb-5" id="list_annonce">
                                        <h6>Filtrer par :
                                            <a href="" style="text-decoration: none; color: black;" id="tout_annonce">tout</a>
                                            <a href="" style="text-decoration: none;" id="annonce_attente"> | en
                                                attente</a>
                                            <a href="" style="text-decoration: none;" id="annonce_publie"> | publié</a>
                                        </h6>
                                        @foreach($annonces as $annonce)
                                            <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                                                <div class="job-listing-logo">
                                                    <img src="{{ asset('storage/'.$annonce->img_1) }}"
                                                         alt="Free Website Template by Free-Template.co"
                                                         class="img-fluid" style="width: 320px; height: 170px;">
                                                </div>

                                                <div
                                                    class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                                                    <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                                                        <h2>{{$annonce->titre}}</h2>
                                                        <strong>{{ $annonce->sous_category->titre }}
                                                            , {{ $annonce->ville }}</strong><br>
                                                        <span> {{ $annonce->created_at->format('d/m/Y à H:m') }}</span>
                                                    </div>
                                                    <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                                                        <strong>  {{ $annonce->prix }} FCFA </strong><br><br>
                                                        <span> 0 vus </span>
                                                    </div>
                                                    <div class="job-listing-meta">
                                                        <form action="{{ route('delete_annonce',$annonce->id) }}"
                                                              method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                    class="btn btn-outline-danger">supprimer
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>

                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-favoris" role="tabpanel"
                                     aria-labelledby="custom-tabs-one-favoris-tab">
                                    Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra
                                    purus ut
                                    ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur
                                    adipiscing

                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-parametre" role="tabpanel"
                                     aria-labelledby="custom-tabs-one-parametre-tab">

                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="card card-danger">
                                                <div class="card-header">
                                                    <div>
                                                        <h6 class="card-title float-left">Informations</h6>
                                                        <a id="update_info" href="" class="float-right"
                                                           style="text-decoration: none">modifier</a>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <form action="{{ route('update_user',Auth::user()->id) }}"
                                                          method="post" id="form-update-info">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label>Votre nom</label>
                                                            <div class="input-group">
                                                                <input required type="text" class="form-control update-info"
                                                                       disabled
                                                                       value="{{Auth::user()->name}}" name="name">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Numero de téléphone</label>
                                                            <div class="input-group">
                                                                <input required type="text" class="form-control update-info"
                                                                       disabled
                                                                       value="{{Auth::user()->phone}}" name="phone">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Adresse email</label>

                                                            <div class="input-group">
                                                                <input required type="email" class="form-control update-info"
                                                                       disabled
                                                                       value="{{Auth::user()->email}}" name="email">
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-primary" type="submit"
                                                                style="display: none;">modifier
                                                        </button>
                                                    </form>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card card-danger">
                                                <div class="card-header">
                                                    <div>
                                                        <h6 class="card-title float-left">Mot de passe</h6>
                                                        <a id="update_password" href="" class="float-right"
                                                           style="text-decoration:none;">modifier</a>
                                                    </div>
                                                </div>

                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <form action="{{ route('update_user',Auth::user()->id) }}" method="post" id="form-update-password">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group">
                                                                <label>Ancien mot de passe</label>

                                                                <input type="password" class="form-control" required
                                                                        name="ancien_password" >
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Nouveau mot de passe</label>
                                                                <input type="password" class="form-control"
                                                                       name="nouveau_password" required>
                                                            </div>

                                                            <button class="btn btn-primary">modifier</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('extra-script')
    <script !src="">


        $(function () {


            @if(session()->get('message_auth'))
            toastr.success('{{ session()->get('message_auth') }}');
            @endif

            @if(session()->get('update_compte'))
            toastr.success('{{ session()->get('update_compte') }}');
            @endif


            /* --------      script annonce ---------------------- */

            $('#tout_annonce').on('click', function () {

                window.location.reload();
            });

            $('#annonce_publie').on('click', function (e) {

                e.preventDefault();

                $('#annonce_publie').css('color', 'black');
                $('#annonce_attente, #tout_annonce').css('color', '#89BA16');

                $('.job-listing').remove();

                @foreach($annonces as $annonce)
                @if($annonce->publie==true)
                $('#list_annonce').append("<li class=\"job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center\">\n" +
                    "                                                <div class=\"job-listing-logo\">\n" +
                    "                                                    <img src=\"{{ asset('storage/'.$annonce->img_1) }}\"\n" +
                    "                                                         alt=\"Free Website Template by Free-Template.co\"\n" +
                    "                                                         class=\"img-fluid\" style=\"width: 320px; height: 170px;\">\n" +
                    "                                                </div>\n" +
                    "\n" +
                    "                                                <div\n" +
                    "                                                    class=\"job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4\">\n" +
                    "                                                    <div class=\"job-listing-position custom-width w-50 mb-3 mb-sm-0\">\n" +
                    "                                                        <h2>{{$annonce->titre}}</h2>\n" +
                    "                                                        <strong>{{ $annonce->sous_category->titre }}\n" +
                    "                                                            , {{ $annonce->ville }}</strong><br>\n" +
                    "                                                        <span> {{ $annonce->created_at->format('d/m/Y à H:m') }}</span>\n" +
                    "                                                    </div>\n" +
                    "                                                    <div class=\"job-listing-location mb-3 mb-sm-0 custom-width w-25\">\n" +
                    "                                                        <strong>  {{ $annonce->prix }} FCFA </strong><br><br>\n" +
                    "                                                        <span> 0 vus </span>\n" +
                    "                                                    </div>\n" +
                    "                                                    <div class=\"job-listing-meta\">\n" +
                    "                                                        <form action=\"{{ route('delete_annonce',$annonce->id) }}\"\n" +
                    "                                                              method=\"post\">\n" +
                    '                                                             @csrf \n' +
                    '                                                             @method('DELETE')\n' +
                    "                                                            <button type=\"submit\"\n" +
                    "                                                                    class=\"btn btn-outline-danger\">supprimer\n" +
                    "                                                            </button>\n" +
                    "                                                        </form>\n" +
                    "                                                    </div>\n" +
                    "                                                </div>\n" +
                    "                                            </li>");
                @endif
                @endforeach

            });

            $('#annonce_attente').on('click', function (e) {

                e.preventDefault();

                $('#annonce_attente').css('color', 'black');
                $('#annonce_publie, #tout_annonce').css('color', '#89BA16');

                $('.job-listing').remove();

                @foreach($annonces as $annonce)
                @if($annonce->publie==false)
                $('#list_annonce').append("<li class=\"job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center\">\n" +
                    "                                                <div class=\"job-listing-logo\">\n" +
                    "                                                    <img src=\"{{ asset('storage/'.$annonce->img_1) }}\"\n" +
                    "                                                         alt=\"Free Website Template by Free-Template.co\"\n" +
                    "                                                         class=\"img-fluid\" style=\"width: 320px; height: 170px;\">\n" +
                    "                                                </div>\n" +
                    "\n" +
                    "                                                <div\n" +
                    "                                                    class=\"job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4\">\n" +
                    "                                                    <div class=\"job-listing-position custom-width w-50 mb-3 mb-sm-0\">\n" +
                    "                                                        <h2>{{$annonce->titre}}</h2>\n" +
                    "                                                        <strong>{{ $annonce->sous_category->titre }}\n" +
                    "                                                            , {{ $annonce->ville }}</strong><br>\n" +
                    "                                                        <span> {{ $annonce->created_at->format('d/m/Y à H:m') }}</span>\n" +
                    "                                                    </div>\n" +
                    "                                                    <div class=\"job-listing-location mb-3 mb-sm-0 custom-width w-25\">\n" +
                    "                                                        <strong>  {{ $annonce->prix }} FCFA </strong><br><br>\n" +
                    "                                                        <span> 0 vus </span>\n" +
                    "                                                    </div>\n" +
                    "                                                    <div class=\"job-listing-meta\">\n" +
                    "                                                        <form action=\"{{ route('delete_annonce',$annonce->id) }}\"\n" +
                    "                                                              method=\"post\">\n" +
                    '                                                             @csrf \n' +
                    '                                                             @method('DELETE')\n' +
                    "                                                            <button type=\"submit\"\n" +
                    "                                                                    class=\"btn btn-outline-danger\">supprimer\n" +
                    "                                                            </button>\n" +
                    "                                                        </form>\n" +
                    "                                                    </div>\n" +
                    "                                                </div>\n" +
                    "                                            </li>");
                @endif
                @endforeach

            });

            /* --------      script parametres ---------------------- */

            $('#update_info').on('click', function (e) {

                e.preventDefault();

                $('.update-info').attr('disabled', false);

                $('#form-update-info').children('button').show();

            });

        });

    </script>
@endsection
