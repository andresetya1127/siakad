@extends('template.template')

@section('content')
    @include('template.sub-menu-mhs')

    <div class="col-lg-10">
        <div class="alert alert-info alert-dismissible fade show animate__animated animate__fadeInRight animate__faster"
            role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <h4><i class="mdi mdi-bell"></i> {{ $page }}</h4>
        </div>

        <div class="card animate__animated animate__fadeInRight">
            <div class="card-body">
                <div class="text-end">
                    <button type="button" class="btn btn-primary">
                        <i class="mdi mdi-content-save"></i>
                    </button>
                </div>
                <form action="" class="form" role="form">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                            <label for="example-email-input1" class="form-label pt-0">Nama</label>
                            <input class="form-control" type="text" value="{{ $mahasiswa->nm_pd }}" name="nama"
                                placeholder="Nama lengkap...">
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                            <label for="example-email-input1" class="form-label pt-0">NIM</label>
                            <input class="form-control" type="text" value="{{ $mahasiswa->nipd }}" name="nim"
                                placeholder="NIM...">
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                            <label for="example-email-input1" class="form-label pt-0">Tempat Lahir</label>
                            <input class="form-control" type="text" value="{{ $mahasiswa->tmpt_lahir }}" name="tmp_lahir"
                                placeholder="Tempat Lahir...">
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                            <label for="example-email-input1" class="form-label pt-0">Tanggal Lahir</label>
                            <input class="form-control" type="date" value="{{ $mahasiswa->tgl_lahir }}" name="tgl_lahir"
                                placeholder="Tanggal Lahir...">
                        </div>


                        <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                            <label for="example-email-input1" class="form-label pt-0">Jenis Kelamin</label>
                            <select class="form-select">
                                <option selected hidden value="{{ $mahasiswa->jk }}">
                                    {{ $mahasiswa->jk == 'L' ? 'Laki-Laki' : 'Prempuan' }}</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Prempuan</option>
                            </select>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                            <label for="" class="form-label pt-0">Agama</label>
                            <select class="form-select">
                                <option selected hidden value="{{ $mahasiswa->mahasiswa->id_agama }}">
                                    {{ $mahasiswa->mahasiswa->nm_agama }}
                                </option>
                                @foreach ($agama as $agm)
                                    <option value="{{ $agm->id_agama }}">{{ $agm->nm_agama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                            <label for="example-email-input1" class="form-label pt-0">Ibu Kandung</label>
                            <input class="form-control" type="text" value="{{ $mahasiswa->nm_ibu_kandung }}"
                                name="ibu_kandung" placeholder="Nama Ibu Kandung">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
