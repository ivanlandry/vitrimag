@extends('back.app')

@section('content')



    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Liste des utilisateurs</h3>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Nom</th>
                        <th>Telephone</th>
                        <th>Adresse email</th>
                        <th>Date d'inscription</th>
                        <th>Actions</th>
                        <th style="width: 40px"></th>
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
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" href="{{ $users->previousPageUrl() }}">&laquo;</a></li>
                    @for($i=1;$i<=ceil($users->total() / $users->perPage());$i++)
                        <li class="page-item"><a class="page-link" href="{{ $users->url($i) }}">{{$i}}</a></li>
                    @endfor
                    <li class="page-item"><a class="page-link" href="{{ $users->nextPageUrl() }}">&raquo;</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Modal de suppression d'un utilisateur -->



    <div class="modal fade" id="modal-danger">
        <div class="modal-dialog modal-sm">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h5 class="modal-title">Supprimer un utilisateur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Voulez-vous vraiment le supprimer?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-outline-light" id="btn_delete">Supprimer</button>
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
             toastr.success('Suppression réussie !');

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


