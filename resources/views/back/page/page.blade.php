@extends('back.app')

@section('content')

    <div class="col-md-12 col-sm-12">
        <div class="card card-primary card-tabs">

            <div  class="card-title pt-3">
                <h3>Paramètres de la page</h3>
            </div>

            <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-one-a-propos-tab" data-toggle="pill"
                           href="#custom-tabs-one-a-propos" role="tab" aria-controls="custom-tabs-one-home"
                           aria-selected="true">A propos de nous</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-faq-tab" data-toggle="pill" href="#custom-tabs-one-faq"
                           role="tab" aria-controls="custom-tabs-one-faq" aria-selected="false">FAQ</a>
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
                    <div class="tab-pane fade show active" id="custom-tabs-one-a-propos" role="tabpanel"
                         aria-labelledby="custom-tabs-one-a-propos-tab">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin malesuada lacus ullamcorper dui
                        molestie, sit amet congue quam finibus. Etiam ultricies nunc non magna feugiat commodo. Etiam
                        odio magna, mollis auctor felis vitae, ullamcorper ornare ligula. Proin pellentesque tincidunt
                        nisi, vitae ullamcorper felis aliquam id. Pellentesque habitant morbi tristique senectus et
                        netus et malesuada fames ac turpis egestas. Proin id orci eu lectus blandit suscipit. Phasellus
                        porta, ante et varius ornare, sem enim sollicitudin eros, at commodo leo est vitae lacus. Etiam
                        ut porta sem. Proin porttitor porta nisl, id tempor risus rhoncus quis. In in quam a nibh cursus
                        pulvinar non consequat neque. Mauris lacus elit, condimentum ac condimentum at, semper vitae
                        lectus. Cras lacinia erat eget sapien porta consectetur.
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-one-faq" role="tabpanel"
                         aria-labelledby="custom-tabs-one-faq-tab">
                        Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut
                        ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing
                        elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                        Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus
                        ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc
                        euismod pellentesque diam.
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-one-contact" role="tabpanel"
                         aria-labelledby="custom-tabs-one-contact-tab">
                        Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue
                        id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac
                        tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit
                        condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus
                        tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet
                        sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum
                        gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend
                        ac ornare magna.
                    </div>

                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>

@endsection
