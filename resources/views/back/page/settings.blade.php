@extends('back.app')

@section('content')

    <div class="col-md-12 col-sm-12">
        <div class="card card-primary card-tabs">

            <div class="card-title pt-3">
                <h3>Paramètres du site</h3>
            </div>

            <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-one-a-favicon-tab" data-toggle="pill"
                           href="#custom-tabs-one-a-favicon" role="tab" aria-controls="custom-tabs-one-home"
                           aria-selected="true">Favicon</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-faq-tab" data-toggle="pill"
                           href="#custom-tabs-one-pied_et_contact"
                           role="tab" aria-controls="custom-tabs-one-peid_et_contact" aria-selected="false">Pied de page
                            et Contact</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-banner-tab" data-toggle="pill"
                           href="#custom-tabs-one-banner" role="tab" aria-controls="custom-tabs-one-banner"
                           aria-selected="false">reglages de banniere</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-contact-tab" data-toggle="pill"
                           href="#custom-tabs-one-contact" role="tab" aria-controls="custom-tabs-one-messages"
                           aria-selected="false">Contactez nous</a>
                    </li>

                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-one-a-favicon" role="tabpanel"
                         aria-labelledby="custom-tabs-one-a-favicon-tab">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin malesuada lacus ullamcorper dui


                    </div>
                    <div class="tab-pane fade" id="custom-tabs-one-pied_et_contact" role="tabpanel"
                         aria-labelledby="custom-tabs-one-pied_et_contactg-tab">
                        Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut

                    </div>

                    <div class="tab-pane fade" id="custom-tabs-one-banner" role="tabpanel"
                         aria-labelledby="custom-tabs-one-contact-banner">

                        <div class="row">
                            <div class="col-md-6">
                                <p>Baniere des pages existante</p>
                                <div>
                                    <img src="{{ $parametres==null ? '...':asset('storage/'.$parametres->banner_home) }}"
                                         alt="" height="200">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p>modifier la banniere des pages</p>
                                <form action="{{ route('setting.update_banner_home') }}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <input type="file" name="banner_home" class="form-control-file">
                                    </div>
                                    <button type="submit" class="btn btn-primary">modifier</button>
                                </form>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade" id="custom-tabs-one-contact" role="tabpanel"
                         aria-labelledby="custom-tabs-one-contact-tab">


                    </div>

                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>

@endsection

@section('extra-script')
    <script !src="">
        $(function () {
            @if(session()->get('change_banner'))
            toastr.success('{{ session()->get('change_banner') }}');
            @endif
        });
    </script>
@endsection
