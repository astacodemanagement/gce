<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $profil->nama_profil }} | @yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="/upload/profil/{{ $profil->favicon }}">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('template/front') }}/assets/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('template/front') }}/assets/css/animate.min.css">
    <link rel="stylesheet" href="{{ asset('template/front') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('template/front') }}/assets/css/custom-animate.css">
    <link rel="stylesheet" href="{{ asset('template/front') }}/assets/css/icomoon.css">
    <link rel="stylesheet" href="{{ asset('template/front') }}/assets/css/jquery.magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('template/front') }}/assets/css/nice-select.css">
    <link rel="stylesheet" href="{{ asset('template/front') }}/assets/css/nouislider.min.css">
    <link rel="stylesheet" href="{{ asset('template/front') }}/assets/css/nouislider.pips.css">
    <link rel="stylesheet" href="{{ asset('template/front') }}/assets/css/odometer.css">
    <link rel="stylesheet" href="{{ asset('template/front') }}/assets/css/slick.css">
    <link rel="stylesheet" href="{{ asset('template/front') }}/assets/css/swiper.min.css">

    <link rel="stylesheet" href="{{ asset('template/front') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('template/front') }}/assets/css/responsive.css">
    <style>
        .grecaptcha-badge {
            visibility: hidden !important;
        }
    </style>
    <style>
        body {
            background-color: black;
            color: white;
            /* Untuk teks menjadi warna putih agar terlihat */
        }

        .main-header-one__bottom-right .btn-box .thm-btn::after {
            background-color: #121212;
        }

        .footer-one__top-subscribe-form button.thm-btn:after {
            background: #000000;
        }

        .faq-one__contact-info .btn-box .thm-btn::after {
            background-color: #000000;
        }

        .footer-social-link a {

            background: #12191a;
        }

        .service-one__single-img img {
            width: 100%;
            height: 200px;
            /* Sesuaikan tinggi gambar landscape */
            object-fit: cover;
            /* Mengatur gambar agar memenuhi area tanpa mengubah proporsi */
            object-position: center;
            /* Fokus gambar di tengah */
        }

        .service-one__single:after {
            background-color: black;
        }

        .service-one__single:hover:after {
            background-color: #12191a;

        }

        .img-box img,
        .img-box2 img {
            width: 100%;
            height: 200px;
            /* Sesuaikan tinggi gambar landscape */
            object-fit: cover;
            /* Menjaga proporsi gambar dan menutup area penuh */
            object-position: center;
            /* Gambar terpusat */
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #ffd550;
            background-clip: border-box;
            border: 0px solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: black;
            border-color: black;
        }
    </style>



    <style>
        .tracking-timeline {
            position: relative;
            padding-left: 20px;
            border-left: 3px solid #ddd;
            margin-top: 20px;
        }

        .timeline-step {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            position: relative;
            padding-left: 30px;
        }

        .timeline-step::before {
            content: "";
            position: absolute;
            left: 0;
            width: 20px;
            height: 20px;
            background-color: #ddd;
            border-radius: 50%;
            border: 3px solid #ddd;
        }

        .timeline-step.completed::before {
            background-color: #4CAF50;
            /* Hijau untuk step yang sudah selesai */
            border-color: #4CAF50;
        }

        .timeline-step.active::before {
            background-color: #FFA500;
            /* Warna oranye untuk step aktif */
            border-color: #FFA500;
        }

        .step-marker {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: inherit;
            border: 3px solid inherit;
        }

        .step-details h4 {
            margin: 0;
            font-size: 16px;
            font-weight: bold;
            color: #333;
        }

        .step-details p {
            margin: 5px 0 0;
            font-size: 14px;
            color: #666;
        }
    </style>
</head>

