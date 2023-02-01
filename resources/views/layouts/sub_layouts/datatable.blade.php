<div class="{{ $_classTableWrapper ?? "col-md-12" }}">
    <!-- Collapsable Card Example -->
    <div class="card mb-4 shadow-none" style="border-radius: 30px">
        <!-- Card Content - Collapse -->
        <div class="content-form">
            <div class="card-body">
                <div class="row">
                    @yield('cardHeader')
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-sm table-borderless" id="{{ isset($id) ? $id : 'datatable' }}" width="100%">
                                <thead>
                                    @yield('tableHeader')
                                </thead>

                                <tbody>
                                    @yield('tableBody')
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @yield('cardFooter')
        </div>
    </div>
</div>
