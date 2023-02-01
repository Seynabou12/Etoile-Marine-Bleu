<style>
    .oneline{
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }
</style>
<div class="custom-card">
    <div class="bg-light p-3 radius-20">
        <div class="text-primary h6 mb-3">{{ __('dashboard.etudes_ajoutees') }}</div>
        @foreach( $eleve->selected_studies as $study )
            <span class="px-4 py-2 border border-primary bg-white radius-20 mb-1 mr-1">{{ $study->name }}</span>
        @endforeach
    </div>
    <hr>
    <div class="bg-light p-3 radius-20">
        <div class="text-primary h6 mb-3">{{ __('dashboard.centres_interet_ajoutees ') }}</div>
        @foreach( $eleve->selected_interests as $interest )
            <span class="px-4 py-2 border border-primary bg-white radius-20 mb-1 mr-1">{{ $interest->name }}</span>
        @endforeach
    </div>
    <hr>
    <div class="bg-light p-3 radius-20">
        <div class="text-primary h6 mb-3">{{ __('dashboard.choix_orientation') }}</div>
        <div class="row">
            @foreach( $eleve->selected_departments as $i => $department )
                <div class="col-6 col-md-4">
                    <div class="w-100 px-4 py-2 border border-primary bg-white radius-20 mb-1 mr-1 text-center">
                        <span class="badge badge-secondary">{{ __('dashboard.choix') }} {{$i+1}}</span><br>
                        <small class="text-primary">{{ __("dashboard.departement") }}</small>
                        <div class="font-weight-bold oneline">{{ $department->name }}</div>
                        <small class="text-primary">{{ __('dashboard.facultes') }}</small>
                        <div class="oneline">{{ $department->faculte->name }}</div>
                        <small class="text-primary">{{ __('dashboard.universites') }}</small>
                        <div class="oneline">{{ $department->faculte->universite->name }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>
