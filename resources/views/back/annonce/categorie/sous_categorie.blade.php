@extends("back.app")

@section('content')

    <div class="col-md-4 offset-md-8 pb-3 pt-3">
        <button
            type="button" class="btn btn-block btn-success"
            data-toggle="modal" data-target="#modal-add-categorie">Ajouter
        </button>

    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Liste des categories</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table  id="example" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Titre</th>
                        <th>Categorie</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sousCategories as $sousCategorie)
                        <tr>
                            <td>{{ $sousCategorie->id }}</td>
                            <td>{{ $sousCategorie->titre }}</td>
                            <td>{{ $sousCategorie->category->titre }}</td>
                            <td>
                                <form id="{{$sousCategorie->id}}" method="POST"
                                      action="{{ route('sous-categories.destroy',$sousCategorie->id)  }}"
                                      style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button onclick="getIdDelete(this.previousElementSibling.getAttribute('id'));"
                                        type="button" class="btn btn-block btn-outline-danger btn_delete"
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

    <div class="modal fade" id="modal-add-categorie">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajout d'une sous catégorie</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('sous-categories.store') }}" method="post" >
                        @csrf
                        <div class="form-group">
                            <label for="titre">Titre de la sous catégorie</label>
                            <input type="text" name="titre" required class="form-control" placeholder="Titre">
                        </div>
                        <div class="form-group">
                            <label for="categorie">Choisir une categorie</label>
                            <select name="categorie" class="form-control" title="choisir une categorie" required>
                               @foreach($categories as $categorie)
                                    <option value="{{ $categorie->id }}">{{ $categorie->titre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-outline-primary">Enregistrer</button>
                        </div>
                    </form>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modal-danger">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Supprimer une sous catégorie</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-danger">
                        Attention!!! cela entrainera également la suppression de toutes les annonces associées à cette categorie.
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

@endsection


@section('extra-script')

    <script !src="">
        @if(session()->get('message_add'))
        toastr.success('{{ session()->get('message_add') }}');
        @endif
        @if(session()->get('message_delete'))
        toastr.success('{{ session()->get('message_delete') }}');
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
