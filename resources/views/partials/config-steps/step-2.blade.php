<div class="row step-2">
    <div class="col-md-8 col-12">
        <div class="step__title__container">
            <div class="step__title">
                <div class="step__title__text">
                    {{ __('dashboard.interets') }}<br>
                    <small>{{ __('dashboard.choisissez_centres_interets') }}</small>
                </div>
                <input type="text" class="step__title__search" placeholder="{{ __('dashboard.rechercher') }}">
                <i class="fa fa-search step__title__search__icon" aria-hidden="true"></i>
            </div>
        </div>
        <div class="step__body">
            <div class="row">
                <input type="hidden" name="interests" value="">
                @foreach ($interests as $interest)
                    <div class="col-md-4 col-6 py-1 step-filter" data-filter="{{$interest->name}}">
                        <input @isset($objet->interests[$interest->id])) checked @endisset
                            class="checkbox interest-input" type="checkbox" name="interests[{{$interest->id}}]"
                            id="interests[{{$interest->id}}]" value="{{$interest->id}}" data-name='step-2-{{$interest->name}}'>
                        <label for="interests[{{$interest->id}}]">{{$interest->name}}</label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-md-4 col-12">
        <div class="step__rightcard">
            <div class="step__rightcard__title">{{ __('dashboard.centres_interet_ajoutees ') }}</div>
            <div class="step__rightcard__body display-interests">

            </div>
        </div>
    </div>
</div>

@push('components-scripts')

    <script>
        // Les variables
        interests = @json($interests);

        // Les événements
        $(function(){
            updateInterestsDisplay();
        })
        $('.interest-input').on('change',function(){
            updateInterestsDisplay();
        })
        function updateInterestsDisplay(){
            $('.display-interests').html('');
            $('input.interest-input').each( function(){
                if(this.checked) {
                    displayInterest(this.value);
                }
            });
        }
        $('.display-interests').on('click','.interest-displayed',function(){
            unselectInterest($(this));
        })

        // Les fonctions
        function displayInterest(id){
            interest_name= "";
            interests.forEach(element => {
                if(element.id == id) interest_name = element.name;
            });
            interest = '<span class="interest-displayed">';
            interest += "<i class='fa fa-times'></i>";
            interest += "<span class='checked-element'>"+interest_name+"</span>";
            interest += '</span>';
            $('.display-interests').append(interest);
        }
        function unselectInterest(element){
            name = element.find('.checked-element').text();
            $("input[data-name='step-2-"+name+"'").prop( "checked", false );
            updateInterestsDisplay();
        }

    </script>
    <style>
        .interest-displayed{
            background-color: #fbfbfb;
            border-radius: 25px;
            margin: 5px 10px;
            padding: 5px 10px;
            color: green;
            display: inline-block;
            box-shadow: 0 0 4px -2px;
        }
        .interest-displayed .fa{
            padding: 3px 5px;
            border-radius: 5px;
            margin-right: 10px;
            background-color: green;
            color: #fbfbfb;
        }
    </style>

@endpush
