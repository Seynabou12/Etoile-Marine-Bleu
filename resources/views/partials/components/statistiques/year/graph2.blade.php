<div class="col-lg-4 col-6">
    <div class="card shadow-none">
        <div class="card-header ui-sortable-handle">
            <h6 class="card-title text-primary my-2">
                Réclamations par Rubriques
            </h6>
        </div>
        <div class="card-body pb-1">
            {{-- <p class="az-content-text mg-b-20">Part of this date range occurs before the new users metric had been calculated, so the old users metric is displayed.</p> --}}
            <div class="table-responsive pb-3">
              <table class="table table-sm table-striped table-hover table-borderless" id="datatable" width="100%">
                <thead>
                  <tr>
                    <th class="wd-45p">Rubriques</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                    @isset($rubriques)
                        @foreach ($rubriques as $rubrique)
                            <tr>
                                <td>{{ $rubrique->name }}</td>
                                <td class="<?php if(count($rubrique->reclamations) > 0) echo 'text-danger font-weight-bold'; ?>">{{ count($rubrique->reclamations) }}</td>
                            </tr>
                        @endforeach
                    @endisset
                </tbody>
              </table>
            </div><!-- table-responsive -->
        </div>
      </div>
</div>
<div class="col-12 col-lg-8">
    <div class="card shadow-none">
        <div class="card-header ui-sortable-handle">
            <h6 class="card-title text-primary my-2">
                {{ isset($title) ?  $title : '' }}
                {{-- <span class="subtitle text-primary">Par type de document</span> --}}
            </h6>
        </div>
        <div class="card-body dashboard_graph" style="height: 453px">
            <div>
                <canvas id="myChart2"  style="height: 170px !important"></canvas>
            </div>
        </div>
    </div>
</div>
