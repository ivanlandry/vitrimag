@extends('back.app')

@section('content')


    <div class="col-md-12 pt-4">
        <div class="card">
            <!-- /.card-header -->
            <div class="card-header">
                <h3 class="card-title">Liste des annonces</h3>
            </div>
            <div class="card-body">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Titre</th>
                        <th>Ville</th>
                        <th>Description</th>
                        <th>Prix</th>
                        <th>Date de publication</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($annonces as $annonce)
                        <tr>
                            <td>{{$annonce->id}}</td>
                            <td>{{ $annonce->titre }}</td>
                            <td>{{$annonce->ville}}</td>
                            <td>{{ $annonce->description }}</td>
                            <td>{{$annonce->prix}}</td>
                            <td>{{$annonce->created_at->format('d/m/Y à H:m')}}</td>

                            <td>
                                <form id="{{$annonce->id}}" method="POST"
                                      action="{{ route('annonce.destroy',$annonce->id)  }}"
                                      style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button onclick="getIdDelete(this.previousElementSibling.getAttribute('id'));"
                                        type="button" class="btn btn-block btn-outline-danger btn-sm btn_delete"
                                        data-toggle="modal" data-target="#modal-danger">supprimer
                                </button>
                                <button type="button" class="btn btn-block btn-outline-primary">detail</button>
                                @if($annonce->publier==false)
                                    <form method="POST"
                                          action="{{ route('annonce.valider',$annonce->id)  }}"
                                    >
                                        @csrf
                                        @method('PUT')
                                        <button type="submit"

                                                class="btn btn-block btn-outline-secondary">valider
                                        </button>
                                    </form>

                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>



    <div class="modal fade" id="modal-danger">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Supprimer une annonce</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-danger">
                        Voulez-vous vraiment la supprimer?
                    </p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-outline-danger" id="btn_delete">Supprimer</button>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!-- -----------------------------  -->
@endsection

@section('extra-script')

    <script !src="">


        @if(session()->get('message_delete'))
        toastr.success('{{ session()->get('message_delete') }}');
        @endif

        @if(session()->get('message_valider'))
        toastr.success('{{ session()->get('message_valider') }}');

        @endif


        function getIdDelete(id) {
            idDelete = id;
        }


        document.getElementById('btn_delete').onclick = function () {
            document.getElementById(idDelete).submit();
        };


    </script>

@endsection


