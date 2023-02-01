<div class="card shadow-none">
    <div class="card-header ui-sortable-handle">
        <h6 class="card-title text-primary">
            Tableau
        </h6>
    </div>
  <div class="card-body row row-sm py-0">
    <div class="dashboard_graph p-0" style="height: 455px;width:100%">
        @isset($data)
            <!-- Dropdown - User Information -->
            @section('tableHeader')
                <tr class="font-weight-bold">
                    <td>Année</td>
                    <td>Opérations</td>
                    <td>Nature</td>
                    <td class="text-right">Montant (xof)</td>
                </tr>
            @endsection
            {{-- Table Body --}}
            @section('tableBody')
                @isset($data['nature'])
                    @for($i = 0; $i < count($data['nature']); $i++)
                        <tr>
                            <td>
                                {{ $data['nature'][$i][1] }}
                            </td>

                            <td>
                                <span class="badge badge-primary">
                                    {{ $data['nature'][$i][3] }}
                                </span>
                            </td>
                            <td>
                                <span class="badge badge-default">
                                    @if($data['nature'][$i][0] == "Import")
                                        <i class="fas fa-arrow-down text-danger" style="transform: scale(0.6);"></i> {{ $data['nature'][$i][0] }}
                                    @else
                                        <i class="fas fa-arrow-up text-success" style="transform: scale(0.6);"></i>
                                        {{ $data['nature'][$i][0] }}
                                    @endif
                                </span>
                            </td>
                            <td class="text-right">{{ number_format($data['nature'][$i][2],0,'','.') }}</td>
                        </tr>
                    @endfor
                @endisset
            @endsection
            @include('layouts.sub_layouts.datatable')

        @endisset
    </div>
  </div><!-- card-body -->
</div><!-- card-dashboard-five -->
