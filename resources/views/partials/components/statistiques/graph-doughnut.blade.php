<div class="col-md-4">
    <div class="card shadow-none">
        <div class="card-header ui-sortable-handle">
            <h6 class="card-title text-primary">
               {{ isset($title) ? $title : 'Provenance' }}
            </h6>
        </div>
        <div class="card-body dashboard_graph">
            <div class="mx-auto text-center">
                <canvas id="{{ isset($id) ? $id : 'provenanceChart' }}"  style="width: 80%"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="col-md-8">
    <div class="card shadow-none">
        <div class="card-header ui-sortable-handle">
            <h6 class="card-title text-primary">
               Tableau {{ isset($title) ? $title : 'provenances' }}
            </h6>
        </div>
        <div class="card-body dashboard_table">
            <table class="table table-striped table-hover table-sm table-borderless" id="datatable">
                <thead>
                    <tr class="font-weight-bold">
                        <td>
                            {{ isset($title) ? $title : 'Provenance' }}
                        </td>
                        <td>Opérations</td>
                        <td class="text-right">Montant (xof)</td>
                    </tr>
                </thead>
                <tbody>

                    @if(isset($provenances) && isset($provenances['tabs']))
                    <?php $somme = 0; ?>
                        @foreach ($provenances['tabs'] as $key => $value)
                            <tr>
                                <td>{{ $value[2] }}</td>
                                <td>{{ $value[1] }}</td>
                                <td class="text-right">
                                    <span class="badge badge-success">
                                        {{ number_format($value[0],0,'','.') }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

        </div>
    </div>
</div>
