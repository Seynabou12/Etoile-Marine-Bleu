@php
    if(!isset($nature) or $nature=='Import'){
        $titre = "Provenances des importations";
        $pays = 'provenance';
    }else{
        $titre = "Destination des importations";
        $pays = 'destination';
    }
@endphp

<div class="card shadow-none stats-table bg-white">
    <div class="card-body">
        <h5 class="text-uppercase text-secondary font-weight-bold  mb-2 text-center">
            {{$titre}}
        </h5>
        <h6 class="mb-2 text-muted text-center d-none">
            A définir
        </h6>
        <div class="tab-height">
            <table class="table table-sm table-striped table-hover table-borderless text-sm mt-2 tab-height" id="datatable" width="100%">
                <thead class="border">
                    <tr class="border">
                        <td class="text-right border">Pays</td>
                        <td class="text-right border">Nombre</td>
                        <td class="text-right border">Montant (XOF)</td>
                    </tr>
                </thead>
                <tbody class="border">
                    @foreach ($data as $elmt )
                        <tr class="border">
                            <td>{{ $elmt->$pays }}</td>
                            <td class="text-center">
                                <span class="badge badge-primary">
                                    {{ $elmt->nombre }}
                                </span>
                            </td>
                            <td class="text-right">
                                {{ number_format($elmt->somme,0,',',' ')  }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
