@extends('template.template')
@section('content')
    <div class="col-12">
        <div class="input-group mb-3">
            <input type="text" name="pencarian" class="form-control" placeholder="Pencarian...">
            <button type="button" class="btn btn-dark">Cari</button>
        </div>

        <div class="card animate__animated animate__fadeInRight">
            <div class="card-body">
                <div class="my-3 text-end">
                    @php
                        echo linkButton(route('add.kelas'), 'me-2 btn-subtle-success', 'Tambah', 'fa-plus');
                    @endphp
                </div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="thead-default table-dark ">
                            {{ getthead(['#', 'Semester', 'Kode MK', 'Nama Matakuliah', 'Nama Kelas', 'Bobot MK(sks)']) }}
                        </thead>
                        <tbody>
                            {{ getLoop($kelas, [
                                'option' => [
                                    'delete' => 'delete.kelasKuliah|id_kelas',
                                    'edit' => 'edit.kelasKuliah|id_kelas',
                                ],
                                'semester' => true,
                                'kode_mk' => true,
                                'nama_mk|rel' => 'matakuliah',
                                'nama_kelas' => true,
                                'sks_tatap_muka+sks_praktek_lapangan' => true,
                            ]) }}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
