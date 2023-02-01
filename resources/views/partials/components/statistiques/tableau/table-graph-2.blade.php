<div class="card shadow-none">
    <div class="card-header ui-sortable-handle">
        <h6 class="card-title text-primary">
            Tableau
        </h6>
    </div>
  <div class="card-body row row-sm py-0">
    <div class="dashboard_graph p-0" style="height: 455px;width:100%">
        @isset($data1)
            <table class="table table-sm table-striped table-hover table-borderless text-sm mt-2" id="datatable" width="100%">
                <thead class="border">
                    <tr class="font-weight-bold border">
                        <td rowspan="2" style="vertical-align:middle" class="text-center">Mois</td>
                        <td class="text-center border" colspan="2">Import</td>
                        <td class="text-center border" colspan="2">Export</td>
                    </tr>
                    <tr class="border">
                        <td class="text-right border">Opérations</td>
                        <td class="text-right border">Montant</td>
                        <td class="text-right border">Opérations</td>
                        <td class="text-right border">Montant</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $months = [
                        1=>'Janvier',2=>'Février',3=>'Mars',4=>'Avril',5=>'Mai',6=>'Juin',
                        7=>'Juillet',8=>'Août',9=>'Septembre',10=>'Octobre',11=>'Novembre',12=>'Décembre'
                    ] ?>
                    <?php $imports = $arrayImport['montants'];$exports = $arrayExport['montants']; ?>
                    @for($i = 0; $i < count($imports); $i++)
                        <tr>
                            <td>{{ $months[$i+1]}}</td>
                            <td class="text-center">
                                <span class="badge badge-primary">
                                    {{ $arrayImport['nombre'][$i] ?? 0 }}
                                </span>
                            </td>
                            <td class="text-right">{{ number_format($imports[$i]?? 0,0,'','.')  }}</td>
                            <td class="text-center">
                                <span class="badge badge-warning">
                                    {{ $arrayExport['nombre2'][$i] ?? 0 }}
                                </span>
                            </td>
                            <td class="text-right">{{ number_format($exports[$i]?? 0,0,'','.')  }}</td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        @endisset
    </div>
  </div><!-- card-body -->
</div><!-- card-dashboard-five -->