<body class="">

    <!-- preloader -->
    <div id="preloader">
        <div id="loading-center">
            <div class="loader">
                <div class="loader-outter"></div>
                <div class="loader-inner"></div>
            </div>
        </div>
    </div>
    <!-- preloader-end -->

    <!-- Scroll-top -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="icon-up"></i>
    </button>
    <!-- Scroll-top-end-->

    <div class="fix">


        <!--Start Main Header One -->
        <header class="main-header main-header-one">
            <div id="sticky-header" class="menu-area">
                <div class="main-header-one__outer" style="background-color: black; ">
                    <div class="logo-box-one" style="background-color: black; height: 100%;">
                        {{-- <div class="logo-box-one__bg"
                            style="background-image: url({{ asset('template/front') }}/assets/img/pattern/logo-box-one-pattern.png);">
                    </div> --}}
                    <a href="/">
                        <img src="/upload/profil/{{ $profil->logo }}" alt="Logo" width="80px;">
                    </a>
                </div>

                <div class="main-header-one__right">
                    <div class="container">
                        <div class="menu-area__inner">
                            <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                            <div class="menu-wrap">
                                <nav class="menu-nav">
                                    <div class="main-header-one__inner">


                                        <div class="main-header-one__bottom">
                                            <div class="main-header-one__bottom-left">
                                                <div class="navbar-wrap main-menu">
                                                    <ul class="navigation">
                                                        <li class="active"><a href="/">Beranda</a>
                                                        </li>
                                                        <li><a href="/layanan">Cek Resi</a>
                                                        </li>
                                                        <li><a href="/layanan">Layanan</a>
                                                        </li>

                                                        <li class="menu-item-has-children"><a
                                                                href="#">Informasi</a>
                                                            <ul class="sub-menu">
                                                                <li><a href="">FAQ</a></li>
                                                                <li><a href="">Informasi Paket
                                                                        Two</a></li>
                                                                <li><a href="">Terms</a></li>
                                                            </ul>
                                                        </li>

                                                        <li class="menu-item-has-children"><a href="#">Tentang
                                                                Kami</a>
                                                            <ul class="sub-menu">
                                                                <li><a href="">Profil</a>
                                                                </li>
                                                                <li><a href="">Berita & Acara</a>
                                                                </li>
                                                                <li><a href="">Karir</a>
                                                                </li>
                                                                <li><a href="/halaman_galeri">Galeri</a></li>
                                                                <li><a href="">Kontak</a></li>

                                                            </ul>
                                                        </li>

                                                        <li><a
                                                                href="">VIP</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="main-header-one__bottom-right">
                                                <div class="search-box">
                                                    <a href="#"
                                                        class="main-menu__search search-toggler icon-magnifying-glass"></a>
                                                </div>

                                                <div class="btn-box">
                                                    @if(Auth::check() && Auth::user()->role === 'pengguna')
                                                    <a class="thm-btn" href="/area" style="background-color: black; color:white; margin-right: 10px;">
                                                        <span class="txt" style="color: white">Dashboard</span>
                                                        <i class="fa-solid fa-user"></i>
                                                    </a>

                                                    <!-- Tombol Logout -->
                                                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        <button type="submit" class="thm-btn" style="background-color: red; color:white;">
                                                            <span class="txt" style="color: white">Logout</span>
                                                            <i class="fa-solid fa-sign-out-alt"></i>
                                                        </button>
                                                    </form>
                                                    @else
                                                    <a class="thm-btn" href="/login_pengguna" style="background-color: black; color:white;">
                                                        <span class="txt" style="color: white">Login / Daftar</span>
                                                        <i class="fa-solid fa-user"></i>
                                                    </a>
                                                    @endif
                                                </div>




                                            </div>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                        </div>

                        <!-- Mobile Menu  -->
                        <div class="mobile-menu" style="background-color: black;">
                            <nav class="menu-box">
                                <div class="close-btn"><i class="fas fa-times"></i></div>
                                {{-- <div class="nav-logo">
                                        <a href="/">
                                            <img src="/upload/profil/{{ $profil->logo }}" alt="Logo" >
                                </a>
                        </div> --}}
                        <br>
                        <div class="menu-outer">
                            <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                        </div>
                        <div class="contact-info">
                            <div class="icon-box"><span class="icon-telephone-handle-silhouette"></span>
                            </div>
                            <p><a href="tel:{{ $profil->no_wa }}">{{ $profil->no_wa }}</a>
                            </p>
                        </div>
                        <div class="social-links">
                            <ul class="clearfix list-wrap">
                                <li><a href="{{ $profil->facebook }}"><i
                                            class="fab fa-facebook-f"></i></a></li>
                                <li><a href="{{ $profil->twitter }}"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li><a href="{{ $profil->instagram }}"><i
                                            class="fab fa-instagram"></i></a></li>
                                <li><a href="{{ $profil->linkedin }}"><i
                                            class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="{{ $profil->youtube }}"><i class="fab fa-youtube"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="main-header-one__bottom-right">


                            <div class="btn-box">
                                @if(Auth::check() && Auth::user()->role === 'pengguna')
                                <a class="thm-btn" href="/area" style="background-color: black; color:white; margin-right: 10px;">
                                    <span class="txt" style="color: white">Dashboard</span>
                                    <i class="fa-solid fa-user"></i>
                                </a>

                                <!-- Tombol Logout -->
                                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="thm-btn" style="background-color: red; color:white;">
                                        <span class="txt" style="color: white">Logout</span>
                                        <i class="fa-solid fa-sign-out-alt"></i>
                                    </button>
                                </form>
                                @else
                                <a class="thm-btn" href="/login_pengguna" style="background-color: black; color:white;">
                                    <span class="txt" style="color: white">Login / Daftar</span>
                                    <i class="fa-solid fa-user"></i>
                                </a>
                                @endif
                            </div>



                        </div>
                        </nav>
                    </div>
                    <div class="menu-backdrop"></div>
                    <!-- End Mobile Menu -->
                </div>
            </div>
    </div>
    </div>
    </header>
    <!--End Main Header One -->


    @yield('content')

    <footer class="footer-one" style="background-color: black; ">
        {{-- <div class="footer-one__bg"
                style="background-image: url(https://blue.kumparan.com/image/upload/fl_progressive,fl_lossy,c_fill,q_auto:best,w_640/v1634025439/01gf36esnb7m5jknhf51d2ngrf.jpg);">
            </div> --}}


        <!--Start Footer Bottom -->
        <div class="footer-bottom" style="background-color: #12191a;">
            <div class="container">
                <div class="footer-bottom__inner">
                    <div class="copyright-text">
                        <p>© {{ date('Y') }} <a href="/">{{ $profil->nama_profil }}</a>
                            All Rights Reserved.</p>
                    </div>



                    <div class="copyright-menu">
                        <ul>
                            <li><a href="/dokumentasi_umum">Trams &amp; Condition <span
                                        class="icon-right-arrow-5"></span></a></li>
                            <li><a href="/dokumentasi_umum">Privacy Policy <span
                                        class="icon-right-arrow-5"></span></a>
                            </li>
                            <li><a href="/dokumentasi_umum">Support <span
                                        class="icon-right-arrow-5"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--End Footer Bottom -->
    </footer>
    </div>

    <div class="search-popup">
        <div class="search-popup__overlay search-toggler">
            <div class="search-popup__close-icon">
                <span class="icon-plus"></span>
            </div>
        </div>
        <div class="search-popup__content">
            <form action="#">
                <label for="search" class="sr-only">Cari disini</label>
                <input type="text" id="search" placeholder="Cari disini..." />
                <button type="submit" aria-label="search submit" class="btn-box">
                    <i class="icon-magnifying-glass"></i>
                </button>
            </form>
        </div>
    </div>

    <!-- JS here -->
    <script src="{{ asset('template/front') }}/assets/js/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('template/front') }}/assets/js/ajax-form.js"></script>
    <script src="{{ asset('template/front') }}/assets/js/bootstrap.min.js"></script>
    <script src="{{ asset('template/front') }}/assets/js/jquery.appear.js"></script>
    <script src="{{ asset('template/front') }}/assets/js/jquery.circleType.js"></script>
    <script src="{{ asset('template/front') }}/assets/js/jquery.lettering.min.js"></script>
    <script src="{{ asset('template/front') }}/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('template/front') }}/assets/js/jquery.nice-select.min.js"></script>
    <script src="{{ asset('template/front') }}/assets/js/jquery.odometer.min.js"></script>
    <script src="{{ asset('template/front') }}/assets/js/jquery-sidebar-content.js"></script>
    <script src="{{ asset('template/front') }}/assets/js/nouislider.min.js"></script>
    <script src="{{ asset('template/front') }}/assets/js/slick.min.js"></script>
    <script src="{{ asset('template/front') }}/assets/js/swiper.min.js"></script>
    <script src="{{ asset('template/front') }}/assets/js/wow.min.js"></script>

    <script src="{{ asset('template/front') }}/assets/js/main.js"></script>

</body>

</html>