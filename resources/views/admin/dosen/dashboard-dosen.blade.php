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
                        echo linkButton(route('admin.index'), 'btn-subtle-success', 'Tambah', 'fa-plus');
                    @endphp
                </div>

                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="thead-default">
                            {{ getThead(['#', 'nama', 'Alamat']) }}
                        </thead>
                        <tbody>
                            {{-- {{ getLoop($mahasiswa, [
                                'option' => [
                                    'show' => true,
                                    'edit' => 'lin',
                                    'delete' => true,
                                ],
                                'nm_pd|link' => 'mhs.detail|id_mahasiswa',
                                'tmpt_lahir' => true,
                                'nipd' => true,
                                'jk' => true,
                                'nm_agama|rel' => 'mahasiswa',
                                'kode_jurusan' => true,
                            ]) }} --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
