@extends('template.template')

@section('custom_style')
    {{ css_(['select2', 'select-bootstrap']) }}
@endsection

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body text-center">
                <i class="fa-solid fa-book fs-1 text-primary"></i>
                <h1 id="jmlh_sks" class="my-3">0</h1>
                <p class="fw-bold">Jumlah SKS</p>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card animate__animated animate__fadeInRight">
            <div class="card-body">
                <form action="{{ route('save.kurikulum') }}" class="custom-validation" method="POST" id="myform">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                            <label for="" class="form-label pt-0">Kurikulum</label>
                            <input class="form-control" type="text" value="{{ old('nm_kurikulum') }}" name="nm_kurikulum"
                                placeholder="Nama Kurikulum...">
                            <span class="error"></span>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                            <label for="" class="form-label pt-0">Program Studi</label>
                            <select name="program_studi" class="select2 form-control" style="width: 100%;">
                                <option disabled selected hidden>Program Studi</option>
                                <option value="55201">Teknik Informatik</option>
                                <option value="57201">Sistem Informasi</option>
                            </select>
                            <span class="error"></span>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                            <label for="" class="form-label pt-0">Jumlah SKS(*wajib)</label>
                            <input class="form-control" type="number" value="{{ old('sks_wajib') }}" name="sks_wajib"
                                placeholder="Jumlah SKS wajib...">
                            <span class="error"></span>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                            <label for="" class="form-label pt-0">Jumlah SKS(*pilihan)</label>
                            <input class="form-control" type="number" name="sks_pilihan"
                                placeholder="Jumlah SKS Pilihan..." {{ old('sks_pilihan') }}>
                            <span class="error"></span>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                            <label for="" class="form-label pt-0">Masa berlaku</label>
                            <select name="masa_berlaku" class="select2 form-control" style="width: 100%;">
                                <option disabled hidden selected>Masa Berlaku</option>
                                @foreach ($semester as $smt)
                                    <option value="{{ $smt->semester }}">{{ $smt->nama_semester }}</option>
                                @endforeach
                            </select>
                            <span class="error"></span>
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-subtle-success">
                            <i class="mdi mdi-content-save"></i> Simpan
                        </button>
                        <a href="{{ url()->previous() }}" class="btn btn-subtle-danger">
                            <i class="mdi mdi mdi-close"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('custom_script')
    {{ js_(['select2']) }}
@endsection
