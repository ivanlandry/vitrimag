@extends('layouts.app')

@section('title')
    @parent
    se connecter
@endsection


@section('banner_page')

    @include('partials.titre_page',['name_page'=>'Se connecter'])

@endsection

@section('content')


    <section class="site-section">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 offset-lg-3">
                    <h3 class="mb-4">Se connecter</h3>
                    <form method="POST" action="{{ route('login') }}" class="p-4  border rounded">
                        @csrf
                        <div class="row form-group ml-5">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black w-50" for="email" :value="__('Email')">Adresse Email</label>
                                <input class=" w-75 form-control  @error('email') is-invalid @enderror" type="email"
                                       name="email" :value="old('email')" required autofocus
                                       placeholder="Email address">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group mb-4 ml-5">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black w-50" for="password" :value="__('Password')">Mot de
                                    Passe</label>
                                <input class="w-75 form-control @error('email') is-invalid @enderror" type="password"
                                       name="password" required
                                       autocomplete="current-password"
                                       placeholder="Password">
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="block ml-5">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox"
                                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                       name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Se souvenir de moi') }}</span>
                            </label>
                        </div>

                        <div class="row form-group mb-4 ml-5">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <input type="submit" value="Se connecter" class="btn px-4 btn-primary text-white w-75 ">
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            @if (Route::has('password.request'))
                                <a class=""
                                   href="{{ route('password.request') }}">
                                    {{ __('Mot de passe oublié?') }}
                                </a>
                            @endif
                        </div>
                        <div class="text-center mt-3">
                            @if (Route::has('password.request'))
                                <a class=""
                                   href="{{ route('register') }}">
                                    {{ __('Pas encore inscrit?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


@endsection
