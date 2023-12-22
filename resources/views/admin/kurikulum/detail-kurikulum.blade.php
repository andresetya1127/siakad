@extends('template.template')

@section('content')
    <!-- | Aseet | -->
@section('custom_style')
    {{ css_(['select2', 'select-bootstrap']) }}
@endsection

@section('custom_script')
    {{ js_(['sweatalert', 'select2', 'tempory']) }}
@endsection
<!-- || -->

<!-- | counter | -->
@php
    $stp = $kurikulum->mk_kurikulum->sum('sks_tatap_muka');
    $sp = $kurikulum->mk_kurikulum->sum('sks_praktek');
    $spl = $kurikulum->mk_kurikulum->sum('sks_praktek_lapangan');
    $ss = $kurikulum->mk_kurikulum->sum('sks_simulasi');
    $number = ($mk_kur->currentPage() - 1) * $mk_kur->perPage() + 1;
@endphp
<!-- || -->

<!-- | Card Counter | -->
@include('admin.kurikulum.card-counter')
<!-- || -->

<!-- | Detail Kurikulum | -->
<div class="col-12">
    <div class="card h-100 animate__animated animate__fadeInRight animate__faster">
        <div class="card-body ">
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
<!-- || -->

<!-- | Tabel Matakuliah Kurikulum | -->
<div class="col-12 mt-4">
    <div class="card animate__animated animate__fadeInRight animate__fast">
        <div class="card-body">

            <div class="text-end mb-3">
                <button type="button" class="me-2 btn btn-subtle-success" data-bs-toggle="modal"
                    data-bs-target="#add-mk">
                    <i class="fa fa-plus"></i> Matakuliah
                </button>
                @php
                    echo linkButton(route('pdf.kur.matakuliah', $kurikulum->id_kurikulum), 'me-2 btn-subtle-primary', 'PDF', 'fa-file-pdf');
                    echo linkButton('ss', 'me-2 btn-subtle-primary', 'Excel', 'fa-file-csv');
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
                            <th class="align-middle text-center fw-bold">Praktik Lapangan</th>
                            <th class="align-middle text-center fw-bold">Sumulasi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($mk_kur as $mk)
                            <tr>
                                <td class="text-center">{{ $number++ }}</td>
                                <td>{{ $mk->kode_mk }}</td>
                                <td>{{ $mk->matakuliah->nama_mk }}</td>
                                <td class="text-center">
                                    {{ $mk->matakuliah->sks_tatap_muka + $mk->matakuliah->sks_praktek_lapangan + $mk->matakuliah->sks_simulasi }}
                                </td>
                                <td class="text-center">{{ $mk->matakuliah->sks_tatap_muka }}</td>
                                <td class="text-center">{{ $mk->matakuliah->sks_praktek }}</td>
                                <td class="text-center">{{ $mk->matakuliah->sks_praktek_lapangan }}</td>
                                <td class="text-center">
                                    {{ $mk->matakuliah->sks_simulasi !== null ? $mk->matakuliah->sks_simulasi : '0' }}
                                </td>
                                <td class="text-center">{{ $mk->semester }}</td>
                                <td class="text-center">
                                    @php
                                        echo linkButton(route('delete.kur.matakuliah', [$mk->id_mk_kur, $mk->id_kurikulum]), 'btn btn-subtle-danger btn-delete', '', 'fa-trash');
                                    @endphp
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex justify-content-between mt-4" id="pagination">
                    <div class="">
                        <span>Showing <b>{{ $mk_kur->currentPage() * $mk_kur->count() }}</b> of
                            <b> {{ $mk_kur->total() }}</b> Data.
                        </span>
                    </div>
                    {{ $mk_kur->links() }}
                </div>

            </div>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="add-mk" tabindex="-1" role="dialog" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title align-self-center">Tambah Matakuliah Kurikulum</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Form Tempory -->
                <div class="modal-body">
                    <form action="#" id="form-tempory">
                        <div class="row">
                            <div class="col-7">
                                <div class="mb-3">
                                    <select name="matakuliah" id="matakuliah" class="select2 form-control"
                                        style="width: 100%;" required>
                                        <option selected>Program Studi</option>
                                        @foreach ($matakuliah as $mk)
                                            <option value="{{ $mk->kode_mk }}">{{ $mk->nama_mk }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <input type="number" name="semester" id="semester" class="form-control"
                                    placeholder="Semester..." required>
                            </div>
                            <div class="col-2">
                                <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </form>

                    <!-- Form Tempory -->
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <form method="POST" id="form-matakuliah"
                                    action="{{ route('save.kur.matakuliah', [$kurikulum->id_kurikulum, $kurikulum->id_prodi]) }}">
                                    @csrf
                                    <table class="table table-hover table-bordered mt-3" id="tbl-tempory">
                                        <thead>
                                            <tr>
                                                <th class="fw-bold">Kode MK</th>
                                                <th class="fw-bold">Semester</th>
                                                <th class="fw-bold">#</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-between">
                                        <div class="">
                                            <button type="button" class="btn btn-info" id="btn-reset-form">
                                                <i class="fa fa-arrows-rotate"></i> Reset
                                            </button>
                                        </div>
                                        <div class="">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                                                Simpan
                                            </button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                                Batal
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->

</div>
<!-- || -->
@endsection
