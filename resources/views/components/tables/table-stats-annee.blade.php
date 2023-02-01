@php
    $height = $height??500;
    $months = ['01','02','03','04','05','06','07','08','09','10','11','12'];
@endphp
<style>
    .tab-height{
        overflow-y: auto;
        height: {{$height.'px'}};
    }
</style>
<div class="card stats-table shadow-none">
    <div class="card-body">
        <h5 class="text-uppercase text-secondary font-weight-bold  mb-2 text-center">
            Tableau des opérations par mois
        </h5>
        <h6 class="mb-2 text-muted text-center d-none">
            A définir
        </h6>
        <div class="tab-height">
            <table class="table table-sm table-striped table-hover table-borderless text-sm mt-2" id="datatable" width="100%">
                <thead class="border">
                    <tr class="font-weight-bold border">
                        <td rowspan="2" style="vertical-align:middle" class="text-center">Mois</td>
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

                    @foreach ($months as $key => $month )
                        <tr class='border'>
                            <td>{{ $col0[$key] }}</td>
                            <td class="text-center">
                                <span class="badge bg-primary">
                                    @php
                                        $value = $data
                                            ->where('natureOperation','Export')
                                            ->where('month',$month)->pluck('nombre')->first();
                                    @endphp
                                    {{ $value??0 }}
                                </span>
                            </td>
                            <td class="text-right">
                                @php
                                    $value = intval( $data
                                        ->where('natureOperation','Export')
                                        ->where('month',$month)->pluck('somme')->first() );
                                @endphp
                                {{ number_format($value??0,0,',',' ')  }}
                            </td>
                            <td class="text-center">
                                <span class="badge badge-secondary">
                                    @php
                                        $value = $data
                                            ->where('natureOperation','Import')
                                            ->where('month',$month)->pluck('nombre')->first();
                                    @endphp
                                    {{ $value??0 }}
                                </span>
                            </td>
                            <td class="text-right">
                                @php
                                    $value = $data
                                        ->where('natureOperation','Import')
                                        ->where('month',$month)->pluck('somme')->first();
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
