<style>
    .custom-file-label::after {
    color: #fff !important;
    content: "ブラウズ" !important;
    border-radius: 0 30px 30px 0 !important;
}
</style>
<?php $espace = $espace??'admin';?>
<div class="radius-30 card-body rounded bg-white mb-3">
    <h4>{{ __('dashboard.upload_file') }}</h4>
    <form method="POST" enctype="multipart/form-data" action="{{ route($espace.'.universites.storeDepot') }}" class="card-body rounded bg-white">
        @csrf
        {{-- Contenu de la page --}}
        <div class="row">
            <div class="form-group col-12">
                <label for="">{{ __('dashboard.nom') }}</label>
                <input type="text" name="libelle" placeholder="{{ __('dashboard.nom') }}" id="" class="form-control">
            </div>
            <div class="form-group col-md-12">
                {{-- <label for="file">{{ __('Import File') }}</label> --}}
                <div class="custom-file">
                    <input type="hidden" name="universite_id" value="{{ $universite->id }}" id="">
                    <input type="file" name="file" class="custom-file-input"  id="file-upload">
                    <label class="custom-file-label radius-30" id="fileName" for="file">{{ __('dashboard.televerser_fichier') }}
                        {{-- <small> <u class="text-danger">(au format zip)</u></small> --}}
                    </label>

                </div>
            </div>
            <div class="col-md-12 text-left">
                <button type="submit" class="btn btn-style btn-primary radius-30 px-4">
                    <i class="fa fa-upload mr-1"></i>{{ __('dashboard.enregistrer') }}</button>
            </div>
        </div>
    </form>
</div>
