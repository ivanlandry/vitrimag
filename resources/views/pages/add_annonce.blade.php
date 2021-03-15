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
                            <label for="categorie">Catégorie</label>
                            <select class="selectpicker border rounded" id="categorie" data-style="btn-black"
                                    data-width="100%" data-live-search="true" title="choisir une categorie"
                                    required>
                                @foreach($categories as $categorie)
                                    <option value="{{ $categorie->id }}">{{ $categorie->titre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="sous_categories">Sous catégorie</label>
                            <select class="form-control border rounded" id="sous_categories"
                                    data-width="100%" data-live-search="true" title="choisir une sous categorie"
                                    name="sous_category_id" required>

                            </select>
                        </div>

                        <h4 class="text-black mb-5 border-bottom pb-2">Détails de l'annonce</h4>
                        <div class="form-group">
                            <label for="job-title">Titre</label>
                            <input type="text" class="form-control @error('titre') is-invalid @enderror" id="titre"
                                   placeholder="Titre" name="titre"
                                   required>
                            @error('titre')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="job-location">Prix</label>
                            <input type="number" class="form-control @error('prix') is-invalid @enderror"
                                   id="job-location" placeholder="FCFA" name="prix"
                                   required>
                            @error('prix')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="job-description">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                                      rows="5"
                                      placeholder="Description- Donnez plus de détails possible sur votre aticle"></textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="company-website-tw d-block">Choisir des photos</label> <br>
                            <input class=" form-control-file @error('img_1') is-invalid @enderror" type="file" name="img_1"
                                   required>
                            @error('img1')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror<br>
                            <input class=" form-control-file @error('img_2') is-invalid @enderror" type="file" name="img_2">
                            @error('img2')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror<br>
                            <input class=" form-control-file @error('img_3') is-invalid @enderror" type="file" name="img_3">
                            @error('img3')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row align-items-center mb-5">
                            <div class="col-lg-4 ml-auto">
                                <div class="row">
                                    <div class="col-6 offset-5">
                                        <button type="submit" id="ff" class="btn btn-block btn-primary">
                                            Creer l'annonce
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
@section('extra-script')
    <script !src="">

        $(function () {

            $('#categorie').change(function () {

                $.ajax({
                    method: 'POST',
                    url: '{{ route('getSousCategorie') }}',
                    data: {
                        'id_categorie': $('#categorie option:selected').attr('value'),
                        '_token': '{{ csrf_token() }}'
                    }
                })
                    .done((data) => {
                        $('#sous_categories').empty();
                        data.forEach(item => $('#sous_categories').append(`<option value="${item.id}">${item.titre}</option>`));
                    })
                    .fail((error) => {
                        console.log(error);
                    });
            });

            @if(session()->get('message_add_annonce'))
            toastr.success('{{ session()->get('message_add_annonce') }}');
            @endif
        });


    </script>
@endsection
