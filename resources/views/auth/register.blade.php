@extends('layouts.app')

@section('title')
    @parent
     creer un compte
@endsection

@section('banner_page')

    @include('partials.titre_page',['name_page'=>'S\'inscrire'])

@endsection

@section('content')

    <section class="site-section">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 offset-lg-3">
                    <h3 class="mb-4">S'inscrire</h3>

                    <form method="POST" action="{{ route('register') }}" class="p-4  border rounded">
                    @csrf

                    <!-- Name -->
                        <div class="row form-group ml-5">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black w-50" for="name" :value="__('Name')">Nom</label>
                                <input class=" w-75 form-control  @error('name') is-invalid @enderror" type="text"
                                       name="name"
                                       :value="old('name')" required autofocus
                                       placeholder="Nom">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Email Address -->
                        <div class="row form-group ml-5">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black w-50" for="email" :value="__('Email')">Adresse Email</label>
                                <input class=" w-75 form-control  @error('email') is-invalid @enderror" type="email"
                                       name="email"
                                       :value="old('email')" required autofocus
                                       placeholder="Email address">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- numero phone -->
                        <div class="row form-group ml-5">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black w-50" for="phone" :value="__('Phone')">Numero d
                                    telephone</label>
                                <input class=" w-75 form-control  @error('phone') is-invalid @enderror" type="tel"
                                       name="phone"
                                       :value="old('phone')" required autofocus
                                       placeholder="Numero de telephone">
                                @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="row form-group mb-4 ml-5">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black w-50" for="password" :value="__('Password')">Mot de
                                    Passe</label>
                                <input class="w-75 form-control @error('password') is-invalid @enderror" type="password"
                                       name="password" required
                                       autocomplete="current-password"
                                       placeholder="Mot de passe">
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Confirm Password -->

                        <div class="row form-group mb-4 ml-5">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black w-50" for="password_confirmation"
                                       :value="__('Confirm Password')">Confirmer le mot de
                                    Passe</label>
                                <input class="w-75 form-control" id="password_confirmation" type="password"
                                       name="password_confirmation" placeholder="confirmer le mot de passe" required>

                            </div>
                        </div>

                        <div class="row form-group mb-4 ml-5">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <input type="submit" value="Se connecter" class="btn px-4 btn-primary text-white w-75 ">
                            </div>
                        </div>


                        <div class="text-center mt-3">
                            @if (Route::has('password.request'))
                                <a class=""
                                   href="{{ route('login') }}">
                                    {{ __('Vous avez déja un compte?') }}
                                </a>
                            @endif
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>


@endsection
