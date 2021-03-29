<section class="home-section section-hero overlay bg-image" style="background-image: url('images/hero_1.jpg');"
         id="home-section">

    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12">
                <div class="mb-3 text-center">
                    <h1 class="text-white font-weight-bold">The Easiest Way To Get Your Dream Job</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate est, consequuntur
                        perferendis.</p>
                </div>
                <form method="get" class="search-jobs-form">
                    <div class="row mb-5">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <input type="text" class="form-control form-control-lg" name="contenu" placeholder="tapez votre recherche">
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <select class="selectpicker" data-style="btn-white btn-lg" data-width="100%"
                                    data-live-search="true" title="ville" name="ville">
                                <option>Anywhere</option>

                            </select>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <select class="form-control" title="categorie" name="sous_categorie">
                               @foreach($categories as $categorie)
                                   <optgroup label="{{ $categorie->titre }}">{{ $categorie->titre }}</optgroup>
                                   @foreach($categorie->sous_categories as $sous_categorie)
                                        <option>{{ $sous_categorie->titre }}</option>
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <button type="submit" class="btn btn-primary btn-lg btn-block text-white btn-search"><span
                                    class="icon-search icon mr-2"></span>rechercher
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <a href="#next" class="scroll-button smoothscroll">
        <span class=" icon-keyboard_arrow_down"></span>
    </a>

</section>

<br>
