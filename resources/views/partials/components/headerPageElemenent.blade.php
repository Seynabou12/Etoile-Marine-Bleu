<div class="d-sm-flex align-items-center justify-content-end">
    @if (isset($url))
        <a href="{{  url($url) }}" class="btn-sm btn-gradient btn-style" >Ajouter <i class="fas fa-plus-circle ml-2"></i></a>
    @endif
    @if (isset($route))
        <a href="{{  route($route) }}" class="btn-sm btn-primary btn-style" >
            <i class="fas fa-plus-circle mr-2"></i>{{ $title??'Ajouter' }} </a>
    @endif
    @if(isset($urlback))
        <a href="{{ url()->previous() }}" class="btn-sm bg-none shadow-none btn-style mr-2" style="border: 1px solid #ff552a" ><i class="fas fa-chevron-left mr-2"></i> {{ __('dashboard.retour') }}</a>
    @endif
    @if(isset($edit))
        <a href="{{ route('admin.postes.edit', $poste->id)  }}" class="btn btn-primary btn-style btn-sm">
            <i class="fa fa-edit"></i> Modifier
        </a>
    @endif
    @if(isset($isModal))
        <button type="button" class="btn btn-primary btn-style btn-sm"
            data-toggle="modal" data-target="#creationModal"
            >
            <i class="fas fa-plus-circle mr-2"></i>
            {{ $title??'Ajouter' }}
        </button>
    @endif
</div>
