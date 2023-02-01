<div class="{{ $col??'col-lg-3 col-6' }}">
    <div class="card shadow-none">
        <div class="bg-light radius-15 border card-body" style="height: 130px">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex no-block align-items-center">
                        <p class="h5 fs-8 font-weight-800 mb-1 text-dark text-capitalize" style="height: 50px">{{ $title??'---' }}</p>
                        <div class="ml-auto">
                        <h3 class="fw-light text-end text-danger">
                            {{-- {{ count($faculte->departements)??'0' }} --}}
                            <div class="dropdown">
                                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v text-primary"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a href="{{ route($espace.'.facultes.show', $faculte->id) }}" id="{{ $faculte->id }}" class="dropdown-item universite py-0" title="">
                                        {{ __('dashboard.visualisation') }}
                                    </a>
                                    <a href="{{ route($espace.'.facultes.edit', $faculte->id) }}" class="dropdown-item universite py-0" title="">
                                        {{ __('dashboard.editer') }}
                                    </a>
                                    @include('partials.components.deleteBtnElement',[
                                        'url'=>route('university.facultes.destroy',$faculte->id),
                                        'class'=> 'dropdown-item universite py-0',
                                        'message_confirmation'=>"Voulez-vous vraiment supprimer l'élément ? " .$faculte->name,
                                        'entity'=>$faculte,
                                        'btnInnerHTML' => __('dashboard.supprimer'),
                                        'modele' => 'text'
                                    ])
                                </div>
                            </div>
                        </h3>
                        </div>
                    </div>
                </div>
                <div class="col-12 pb-3">
                    <div class="d-flex no-block align-items-center">
                        <iconify-icon icon="fluent:branch-fork-16-filled" width="20" class="bg-white mr-2" style="border-radius: 50px;padding: 5px;color: #ff552a !important;"></iconify-icon>
                        {{ __('dashboard.nombre_departements') }}
                        <div class="ml-auto">
                            <h3 class="fw-light text-end text-muted mr-2">
                            {{  isset($faculte->departements) ? count($faculte->departements) : '0' }}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

