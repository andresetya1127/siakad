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
