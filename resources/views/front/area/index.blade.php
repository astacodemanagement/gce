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
<section class="request-services-one request-services-one--two">
    <div class="request-services-one--two__bg"
        style="background-image: url();"></div>
    <div class="shape2"><img src="{{ asset('template/front') }}/assets/img/shape/request-services-v2-shape1.png" alt=""></div>
    <div class="shape3"><img src="" alt=""></div>
    <div class="request-services-one--two__img1 float-bob-y">
        <img src=" " alt="">
    </div>

    <div class="container">
        <div class="sec-title-style3 text-center">
            <div class="sub-title center">
                <div class="icon">
                    <img src="assets/img/icon/title-marker-2.png" alt="">
                </div>
                <h5>Kelola Data Area Di sini</h5>
            </div>
            <h2>Sesuaikan dengan data diri anda</h2>
        </div>

        <div class="row">
            <!--Start Request Services One Form-->
            <div class="col-xl-12">
                <div class="request-services-one__form-box">
                    <div class="request-services-one__form-tab tabs-box">
                        <ul class="tab-buttons clearfix list-unstyled">
                            <li data-tab="#profil" class="tab-btn active-btn"><span>Profil</span></li>
                            <li data-tab="#track" class="tab-btn"><span>Order Saya</span></li>
                            <li data-tab="#track" class="tab-btn"><span>Pembayaran</span></li>
                        </ul>

                        <div class="tabs-content">

                            <!--Start Single Tab-->
                            <div class="tab active-tab" id="profil">
                                <div class="request-services-one__single-tab">
                                    <form id="contact-form2"
                                        class="default-form2 contact-form-validated request-services-one__form"
                                        action="assets/inc/sendemail.php" novalidate="novalidate">

                                        <div class="request-services-one__form-top">
                                            <div class="title-box">
                                                <h3>Informasi Umum :</h3>
                                            </div>
                                            <div class="row">
                                                <!-- Nama Lengkap -->
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="input-box">
                                                        <label>Nama Lengkap</label>
                                                        <input type="text" name="name" id="name" value="{{ $user->name }}" placeholder="Nama Lengkap" readonly>
                                                    </div>
                                                </div>

                                                <!-- Jenis Kelamin -->
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="input-box">
                                                        <label>Jenis Kelamin</label>
                                                        <div class="select-box">
                                                            <select class="selectmenu wide" name="jenis_kelamin" id="jenis_kelamin">
                                                                <option value="Laki-laki" {{ $konsumen->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                                                <option value="Perempuan" {{ $konsumen->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <!-- Tanggal Lahir -->
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="input-box">
                                                        <label>Tanggal Lahir</label>
                                                        <input type="date" class="form-control wide" name="tanggal_lahir" id="tanggal_lahir" value="{{ $konsumen->tanggal_lahir ?? '' }}" style="background-color: #3b3232; color:white;">
                                                    </div>
                                                </div>

                                                <!-- No Telp -->
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="input-box">
                                                        <label>No Telp</label>
                                                        <input type="number" name="no_telp" id="no_telp" value="{{ $konsumen->no_telp ?? '' }}" placeholder="No Telp">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="request-services-one__form-bottom">
                                            <div class="title-box">
                                                <h3>Data Pelengkap :</h3>
                                            </div>

                                            <!-- Alamat -->
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12">
                                                    <div class="input-box">
                                                        <label>Alamat</label>
                                                        <textarea class="form-control" name="alamat" style="height: 80px;">{{ $konsumen->alamat ?? '' }}</textarea>
                                                        @error('alamat')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Nama Perusahaan -->
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12">
                                                    <div class="input-box">
                                                        <label>Nama Perusahaan</label>
                                                        <input type="text" name="nama_perusahaan" id="nama_perusahaan" value="{{ $konsumen->nama_perusahaan ?? '' }}" placeholder="Nama Perusahaan">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Kode Referal -->
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12">
                                                    <div class="input-box">
                                                        <label>Kode Referal</label>
                                                        <input type="text" name="kode_referal" id="kode_referal" value="{{ $konsumen->kode_referal ?? '' }}" placeholder="Kode Referal" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="request-services-one__form-bottom-tag">
                                                <div class="title">
                                                    <h3>Akun :</h3>
                                                </div>
                                            </div>

                                            <!-- Data Akun -->
                                            <br>
                                            <div class="row">
                                                <div class="col-xl-4 col-lg-4 col-md-4">
                                                    <div class="input-box">
                                                        <label>Email</label>
                                                        <input type="text" name="email" id="email" value="{{ $user->email }}" placeholder="Email" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-md-4">
                                                    <div class="input-box">
                                                        <label>Password</label>
                                                        <input type="text" id="password" placeholder="Password" name="password" class="password-input" oninput="maskPassword(this)">
                                                        @error('password')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-md-4">
                                                    <div class="input-box">
                                                        <label>Konfirmasi Password</label>
                                                        <input type="text" id="confirmation_password" placeholder="Ulangi Password" name="password_confirmation" class="password-input" oninput="maskPassword(this)">
                                                        @error('password_confirmation')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                        <div id="password_match_message" style="margin-top: 5px;"></div>
                                                    </div>
                                                </div>

                                                <script>
                                                    function maskPassword(input) {
                                                        const originalValue = input.value; // ambil nilai asli
                                                        const maskedValue = originalValue.replace(/./g, '•'); // ganti semua karakter dengan titik (•)
                                                        input.setAttribute('data-value', originalValue); // simpan nilai asli di atribut data
                                                        input.value = maskedValue; // set nilai yang dimask
                                                        checkPasswordMatch(); // Panggil fungsi untuk memeriksa kecocokan password setiap kali ada perubahan
                                                    }

                                                    // Menangkap input saat diklik dan mengembalikan nilai asli
                                                    document.querySelectorAll('.password-input').forEach(input => {
                                                        input.addEventListener('focus', function() {
                                                            this.value = this.getAttribute('data-value') || ''; // mengembalikan nilai asli saat fokus
                                                        });
                                                    });

                                                    // Fungsi untuk memeriksa kecocokan password
                                                    function checkPasswordMatch() {
                                                        var password = document.getElementById('password').getAttribute('data-value') || ''; // ambil nilai asli dari password
                                                        var confirmationPassword = document.getElementById('confirmation_password').getAttribute('data-value') || ''; // ambil nilai asli dari konfirmasi password
                                                        var passwordMatchMessage = document.getElementById('password_match_message');

                                                        // Periksa apakah password dan konfirmasi password sama
                                                        if (password !== confirmationPassword) {
                                                            passwordMatchMessage.textContent = 'Password belum sama.';
                                                            passwordMatchMessage.style.color = 'red';
                                                        } else {
                                                            passwordMatchMessage.textContent = 'Password sudah sama.';
                                                            passwordMatchMessage.style.color = 'green';
                                                        }
                                                    }

                                                    // Tambahkan event listener ke input password untuk memeriksa kecocokan setiap kali diketik
                                                    document.getElementById('password').addEventListener('keyup', checkPasswordMatch);
                                                    document.getElementById('confirmation_password').addEventListener('keyup', checkPasswordMatch);
                                                </script>
                                            </div>
                                        </div>

                                        <!-- Tombol Submit -->
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6">
                                                <div class="request-services-one__form-btn">
                                                    <button class="thm-btn" type="submit" data-loading-text="Please wait...">
                                                        <span class="txt">Update Data</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <!--End Single Tab-->

                            <!--Start Single Tab-->
                            <div class="tab" id="track">
                                <div class="request-services-one__single-tab">
                                    <!--Start Working Process One-->

                                    <!--Start Work process Two-->
                                    <section class="work-process-two" style="margin-top: -100px;">
                                        <div class="container">
                                            <div class="sec-title-style3 text-center">
                                                <div class="sub-title center">
                                                    <div class="icon">
                                                        <img src="asset('template/front') }}/assets/img/icon/title-marker.png" alt="">
                                                    </div>
                                                    <h5>Periksa Barang Anda</h5>
                                                </div>
                                                <h2>Cek Posisi Barang</h2>
                                            </div>
                                            <div class="row">
                                                <!--Start Work process Two Single-->
                                                <div class="col-xl-4 col-lg-4 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                                    <div class="work-process-two__single">
                                                        <div class="shape1"><img src=" assets/img/shape/work-process-v2-shape1.png" alt=""></div>
                                                        <div class="work-process-two__single-icon">
                                                            <div class="inner">
                                                                <span class="icon-enter-product-details"></span>
                                                            </div>
                                                        </div>

                                                        <div class="work-process-two__single-text">
                                                            <h3>Posisi - 1 </h3>
                                                            <h2>Enter Product Details</h2>
                                                            <p>Once you place your order via mail or fax our field staff will collect the documents
                                                                and consignments from.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--End Work process Two Single-->

                                                <!--Start Work process Two Single-->
                                                <div class="col-xl-4 col-lg-4 wow fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                                                    <div class="work-process-two__single">
                                                        <div class="shape1"><img src=" assets/img/shape/work-process-v2-shape1.png" alt=""></div>
                                                        <div class="work-process-two__single-icon">
                                                            <div class="inner">
                                                                <span class="icon-pay-your-service-tag"></span>
                                                            </div>
                                                        </div>

                                                        <div class="work-process-two__single-text">
                                                            <h3>Posisi - 2 </h3>
                                                            <h2>Pay Your Service Tag</h2>
                                                            <p>Once you place your order via mail or fax our field staff will collect the documents
                                                                and consignments from.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--End Work process Two Single-->

                                                <!--Start Work process Two Single-->
                                                <div class="col-xl-4 col-lg-4 wow fadeInLeft" data-wow-delay="400ms" data-wow-duration="1500ms">
                                                    <div class="work-process-two__single">
                                                        <div class="work-process-two__single-icon">
                                                            <div class="inner">
                                                                <span class="icon-road-transport t5"></span>
                                                            </div>
                                                        </div>

                                                        <div class="work-process-two__single-text">
                                                            <h3>Posisi - 3 </h3>
                                                            <h2>Ready To Go Your Goods</h2>
                                                            <p>Once you place your order via mail or fax our field staff will collect the documents
                                                                and consignments from.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--End Work process Two Single-->
                                            </div>
                                        </div>
                                    </section>
                                    <!--End Work process Two-->


                                    <div class="tracking-timeline">
                                        <!-- Step 1: Order Placed -->
                                        <div class="timeline-step completed">
                                            <div class="step-marker"></div>
                                            <div class="step-details">
                                                <h4>Pesanan Dibuat</h4>
                                                <p>Pesanan telah diterima pada 01-11-2024</p>
                                            </div>
                                        </div>

                                        <!-- Step 2: Order Processed -->
                                        <div class="timeline-step completed">
                                            <div class="step-marker"></div>
                                            <div class="step-details">
                                                <h4>Pesanan Diproses</h4>
                                                <p>Pesanan sedang diproses pada 02-11-2024</p>
                                            </div>
                                        </div>

                                        <!-- Step 3: In Transit -->
                                        <div class="timeline-step active">
                                            <div class="step-marker"></div>
                                            <div class="step-details">
                                                <h4>Dalam Pengiriman</h4>
                                                <p>Pesanan sedang dalam perjalanan pada 03-11-2024</p>
                                            </div>
                                        </div>

                                        <!-- Step 4: Out for Delivery -->
                                        <div class="timeline-step">
                                            <div class="step-marker"></div>
                                            <div class="step-details">
                                                <h4>Pesanan Siap Dikirim</h4>
                                                <p>Pesanan keluar untuk pengantaran</p>
                                            </div>
                                        </div>

                                        <!-- Step 5: Delivered -->
                                        <div class="timeline-step">
                                            <div class="step-marker"></div>
                                            <div class="step-details">
                                                <h4>Pesanan Diterima</h4>
                                                <p>Pesanan telah diterima</p>
                                            </div>
                                        </div>
                                    </div>




                                </div>
                            </div>
                            <!--End Single Tab-->
                        </div>
                    </div>
                </div>
            </div>
            <!--End Request Services One Form-->
        </div>
    </div>
</section>
<!--End Request Services One-->





@endsection


@push('scripts')

@endpush