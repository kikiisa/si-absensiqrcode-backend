<div class="fixed-top">
    <nav class="navbar bg-dark position-static">
        <div class="container justify-content-center">
            <div class="row">
                <div class="col-lg-6">
                    <a href="" class="navbar-brand text-light fw-bold">E-ABSENSI</a>
                </div>
            </div>
        </div>
    </nav>
    @auth
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{Route('dashboard')}}"><i class="fa fa-fire"></i> BERANDA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{Route('daftar-absensi.index')}}"><i class="fa fa-list"></i> MASTER
                                ABSENSI</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{Route('pegawai.index')}}"><i class="fa fa-cube"></i> MASTER
                                KARYAWAN</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{Route('profile.index')}}"><i class="fa fa-user"></i> PROFILE</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{Route('pengaturan.index')}}"><i class="fa fa-wrench"></i> PENGATURAN</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{Route('auth.logout')}}"><i class="fa fa-sign-out" onclick="return confirm('apakah anda yakin ingin keluar ?')"></i> KELUAR</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    @endauth
</div>
