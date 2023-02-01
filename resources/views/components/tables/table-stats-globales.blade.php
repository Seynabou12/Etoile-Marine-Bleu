
<div class="card shadow-none stats-table bg-white">
    <div class="card-body">
        <h5 class="text-uppercase text-secondary font-weight-bold  mb-2 text-center">
            Tableau des opérations par année
        </h5>
        <h6 class="mb-2 text-muted text-center d-none">
            A définir
        </h6>
        <div class="tab-height">
            <table class="table table-sm table-striped table-hover table-borderless text-sm mt-2" id="datatable" width="100%">
                <thead class="border">
                    <tr class="font-weight-bold border">
                        <td rowspan="2" style="vertical-align:middle" class="text-center">Année</td>
                        <td class="text-center border" colspan="2">Exportations</td>
                        <td class="text-center border" colspan="2">Importations</td>
                    </tr>
                    <tr class="border">
                        <td class="text-right border">Nombre</td>
                        <td class="text-right border">Montant (XOF)</td>
                        <td class="text-right border">Nombre</td>
                        <td class="text-right border">Montant (XOF)</td>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $years = $archivesGlobales->unique('year')->pluck('year')->toArray();
                    @endphp
                    @foreach ($years as $year )
                        <tr class="border">
                            <td>{{ $year }}</td>
                            <td class="text-center">
                                <span class="badge badge-primary">
                                    @php
                                        $value = $data
                                            ->where('natureOperation','Export')
                                            ->where('year',$year)->pluck('nombre')->first();
                                    @endphp
                                    {{ $value??0 }}
                                </span>
                            </td>
                            <td class="text-right">
                                @php
                                    $value = intval( $data
                                        ->where('natureOperation','Export')
                                        ->where('year',$year)->pluck('somme')->first() );
                                @endphp
                                {{ number_format($value??0,0,',',' ')  }}
                            </td>
                            <td class="text-center">
                                <span class="badge badge-warning">
                                    @php
                                        $value = $data
                                            ->where('natureOperation','Import')
                                            ->where('year',$year)->pluck('nombre')->first();
                                    @endphp
                                    {{ $value??0 }}
                                </span>
                            </td>
                            <td class="text-right">
                                @php
                                    $value = $data
                                        ->where('natureOperation','Import')
                                        ->where('year',$year)->pluck('somme')->first();
                                @endphp
                                {{ number_format($value??0,0,',',' ')  }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
