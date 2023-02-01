<div class="row step-1">
    <div class="col-md-8 col-12">
        <div class="step__title__container">
            <div class="step__title">
                <div class="step__title__text">
                    {{ __('dashboard.etudes') }}<br>
                    <small>{{ __('dashboard.choisissez_des_etudes') }}</small>
                </div>
                <input type="text" class="step__title__search" placeholder="{{ __('dashboard.rechercher') }}">
                <i class="fa fa-search step__title__search__icon" aria-hidden="true"></i>
            </div>
        </div>
        <div class="step__body">
            <div class="row">
                <input type="hidden" name="studies" value="">
                @foreach ($studies as $study)
                    <div class="col-md-4 col-6 py-1 step-filter" data-filter="{{$study->name}}">
                        <input @isset($objet->studies[$study->id]) checked @endisset
                            class="checkbox study-input" type="checkbox" name="studies[{{$study->id}}]"
                            id="studies[{{$study->id}}]" value="{{$study->id}}" data-name='step-1-{{$study->name}}'>
                        <label for="studies[{{$study->id}}]">{{$study->name}}</label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-md-4 col-12">
        <div class="step__rightcard">
            <div class="step__rightcard__title">{{ __('dashboard.etudes_ajoutees') }}</div>
            <div class="step__rightcard__body display-studies">

            </div>
        </div>
    </div>

</div>

@push('components-scripts')

    <script>
        // Les variables
        studies = @json($studies);

        // Les évènements
        $(function(){
            updateStudiesDisplay();
        })
        $('.study-input').on('change',function(){
            updateStudiesDisplay();
        })
        $('.display-studies').on('click','.study-displayed',function(){
            unselectStudy($(this));
        })

        // Les fonctions
        function updateStudiesDisplay(){
            $('.display-studies').html('');
            $('input.study-input').each( function(){
                if(this.checked) {
                    displayStudy(this.value);
                }
            });
        }
        function displayStudy(id){
            studies.forEach(element => {
                if(element.id == id) {
                    study_name = element.name;
                    study = '<span class="study-displayed">';
                    study += "<i class='fa fa-times'></i>";
                    study += "<span class='checked-element'>"+study_name+"</span>";
                    study += '</span>';
                    $('.display-studies').append(study);
                }
            });
        }
        function unselectStudy(element){
            name = element.find('.checked-element').text();
            $("input[data-name='step-1-"+name+"'").prop( "checked", false );
            updateStudiesDisplay();
        }

    </script>
    <style>
        .study-displayed{
            background-color: #fbfbfb;
            border-radius: 25px;
            margin: 5px 10px;
            padding: 5px 10px;
            color: green;
            display: inline-block;
        }
        .study-displayed .fa{
            padding: 3px 5px;
            border-radius: 5px;
            margin-right: 10px;
            background-color: green;
            color: #fbfbfb;
            box-shadow: 0 0 4px -2px;
        }
    </style>

@endpush
