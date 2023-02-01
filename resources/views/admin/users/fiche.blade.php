<div class="col-md-12">
    <div class="card-body rounded bg-white">
        <div class="row profile-wrapper" id="profile">
            <div class="col-md-12 user">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="nav nav-tabs" id="userTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="user-tab" data-toggle="tab"
                                    href="#user" role="tab" aria-controls="profile" aria-selected="false">{{ __('dashboard.informations') }}</a>
                            </li>
                        </ul>
                        <div class="row mt-2 pb-3">
                            <div class="col-md-8 profil p-2">
                                <div class="tab-content profil_infos px-2 pb-4 w-100" id="myTabContent" style="overflow: auto">
                                    <div class="tab-pane fade show active" id="user" role="tabpanel"
                                        aria-labelledby="user-tab">
                                        <div class="profile-work mt-2 w-100">
                                            <div class="d-flex justify-content-between align-items-center pb-3">
                                                <strong class="w-50">{{ __('dashboard.prenom') }}</strong>
                                                <div class="text-left pl-2 w-50 bg-light rounded">{{ $user->user_info->prenom??'' }}</div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center pb-3">
                                                <strong class="w-50">{{ __('dashboard.nom_famille') }}</strong>
                                                <div class="text-left pl-2 w-50 bg-light rounded">{{ $user->user_info->nom??'' }}</div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center pb-3">
                                                <strong class="w-50">{{ __('dashboard.email') }}</strong>
                                                <div class="text-left pl-2 w-50 bg-light rounded">{{ $user->email }}</div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center pb-3">
                                                <strong class="w-50">{{ __('dashboard.telephone') }}</strong>
                                                <div class="text-left pl-2 w-50 bg-light rounded">{{ $user->telephone ??''}}</div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center pb-3">
                                                <strong class="w-50">{{ __('dashboard.adresse') }}</strong>
                                                <div class="text-left pl-2 w-50 bg-light rounded">{{ $user->adresse ??''}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 text-right">
                        <ul class="nav nav-tabs border-0 justify-content-end">
                            <li class="nav-item text-right">
                                <a class="nav-link bold" disabled aria-selected="false">{{ __('dashboard.profil') }}</a>
                            </li>
                        </ul>
                        <div class="mt-2 w-100">
                            <div class="p-2 bg-light" style="border-radius: 8px">
                                <div class="row justify-content-md-center">
                                    <div class="col-12 profil">
                                        <div class="profil_image mx-auto">
                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGJ5W9rtnI5Yl0rQCZiNRUNjSqRH7zeouAIlJ3kJ-MBqNccffOkGcJvq7wcbatnzgxUo4&usqp=CAU" alt="Profil"  id="img-logo" class="rounded mx-auto d-block photo" id="photo" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12 text-center">
                                        <h5 class="text-muted text-md text-muted mb-0">
                                            {!! $user->nomComplet !!}
                                        </h5>
                                        <div class="divider"></div>
                                        <h6 class="mb-1">
                                            <span class="badge bg-white shadow-sm rounded p-2 text-uppercase">
                                                <span class="text-primary"><i class="fas fa-user-clock"></i></span>
                                                {{ $user->profil_name ?? 'non défini' }}
                                            </span>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
