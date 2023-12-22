@extends('template.template')

@section('content')
@section('custom_style')
    {{ css_(['select2', 'select-bootstrap']) }}
@endsection

<div class="col-xxl-5 col-xl-6 col-md-6 col-sm-12">
    <div class="card animate__animated animate__fadeInRight">
        <div class="card-body">
            <label for="" class="form-label">Priode</label>
            <div class="input-group mb-3">
                <select name="masa_berlaku" class="select2 form-control" style="width: auto;">
                    <option disabled hidden selected>Masa Berlaku</option>
                    <option>Masa</option>
                    <option>Masa</option>
                    <option>Masa</option>
                    <option>Masa</option>
                    <option>Masa</option>
                    <option>Masa</option>
                    <option>Masa</option>
                </select>
                <button class="btn btn-subtle-info">Simpan</button>
            </div>
        </div>
    </div>
</div>


<div class="col-xxl-7 col-xl-6 col-md-6 col-sm-12">
    <div class="card animate__animated animate__fadeInRight">
        <div class="card-body">
            <label for="" class="form-label">Backup Database</label>
            <div class="input-group mb-3">
                <select name="masa_berlaku" class="select2 form-control" style="width: auto;">
                    <option disabled hidden selected>Masa Berlaku</option>
                    <option>Masa</option>
                    <option>Masa</option>
                    <option>Masa</option>
                    <option>Masa</option>
                    <option>Masa</option>
                    <option>Masa</option>
                    <option>Masa</option>
                </select>
                <button class="btn btn-subtle-info">Simpan</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('custom_script')
{{ js_(['select2']) }}
@endsection
