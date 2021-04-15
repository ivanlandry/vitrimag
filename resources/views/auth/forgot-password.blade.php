@extends('layouts.app')


@section('title')
    @parent
    Renitialiser son mot de passe
@endsection


@section('banner_page')

    @include('partials.titre_page',['name_page'=>'Renitialiser son mot de passe'])

@endsection

@section('content')

    <br><br>

    <section class="site-section">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 offset-lg-3 ">
                    <h3 class="mb-4">Renitialiser son mot de passe</h3>
                    <form method="POST" action="{{ route('password.email') }}" class="p-4  border rounded">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black" for="email" :value="__('Email')">Adresse Email</label>

                                <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />

                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <button type="submit" value="Se connecter" class="btn px-4 btn-primary text-white w-100 ">
                                    {{ __('Email Password Reset Link') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>



@endsection
