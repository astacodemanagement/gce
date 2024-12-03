@extends('front.layouts.app')
@section('title', $title)
@section('subtitle', $subtitle)





@push('css')

<!-- <style>
    /* Efek hover dengan hanya shadow */
    .btn-light {
        transition: box-shadow 0.3s ease;
        /* Transisi halus untuk shadow */
    }

    .btn-light:hover {
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        /* Tambahkan shadow saat hover */
    }


    /* Background color for active tab */
    .nav-tabs .nav-link.active {
        background-color: #007bff;
        /* Ganti dengan warna yang diinginkan */
        color: #fff;
        /* Warna teks untuk tab aktif */
        border: 1px solid #007bff;
        /* Warna border */
        border-radius: 5px;
        /* Membuat sudut melengkung */
    }

    /* Background color for inactive tabs */
    .nav-tabs .nav-link {
        background-color: #f8f9fa;
        /* Ganti dengan warna yang diinginkan */
        color: #fff;
        /* Warna teks untuk tab tidak aktif */
        border: 1px solid #ddd;
        /* Warna border */
        border-radius: 5px;
        /* Membuat sudut melengkung */
        margin-right: 5px;
        /* Memberi jarak antar tab */

    }

    /* Hover effect for inactive tabs */
    .nav-tabs .nav-link:hover {
        background-color: #e9ecef;
        /* Warna saat hover */
        color: #000;
        /* Warna teks saat hover */
        cursor: pointer;
        /* Ubah kursor menjadi pointer */
    }




    /* 
    .list-group-item {
        cursor: pointer;
        transition: all 0.2s;
    }

    .list-group-item:hover {
        background-color: #f0f0f0;
    }

    .tracking-timeline {
        border-left: 3px solid #007bff;
        padding-left: 20px;
    } */
</style> -->

<!-- CSS DataTables CDN -->

<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
<style>
    #example th,
    #example td,
    #example1 th,
    #example1 td,
    #example2 th,
    #example2 td,
    #example3 th,
    #example3 td,
    #example4 th,
    #example4 td,
    #example5 th,
    #example5 td {
        text-align: left;
    }
