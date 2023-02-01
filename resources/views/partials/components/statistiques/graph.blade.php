<div class="row">
    <div class="col-12 col-lg-7">
        <div class="card shadow-none">
            <div class="card-header ui-sortable-handle">
                <h6 class="card-title text-primary">
                    {{ isset($title) ?  $title : 'Evolution des Montants' }}
                </h6>
            </div>
            <div class="card-body dashboard_graph" style="height: 455px">
                <div>
                    <canvas id="myChart"  style="height: 170px !important"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-5">
        @include('partials.components.statistiques.tableau.table-graph-1')
    </div>

</div>
