@extends('template.template')

@section('content')
<div class="card animate__animated animate__fadeInRight">
    <div class="card-body">
        <div class="my-3 text-end">
            @php
            echo linkButton(route('tambah.matakuliah'), 'me-2 btn-subtle-info', 'Trash', 'fa-trash-arrow-up');
            echo linkButton(route('tambah.matakuliah'), 'me-2 btn-subtle-info', 'PDF', 'fa-print');
            echo linkButton(route('tambah.matakuliah'), 'me-2 btn-subtle-info', 'Excel', 'fa-file-csv');
            @endphp
        </div>
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="thead-default table-dark ">
                    {{ getThead(['Kode MK', 'Nama Matakuliah',  'Program Studi', 'Action']) }}
                </thead>
                <tbody>
                    {{ getLoop($matakuliah, [
                            'kode_mk' => true,
                            'nama_mk' => true,
                            'sks_tatap_muka+sks_praktek_lapangan' => true,
                            'kode_prodi' => true,
                        ]) }}
                </tbody>
            </table>

            <div class="d-flex justify-content-between mt-4">
                <div class="">
                    <span>Showing <b>{{ $matakuliah->currentPage() * $matakuliah->count() }}</b> of
                        <b> {{ $matakuliah->total() }}</b> Data.
                    </span>
                </div>

                {{ $matakuliah->links() }}

            </div>

        </div>
    </div>
</div>
</div>
@endsection
