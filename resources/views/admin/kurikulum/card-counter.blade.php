@php
    $stp = $kurikulum->mk_kurikulum->sum('sks_tatap_muka');
    $sp = $kurikulum->mk_kurikulum->sum('sks_praktek');
    $spl = $kurikulum->mk_kurikulum->sum('sks_praktek_lapangan');
    $ss = $kurikulum->mk_kurikulum->sum('sks_simulasi');
@endphp

<div class="col-xl-4 col-lg-4 col-md-4 col-6">
    <div class="card  animate__animated animate__bounceInDown">
        <div class="card-body">
            <div class="row">
                <div class="col-4 align-self-center">
                    <div class="icon-info">
                        <i class="mdi mdi-diamond text-warning"></i>
                    </div>
                </div>
                <div class="col-8 align-self-center text-center">
                    <div class="ms-2 text-end">
                        <p class="mb-1 text-muted font-size-13">Mata Kuliah</p>
                        <h4 class="mb-1 font-size-20">
                            {{ $stp + $sp + $spl + $ss }}
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-6">
    <div class="card animate__animated animate__bounceInDown">
        <div class="card-body">
            <div class="row">
                <div class="col-4 align-self-center">
                    <div class="icon-info">
                        <i class="mdi mdi-diamond text-warning"></i>
                    </div>
                </div>
                <div class="col-8 align-self-center text-center">
                    <div class="ms-2 text-end">
                        <p class="mb-1 text-muted font-size-13">Tatap Muka</p>
                        <h4 class="mb-1 font-size-20"> {{ $stp }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-6">
    <div class="card animate__animated animate__bounceInDown">
        <div class="card-body">
            <div class="row">
                <div class="col-4 align-self-center">
                    <div class="icon-info">
                        <i class="mdi mdi-diamond text-warning"></i>
                    </div>
                </div>
                <div class="col-8 align-self-center text-center">
                    <div class="ms-2 text-end">
                        <p class="mb-1 text-muted font-size-13">Praktikum</p>
                        <h4 class="mb-1 font-size-20">{{ $sp }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xxl-2 col-xl-6 col-lg-6 col-md-6 col-6">
    <div class="card animate__animated animate__bounceInDown">
        <div class="card-body">
            <div class="row">
                <div class="col-4 align-self-center">
                    <div class="icon-info">
                        <i class="mdi mdi-diamond text-warning"></i>
                    </div>
                </div>
                <div class="col-8 align-self-center text-center">
                    <div class="ms-2 text-end">
                        <p class="mb-1 text-muted font-size-13">Praktik Lapangan</p>
                        <h4 class="mb-1 font-size-20">{{ $spl }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xxl-2 col-xl-6 col-lg-6 col-md-6 col-6">
    <div class="card animate__animated animate__bounceInDown">
        <div class="card-body">
            <div class="row">
                <div class="col-4 align-self-center">
                    <div class="icon-info">
                        <i class="mdi mdi-diamond text-warning"></i>
                    </div>
                </div>
                <div class="col-8 align-self-center text-center">
                    <div class="ms-2 text-end">
                        <p class="mb-1 text-muted font-size-13">Simulasi</p>
                        <h4 class="mb-1 font-size-20">{{ $ss }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
