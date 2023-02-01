<div class="{{ $col??'col-lg-3 col-6' }}">
    <div class="card {{ $bg??'' }} radius-15 text-white">
        <div class="dashboard_card-body card-body p-3">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex no-block align-items-center">
                    <p class="fs-4 mb-1 text-white">
                        {{ $title??'---' }}
                    </p>
                </div>
            <div class="d-flex no-block align-items-center">
                <i class="fa {{ $icone??"" }} mr-2"></i>
                <p class="fs-4 mb-0 text-white">
                    {{ $sub_title??'---' }}
                </p>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
