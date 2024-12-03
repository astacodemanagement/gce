<div class="tab" id="track">
                                    <div class="request-services-one__single-tab">
                                        <section class="work-process-two" style="margin-top: -100px;">
                                            <div class="container">
                                                <div class="sec-title-style3 text-center">
                                                    <div class="sub-title center">
                                                        <div class="icon">
                                                            <img src="assets/img/icon/title-marker.png" alt="">
                                                        </div>
                                                        <h5>Periksa Barang Anda</h5>
                                                    </div>
                                                    <h2>Cek Posisi Barang</h2>
                                                </div>
                                                <div class="row">
                                                    <div class="container mt-4">
                                                        <!-- Nav Tabs -->
                                                        <ul class="nav nav-tabs" id="workProcessTabs" role="tablist">
                                                            <li class="nav-item" role="presentation">
                                                                <button class="nav-link active" id="proses-tab" data-bs-toggle="tab" data-bs-target="#proses" type="button" role="tab" aria-controls="proses" aria-selected="true">
                                                                    Sedang Proses
                                                                </button>
                                                            </li>
                                                            <li class="nav-item" role="presentation">
                                                                <button class="nav-link" id="selesai-tab" data-bs-toggle="tab" data-bs-target="#selesai" type="button" role="tab" aria-controls="selesai" aria-selected="false">
                                                                    Selesai
                                                                </button>
                                                            </li>
                                                        </ul>

                                                        <!-- Tab Content -->
                                                        <div class="tab-content" id="workProcessTabContent">
                                                            <!-- Sedang Proses -->
                                                            <div class="tab-pane fade show active" id="proses" role="tabpanel" aria-labelledby="proses-tab">
                                                                <div class="row mt-3">
                                                                    <!-- Card 1 -->
                                                                    <div class="col-xl-4 col-lg-4 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                                                        <div class="work-process-two__single">
                                                                            <div class="shape1"><img src="assets/img/shape/work-process-v2-shape1.png" alt=""></div>
                                                                            <div class="work-process-two__single-icon">
                                                                                <div class="inner">
                                                                                    <span class="icon-enter-product-details"></span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="work-process-two__single-text">
                                                                                <h3>Posisi - 1</h3>
                                                                                <h2>Enter Product Details</h2>
                                                                                <p>Once you place your order via mail or fax our field staff will collect the documents and consignments from.</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- Card 2 -->
                                                                    <div class="col-xl-4 col-lg-4 wow fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                                                                        <div class="work-process-two__single">
                                                                            <div class="shape1"><img src="assets/img/shape/work-process-v2-shape1.png" alt=""></div>
                                                                            <div class="work-process-two__single-icon">
                                                                                <div class="inner">
                                                                                    <span class="icon-pay-your-service-tag"></span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="work-process-two__single-text">
                                                                                <h3>Posisi - 2</h3>
                                                                                <h2>Pay Your Service Tag</h2>
                                                                                <p>Once you place your order via mail or fax our field staff will collect the documents and consignments from.</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Selesai -->
                                                            <div class="tab-pane fade" id="selesai" role="tabpanel" aria-labelledby="selesai-tab">
                                                                <div class="row mt-3">
                                                                    <!-- Card 1 -->
                                                                    <div class="col-xl-4 col-lg-4 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                                                        <div class="work-process-two__single">
                                                                            <div class="work-process-two__single-icon">
                                                                                <div class="inner">
                                                                                    <span class="icon-road-transport"></span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="work-process-two__single-text">
                                                                                <h3>Posisi - 3</h3>
                                                                                <h2>Ready To Go Your Goods</h2>
                                                                                <p>Once you place your order via mail or fax our field staff will collect the documents and consignments from.</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- Card 2 -->
                                                                    <div class="col-xl-4 col-lg-4 wow fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                                                                        <div class="work-process-two__single">
                                                                            <div class="shape1"><img src="assets/img/shape/work-process-v2-shape1.png" alt=""></div>
                                                                            <div class="work-process-two__single-icon">
                                                                                <div class="inner">
                                                                                    <span class="icon-enter-product-details"></span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="work-process-two__single-text">
                                                                                <h3>Posisi - 4</h3>
                                                                                <h2>Delivered Successfully</h2>
                                                                                <p>Thank you for using our services. Your package has been successfully delivered.</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>













                                <!-- ------------------------------ -->
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
                            <h4 class="text-white my-3">Proses Packing</h4>

                            @if($transaksiByStatus['Proses Packing']->isEmpty())
                            <p class="text-white">Tidak ada data</p>
                            @else
                            <ul class="list-group">
                                @foreach($transaksiByStatus['Proses Packing'] as $transaksi)
                                <li class="list-group-item toggle-detail-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            {{ $transaksi->kode_resi }} - {{ $transaksi->status_pengiriman }}
                                        </div>
                                    </div>
                                    <!-- Placeholder untuk card detail -->
                                    <div class="detail-card mt-3" style="display: none;">
                                        <div class="card">
                                            <div class="card-body">
                                                <p><strong>Nomor Resi:</strong> <span class="detail-resi">{{ $transaksi->kode_resi }}</span></p>
                                                <p><strong>Status Pengiriman:</strong> <span class="detail-status">{{ $transaksi->status_pengiriman }}</span></p>
                                                <p><strong>Nama Penerima:</strong> <span class="detail-nama">{{ $transaksi->nama_konsumen_penerima }}</span></p>
                                                <p><strong>Tanggal Kirim:</strong> <span class="detail-tanggal">{{ $transaksi->tanggal_kirim }}</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>

                            @endif
                        </div>

                        <!-- Proses Pengiriman -->
                        <div class="tab-pane fade" id="proses-pengiriman" role="tabpanel">
                            <h4 class="text-white my-3">Proses Pengiriman</h4>

                            @if($transaksiByStatus['Proses Pengiriman']->isEmpty())
                            <p class="text-white">Tidak ada data</p>
                            @else
                            <ul class="list-group">
                                @foreach($transaksiByStatus['Proses Pengiriman'] as $transaksi)
                                <li class="list-group-item toggle-detail-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            {{ $transaksi->kode_resi }} - {{ $transaksi->status_pengiriman }}
                                        </div>
                                    </div>
                                    <!-- Placeholder untuk card detail -->
                                    <div class="detail-card mt-3" style="display: none;">
                                        <div class="card">
                                            <div class="card-body">
                                                <p><strong>Nomor Resi:</strong> <span class="detail-resi">{{ $transaksi->kode_resi }}</span></p>
                                                <p><strong>Status Pengiriman:</strong> <span class="detail-status">{{ $transaksi->status_pengiriman }}</span></p>
                                                <p><strong>Nama Penerima:</strong> <span class="detail-nama">{{ $transaksi->nama_konsumen_penerima }}</span></p>
                                                <p><strong>Tanggal Kirim:</strong> <span class="detail-tanggal">{{ $transaksi->tanggal_kirim }}</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </div>

                        <!-- Sudah Sampai -->
                        <div class="tab-pane fade" id="sudah-sampai" role="tabpanel">
                            <h4 class="text-white my-3">Sudah Sampai</h4>

                            @if($transaksiByStatus['Sudah Sampai']->isEmpty())
                            <p class="text-white">Tidak ada data</p>
                            @else
                            <ul class="list-group">
                                @foreach($transaksiByStatus['Sudah Sampai'] as $transaksi)
                                <li class="list-group-item toggle-detail-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            {{ $transaksi->kode_resi }} - {{ $transaksi->status_pengiriman }}
                                        </div>
                                    </div>
                                    <!-- Placeholder untuk card detail -->
                                    <div class="detail-card mt-3" style="display: none;">
                                        <div class="card">
                                            <div class="card-body">
                                                <p><strong>Nomor Resi:</strong> <span class="detail-resi">{{ $transaksi->kode_resi }}</span></p>
                                                <p><strong>Status Pengiriman:</strong> <span class="detail-status">{{ $transaksi->status_pengiriman }}</span></p>
                                                <p><strong>Nama Penerima:</strong> <span class="detail-nama">{{ $transaksi->nama_konsumen_penerima }}</span></p>
                                                <p><strong>Tanggal Kirim:</strong> <span class="detail-tanggal">{{ $transaksi->tanggal_kirim }}</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </div>

                        <!-- Sudah Diambil -->
                        <div class="tab-pane fade" id="sudah-diambil" role="tabpanel">
                            <h4 class="text-white my-3">Sudah Diambil</h4>

                            @if($transaksiByStatus['Sudah Diambil']->isEmpty())
                            <p class="text-white">Tidak ada data</p>
                            @else
                            <ul class="list-group">
                                @foreach($transaksiByStatus['Sudah Diambil'] as $transaksi)
                                <li class="list-group-item toggle-detail-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            {{ $transaksi->kode_resi }} - {{ $transaksi->status_pengiriman }}
                                        </div>
                                    </div>
                                    <!-- Placeholder untuk card detail -->
                                    <div class="detail-card mt-3" style="display: none;">
                                        <div class="card">
                                            <div class="card-body">
                                                <p><strong>Nomor Resi:</strong> <span class="detail-resi">{{ $transaksi->kode_resi }}</span></p>
                                                <p><strong>Status Pengiriman:</strong> <span class="detail-status">{{ $transaksi->status_pengiriman }}</span></p>
                                                <p><strong>Nama Penerima:</strong> <span class="detail-nama">{{ $transaksi->nama_konsumen_penerima }}</span></p>
                                                <p><strong>Tanggal Kirim:</strong> <span class="detail-tanggal">{{ $transaksi->tanggal_kirim }}</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                            @endif
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

                // Toggle display: tampilkan atau sembunyikan detail
                if (detailCard.style.display === "none" || detailCard.style.display === "") {
                    detailCard.style.display = "block"; // Tampilkan detail
                } else {
                    detailCard.style.display = "none"; // Sembunyikan detail
                }
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

                // Tampilkan atau sembunyikan card
                if (detailCard.style.display === 'none') {
                    detailCard.style.display = 'block';
                } else {
                    detailCard.style.display = 'none';
                }
            });
        });
    });
