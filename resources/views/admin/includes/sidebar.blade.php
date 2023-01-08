        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Administration</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./index.html" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard v1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./index2.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard v2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./index3.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard v3</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="https://adminlte.io/docs/3.1/" class="nav-link">
                                <i class="nav-icon fas fa-file"></i>
                                <p>Documentation</p>
                            </a>
                        </li>
                        <li class="nav-header">Masters</li>
                        <li class="nav-item has-treeview" id="liMasterData">
                            <a href="#" class="nav-link active" id="MasterData">
                                <i class="nav-icon fa fa-globe"></i>
                                <p>
                                    Data Lokasi
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview ml-4">
                                <li class="nav-item">
                                    <a href="{{ route('kecamatan.index') }}" class="nav-link active" id="DataJadwal">
                                        <i class="fa fa-map-marker nav-icon"></i>
                                        <p>Kecamatan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('desa.index') }}" class="nav-link" id="DataJadwal">
                                        <i class="fa fa-map-marker nav-icon"></i>
                                        <p>Desa</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('sekolah.index') }}" class="nav-link" id="Pengumuman">
                                <i class="nav-icon fas fa-graduation-cap"></i>
                                <p>Data Sekolah</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('guru.index') }}" class="nav-link" id="Pengumuman">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Data Guru</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('siswa.index') }}" class="nav-link" id="Pengumuman">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Data Siswa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('ruangan.index') }}" class="nav-link" id="Pengumuman">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Data Ruangan</p>
                            </a>
                        </li>
                        <li class="nav-header">Announcement</li>
                        <li class="nav-item">
                            <a href="{{ route('pengumuman.index') }}" class="nav-link" id="Pengumuman">
                                <i class="nav-icon fas fa-clipboard"></i>
                                <p>Pengumuman</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('kegiatan.index') }}" class="nav-link" id="Pengumuman">
                                <i class="nav-icon fas fa-clipboard"></i>
                                <p>Kegiatan</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
