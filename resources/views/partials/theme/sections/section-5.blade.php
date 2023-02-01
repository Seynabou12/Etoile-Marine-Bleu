<div class="row section_3" id="contact">
    <div class="col-12">
        <div class="card section_5_card m-0">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-12 col-lg-6 section_5_block_left text-white min-vh-100">
                        <h1 class="font-weight-bold">{{ __('home.contact') }}</h1>
                        <p>{{ __('home.faire_appel') }}</p>
                        <br>
                        @include('partials.theme.sections.components.contact',
                            [
                                'infos'=>'+81 62 87 19 00',
                                'icone'=>'carbon:phone'
                            ]
                        )
                        @include('partials.theme.sections.components.contact',
                            [
                                'infos'=>'〒 530-0027 1-5 Doyama-cho, Kita-ku,Osaka-shi,<br> Osaka Immeuble Sankyo Umeda 7ème étage Ogers',
                                'icone'=>'gis:location-arrow-o'
                            ]
                        )
                        @include('partials.theme.sections.components.contact',
                            [
                                'infos'=>'keisuke.kumamoto@my-revo.co.jp',
                                'icone'=>'ci:mail'
                            ]
                        )
                    </div>
                    <div class="col-12 col-lg-6 section_5_block_right">
                        <div class="row">
                            <div class="col-12 p-4">
                                <div class="card section_5_block_right_card">
                                    <div class="card-header text-center">{{ __('home.message') }}</div>
                                    <div class="card-body">
                                        <form action="" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="">{{ __('home.nom_complet') }}</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label for="">{{ __('home.adresse_email') }}</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label for="">{{ __('home.telephone') }}</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label for="">{{ __('home.objet') }}</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label for="">{{ __('home.message') }}</label>
                                                <textarea   name="" class="form-control" id="" cols="30" rows="10" style="color: #232323 !important"></textarea>
                                            </div>
                                            <button type="submit" class="btn-contact btn btn-primary bg-dark col-12 border-radius">{{ __('home.envoyer') }}</button>
                                        </form>
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

