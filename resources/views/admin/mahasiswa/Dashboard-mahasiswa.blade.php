@extends('template.template')
@section('content')
    <div class="col-12">
        <div class="input-group mb-3">
            <input type="text" name="pencarian" class="form-control" placeholder="Pencarian...">
            <button type="button" class="btn btn-dark">Cari</button>
        </div>

        <div class="card animate__animated animate__fadeInRight">
            <div class="card-body">
                <div class="text-end my-3">
                    @php
                        echo linkButton(route('add.mhs'), 'btn-subtle-success', 'Tambah', 'fa-plus');
                    @endphp
                </div>

                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="thead-default table-dark ">
                            {{ getthead(['#', 'nama', 'Tempat Lahir', 'NIM', 'Jenis Kelamin', 'Agama', 'Jurusan']) }}
                        </thead>
                        <tbody>
                            {{ getLoop($mahasiswa, [
                                'option' => [
                                    'show' => 'mhs.detail|id_mahasiswa',
                                    'edit' => 'lin',
                                ],
                                'nm_pd|link' => 'mhs.detail|id_mahasiswa',
                                'tmpt_lahir' => true,
                                'nipd' => true,
                                'jk' => true,
                                'nm_agama|rel' => 'mahasiswa',
                                'kode_jurusan' => true,
                            ]) }}

                        </tbody>
                    </table>
                </div>

                <!--Pagination -->
                <div class="d-flex justify-content-between mt-4">
                    <div class="">
                        <span>Showing <b>{{ $mahasiswa->currentPage() * $mahasiswa->count() }}</b> of
                            <b> {{ $mahasiswa->total() }}</b> Data.
                        </span>
                    </div>
                    {{ $mahasiswa->links() }}
                </div>
                <!--End Pagination -->

            </div>
        </div>
    </div>
@endsection
