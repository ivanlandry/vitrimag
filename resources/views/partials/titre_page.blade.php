<section class="section-hero overlay inner-page bg-image" style="background-image: url('{{\App\Models\Setting::first()==null? ' asset("images/hero_1.jpg")' : asset('storage/'.\App\Models\Setting::first()->banner_home) }}');");"
         id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">{{ $name_page }}</h1>
                <div class="custom-breadcrumbs">
                    <a href="{{ route('home') }}">Accueil</a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>{{ $name_page }}</strong></span>
                </div>
            </div>
        </div>
    </div>
</section>
