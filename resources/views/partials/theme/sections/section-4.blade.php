<div class="row section_4 bg-white" id="team">
    <div class="col-12 p-0 bg-white">
        <div class="card section_4_card mb-0">
            <div class="card-body p-0">
                <h1 class="font-weight-bold text-center mb-4">{{ __('home.team') }}</h1>
                <p class="text-center">
                    le texte définitif venant remplacer le faux-texte dès qu'il est prêt
                </p>
                <div class="col-12">
                    <div class="row justify-content-center align-items-center">
                        @include('partials.theme.sections.team',[
                            'name'=>__('home.fondateur_1'),
                            'poste'=> __('home.fondateur_1_poste'),
                            'image'=>'img/team-1.jpg'
                        ])
                        @include('partials.theme.sections.team',[
                            'name'=> __('home.fondateur_2'),
                            'poste'=> __('home.fondateur_2_poste'),
                            'image'=>'img/team-2.jpg'
                        ])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
