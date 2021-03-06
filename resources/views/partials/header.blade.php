<header class="site-navbar mt-3">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="site-logo col-6"><a href="{{route('home')}}">VitriMag</a></div>

            <nav class="mx-auto site-navigation">
                <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
                    <li><a href="{{ route('all_annonce') }}" onclick="window.location.href=this.getAttribute('href');"
                           class="nav-link active">Anonces</a></li>


                    <li><a href="contact.html">Contact</a></li>
                    <li class="has-children">
                        <a href="#"><span
                                class="mr-2 icon-lock_outline"> Mon compte</span></a>
                        <ul class="dropdown">
                            @auth
                                <li><a href="{{route('dashboard')}}"
                                       onclick="window.location.href=this.getAttribute('href');">tableau de bord</a>
                                </li>
                                <li><a href="#"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <span class="mr-2"></span>deconnexion</a>
                                </li>
                                <form action="{{ route('logout') }}" method="post" id="logout-form">
                                    @csrf
                                </form>
                            @endauth
                            @guest
                                <li><a href="{{route('login')}}"
                                       onclick="window.location.href=this.getAttribute('href');">Connexion</a></li>
                                <li><a href="{{ route('register') }}"
                                       onclick="window.location.href=this.getAttribute('href');">Creer un compte</a>
                                </li>
                            @endguest
                        </ul>
                    </li>

                    <li class="d-lg-none">
                        <a href="{{ route('add_annonce_get') }}"
                           onclick="window.location.href=this.getAttribute('href');"><span class="mr-2">+</span> Poster
                            une annonce</a>
                    </li>

                </ul>
            </nav>

            <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
                <div class="ml-auto">
                    <a href="{{ route('add_annonce_get') }}"
                       class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"
                       class="btn btn-outline-white border-width-2 "><span
                            class="mr-2 icon-add"></span>Poster une annonce</a>

                </div>
                <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span
                        class="icon-menu h3 m-0 p-0 mt-2"></span></a>
            </div>
        </div>
    </div>
</header>
