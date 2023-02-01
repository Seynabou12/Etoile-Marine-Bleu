<div class="col-md-12">
    <div class="card-body rounded bg-white">
        <div class="row profile-wrapper" id="profile">
            <div class="col-md-12 user">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="nav nav-tabs" id="userTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="user-tab" data-toggle="tab"
                                    href="#user" role="tab" aria-controls="profile" aria-selected="false">Informations</a>
                            </li>
                        </ul>
                        <div class="row mt-2 pb-3">
                            <div class="col-md-8 profil p-2">
                                <div class="tab-content profil_infos px-2 pb-4 w-100" id="myTabContent" style="overflow: auto; min-height: auto">
                                    <div class="tab-pane fade show active" id="user" role="tabpanel"
                                        aria-labelledby="user-tab">
                                        <div class="profile-work mt-2 w-100">
                                            <div class="d-flex justify-content-between align-items-center pb-3">
                                                <strong class="w-50">Raison sociale</strong>
                                                <div class="text-left pl-2 w-50 bg-light rounded">{{ $entreprise->name }}</div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center pb-3">
                                                <strong class="w-50">Registre commerce</strong>
                                                <div class="text-left pl-2 w-50 bg-light rounded">{{ $entreprise->rc }}</div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center pb-3">
                                                <strong class="w-50">Téléphone</strong>
                                                <div class="text-left pl-2 w-50 bg-light rounded">{{ $entreprise->telephone }}</div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center pb-3">
                                                <strong class="w-50">Ninea</strong>
                                                <div class="text-left pl-2 w-50 bg-light rounded">{{ $entreprise->ninea ?? "Non défini" }}</div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center pb-3">
                                                <strong class="w-50">Adresse</strong>
                                                <div class="text-left pl-2 w-50 bg-light rounded">{{ $entreprise->adresse }}</div>
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
                                <a class="nav-link bold" disabled aria-selected="false">Compte FTP</a>
                            </li>
                        </ul>
                        <div class="mt-2 w-100 border bg-light px-3 py-2 rounded">
                            <div class="p-2 profil ">
                                <div class="profile-work mt-2 w-100">
                                    <div class="d-flex justify-content-between align-items-center pb-3">
                                        <strong class="w-50">Hôte</strong>
                                        <div class="pl-2 w-50 bg-light rounded">{{ $compte_ftp->hote ?? "---" }}</div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center pb-3">
                                        <strong class="w-50">Identifiant</strong>
                                        <div class="pl-2 w-50 bg-light rounded">{{ $compte_ftp->identifiant ?? "---" }}</div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center pb-3">
                                        <strong class="w-50">Port</strong>
                                        <div class="pl-2 w-50 bg-light rounded">{{ $compte_ftp->port ?? "---" }}</div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center pb-3">
                                        <strong class="w-50">Mot de passe</strong>
                                        <div class="pl-2 w-50 bg-light rounded"><input readonly disabled class="text-right form-control-plaintext" type="password" value="{{ $compte_ftp->mot_passe ?? "---" }}"></div>
                                    </div>
                                    @if ($_user->is_profil_admin || $_user->is_super_admin || $_user->is_profil_gestionnaire)
                                        <div class="text-right w-100">
                                            @if ($_user->is_profil_admin || $_user->is_profil_gestionnaire)
                                                <a href="{{ route('comptes.entreprises.update_ftp') }}" class="btn btn-primary rounded">Mettre à jour le compte FTP</a>
                                            @endif

                                            @if ($compte_ftp)
                                                <button
                                                 data-url="{{ route('test.connexion') }}"
                                                 data-host="{{ $compte_ftp->hote }}"
                                                 data-identifiant="{{ $compte_ftp->identifiant }}"
                                                 data-port="{{ $compte_ftp->port }}"
                                                 data-mot_passe="{{ $compte_ftp->mot_passe }}"
                                                 class="btn btn-secondary rounded ml-2"
                                                 id="btnTestConnection"
                                                 >
                                                    Tester la connexion FTP
                                                </button>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
