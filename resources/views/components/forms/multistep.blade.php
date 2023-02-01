@php
    // Variables du component
    // $objet: l'objet est obligatoire
    $step_number = $step_number??3; //default 3
    $col_size = (int)12/$step_number;
    $step_attribute = $step_attribute??'step';
    $current_step = $objet->$step_attribute;
    $labels = $labels??['Step 1', 'Step 2', 'Step 3'];
    $action = $action??'';
    $form_element = $form_element??'components.forms.form-example';
    $layout = $layout??'default';
    if($layout=='right') {
        $col_size_form = 'col-md-8';
        $col_size_bar = 'col-md-4';
        $top_bar = 'd-none';
        $right_bar = '';
        $left_bar = 'd-none';
    }elseif($layout=='left'){
        $col_size_form = 'col-md-8';
        $col_size_bar = 'col-md-4';
        $top_bar = 'd-none';
        $right_bar = 'd-none';
        $left_bar = '';
    }else{
        $col_size_form = 'col-md-12';
        $col_size_bar = 'col-md-12';
        $top_bar = '';
        $right_bar = 'd-none';
        $left_bar = 'd-none';
    }
    $redirect = $redirect??route('admin.university.faculties-management',$objet->universite_id);
@endphp
<!-- Step bars -->
<div class="{{$top_bar}}">
    @include('components.forms.step-bars')
</div>
<!-- Fin Step bars -->

<div class="row">
    <div class="{{$col_size_bar}} {{$left_bar}}">
        @include('components.forms.step-bars',[
            'col_size' => 12,
        ])
    </div>
    <div class="{{$col_size_form}}">
        <!-- Step content -->
        <form action="{{ $action }}">
            @csrf
            <input type="hidden" name="model" value="{{get_class($objet)}}">
            <input type="hidden" name="id" value="{{$objet->id}}">
            <input id="gotostep" type="hidden" name="{{$step_attribute}}">
            <!-- Step form -->
            <div class="step__container__form">
                {{-- Ajouter les classes "step" et "step-{{number}}" dans chaque formulaire de step --}}
                @include($form_element)
            </div>
            <!-- Fin step form -->


            <!-- Step buttons -->
            <div class="step__container__buttons">
                <div class="row">
                    <div class="col-12">
                        <button id="prev" type="submit" name="step_prev" value="{{$current_step-1}}" class="step__button">{{ __('dashboard.precedent') }}</button>
                        <button id="next" type="submit" name="step_next" value="{{$current_step+1}}" class="btn-primary text-white step__button">{{ __('dashboard.suivant') }}</button>
                        <button id="save" type="submit" name="step_save" value="1" class="step__button btn-primary text-white">{{ __('dashboard.enregistrer') }}</button>
                    </div>
                </div>
            </div>
            <!-- Fin step buttons -->

        </form>
        <!-- Fin Step content -->
    </div>
    <div class="{{$col_size_bar}} {{$right_bar}}">
        @include('components.forms.step-bars',[
            'col_size' => 12,
        ])
    </div>
</div>


@push('components-scripts')
<script type="text/javascript">
        $(function(){
            gotostep = {{ $objet->$step_attribute }};
            step_number = {{ $step_number}};
            displayStep(gotostep,step_number);
            redirect = '{{ $redirect }}';
        })
        $('.step__button').click( function(){
            $('#gotostep').val($(this).val());
        });

        $("form").submit(function (event) {
            var form = $(this);
            // var url = form.attr('action');
            $.ajax({
                type: "POST",
                url: "{{ $action }}",
                data: form.serialize(),
                success: function (result) {
                    console.log('success');
                    console.log(result);
                    gotostep = result.{{$step_attribute}};
                    if(gotostep==1){
                        window.location.replace(redirect);
                    }else{
                        displayStep(gotostep,step_number);
                    }
                },
                error: function (xhr,status,error) {
                    console.log(xhr);
                }
            }).done(function (data) {
                //console.log(data);
            });
            event.preventDefault();
        });

        $('.step__title__search').keyup(function(){
            filter = this.value;
            filterStepElements(filter);
        });

        // Les fonctions
        function displayStep(gotostep,step_number){
            displayStepbar(gotostep);
            displayStepForm(gotostep);
            displayStepButtons(gotostep,step_number);
        }
        function displayStepbar(gotostep){
            $('.stepbar').removeClass('active done');
            $('.stepbar-'+gotostep).addClass('active');
            for(i=0;i<gotostep;i++){
                $('.stepbar-'+i).addClass('done');
            }
        }
        function displayStepForm(gotostep){
            $('.stepform').hide();
            $('.stepform-'+gotostep).show(1000);
            initFilter();
        }
        function displayStepButtons(gotostep,step_number){
            $('.step__button').hide();
            if(gotostep > 1){
                $('#prev').val(parseInt(gotostep)-1).show();
            }
            if( gotostep < step_number){
                $('#next').val(parseInt(gotostep)+1).show();
            }else{
                $('#save').show();
            }
        }
        function filterStepElements(text){
            if(text==''){
                $('.step-filter').show();
            }else{
                $('.step-filter').hide();
                $('.step-filter').each( function( element ) {
                    filtre = $(this).data('filter');
                    if(filtre.toLowerCase().includes(text.toLowerCase())){
                        $(this).show();
                    }
                });
            }
        }
        function initFilter(){
            $('.step-filter').show();
            $('.step__title__search').val('');
        }
    </script>
@endpush
