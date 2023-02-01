<div class="{{ $col??'col-lg-3 col-6' }}">
    <a href="{{ isset($route)? route($route) : '' }}">
        <div class="card shadow-none radius-15 bg-primary">
            <div class="dashboard_card-body card-body">
            <div class="row">
                <div class="col-md-12">
                <div class="d-flex no-block align-items-center">
                    <div>
                    <p class="fs-4 mb-1 text-white">
                        <i class="fas {{ $icone??"fa-file " }} text-white mr-2"></i>
                        {{ $title??'---' }}</p>
                    </div>
                    <div class="ml-auto">
                        <h3 class="fw-light text-end text-white">
                            {{  isset($data) ? count($data) : '0' }}
                        </h3>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </a>
</div>
