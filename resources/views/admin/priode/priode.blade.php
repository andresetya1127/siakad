@extends('template.template')

@section('content')

@section('custom_style')
{{ css_(['select2', 'select-bootstrap']) }}
@endsection
<div class="col-xxl-5 col-xl-7 col-md-12 col-sm-12">
    <div class="card animate__animated animate__fadeInRight">
        <div class="card-body">
            <div class="row">
                <div class="col-8">
                    <select name="masa_berlaku" class="select2 form-control" style="width: 100%;">
                        <option disabled hidden selected>Masa Berlaku</option>
                        <option>Masa</option>
                        <option>Masa</option>
                        <option>Masa</option>
                        <option>Masa</option>
                        <option>Masa</option>
                        <option>Masa</option>
                        <option>Masa</option>
                    </select>
                </div>
                <div class="col-4">
                    <button class="btn btn-info">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom_script')
{{ js_(['select2']) }}
@endsection
