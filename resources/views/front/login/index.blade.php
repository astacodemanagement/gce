@extends('front.layouts.app')
@section('title', $title)
@section('subtitle', $subtitle)

@push('css')
@endpush


@section('content')

<!--Start Page Header-->
<section class="page-header">
    <div class="page-header__bg" style="background-image: url({{ asset('template/front') }}/hero.png)">
    </div>
    <div class="container">
        <div class="page-header__inner text-center">
            <h2>Halaman {{ $subtitle }}</h2>
            <ul class="thm-breadcrumb">
                <li><a href="/">Beranda</a></li>
                <li><span class="icon-right-arrow-5"></span></li>
                <li>{{ $subtitle }}</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Header-->

<!--Start Request Services One-->
<section class="request-services-one" style="margin-top: -50px;">
    <div class="container">
        <div class="request-services-one__top">
            <div class="sec-title">
                <div class="sub-title">
                    <h5><span class="icon-right-arrow-1"></span>Anda Belum punya akun? <a href="/pendaftaran" style="color: white;">silahkan Daftar disini!</a></h5>
                </div>
                <h2>Mari Bergabung Bersama Kami</h2>
            </div>
        </div>

        <div class="row justify-content-center">
            <!--Start Single Tab-->
            <div class="col-xl-6 col-lg-8 col-md-10">
                <div class="tab" id="track">
                    <div class="request-services-one__single-tab">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form id="contact-form2" class="default-form2 contact-form-validated request-services-one__form"
                            action="{{ route('login_pengguna') }}" method="POST" novalidate="novalidate">
                            @csrf

                            <div class="request-services-one__form-top">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12">
                                        <div class="input-box">
                                            <label>Email</label>
                                            <input type="email" name="email" id="email" value="" placeholder="Masukkan Email" required="">
                                            
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12">
                                        <div class="input-box">
                                            <label>Password</label>
                                            <input type="text" id="password" name="password" class="password-input" placeholder="Masukkan Password" required="">
                                            
                                            <div style="margin-top: 5px;">
                                                <span id="toggle-password" style="color: gray; cursor: pointer;">Lihat Password</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Span untuk link daftar -->
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div style="margin-bottom: 10px;">
                                        <span style="color: grey;">Belum punya akun? <a href="/pendaftaran" style="color: #007bff;">Daftar sekarang</a></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="request-services-one__form-btn">
                                        <button type="submit" class="thm-btn">
                                            <span class="txt">Masuk Sekarang</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- CSS untuk format password -->
            <style>
                .password-input {
                    -webkit-text-security: disc;
                    /* Mengubah input menjadi tampilan password */
                }
            </style>

            <!-- jQuery untuk fungsi toggle password -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#toggle-password').on('click', function() {
                        // Cek apakah password saat ini terlihat atau tidak
                        let input = $('#password');
                        if (input.css('-webkit-text-security') === 'disc') {
                            // Jika saat ini tersembunyi, tampilkan password
                            input.css('-webkit-text-security', 'none');
                            $(this).text('Sembunyikan Password'); // Ubah teks menjadi 'Sembunyikan Password'
                        } else {
                            // Jika saat ini terlihat, sembunyikan password
                            input.css('-webkit-text-security', 'disc');
                            $(this).text('Lihat Password'); // Ubah teks menjadi 'Lihat Password'
                        }
                    });
                });
            </script>

            <!--End Single Tab-->
        </div>
    </div>


</section>
<!--End Request Services One-->





@endsection


@push('scripts')
@endpush