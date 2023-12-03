<div class="col-lg-2">
    <div class="card">
        <div class="card-body">
            <div class="row">

                <div class="col-lg-12 col-md-4 col-sm-6 mb-4">
                    <a href="{{ route('mhs.detail', $mahasiswa->id_mahasiswa) }}" class="btn btn-subtle-primary ">
                        <i class="mdi mdi-account"></i> Profile Mahasiswa</a>
                </div>
                <div class="col-lg-12 col-md-4 col-sm-6 mb-4">
                    <a href="{{ route('mhs.krs', $mahasiswa->id_mahasiswa) }}" class="btn btn-subtle-primary ">
                        <i class="mdi mdi-printer-settings"></i> KRS Mahasiswa</a>
                </div>
                <div class="col-lg-12 col-md-4 col-sm-6 mb-4">
                    <a href="{{ route('mhs.activity', $mahasiswa->id_mahasiswa) }}" class="btn btn-subtle-primary ">
                        <i class="mdi mdi-chart-bar"></i> Aktivitas Pekuliahan</a>
                </div>
                <div class="col-lg-12 col-md-4 col-sm-6 mb-4">
                    <a href="{{ route('mhs.grade', $mahasiswa->id_mahasiswa) }}" class="btn btn-subtle-primary ">
                        <i class="mdi mdi-note-check"></i> Nilai</a>
                </div>
                <div class="col-lg-12 col-md-4 col-sm-6 mb-4">
                    <a href="{{ route('mhs.transkrip', $mahasiswa->id_mahasiswa) }}" class="btn btn-subtle-primary">
                        <i class="mdi mdi-printer"></i> Transkrip</a>
                </div>
                <div class="col-lg-12 col-md-4 col-sm-6 mb-4">
                    <a href="{{ route('mhs.guidance', $mahasiswa->id_mahasiswa) }}" class="btn btn-subtle-primary ">
                        <i class="mdi mdi-human-male-board"></i> Bimbingan Dosen PA</a>
                </div>
            </div>
        </div>
    </div>
</div>
