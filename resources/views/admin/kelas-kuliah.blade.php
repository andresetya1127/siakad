@extends('template.template')
@section('content')
    <div class="col-12">
        <div class="input-group mb-3">
            <input type="text" name="pencarian" class="form-control" placeholder="Pencarian...">
            <button type="button" class="btn btn-dark">Cari</button>
            @php
                echo linkButton(route('admin.index'), 'btn-success', 'Tambah', 'fa-plus');
            @endphp
        </div>

        <div class="card animate__animated animate__fadeInRight">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="thead-default table-dark ">
                            {{ getthead(['#', 'nama', 'Tempat Lahir', 'NIM', 'Jenis Kelamin', 'Agama', 'Jurusan']) }}
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
