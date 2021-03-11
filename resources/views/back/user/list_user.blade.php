@extends('back.app')

@section('content')



    <div class="col-md-12 pt-4">
        <div class="card">
            <!-- /.card-header -->
            <div class="card-header">
                <h3 class="card-title">Liste des utilisateurs</h3>
            </div>
            <div class="card-body">
                <table  id="example" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Nom</th>
                        <th>Telephone</th>
                        <th>Adresse email</th>
                        <th>Date d'inscription</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>
                                <form id="{{$user->id}}" method="POST" action="{{ route('users.destroy',$user->id)  }}"
                                      style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button onclick="getIdDelete(this.previousElementSibling.getAttribute('id'));"
                                        type="button" class="btn btn-block btn-outline-danger btn-sm btn_delete"
                                        data-toggle="modal" data-target="#modal-danger">supprimer
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <!-- Modal de suppression d'un utilisateur -->

    <div class="modal fade" id="modal-danger">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Supprimer un utilisateur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-danger">
                        Attention!!! cela entrainera également la suppression de toutes les annonces associées à cet
                        utilisateur.
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


        @if(session()->get('message'))
        toastr.success('{{ session()->get('message') }}');
            @endif

        var idDelete;

        function getIdDelete(id) {
            idDelete = id;
        }

        document.getElementById('btn_delete').onclick = function () {
            document.getElementById(idDelete).submit();
        };

    </script>

@endsection


