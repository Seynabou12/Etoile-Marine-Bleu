@php
$step_number = $step_number??3; //default 3
$col_size = $col_size??(int)12/$step_number;
@endphp

<!-- Step bars -->
<div class="step__container__bar">
    <div class="row">
        @for ($i=1;$i<=$step_number;$i++)
            <div class="col-md-{{$col_size}} col-12 stepbar stepbar-{{$i}} ">
                <hr class="step__hr">
                <span class="step__number">{{$i}}</span>
                <span class="step__label">{{$labels[$i-1]}}</span>
            </div>
        @endfor
    </div>
</div>
<!-- Fin Step bars -->
