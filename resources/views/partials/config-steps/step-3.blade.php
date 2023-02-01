<div class="row step-3">
    <div class="col-md-8 col-12">
        <div class="step__title__container">
            <div class="step__title">
                <div class="step__title__text">
                    {{ __('dashboard.personnalite') }}<br>
                    {{-- <small>{{ __('dashboard.choisissez_personnalite') }}</small> --}}
                </div>
                <input type="text" class="step__title__search" placeholder="{{ __('dashboard.rechercher') }}">
                <i class="fa fa-search step__title__search__icon" aria-hidden="true"></i>
            </div>
        </div>
        <div class="step__body">
            <div class="row">
                <input type="hidden" name="personalities" value="">
                @foreach ($personalities as $personality)
                    <div class="col-md-6 col-12 py-1 step-filter" data-filter="{{$personality->name}}">
                        <div class="step__body__personality">
                            <input @isset($objet->personalities[$personality->id]) checked @endisset
                                class="checkbox personality-input" type="checkbox" name="personalities[{{$personality->id}}]"
                                id="personalities[{{$personality->id}}]" value="{{$personality->id}}" data-name='step-3-{{$personality->name}}'>
                            <label for="personalities[{{$personality->id}}]">{{$personality->name}}</label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-md-4 col-12">
        <div class="step__rightcard">
            <div class="step__rightcard__title">{{ __('dashboard.personnalites_ajoutees') }}</div>
            <div class="step__rightcard__body display-personalities">
            </div>
        </div>
    </div>
</div>

@push('components-scripts')

    <script>
        // Les variables
        personalities = @json($personalities);

        // Les événements
        $(function(){
            updatePersonalitiesDisplay();
        })
        $('.personality-input').on('change',function(){
            updatePersonalitiesDisplay();
        })
        $('.display-personalities').on('click','.personality-displayed',function(){
            unselectPersonality($(this));
        })

        // Les fonctions
        function updatePersonalitiesDisplay(){
            $('.display-personalities').html('');
            $('input.personality-input').each( function(){
                if(this.checked) {
                    displayPersonality(this.value);
                }
            });
        }
        function displayPersonality(id){
            personalities.forEach(element => {
                if(element.id == id) {
                    personality_name = element.name;
                    personality = '<span class="personality-displayed">';
                    personality += "<i class='fa fa-times'></i>";
                    personality += "<span class='checked-element'>"+personality_name+"</span>";
                    personality += '</span>';
                    $('.display-personalities').append(personality);
                }
            });
        }
        function unselectPersonality(element){
            name = element.find('.checked-element').text();
            $("input[data-name='step-3-"+name+"'").prop( "checked", false );
            updatePersonalitiesDisplay();
        }
    </script>
    <style>
        .personality-displayed{
            background-color: #fbfbfb;
            border-radius: 25px;
            margin: 5px 10px;
            padding: 5px 10px;
            color: green;
            display: inline-block;
            box-shadow: 0 0 4px -2px;
        }
        .personality-displayed .fa{
            padding: 3px 5px;
            border-radius: 5px;
            margin-right: 10px;
            background-color: green;
            color: #fbfbfb;
        }
    </style>
@endpush