</style>


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
                <!-- <div class="icon">
                    <img src="assets/img/icon/title-marker-2.png" alt="">
                </div> -->
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
                                <li data-tab="#payment" class="tab-btn"><span>Pembayaran</span></li>
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

                                <div class="tab" id="track">
                                    <div class="request-services-one__single-tab">
                                        <section class="work-process-two" style="margin-top: -100px;">
                                            <div class="container">
                                                <div class="row">
                                                    <!-- Nav Tabs -->
                                                    <ul class="nav nav-tabs" id="workProcessTabs" role="tablist">
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link active" id="proses-packing-tab" data-bs-toggle="tab" data-bs-target="#proses-packing" type="button" role="tab" aria-controls="proses-packing" aria-selected="true">
                                                                Proses Packing
                                                            </button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link" id="proses-pengiriman-tab" data-bs-toggle="tab" data-bs-target="#proses-pengiriman" type="button" role="tab" aria-controls="proses-pengiriman" aria-selected="false">
                                                                Proses Pengiriman
                                                            </button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link" id="sudah-sampai-tab" data-bs-toggle="tab" data-bs-target="#sudah-sampai" type="button" role="tab" aria-controls="sudah-sampai" aria-selected="false">
                                                                Sudah Sampai
                                                            </button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link" id="sudah-diambil-tab" data-bs-toggle="tab" data-bs-target="#sudah-diambil" type="button" role="tab" aria-controls="sudah-diambil" aria-selected="false">
                                                                Sudah Diambil
                                                            </button>
                                                        </li>
                                                    </ul>

                                                    <div class="tab-content">
                                                        <!-- Proses Packing -->
                                                        <div class="tab-pane fade show active" id="proses-packing" role="tabpanel">

                                                            <table id="example" class="display nowrap" style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th width="3%">No</th>
                                                                        <th width="200px">Tanggal Kirim</th>
                                                                        <th style="min-width:300px">Kode Resi</th>
                                                                        <th>Nama Pengirim</th>
                                                                        <th>Nama Barang</th>
                                                                        <th>Total Koli</th>
                                                                        <th>Berat</th>
                                                                        <th style="min-width: 200px;">Kota Asal</th>
                                                                        <th style="min-width: 250px;">Kota Tujuan</th>
                                                                        <th style="min-width: 150px; text-align:left;">Total Bayar</th>
                                                                        <th>Status Bayar</th>
                                                                        <th>Status Bawa</th>
                                                                        <th>Status Batal</th>
                                                                        <th>Jenis Pembayaran</th>
                                                                        <th style="min-width: 250px;">Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @php $i = 1; @endphp
                                                                    @foreach ($transaction_proses_packing as $p)
                                                                    <tr>
                                                                        <td>{{ $i }}</td>
                                                                        <td>{{ $p->tanggal_kirim}}</td>
                                                                        <td>{{ $p->kode_resi}}</td>
                                                                        <td>{{ $p->nama_konsumen}}</td>
                                                                        <td>{{ $p->nama_barang}}</td>
                                                                        <td>{{ $p->koli}}</td>
                                                                        <td>{{ $p->berat}}</td>
                                                                        <td><b>{{ $p->cabangAsal?->nama_cabang }}</b></td>
                                                                        <td>{{ $p->cabangTujuan?->nama_cabang }}</td>
                                                                        <td>{{ $p->total_bayar}}</td>
                                                                        @if($p->status_bayar === 'Belum Lunas')
                                                                        <td><span class="float-left badge bg-danger">{{ $p->status_bayar }}</span></td>
                                                                        @elseif($p->status_bayar === 'Sudah Lunas')
                                                                        <td><span class="float-left badge bg-success">{{ $p->status_bayar }}</span></td>
                                                                        @else
                                                                        <td>{{ $p->status_bayar }}</td>
                                                                        @endif

                                                                        @if($p->status_bawa === 'Belum Dibawa')
                                                                        <td><span class="float-left badge bg-danger">{{ $p->status_bawa }}</span></td>
                                                                        @elseif($p->status_bawa === 'Siap Dibawa')
                                                                        <td><span class="float-left badge bg-warning">{{ $p->status_bawa }}</span></td>
                                                                        @elseif($p->status_bawa === 'Sudah Dibawa')
                                                                        <td><span class="float-left badge bg-success">{{ $p->status_bawa }}</span></td>
                                                                        @elseif($p->status_bawa === 'Pengajuan Batal')
                                                                        <td><span class="float-left badge bg-primary">{{ $p->status_bawa }}</span></td>

                                                                        @else
                                                                        <td>{{ $p->status_bawa }}</td>
                                                                        @endif

                                                                        @if(empty($p->status_batal))
                                                                        <td><span class="float-left badge bg-secondary">Empty</span></td>
                                                                        @elseif($p->status_batal === 'Pengajuan Batal')
                                                                        <td>
                                                                            <span class="float-left badge bg-primary">{{ $p->status_batal }}</span>
                                                                        </td>
                                                                        @elseif($p->status_batal === 'Verifikasi Disetujui')
                                                                        <td>
                                                                            <span class="float-left badge bg-warning">{{ $p->status_batal }}</span>
                                                                            <br>
                                                                            <span class="float-left badge bg-warning" style="font-size: larger;">Kode: {{ $p->kode_pembatalan }}</span>

                                                                        </td>
                                                                        @elseif($p->status_batal === 'Telah Diambil Pembatalan')
                                                                        <td><span class="float-left badge bg-success">{{ $p->status_batal }}</span></td>
                                                                        @elseif($p->status_batal === 'Verifikasi Ditolak')
                                                                        <td>
                                                                            <span class="float-left badge bg-danger" style="font-size: 14px;">{{ $p->status_batal }}</span>
                                                                            <br>
                                                                            <span class="float-left badge bg-danger" style="font-size: 10;">Alasan: {{ $p->alasan_tolak }}</span>
                                                                        </td>
                                                                        @else
                                                                        <td>{{ $p->status_batal }}</td>
                                                                        @endif


                                                                        <td>{{ $p->jenis_pembayaran}}</td>
                                                                        <td>
                                                                            <a style="color: rgb(242, 236, 236)" href="#" class="btn btn-sm btn-primary btn-edit" data-toggle="modal" data-target="#modal-edit" data-id="{{ $p->id }}" style="color: black">
                                                                                <i class="fas fa-edit"></i> Edit
                                                                            </a>
                                                                            <button class="btn btn-sm btn-danger btn-hapus" data-id="{{ $p->id }}" style="color: white">
                                                                                <i class="fas fa-trash-alt"></i> Delete
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                    @php $i++; @endphp
                                                                    @endforeach
                                                                </tbody>

                                                            </table>



                                                        </div>

                                                        <!-- Proses Pengiriman -->
                                                        <div class="tab-pane fade" id="proses-pengiriman" role="tabpanel">
                                                            <table id="example1" class="display nowrap" style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th width="3%">No</th>
                                                                        <th width="200px">Tanggal Kirim</th>
                                                                        <th style="min-width:300px">Kode Resi</th>
                                                                        <th>Nama Pengirim</th>
                                                                        <th>Nama Barang</th>
                                                                        <th>Total Koli</th>
                                                                        <th>Berat</th>
                                                                        <th style="min-width: 200px;">Kota Asal</th>
                                                                        <th style="min-width: 250px;">Kota Tujuan</th>
                                                                        <th style="min-width: 150px; text-align:left;">Total Bayar</th>
                                                                        <th>Status Bayar</th>
                                                                        <th>Status Bawa</th>
                                                                        <th>Status Batal</th>
                                                                        <th>Jenis Pembayaran</th>
                                                                        <th style="min-width: 250px;">Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @php $i = 1; @endphp
                                                                    @foreach ($transaction_proses_pengiriman as $p)
                                                                    <tr>
                                                                        <td>{{ $i }}</td>
                                                                        <td>{{ $p->tanggal_kirim}}</td>
                                                                        <td>{{ $p->kode_resi}}</td>
                                                                        <td>{{ $p->nama_konsumen}}</td>
                                                                        <td>{{ $p->nama_barang}}</td>
                                                                        <td>{{ $p->koli}}</td>
                                                                        <td>{{ $p->berat}}</td>
                                                                        <td><b>{{ $p->cabangAsal?->nama_cabang }}</b></td>
                                                                        <td>{{ $p->cabangTujuan?->nama_cabang }}</td>
                                                                        <td>{{ $p->total_bayar}}</td>
                                                                        @if($p->status_bayar === 'Belum Lunas')
                                                                        <td><span class="float-left badge bg-danger">{{ $p->status_bayar }}</span></td>
                                                                        @elseif($p->status_bayar === 'Sudah Lunas')
                                                                        <td><span class="float-left badge bg-success">{{ $p->status_bayar }}</span></td>
                                                                        @else
                                                                        <td>{{ $p->status_bayar }}</td>
                                                                        @endif

                                                                        @if($p->status_bawa === 'Belum Dibawa')
                                                                        <td><span class="float-left badge bg-danger">{{ $p->status_bawa }}</span></td>
                                                                        @elseif($p->status_bawa === 'Siap Dibawa')
                                                                        <td><span class="float-left badge bg-warning">{{ $p->status_bawa }}</span></td>
                                                                        @elseif($p->status_bawa === 'Sudah Dibawa')
                                                                        <td><span class="float-left badge bg-success">{{ $p->status_bawa }}</span></td>
                                                                        @elseif($p->status_bawa === 'Pengajuan Batal')
                                                                        <td><span class="float-left badge bg-primary">{{ $p->status_bawa }}</span></td>

                                                                        @else
                                                                        <td>{{ $p->status_bawa }}</td>
                                                                        @endif

                                                                        @if(empty($p->status_batal))
                                                                        <td><span class="float-left badge bg-secondary">Empty</span></td>
                                                                        @elseif($p->status_batal === 'Pengajuan Batal')
                                                                        <td>
                                                                            <span class="float-left badge bg-primary">{{ $p->status_batal }}</span>
                                                                        </td>
                                                                        @elseif($p->status_batal === 'Verifikasi Disetujui')
                                                                        <td>
                                                                            <span class="float-left badge bg-warning">{{ $p->status_batal }}</span>
                                                                            <br>
                                                                            <span class="float-left badge bg-warning" style="font-size: larger;">Kode: {{ $p->kode_pembatalan }}</span>

                                                                        </td>
                                                                        @elseif($p->status_batal === 'Telah Diambil Pembatalan')
                                                                        <td><span class="float-left badge bg-success">{{ $p->status_batal }}</span></td>
                                                                        @elseif($p->status_batal === 'Verifikasi Ditolak')
                                                                        <td>
                                                                            <span class="float-left badge bg-danger" style="font-size: 14px;">{{ $p->status_batal }}</span>
                                                                            <br>
                                                                            <span class="float-left badge bg-danger" style="font-size: 10;">Alasan: {{ $p->alasan_tolak }}</span>
                                                                        </td>
                                                                        @else
                                                                        <td>{{ $p->status_batal }}</td>
                                                                        @endif


                                                                        <td>{{ $p->jenis_pembayaran}}</td>
                                                                        <td>
                                                                            <a style="color: rgb(242, 236, 236)" href="#" class="btn btn-sm btn-primary btn-edit" data-toggle="modal" data-target="#modal-edit" data-id="{{ $p->id }}" style="color: black">
                                                                                <i class="fas fa-edit"></i> Edit
                                                                            </a>
                                                                            <button class="btn btn-sm btn-danger btn-hapus" data-id="{{ $p->id }}" style="color: white">
                                                                                <i class="fas fa-trash-alt"></i> Delete
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                    @php $i++; @endphp
                                                                    @endforeach
                                                                </tbody>

                                                            </table>

                                                        </div>

                                                        <!-- Sudah Sampai -->
                                                        <div class="tab-pane fade" id="sudah-sampai" role="tabpanel">
                                                            <table id="example2" class="display nowrap" style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th width="3%">No</th>
                                                                        <th width="200px">Tanggal Kirim</th>
                                                                        <th style="min-width:300px">Kode Resi</th>
                                                                        <th>Nama Pengirim</th>
                                                                        <th>Nama Barang</th>
                                                                        <th>Total Koli</th>
                                                                        <th>Berat</th>
                                                                        <th style="min-width: 200px;">Kota Asal</th>
                                                                        <th style="min-width: 250px;">Kota Tujuan</th>
                                                                        <th style="min-width: 150px; text-align:left;">Total Bayar</th>
                                                                        <th>Status Bayar</th>
                                                                        <th>Status Bawa</th>
                                                                        <th>Status Batal</th>
                                                                        <th>Jenis Pembayaran</th>
                                                                        <th style="min-width: 250px;">Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @php $i = 1; @endphp
                                                                    @foreach ($transaction_sudah_sampai as $p)
                                                                    <tr>
                                                                        <td>{{ $i }}</td>
                                                                        <td>{{ $p->tanggal_kirim}}</td>
                                                                        <td>{{ $p->kode_resi}}</td>
                                                                        <td>{{ $p->nama_konsumen}}</td>
                                                                        <td>{{ $p->nama_barang}}</td>
                                                                        <td>{{ $p->koli}}</td>
                                                                        <td>{{ $p->berat}}</td>
                                                                        <td><b>{{ $p->cabangAsal?->nama_cabang }}</b></td>
                                                                        <td>{{ $p->cabangTujuan?->nama_cabang }}</td>
                                                                        <td>{{ $p->total_bayar}}</td>
                                                                        @if($p->status_bayar === 'Belum Lunas')
                                                                        <td><span class="float-left badge bg-danger">{{ $p->status_bayar }}</span></td>
                                                                        @elseif($p->status_bayar === 'Sudah Lunas')
                                                                        <td><span class="float-left badge bg-success">{{ $p->status_bayar }}</span></td>
                                                                        @else
                                                                        <td>{{ $p->status_bayar }}</td>
                                                                        @endif

                                                                        @if($p->status_bawa === 'Belum Dibawa')
                                                                        <td><span class="float-left badge bg-danger">{{ $p->status_bawa }}</span></td>
                                                                        @elseif($p->status_bawa === 'Siap Dibawa')
                                                                        <td><span class="float-left badge bg-warning">{{ $p->status_bawa }}</span></td>
                                                                        @elseif($p->status_bawa === 'Sudah Dibawa')
                                                                        <td><span class="float-left badge bg-success">{{ $p->status_bawa }}</span></td>
                                                                        @elseif($p->status_bawa === 'Pengajuan Batal')
                                                                        <td><span class="float-left badge bg-primary">{{ $p->status_bawa }}</span></td>

                                                                        @else
                                                                        <td>{{ $p->status_bawa }}</td>
                                                                        @endif

                                                                        @if(empty($p->status_batal))
                                                                        <td><span class="float-left badge bg-secondary">Empty</span></td>
                                                                        @elseif($p->status_batal === 'Pengajuan Batal')
                                                                        <td>
                                                                            <span class="float-left badge bg-primary">{{ $p->status_batal }}</span>
                                                                        </td>
                                                                        @elseif($p->status_batal === 'Verifikasi Disetujui')
                                                                        <td>
                                                                            <span class="float-left badge bg-warning">{{ $p->status_batal }}</span>
                                                                            <br>
                                                                            <span class="float-left badge bg-warning" style="font-size: larger;">Kode: {{ $p->kode_pembatalan }}</span>

                                                                        </td>
                                                                        @elseif($p->status_batal === 'Telah Diambil Pembatalan')
                                                                        <td><span class="float-left badge bg-success">{{ $p->status_batal }}</span></td>
                                                                        @elseif($p->status_batal === 'Verifikasi Ditolak')
                                                                        <td>
                                                                            <span class="float-left badge bg-danger" style="font-size: 14px;">{{ $p->status_batal }}</span>
                                                                            <br>
                                                                            <span class="float-left badge bg-danger" style="font-size: 10;">Alasan: {{ $p->alasan_tolak }}</span>
                                                                        </td>
                                                                        @else
                                                                        <td>{{ $p->status_batal }}</td>
                                                                        @endif


                                                                        <td>{{ $p->jenis_pembayaran}}</td>
                                                                        <td>
                                                                            <a style="color: rgb(242, 236, 236)" href="#" class="btn btn-sm btn-primary btn-edit" data-toggle="modal" data-target="#modal-edit" data-id="{{ $p->id }}" style="color: black">
                                                                                <i class="fas fa-edit"></i> Edit
                                                                            </a>
                                                                            <button class="btn btn-sm btn-danger btn-hapus" data-id="{{ $p->id }}" style="color: white">
                                                                                <i class="fas fa-trash-alt"></i> Delete
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                    @php $i++; @endphp
                                                                    @endforeach
                                                                </tbody>

                                                            </table>


                                                        </div>

                                                        <!-- Sudah Diambil -->
                                                        <div class="tab-pane fade" id="sudah-diambil" role="tabpanel">
                                                            <table id="example3" class="display nowrap" style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th width="3%">No</th>
                                                                        <th width="200px">Tanggal Kirim</th>
                                                                        <th style="min-width:300px">Kode Resi</th>
                                                                        <th>Nama Pengirim</th>
                                                                        <th>Nama Barang</th>
                                                                        <th>Total Koli</th>
                                                                        <th>Berat</th>
                                                                        <th style="min-width: 200px;">Kota Asal</th>
                                                                        <th style="min-width: 250px;">Kota Tujuan</th>
                                                                        <th style="min-width: 150px; text-align:left;">Total Bayar</th>
                                                                        <th>Status Bayar</th>
                                                                        <th>Status Bawa</th>
                                                                        <th>Status Batal</th>
                                                                        <th>Jenis Pembayaran</th>
                                                                        <th style="min-width: 250px;">Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @php $i = 1; @endphp
                                                                    @foreach ($transaction_sudah_diambil as $p)
                                                                    <tr>
                                                                        <td>{{ $i }}</td>
                                                                        <td>{{ $p->tanggal_kirim}}</td>
                                                                        <td>{{ $p->kode_resi}}</td>
                                                                        <td>{{ $p->nama_konsumen}}</td>
                                                                        <td>{{ $p->nama_barang}}</td>
                                                                        <td>{{ $p->koli}}</td>
                                                                        <td>{{ $p->berat}}</td>
                                                                        <td><b>{{ $p->cabangAsal?->nama_cabang }}</b></td>
                                                                        <td>{{ $p->cabangTujuan?->nama_cabang }}</td>
                                                                        <td>{{ $p->total_bayar}}</td>
                                                                        @if($p->status_bayar === 'Belum Lunas')
                                                                        <td><span class="float-left badge bg-danger">{{ $p->status_bayar }}</span></td>
                                                                        @elseif($p->status_bayar === 'Sudah Lunas')
                                                                        <td><span class="float-left badge bg-success">{{ $p->status_bayar }}</span></td>
                                                                        @else
                                                                        <td>{{ $p->status_bayar }}</td>
                                                                        @endif

                                                                        @if($p->status_bawa === 'Belum Dibawa')
                                                                        <td><span class="float-left badge bg-danger">{{ $p->status_bawa }}</span></td>
                                                                        @elseif($p->status_bawa === 'Siap Dibawa')
                                                                        <td><span class="float-left badge bg-warning">{{ $p->status_bawa }}</span></td>
                                                                        @elseif($p->status_bawa === 'Sudah Dibawa')
                                                                        <td><span class="float-left badge bg-success">{{ $p->status_bawa }}</span></td>
                                                                        @elseif($p->status_bawa === 'Pengajuan Batal')
                                                                        <td><span class="float-left badge bg-primary">{{ $p->status_bawa }}</span></td>

                                                                        @else
                                                                        <td>{{ $p->status_bawa }}</td>
                                                                        @endif

                                                                        @if(empty($p->status_batal))
                                                                        <td><span class="float-left badge bg-secondary">Empty</span></td>
                                                                        @elseif($p->status_batal === 'Pengajuan Batal')
                                                                        <td>
                                                                            <span class="float-left badge bg-primary">{{ $p->status_batal }}</span>
                                                                        </td>
                                                                        @elseif($p->status_batal === 'Verifikasi Disetujui')
                                                                        <td>
                                                                            <span class="float-left badge bg-warning">{{ $p->status_batal }}</span>
                                                                            <br>
                                                                            <span class="float-left badge bg-warning" style="font-size: larger;">Kode: {{ $p->kode_pembatalan }}</span>

                                                                        </td>
                                                                        @elseif($p->status_batal === 'Telah Diambil Pembatalan')
                                                                        <td><span class="float-left badge bg-success">{{ $p->status_batal }}</span></td>
                                                                        @elseif($p->status_batal === 'Verifikasi Ditolak')
                                                                        <td>
                                                                            <span class="float-left badge bg-danger" style="font-size: 14px;">{{ $p->status_batal }}</span>
                                                                            <br>
                                                                            <span class="float-left badge bg-danger" style="font-size: 10;">Alasan: {{ $p->alasan_tolak }}</span>
                                                                        </td>
                                                                        @else
                                                                        <td>{{ $p->status_batal }}</td>
                                                                        @endif


                                                                        <td>{{ $p->jenis_pembayaran}}</td>
                                                                        <td>
                                                                            <a style="color: rgb(242, 236, 236)" href="#" class="btn btn-sm btn-primary btn-edit" data-toggle="modal" data-target="#modal-edit" data-id="{{ $p->id }}" style="color: black">
                                                                                <i class="fas fa-edit"></i> Edit
                                                                            </a>
                                                                            <button class="btn btn-sm btn-danger btn-hapus" data-id="{{ $p->id }}" style="color: white">
                                                                                <i class="fas fa-trash-alt"></i> Delete
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                    @php $i++; @endphp
                                                                    @endforeach
                                                                </tbody>

                                                            </table>


                                                        </div>

                                                    </div>



                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>








                                <div class="tab" id="payment">
                                    <div class="request-services-one__single-tab">
                                        <section class="work-process-two" style="margin-top: -100px;">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="container">
                                                        <!-- Nav Tabs -->
                                                        <ul class="nav nav-tabs" id="workProcessTabs" role="tablist">
                                                            <li class="nav-item" role="presentation">
                                                                <button class="nav-link active" id="belum-tab" data-bs-toggle="tab" data-bs-target="#belum" type="button" role="tab" aria-controls="belum" aria-selected="true">
                                                                    Belum Lunas
                                                                </button>
                                                            </li>
                                                            <li class="nav-item" role="presentation">
                                                                <button class="nav-link" id="lunas-tab" data-bs-toggle="tab" data-bs-target="#lunas" type="button" role="tab" aria-controls="lunas" aria-selected="false">
                                                                    Lunas
                                                                </button>
                                                            </li>
                                                        </ul>

                                                        <div class="tab-content">
                                                            <div class="tab-pane fade show active" id="belum" role="tabpanel">
                                                                <table id="example4" class="display nowrap" style="width:100%">
                                                                    <thead>
                                                                        <tr>
                                                                            <th width="3%">No</th>
                                                                            <th width="200px">Tanggal Kirim</th>
                                                                            <th style="min-width:300px">Kode Resi</th>
                                                                            <th>Nama Pengirim</th>
                                                                            <th>Nama Barang</th>
                                                                            <th>Total Koli</th>
                                                                            <th>Berat</th>
                                                                            <th style="min-width: 200px;">Kota Asal</th>
                                                                            <th style="min-width: 250px;">Kota Tujuan</th>
                                                                            <th style="min-width: 150px; text-align:left;">Total Bayar</th>
                                                                            <th>Status Bayar</th>
                                                                            <th>Status Bawa</th>
                                                                            <th>Status Batal</th>
                                                                            <th>Jenis Pembayaran</th>
                                                                            <th style="min-width: 250px;">Aksi</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @php $i = 1; @endphp
                                                                        @foreach ($transaction_belum_lunas as $p)
                                                                        <tr>
                                                                            <td>{{ $i }}</td>
                                                                            <td>{{ $p->tanggal_kirim}}</td>
                                                                            <td>{{ $p->kode_resi}}</td>
                                                                            <td>{{ $p->nama_konsumen}}</td>
                                                                            <td>{{ $p->nama_barang}}</td>
                                                                            <td>{{ $p->koli}}</td>
                                                                            <td>{{ $p->berat}}</td>
                                                                            <td><b>{{ $p->cabangAsal?->nama_cabang }}</b></td>
                                                                            <td>{{ $p->cabangTujuan?->nama_cabang }}</td>
                                                                            <td>{{ $p->total_bayar}}</td>
                                                                            @if($p->status_bayar === 'Belum Lunas')
                                                                            <td><span class="float-left badge bg-danger">{{ $p->status_bayar }}</span></td>
                                                                            @elseif($p->status_bayar === 'Sudah Lunas')
                                                                            <td><span class="float-left badge bg-success">{{ $p->status_bayar }}</span></td>
                                                                            @else
                                                                            <td>{{ $p->status_bayar }}</td>
                                                                            @endif

                                                                            @if($p->status_bawa === 'Belum Dibawa')
                                                                            <td><span class="float-left badge bg-danger">{{ $p->status_bawa }}</span></td>
                                                                            @elseif($p->status_bawa === 'Siap Dibawa')
                                                                            <td><span class="float-left badge bg-warning">{{ $p->status_bawa }}</span></td>
                                                                            @elseif($p->status_bawa === 'Sudah Dibawa')
                                                                            <td><span class="float-left badge bg-success">{{ $p->status_bawa }}</span></td>
                                                                            @elseif($p->status_bawa === 'Pengajuan Batal')
                                                                            <td><span class="float-left badge bg-primary">{{ $p->status_bawa }}</span></td>

                                                                            @else
                                                                            <td>{{ $p->status_bawa }}</td>
                                                                            @endif

                                                                            @if(empty($p->status_batal))
                                                                            <td><span class="float-left badge bg-secondary">Empty</span></td>
                                                                            @elseif($p->status_batal === 'Pengajuan Batal')
                                                                            <td>
                                                                                <span class="float-left badge bg-primary">{{ $p->status_batal }}</span>
                                                                            </td>
                                                                            @elseif($p->status_batal === 'Verifikasi Disetujui')
                                                                            <td>
                                                                                <span class="float-left badge bg-warning">{{ $p->status_batal }}</span>
                                                                                <br>
                                                                                <span class="float-left badge bg-warning" style="font-size: larger;">Kode: {{ $p->kode_pembatalan }}</span>

                                                                            </td>
                                                                            @elseif($p->status_batal === 'Telah Diambil Pembatalan')
                                                                            <td><span class="float-left badge bg-success">{{ $p->status_batal }}</span></td>
                                                                            @elseif($p->status_batal === 'Verifikasi Ditolak')
                                                                            <td>
                                                                                <span class="float-left badge bg-danger" style="font-size: 14px;">{{ $p->status_batal }}</span>
                                                                                <br>
                                                                                <span class="float-left badge bg-danger" style="font-size: 10;">Alasan: {{ $p->alasan_tolak }}</span>
                                                                            </td>
                                                                            @else
                                                                            <td>{{ $p->status_batal }}</td>
                                                                            @endif


                                                                            <td>{{ $p->jenis_pembayaran}}</td>
                                                                            <td>
                                                                                <a style="color: rgb(242, 236, 236)" href="#" class="btn btn-sm btn-primary btn-edit" data-toggle="modal" data-target="#modal-edit" data-id="{{ $p->id }}" style="color: black">
                                                                                    <i class="fas fa-eye"></i> Detail
                                                                                </a>
                                                                                <a style="color: rgb(242, 236, 236)" href="#" class="btn btn-sm btn-success btn-edit" data-toggle="modal" data-target="#modal-edit" data-id="{{ $p->id }}" style="color: black">
                                                                                    <i class="fa fa-usd"></i> Bayar
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                        @php $i++; @endphp
                                                                        @endforeach
                                                                    </tbody>

                                                                </table>
                                                            </div>

                                                            <div class="tab-pane fade" id="lunas" role="tabpanel">
                                                                <table id="example5" class="display nowrap" style="width:100%">
                                                                    <thead>
                                                                        <tr>
                                                                            <th width="3%">No</th>
                                                                            <th width="200px">Tanggal Kirim</th>
                                                                            <th style="min-width:300px">Kode Resi</th>
                                                                            <th>Nama Pengirim</th>
                                                                            <th>Nama Barang</th>
                                                                            <th>Total Koli</th>
                                                                            <th>Berat</th>
                                                                            <th style="min-width: 200px;">Kota Asal</th>
                                                                            <th style="min-width: 250px;">Kota Tujuan</th>
                                                                            <th style="min-width: 150px; text-align:left;">Total Bayar</th>
                                                                            <th>Status Bayar</th>
                                                                            <th>Status Bawa</th>
                                                                            <th>Status Batal</th>
                                                                            <th>Jenis Pembayaran</th>
                                                                            <th style="min-width: 250px;">Aksi</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @php $i = 1; @endphp
                                                                        @foreach ($transaction_sudah_lunas as $p)
                                                                        <tr>
                                                                            <td>{{ $i }}</td>
                                                                            <td>{{ $p->tanggal_kirim}}</td>
                                                                            <td>{{ $p->kode_resi}}</td>
                                                                            <td>{{ $p->nama_konsumen}}</td>
                                                                            <td>{{ $p->nama_barang}}</td>
                                                                            <td>{{ $p->koli}}</td>
                                                                            <td>{{ $p->berat}}</td>
                                                                            <td><b>{{ $p->cabangAsal?->nama_cabang }}</b></td>
                                                                            <td>{{ $p->cabangTujuan?->nama_cabang }}</td>
                                                                            <td>{{ $p->total_bayar}}</td>
                                                                            @if($p->status_bayar === 'Belum Lunas')
                                                                            <td><span class="float-left badge bg-danger">{{ $p->status_bayar }}</span></td>
                                                                            @elseif($p->status_bayar === 'Sudah Lunas')
                                                                            <td><span class="float-left badge bg-success">{{ $p->status_bayar }}</span></td>
                                                                            @else
                                                                            <td>{{ $p->status_bayar }}</td>
                                                                            @endif

                                                                            @if($p->status_bawa === 'Belum Dibawa')
                                                                            <td><span class="float-left badge bg-danger">{{ $p->status_bawa }}</span></td>
                                                                            @elseif($p->status_bawa === 'Siap Dibawa')
                                                                            <td><span class="float-left badge bg-warning">{{ $p->status_bawa }}</span></td>
                                                                            @elseif($p->status_bawa === 'Sudah Dibawa')
                                                                            <td><span class="float-left badge bg-success">{{ $p->status_bawa }}</span></td>
                                                                            @elseif($p->status_bawa === 'Pengajuan Batal')
                                                                            <td><span class="float-left badge bg-primary">{{ $p->status_bawa }}</span></td>

                                                                            @else
                                                                            <td>{{ $p->status_bawa }}</td>
                                                                            @endif

                                                                            @if(empty($p->status_batal))
                                                                            <td><span class="float-left badge bg-secondary">Empty</span></td>
                                                                            @elseif($p->status_batal === 'Pengajuan Batal')
                                                                            <td>
                                                                                <span class="float-left badge bg-primary">{{ $p->status_batal }}</span>
                                                                            </td>
                                                                            @elseif($p->status_batal === 'Verifikasi Disetujui')
                                                                            <td>
                                                                                <span class="float-left badge bg-warning">{{ $p->status_batal }}</span>
                                                                                <br>
                                                                                <span class="float-left badge bg-warning" style="font-size: larger;">Kode: {{ $p->kode_pembatalan }}</span>

                                                                            </td>
                                                                            @elseif($p->status_batal === 'Telah Diambil Pembatalan')
                                                                            <td><span class="float-left badge bg-success">{{ $p->status_batal }}</span></td>
                                                                            @elseif($p->status_batal === 'Verifikasi Ditolak')
                                                                            <td>
                                                                                <span class="float-left badge bg-danger" style="font-size: 14px;">{{ $p->status_batal }}</span>
                                                                                <br>
                                                                                <span class="float-left badge bg-danger" style="font-size: 10;">Alasan: {{ $p->alasan_tolak }}</span>
                                                                            </td>
                                                                            @else
                                                                            <td>{{ $p->status_batal }}</td>
                                                                            @endif


                                                                            <td>{{ $p->jenis_pembayaran}}</td>
                                                                            <td>
                                                                                <a style="color: rgb(242, 236, 236)" href="#" class="btn btn-sm btn-primary btn-edit" data-toggle="modal" data-target="#modal-edit" data-id="{{ $p->id }}" style="color: black">
                                                                                    <i class="fas fa-eye"></i> Detail
                                                                                </a>
                                                                                <a style="color: rgb(242, 236, 236)" href="#" class="btn btn-sm btn-success btn-edit" data-toggle="modal" data-target="#modal-edit" data-id="{{ $p->id }}" style="color: black">
                                                                                    <i class="fa fa-usd"></i> Bayar
                                                                                </a>

                                                                            </td>
                                                                        </tr>
                                                                        @php $i++; @endphp
                                                                        @endforeach
                                                                    </tbody>

                                                                </table>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>


                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        // Mengatur event click pada setiap list item
                                        const listItems = document.querySelectorAll('.toggle-detail-item');

                                        listItems.forEach(item => {
                                            item.addEventListener('click', function() {
                                                // Temukan detail-card yang terkait dengan item ini
                                                const detailCard = item.querySelector('.detail-card');

                                                // Toggle collapse: sembunyikan atau tampilkan detail
                                                detailCard.classList.toggle('collapse');
                                            });
                                        });
                                    });
                                </script>

                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const buttons = document.querySelectorAll('.toggle-detail');

                                        buttons.forEach(button => {
                                            button.addEventListener('click', function() {
                                                const parent = button.closest('.list-group-item');
                                                const detailCard = parent.querySelector('.detail-card');

                                                // Ambil data dari atribut tombol
                                                const resi = button.getAttribute('data-resi');
                                                const status = button.getAttribute('data-status');
                                                const nama = button.getAttribute('data-nama');
                                                const tanggal = button.getAttribute('data-tanggal');

                                                // Masukkan data ke dalam card
                                                detailCard.querySelector('.detail-resi').textContent = resi;
                                                detailCard.querySelector('.detail-status').textContent = status;
                                                detailCard.querySelector('.detail-nama').textContent = nama;
                                                detailCard.querySelector('.detail-tanggal').textContent = tanggal;

                                                // Toggle collapse: sembunyikan atau tampilkan card
                                                detailCard.classList.toggle('collapse');
                                            });
                                        });
                                    });
                                </script>







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

<!-- JS DataTables CDN (termasuk jQuery dan DataTables) -->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>


<script>
    $(document).ready(function() {
        // Apply DataTable to all tables with specific IDs
        $('#example, #example1, #example2, #example3, #example4, #example5 ').DataTable({
            scrollX: true,
            responsive: true,
            autoWidth: true
        });
    });
</script>



@endpush