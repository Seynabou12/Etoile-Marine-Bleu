<div class="modal fade" id="creationModal"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header"  style="border-bottom: 1px solid #eee !important">
                <h5 class="modal-title">
                    {{ $titre??'Nouvelle Enregistrement' }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body">
                <form method="POST" action="{{isset($route) ? route($route) : '/' }}" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            @include('components.dynamic-form.formulaire',["data"=>$data??[]])
                        </div>
                    </div>
                    <div class="modal-footer" style="border-top: 1px solid #eee !important">
                        <button type="button" class="btn btn-style btn-danger" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-style btn-gradient">{{ __('dashboard.enregistrer') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom: 1px solid #eee !important">
                <h5 class="modal-title">{{ $titre2??'Edit' }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" id="form" action="" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    @method('PATCH')

                    <div class="row">
                        @include('components.dynamic-form.formulaire',["data"=>$data??[],'action'=>'edit'])
                    </div>
                </div>
                <div class="modal-footer" style="border-top: 1px solid #eee !important">
                    <button type="button" class="btn btn-style btn-danger" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-style btn-gradient">{{ __('dashboard.enregistrer') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
