<header class="site-navbar mt-3">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="site-logo col-6"><a href="{{route('home')}}">VitriMag</a></div>

            <nav class="mx-auto site-navigation">
                <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
                    <li><a href="index.html" class="nav-link active">Anonces</a></li>

                    <li class="has-children">
                        <a href="#">Catégories</a>
                        <ul class="dropdown">
                            <li><a href="#">Job Single</a></li>
                            <li><a href="#">Post a Job</a></li>
                        </ul>
                    </li>

                    <li><a href="contact.html">Contact</a></li>
                    <a href="{{ route('add_annonce_get') }}"
                       class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><span
                            class="mr-2 icon-add"></span>Poster une annonce</a>

                    <li class="d-lg-none"><a href="{{ route('add_annonce_get') }}"><span class="mr-2">+</span> Poster
                            une annonce</a>
                    </li>
                    <li class="d-lg-none"><a href="{{ route('register') }}">S'inscrire</a></li>
                    <li class="d-lg-none"><a href="{{ route('login') }}">Connexion</a></li>
                </ul>
            </nav>

            <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
                <div class="ml-auto">
                    @auth
                        <a href="#" class="btn btn-primary border-width-2 d-none d-lg-inline-block"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span class="mr-2"></span>deconnexion</a>
                        <form action="{{ route('logout') }}" method="post" id="logout-form">
                            @csrf
                        </form>
                    @endauth
                    @guest
                        <a href="{{ route('register') }}"
                           class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span
                                class="mr-2 icon-lock_outline"></span>S'inscrire</a>
                        <a href="{{ route('login') }}"
                           class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span
                                class="mr-2 icon-lock_outline"></span>Connexion</a>
                    @endguest
                </div>
                <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span
                        class="icon-menu h3 m-0 p-0 mt-2"></span></a>
            </div>

        </div>
    </div>
</header>
