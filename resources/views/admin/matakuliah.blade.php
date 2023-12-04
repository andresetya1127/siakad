@extends('template.template')
@section('content')
    <div class="col-12">
        <div class="card animate__animated animate__fadeInRight">
            <div class="card-body">
                <div class="text-end my-3">
                    @php
                        echo linkButton(route('admin.index'), 'btn-success', 'Tambah', 'fa-plus');
                    @endphp
                </div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="thead-default table-dark ">
                            {{ getThead(['#', 'Kode MK', 'Nama Matakuliah', 'Bobot MK(sks)', 'Program Studi', 'Jenis MK', 'Aksi']) }}
                        </thead>
                        <tbody>
                            {{ getLoop($matakuliah, [
                                'number++' => true,
                                'kode_mk' => true,
                                'nama_mk' => true,
                                'sks_tatap_muka+sks_praktek_lapangan' => true,
                                'kode_prodi' => true,
                                'jenis_mk' => true,
                                'option' => [
                                    'edit' => 'mhs.grade|id_matkul',
                                    'show' => 'admin.kelas',
                                ],
                            ]) }}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
