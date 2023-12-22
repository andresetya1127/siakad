@extends('template.template')
@section('content')
    <div class="col-12">
        <form action="{{ route('cari.kurikulum') }}" method="get">
            <div class="input-group mb-3">
                <input type="text" name="data_result" class="form-control" placeholder="Pencarian...">
                <button type="submit" class="btn btn-dark">Cari</button>
            </div>
        </form>

        <div class="card animate__animated animate__fadeInRight">
            <div class="card-body">
                <div class="my-3 text-end">
                    @php
                        echo linkButton(route('add.kurikulum'), 'me-2 btn-subtle-success', 'Tambah', 'fa-plus');
                    @endphp
                </div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="thead-default table-dark ">
                            {{ getthead(['Action', 'Kurikulum', 'Program Studi', 'Mulai Berlaku', 'SKS Lulus', 'SKS Wajib', 'SKS Pilihan']) }}
                        </thead>
                        <tbody>
                            {{ getLoop($kurikulum, [
                                'option' => [
                                    'edit' => 'edit.kurikulum|id_kurikulum',
                                    'show' => 'view.kurikulum|id_kurikulum',
                                ],
                                'nama_kurikulum' => true,
                                'nama_program_studi|rel' => 'prodi',
                                'nama_semester|rel' => 'semester',
                                'jumlah_sks_wajib' => true,
                                'jumlah_sks_wajib+jumlah_sks_pilihan' => true,
                                'jumlah_sks_pilihan' => true,
                            ]) }}
                        </tbody>
                    </table>
                </div>

                <!--Pagination -->
                <div class="d-flex justify-content-between mt-4">
                    <div class="">
                        <span>Showing <b>{{ $kurikulum->currentPage() * $kurikulum->count() }}</b> of
                            <b> {{ $kurikulum->total() }}</b> Data.
                        </span>
                    </div>
                    {{ $kurikulum->links() }}
                </div>
                <!--End Pagination -->

            </div>
        </div>
    </div>
@endsection
