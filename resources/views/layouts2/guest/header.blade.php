<div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">

    <!-- Top Bar -->
    <div class="top-bar text-white-50 row gx-0 align-items-center d-none d-lg-flex">
        <div class="col-lg-6 px-5 text-start">
            <small><i class="fa fa-map-marker-alt me-2"></i>Rowo Sari, Rumbai</small>
            <small class="ms-4"><i class="fa fa-envelope me-2"></i>abing25@gmail.com</small>
        </div>
        <div class="col-lg-6 px-5 text-end">
            <small>Follow us:</small>
            <a class="text-white-50 ms-3" href="#"><i class="fab fa-facebook-f"></i></a>
            <a class="text-white-50 ms-3" href="#"><i class="fab fa-twitter"></i></a>
            <a class="text-white-50 ms-3" href="#"><i class="fab fa-linkedin-in"></i></a>
            <a class="text-white-50 ms-3" href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">

        <a href="{{ route('home') }}" class="navbar-brand ms-4 ms-lg-0 d-flex align-items-center">
            <img src="{{ asset('assets/img/logoo.png') }}" alt="Logo" style="height:70px" class="me-2">
            <h1 class="fw-bold text-primary m-0">
                Bantuan<span class="text-white">Sosial</span>
            </h1>
        </a>

        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ms-auto p-4 p-lg-0">

                <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                    <a href="{{ route('home') }}" class="nav-link d-flex align-items-center gap-2">
                        <i class="fa fa-home"></i> Home
                    </a>
                </li>

                <li class="nav-item {{ request()->routeIs('about') ? 'active' : '' }}">
                    <a href="{{ route('about') }}" class="nav-link d-flex align-items-center gap-2">
                        <i class="fa fa-info-circle"></i> About
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('index') }}" class="nav-link d-flex align-items-center gap-2">
                        <i class="fa fa-user-plus"></i> Pendaftar
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('program_bantuan.index') }}" class="nav-link d-flex align-items-center gap-2">
                        <i class="fa fa-list"></i> Program
                    </a>
                </li>

                <li class="nav-item {{ request()->routeIs('penerima-bantuan.*') ? 'active' : '' }}">
                    <a href="{{ route('penerima-bantuan.index') }}" class="nav-link d-flex align-items-center gap-2">
                        <i class="fa fa-hand-holding-heart"></i> Penerima Bantuan
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('verifikasi.index') }}" class="nav-link d-flex align-items-center gap-2">
                        <i class="fa fa-check-circle"></i> Lapangan
                    </a>
                </li>

                {{-- PAGES --}}
                <li class="nav-item dropdown {{
                    request()->routeIs('warga.*') ||
                    request()->routeIs('users.*') ||
                    request()->routeIs('riwayat-penyaluran.*')
                    ? 'active' : '' }}">
                    <a href="#" class="nav-link dropdown-toggle d-flex align-items-center gap-2" data-bs-toggle="dropdown">
                        <i class="fa fa-folder-open"></i> Pages
                    </a>

                    <ul class="dropdown-menu m-0">
                        <li>
                            <a href="{{ route('warga.index') }}" class="dropdown-item d-flex align-items-center gap-2">
                                <i class="fa fa-users"></i> Data Warga
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('users.index') }}" class="dropdown-item d-flex align-items-center gap-2">
                                <i class="fa fa-user-shield"></i> Data Users
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('riwayat-penyaluran.index') }}" class="dropdown-item d-flex align-items-center gap-2">
                                <i class="fa fa-history"></i> Riwayat Penyaluran
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('penerima.index') }}" class="nav-link d-flex align-items-center gap-2">
                        <i class="fa fa-handshake"></i> Bantuan
                    </a>
                </li>

                @guest
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link d-flex align-items-center gap-2">
                        <i class="fa fa-sign-in-alt"></i> Login
                    </a>
                </li>
                @endguest

                @auth
                <li class="nav-item dropdown">
                    <a href="#" class="btn btn-outline-primary rounded-pill dropdown-toggle d-flex align-items-center"
                       data-bs-toggle="dropdown">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(session('user')->name) }}"
                             class="rounded-circle me-2" width="35">
                        {{ session('user')->name }}
                    </a>

                    <ul class="dropdown-menu m-0 shadow-lg">
                        <li><a href="{{ route('profile') }}" class="dropdown-item">Profil Saya</a></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">@csrf
                                <button class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
                @endauth

            </ul>
        </div>
    </nav>
</div>
