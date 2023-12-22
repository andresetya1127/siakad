@extends('template.template')
@section('content')
    <div class="col-xxl-8 col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-3 justify-content-between d-flex">
                    <button id="auto-scroll" class="btn btn-subtle-success scroll-on">
                        Auto Scroll: On
                    </button>
                    <a href="{{ route('download.log') }}" class="btn btn-subtle-info"><i class="fa fa-download"></i> Simpan
                        Log</a>
                </div>
                <pre id="logContainer" style="max-height: 500px;" class="text-center overflow-scroll bg-dark text-white fs-5 p-2"><i class="fa fa-rotate animate__animated animate__rotateIn animate__infinite	infinite"></i></pre>
            </div>
        </div>
    </div>
@endsection
@section('custom_style')
    {{ css_(['animate']) }}
@endsection
