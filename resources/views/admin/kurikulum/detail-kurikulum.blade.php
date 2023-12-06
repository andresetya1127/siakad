@extends('template.template')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body animate__animated animate__fadeInRight animate__faster">
                <h1 class="card-title mb-4">Kurikulum Perkuliahan</h1>

                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                        <label class="form-label pt-0">Nama Kurikulum</label>
                        <div class="">
                            <input class="form-control" type="text" value="{{ $kurikulum->nama_kurikulum }}" readonly>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                        <label class="form-label pt-0">Jumlah Bobot SKS Wajib</label>
                        <div class="">
                            <input class="form-control" type="text" value="{{ $kurikulum->jumlah_sks_wajib }}" readonly>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                        <label class="form-label pt-0">Program Studi</label>
                        <div class="">
                            <input class="form-control" type="text" value="{{ $kurikulum->prodi->nama_program_studi }}"
                                readonly>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                        <label class="form-label pt-0">Jumlah Bobot SKS Pilihan</label>
                        <div class="">
                            <input class="form-control" type="text" value="{{ $kurikulum->jumlah_sks_pilihan }}"
                                readonly>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                        <label class="form-label pt-0">Jumlah SKS</label>
                        <div class="">
                            <input class="form-control" type="text" value="{{ $kurikulum->jumlah_sks_lulus }}" readonly>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                        <label class="form-label pt-0">Masa Berlaku</label>
                        <div class="">
                            <input class="form-control" type="text" value="{{ $kurikulum->semester->nama_semester }}"
                                readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card animate__animated animate__fadeInRight animate__fast">
            <div class="card-body">
                <div class="text-end my-3">
                    @php
                        echo linkButton(route('add.kurikulum'), 'btn-subtle-success', 'Tambah', 'fa-plus');
                    @endphp
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered mb-0">
                        <thead ca>
                            <tr>
                                <th class="align-middle text-center fw-bold" rowspan="2">No</th>
                                <th class="align-middle text-center fw-bold" rowspan="2">Kode
                                    Mata Kuliah</th>
                                <th class="align-middle text-center fw-bold" rowspan="2">Nama
                                    Mata Kuliah</th>
                                <th class="align-middle text-center fw-bold" colspan="5">
                                    Bobot Matakuliah (sks)
                                </th>
                                <th class="align-middle text-center fw-bold" rowspan="2">
                                    Semester</th>
                                <th class="align-middle text-center fw-bold" rowspan="2">
                                    Action</th>
                            </tr>
                            <tr>
                                <th class="align-middle text-center fw-bold">Mata Kuliah</th>
                                <th class="align-middle text-center fw-bold">Tatap Muka</th>
                                <th class="align-middle text-center fw-bold">Praktikum</th>
                                <th class="align-middle text-center fw-bold">Prak Lapangan</th>
                                <th class="align-middle text-center fw-bold">Sumulasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kurikulum->mk_kurikulum as $mk)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $mk->kode_mk }}</td>
                                    <td>{{ $mk->matakuliah->nama_mk }}</td>
                                    <td>{{ $mk->matakuliah->sks_tatap_muka + $mk->matakuliah->sks_praktek_lapangan + $mk->matakuliah->sks_simulasi }}
                                    </td>
                                    <td>{{ $mk->matakuliah->sks_tatap_muka }}</td>
                                    <td>{{ $mk->matakuliah->sks_praktek }}</td>
                                    <td>{{ $mk->matakuliah->sks_praktek_lapangan }}</td>
                                    <td>
                                        {{ $mk->matakuliah->sks_simulasi !== null ? $mk->matakuliah->sks_simulasi : '0' }}
                                    </td>
                                    <td>{{ '0' }}</td>
                                    <td>
                                        @php
                                            echo linkButton(route('admin.index'), 'btn btn-subtle-danger', '', 'fa-trash');
                                        @endphp
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
