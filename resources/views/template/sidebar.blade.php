        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">
                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title">Dashboard</li>

                        <li>
                            <a href="{{ route('mhs.dashboard') }}" class="waves-effect">
                                <i class="mdi mdi-account-school-outline"></i>
                                <span>Mahasiswa</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('dosen.dashboard') }}" class=" waves-effect">
                                <i class="mdi mdi-human-male-board"></i>
                                <span>Dosen</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="mdi mdi-book-open-page-variant"></i>
                                <span>Perkuliahan</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('admin.matakuliah') }}">Mata Kuliah</a></li>
                                <li><a href="{{ route('admin.kurikulum') }}">Kurikulum</a></li>
                                <li><a href="{{ route('admin.kelas') }}">Kelas Kuliah</a></li>
                                <li><a href="index-3.html">Nilai</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="calendar.html" class=" waves-effect">
                                <i class="mdi mdi-cog-play-outline"></i>
                                <span>Setting Periode</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->
