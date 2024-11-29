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
            <br>

            <div class="row">
                <!--Start Request Services One Form-->
                <div class="col-xl-12">
                    <div class="request-services-one__form-box">
                        <div class="request-services-one__form-tab tabs-box">
                            <ul class="tab-buttons clearfix list-unstyled">
                                <li data-tab="#chat" class="tab-btn {{ (Auth::check() && Auth::user()->status === 'Non Aktif') ? 'active-btn' : '' }}">
                                    <span>Chat</span>
                                </li>

                                <li data-tab="#info" class="tab-btn ">
                                    <span>Informasi</span>
                                </li>

                                <li data-tab="#profil" class="tab-btn {{ (Auth::check() && Auth::user()->status === 'Aktif') ? 'active-btn' : '' }}"><span>Profil</span></li>
                                @if (Auth::check() && Auth::user()->status === 'Aktif')
                                <li data-tab="#track" class="tab-btn"><span>Order Saya</span></li>
                                <li data-tab="#track" class="tab-btn"><span>Pembayaran</span></li>
                                @endif

                            </ul>

                            <div class="tabs-content">


                                <div class="tab {{ (Auth::check() && Auth::user()->status === 'Non Aktif') ? 'active-tab' : '' }}" id="chat">
                                    <div class="request-services-one__single-tab">
                                        <div class="request-services-one__form-top">
                                            <div class="title-box">
                                                <h3>Informasi Admin :</h3>
                                            </div>

                                            <div class="col-xl-12 col-lg-12 col-md-12">
                                                @if ($admin)
                                                <div class="chat-container mb-3">
                                                    @foreach ($messages as $message)
                                                    <div class="chat-message {{ $message->sender_id === auth()->id() ? 'sender' : 'receiver' }}">
                                                        <p>{{ $message->message }}</p>
                                                        <span class="chat-time">{{ $message->created_at->format('H:i') }}</span>
                                                    </div>
                                                    @endforeach
                                                </div>

                                                <form action="{{ route('chatting.send') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="receiver_id" value="{{ $admin->id }}">
                                                    <div class="input-group">
                                                        <textarea name="message" class="form-control" placeholder="Ketik pesan Anda di sini"></textarea>
                                                        <button type="submit" class="btn btn-primary">Kirim</button>
                                                    </div>
                                                </form>
                                                @else
                                                <p>Belum ada percakapan dengan admin.</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>






                                <div class="tab" id="info">

                                    <div class="request-services-one__single-tab">

                                        <div class="request-services-one__form-top">
                                            <div class="title-box">
                                                <h3>Informasi Umum :</h3>
                                            </div>

                                            <ul class="accrodion-grp faq-one__accrodion" data-grp-name="faq-one-accrodion" style="text-align: left;">
                                                @foreach ($informasi as $p)
                                                <!-- Start Faq One Single-->
                                                <li class="accrodion">
                                                    <div class="accrodion-title">
                                                        <h2><span>{{ $loop->iteration }}.</span> {{ $p->nama_informasi }}</h2>
                                                    </div>
                                                    <div class="accrodion-content">
                                                        <div class="inner">
                                                            <a href="/upload/informasi/{{ $p->gambar }}" target="_blank">
                                                                <img style="max-width:500px; max-height:500px"
                                                                    src="/upload/informasi/{{ $p->gambar }}" alt="">
                                                            </a>
                                                            <p style="color: white;">{!! $p->deskripsi !!}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <!-- End Faq One Single-->
                                                @endforeach
                                            </ul>

                                        </div>




                                    </div>
                                </div>
                                <!--End Single Tab-->

                                <!--Start Single Tab-->
                                <div class="tab {{ (Auth::check() && Auth::user()->status === 'Aktif') ? 'active-tab' : '' }}" id="profil">
                                    <div class="request-services-one__single-tab" style="text-align: left;">
                                        @if (session('success'))
                                        <div class="alert alert-success">{{ session('success') }}</div>
                                        @endif

                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif

                                        <form id="contact-form2"
                                            class="default-form2 contact-form-validated request-services-one__form"
                                            action="{{ route('area.updateKonsumen') }}" method="POST" novalidate="novalidate">
                                            @csrf


                                            <div class="request-services-one__form-top">
                                                <div class="title-box">
                                                    <h3>Data Umum :</h3>
                                                </div>
                                                <div class="row">
                                                    <!-- Nama Lengkap -->
                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                        <div class="input-box">
                                                            <label>Nama Lengkap</label>
                                                            <input type="text" name="name" id="name" value="{{ $user->name }}" placeholder="Nama Lengkap">
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
                                                    @if($konsumen->kategori_konsumen != 'personal')
                                                    <div class="col-xl-12 col-lg-12 col-md-12">
                                                        <div class="input-box">
                                                            <label>Nama Perusahaan</label>
                                                            <input type="text" name="nama_perusahaan" id="nama_perusahaan" value="{{ $konsumen->nama_perusahaan ?? '' }}" placeholder="Nama Perusahaan">
                                                        </div>
                                                    </div>
                                                    @endif
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
                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                        <div class="input-box">
                                                            <label>Email</label>
                                                            <input type="text" name="email" id="email" value="{{ $user->email }}" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                        <div class="input-box">
                                                            <label>Password</label>
                                                            <div class="password-wrapper">
                                                                <input
                                                                    type="text"
                                                                    id="password"
                                                                    name="password"
                                                                    placeholder="Password"
                                                                    class="password-input"
                                                                    oninput="">

                                                            </div>
                                                            @error('password')
                                                            <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

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