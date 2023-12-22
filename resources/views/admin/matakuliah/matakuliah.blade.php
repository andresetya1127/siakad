@extends('template.template')

@section('content')
    <div class="col-12">
        <form action="{{ route('cari.matakuliah') }}" method="GET">
            <div class="input-group mb-3" class="form">
                <input type="text" name="data_result" class="form-control" placeholder="Pencarian...">
                <button type="submit" class="btn btn-dark">Cari</button>
            </div>
        </form>
    </div>

    <div class="card animate__animated animate__fadeInRight">
        <div class="card-body">
            <div class="my-3 text-end">
                <a href="{{ route('tambah.matakuliah') }}" class="me-2 btn btn-subtle-success">
                    <i class="fa fa-plus"></i> Tambah
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="thead-default table-dark ">
                        {{ getThead(['#', 'Kode MK', 'Nama Matakuliah', 'Bobot MK(sks)', 'Program Studi', 'Jenis MK']) }}
                    </thead>
                    <tbody>
                        {{ getLoop($matakuliah, [
                            'option' => [
                                'delete' => 'delete.matakuliah|id_matkul',
                                'edit' => 'edit.matakuliah|id_matkul',
                            ],
                            'kode_mk' => true,
                            'nama_mk' => true,
                            'sks_tatap_muka+sks_praktek_lapangan' => true,
                            'kode_prodi' => true,
                            'jenis_mk' => true,
                        ]) }}
                    </tbody>
                </table>

                <!--Pagination -->
                <div class="d-flex justify-content-between mt-4">
                    <div class="">
                        <span>Showing <b>{{ $matakuliah->currentPage() * $matakuliah->count() }}</b> of
                            <b> {{ $matakuliah->total() }}</b> Data.
                        </span>
                    </div>
                    {{ $matakuliah->links() }}
                </div>
                <!--End Pagination -->

            </div>
        </div>
    </div>
    </div>
@endsection
