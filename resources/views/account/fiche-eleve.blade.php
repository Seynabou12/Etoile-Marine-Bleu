<?php $eleve = $user->eleve ?? [] ?>
<div class="row">
    <div class="col-12 col-sm-6 col-md-8 mb-3">
        <div class="card-body radius-30 bg-white">
            <div class="row profile-wrapper" id="profile">
                <div class="col-md-12 user">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="nav nav-tabs" id="userTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="user-tab" data-toggle="tab"
                                        href="#user" role="tab" aria-controls="profile" aria-selected="false">{{ __('dashboard.informations') }}</a>
                                </li>
                            </ul>
                            <div class="row mt-2 pb-3">
                                <div class="col-md-8 profil p-2">
                                    <div class="tab-content profil_infos px-2 w-100" id="myTabContent" style="overflow: auto">
                                        <div class="tab-pane fade show active" id="user" role="tabpanel"
                                            aria-labelledby="user-tab">
                                            <div class="profile-work mt-2 w-100">
                                                <div class="d-flex justify-content-between align-items-center pb-3">
                                                    <strong class="w-50">{{ __('dashboard.prenom') }}</strong>
                                                    <div class="text-left pl-2 w-50 bg-light rounded">{{ $eleve->prenom ?? '---' }}</div>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center pb-3">
                                                    <strong class="w-50">{{ __('dashboard.nom_famille') }}</strong>
                                                    <div class="text-left pl-2 w-50 bg-light rounded">{{ $eleve->nom ?? '---' }}</div>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center pb-3">
                                                    <strong class="w-50">{{ __('dashboard.email') }}</strong>
                                                    <div class="text-left pl-2 w-50 bg-light rounded">{{ $user->email ?? '---' }}</div>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center pb-3">
                                                    <strong class="w-50">{{ __('dashboard.telephone') }}</strong>
                                                    <div class="text-left pl-2 w-50 bg-light rounded">{{ $eleve->telephone ?? '---' }}</div>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center pb-3">
                                                    <strong class="w-50">{{ __('dashboard.adresse') }}</strong>
                                                    <div class="text-left pl-2 w-50 bg-light rounded">{{ $eleve->adresse ?? '---' }}</div>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center pb-3">
                                                    <strong class="w-50">{{ __('dashboard.etat_ou_Province') }}</strong>
                                                    <div class="text-left pl-2 w-50 bg-light rounded">{{ $eleve->provence ?? '---' }}</div>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <strong class="w-50">{{ __('dashboard.ville') }}</strong>
                                                    <div class="text-left pl-2 w-50 bg-light rounded">{{ $eleve->ville ?? '---' }}</div>
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
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4">
        <div class="card-body border radius-30 bg-white p-0" style="overflow: hidden;height:361px">
            <div class="row profile-wrapper m-0" id="profile">
                <div class="col-12 p-4 bg-light" style=" height: 105px">

                </div>
                <div class="col-md-12 bg-white user">
                    <div class="mt-2 w-100">
                        <div class="p-2" style="border-radius: 8px">
                            <div class="row justify-content-md-center">
                                <div class="col-12 profil">
                                    <div class="profil_image mx-auto">
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGJ5W9rtnI5Yl0rQCZiNRUNjSqRH7zeouAIlJ3kJ-MBqNccffOkGcJvq7wcbatnzgxUo4&usqp=CAU" alt="Profil"  id="img-logo" class="rounded mx-auto d-block photo" id="photo" style="border-radius: 50px !important" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12 text-center">
                                    <h2 class="text-primary mb-0">
                                        {!! $eleve->nom !!}
                                        <p class="text-muted h6"> {!! $eleve->prenom !!}</p>
                                    </h2>
                                    <hr>
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-envelope text-primary mr-3" style="width: 20px"></i>
                                        <div>{{ $user->email }}</div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-map-marker text-primary mr-3" style="width: 20px"></i>
                                        <div>{{ $eleve->adresse }}</div>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <a href="" class="btn btn-outline-primary radius-30 pr-3 pl-3 mb-1 w-75"
                                            data-toggle="modal" data-target="#myModal">
                                            <i class="fa fa-edit"></i> {{ __('dashboard.editer') }}
                                        </a>
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
