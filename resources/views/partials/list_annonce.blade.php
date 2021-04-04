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
                    <span class="badge badge-danger">postée {{$annonce->created_at->diffForHumans() }}</span>
                </div>
            </div>
        </li>
    @endforeach
</ul>
