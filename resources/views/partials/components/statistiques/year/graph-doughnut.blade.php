<div class="col-md-4">
    <div class="card shadow-none">
        <div class="card-header ui-sortable-handle">
            <h6 class="card-title text-primary">
               Provenance
            </h6>
        </div>
        <div class="card-body dashboard_graph">
            <div class="mx-auto text-center">
                <canvas id="provenanceChart"  style="width: 80%"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="col-md-8">
    <div class="card shadow-none">
        <div class="card-header ui-sortable-handle">
            <h6 class="card-title text-primary">
               Tableau des provenances
            </h6>
            <div class="card-tools font-weight-bold text-primary">
                {{ isset($somme) ? number_format($somme,0,'','.').' xof'  : 0 }}
             </div>
        </div>
        <div class="card-body dashboard_table">
            <table class="table table-striped table-hover table-sm table-borderless" id="datatable">
                <thead>
                    <tr class="font-weight-bold">
                        <td>Provenance</td>
                        <td>Nature Opération</td>
                        <td class="text-right">Montant (xof)</td>
                    </tr>
                </thead>
                <tbody>
                    @isset($provenances)
                        @foreach ($provenances['tabs'] as $key => $value)
                            <tr>
                                <td>{{ $value[2] }}</td>
                                <td>{{ $value[3] }}</td>
                                <td class="text-right">
                                    <span class="badge badge-success">
                                        {{ number_format($value[0],0,'','.') }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                        @endisset
                    </tbody>
                </table>
                @if(count($provenances['tabs']) == 0)
                    <div class="jumbotron">
                        <p class="text-center p-4">Aucune donnée trouvée !!</p>
                    </div>
                @endif
        </div>
    </div>
</div>
