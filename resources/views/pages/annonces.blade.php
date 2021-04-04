@extends('layouts.app')

@section('title')
    @parent
    | toutes les annonces
@endsection
@section('banner_page')

    @include('partials.search_bar')

@endsection


@section('content')
@section('search')
    <section class="site-section">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-md-7">
                    <h2 class="section-title mb-2">Toutes les annonces</h2>
                </div>
                <div class="col-md-2 offset-md-3">
                    <h6>Filtrer par :
                        <a href="{{ route('annonce.filter','date') }}" style="text-decoration: none; "
                           id="filter_date">Date</a>
                        <a href="{{ route('annonce.filter','prix') }}" style="text-decoration: none;" id="filter_prix">
                            | Prix</a>
                    </h6>
                </div>
            </div>

            @include('partials.list_annonce')

        </div>
    </section>
@show
@endsection

@section('extra-script')
    <script !src="">

        let sort = "{{ $sort }}";

        if (sort == "prix") {
            $("#filter_prix").css('color', 'black');
        } else if (sort == "date") {
            $("#filter_date").css('color', 'black');
        }

    </script>
@endsection
