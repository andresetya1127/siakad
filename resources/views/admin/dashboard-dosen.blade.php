@extends('template.template')
@section('content')
    <div class="col-12">
        <div class="text-end my-3">
            <button type="button" class="btn btn-success">
                <i class="fa-solid fa-plus"></i>
            </button>
        </div>
        <div class="card animate__animated animate__fadeInRight">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="thead-default">
                            <tr>
                                <th>#</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Email</th>
                                <th>No.Hp</th>
                                <th>Prodi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{ getLoop($user, ['add.dasd', 'show.link'], ['option', 'name.link=dosen-detail.name', 'email', 'password']) }}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
