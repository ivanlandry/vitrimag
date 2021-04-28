<footer class="site-footer">

    <a href="#top" class="smoothscroll scroll-top">
        <span class="icon-keyboard_arrow_up"></span>
    </a>

    <div class="container">
        <div class="row mb-5">
            <div class="col-6 col-md-4 mb-4 mb-md-0">
                @if(\App\Models\Category::first()!=null)
                    <h3>{{ \App\Models\Category::first()->titre }}</h3>
                    <ul class="list-unstyled">
                        @foreach (\App\Models\Category::first()->sous_categories as $sous_categorie)
                            <li><a href="{{ route('show_category',$sous_categorie) }}">{{ $sous_categorie->titre }}</a></li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="col-6 col-md-4 mb-4 mb-md-0">
                @if(\App\Models\Category::find(1)!=null)
                    <h3>{{ \App\Models\Category::find(1)->titre }}</h3>
                    <ul class="list-unstyled">
                        @foreach (\App\Models\Category::find(1)->sous_categories as $sous_categorie)
                            <li><a href="{{ route('show_category',$sous_categorie) }}">{{ $sous_categorie->titre }}</a></li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <div class="col-6 col-md-4 mb-4 mb-md-0">
                <h3>Contact</h3>
                <div class="footer-social">
                    <a href="#"><span class="icon-facebook"></span></a>
                    <a href="#"><span class="icon-twitter"></span></a>
                    <a href="#"><span class="icon-instagram"></span></a>
                    <a href="#"><span class="icon-linkedin"></span></a>
                </div>
            </div>
        </div>

    </div>
</footer>
