@extends('layouts.app')

@section('title')
    @parent
    nouvelle annonce
@endsection

@section('banner_page')

    @include('partials.titre_page',['name_page'=>'Nouvelle annonce'])

@endsection



@section('content')

    <section class="site-section">
        <div class="container">

            <div class="row align-items-center mb-5">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <div class="d-flex align-items-center">
                        <div>
                            <h2>Nouvelle annonce</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-6 offset-5">
                            <a href="#" class="btn btn-block btn-primary btn-md">Sauvegarder</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-lg-12">
                    <form class="p-4 p-md-5 border rounded" method="post" action="{{ route('add_annonce_post') }}"
                          enctype="multipart/form-data">
                        @csrf
                        <h4 class="text-black mb-5 border-bottom pb-2">Catégorie et ville</h4>

                        <div class="form-group">
                            <label for="job-region">Ville</label>
                            <select class="selectpicker border rounded" id="job-region" data-style="btn-black"
                                    data-width="100%" data-live-search="true" title="choisir une ville" name="ville"
                                    required>
                                @foreach($villes as $ville)
                                    <option value="{{$ville}}">{{$ville}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="job-region">Catégorie</label>
                            <select class="selectpicker border rounded" id="job-region" data-style="btn-black"
                                    data-width="100%" data-live-search="true" title="choisir une categorie"
                                    name="categorie" required>
                                <option>Anywhere</option>
                                <option>San Francisco</option>
                                <option>Palo Alto</option>
                                <option>New York</option>
                                <option>Manhattan</option>
                                <option>Ontario</option>
                                <option>Toronto</option>
                                <option>Kansas</option>
                                <option>Mountain View</option>
                            </select>
                        </div>

                        <h4 class="text-black mb-5 border-bottom pb-2">Détails de l'annonce</h4>
                        <div class="form-group">
                            <label for="job-title">Titre</label>
                            <input type="text" class="form-control" id="titre" placeholder="Titre" name="titre"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="job-location">Prix</label>
                            <input type="number" class="form-control" id="job-location" placeholder="FCFA" name="prix"
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="job-description">Description</label>
                            <textarea class="form-control" name="description" rows="5"
                                      placeholder="Description- Donnez plus de détails possible sur votre aticle"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="company-website-tw d-block">Choisir des photos</label> <br>
                            <input class=" form-control" type="file" name="img1"><br>
                            <input class=" form-control" type="file" name="img2"><br>
                            <input class=" form-control" type="file" name="img3">
                        </div>

                        <div class="row align-items-center mb-5">
                            <div class="col-lg-4 ml-auto">
                                <div class="row">
                                    <div class="col-6 offset-5">
                                        <button type="submit" id="ff" class="btn btn-block btn-primary btn-md">
                                            Sauvegarder
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </section>

@endsection