</script>





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
                                <h4 class="text-white my-3">Belum Lunas</h4>

                                @if($transaksiByStatusBayar['Belum Lunas']->isEmpty())
                                <p class="text-white">Tidak ada data</p>
                                @else
                                <ul class="list-group">
                                    @foreach($transaksiByStatusBayar['Belum Lunas'] as $transaksi)
                                    <li class="list-group-item toggle-detail-item">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                {{ $transaksi->kode_resi }} - {{ $transaksi->status_bayar }}
                                            </div>
                                        </div>
                                        <!-- Placeholder untuk card detail -->
                                        <div class="detail-card mt-3" style="display: none;">
                                            <div class="card">
                                                <div class="card-body">
                                                    <p><strong>Nomor Resi:</strong> <span class="detail-resi">{{ $transaksi->kode_resi }}</span></p>
                                                    <p><strong>Status Pengiriman:</strong> <span class="detail-status">{{ $transaksi->status_pengiriman }}</span></p>
                                                    <p><strong>Nama Penerima:</strong> <span class="detail-nama">{{ $transaksi->nama_konsumen_penerima }}</span></p>
                                                    <p><strong>Tanggal Kirim:</strong> <span class="detail-tanggal">{{ $transaksi->tanggal_kirim }}</span></p>


                                                    <a href="" class="btn btn-light mt-3"><i class="fa fa-usd"></i>
                                                        Bayar Sekarang
                                                    </a>



                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>

                            <div class="tab-pane fade" id="lunas" role="tabpanel">
                                <h4 class="text-white my-3">Status Lunas</h4>

                                @if($transaksiByStatusBayar['Sudah Lunas']->isEmpty())
                                <p class="text-white">Tidak ada data</p>
                                @else
                                <ul class="list-group">
                                    @foreach($transaksiByStatusBayar['Sudah Lunas'] as $transaksi)
                                    <li class="list-group-item toggle-detail-item">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                {{ $transaksi->kode_resi }} - {{ $transaksi->status_bayar }}
                                            </div>
                                        </div>
                                        <!-- Placeholder untuk card detail -->
                                        <div class="detail-card mt-3" style="display: none;">
                                            <div class="card">
                                                <div class="card-body">
                                                    <p><strong>Nomor Resi:</strong> <span class="detail-resi">{{ $transaksi->kode_resi }}</span></p>
                                                    <p><strong>Status Pengiriman:</strong> <span class="detail-status">{{ $transaksi->status_pengiriman }}</span></p>
                                                    <p><strong>Nama Penerima:</strong> <span class="detail-nama">{{ $transaksi->nama_konsumen_penerima }}</span></p>
                                                    <p><strong>Tanggal Kirim:</strong> <span class="detail-tanggal">{{ $transaksi->tanggal_kirim }}</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
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