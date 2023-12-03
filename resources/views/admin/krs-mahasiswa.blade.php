@extends('template.template')

@section('content')
    @include('template.sub-menu-mhs')

    <div class="col-lg-10">
        <div class="alert alert-info alert-dismissible fade show animate__animated animate__fadeInRight animate__faster"
            role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <h4><i class="mdi mdi-bell"></i> {{ $page }}</h4>
        </div>

        <div class="card animate__animated animate__fadeInRight">
            <div class="card-body">
                <div class="text-end">
                    <button type="button" class="btn btn-primary">
                        <i class="mdi mdi-content-save"></i>
                    </button>
                </div>
                <form action="" class="form" role="form">
                    @csrf
                    <div class="row">
                        {{ getInputText('Nama', 'text', 'nm_pd', $mahasiswa->nm_pd) }}
                        {{ getSelect(['L' => 'Laki-laki', 'P' => 'Prempuan'], false, 'Jenis Kelamin', 'jk', $mahasiswa->jk == 'L' ? 'Laki-Laki' : 'Prempuan') }}
                        {{ getInputText('Tanggal Lahir', 'date', 'tgl_lair', $mahasiswa->tgl_lahir) }}
                        {{ getInputText('Ibu Kandung', 'text', 'nm_ibu', $mahasiswa->nm_ibu_kandung) }}
                        {{ getSelect($agama, 'id_agama|nm_agama', 'Agama', 'agama', $mahasiswa->mahasiswa->nm_agama) }}
                        {{ getInputText('Prodi', 'text', 'prodi', $mahasiswa->kode_jurusan) }}
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
