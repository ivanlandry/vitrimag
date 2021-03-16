@extends('back.app')

@section('content')

    <div class="col-md-12 col-sm-12">
        <div class="card card-primary card-tabs">

            <div  class="card-title pt-3">
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
                        <a class="nav-link" id="custom-tabs-one-faq-tab" data-toggle="pill" href="#custom-tabs-one-pied_et_contact"
                           role="tab" aria-controls="custom-tabs-one-peid_et_contact" aria-selected="false">Pied de page et Contact</a>
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
                    <div class="tab-pane fade" id="custom-tabs-one-contact" role="tabpanel"
                         aria-labelledby="custom-tabs-one-contact-tab">
                        Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue

                    </div>

                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>

@endsection
