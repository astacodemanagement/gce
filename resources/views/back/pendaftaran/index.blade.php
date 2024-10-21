@extends('layouts.app')
@section('title', $title)
@section('subtitle', $subtitle)

@section('content')
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="5%">Kategori Konsumen</th>
                    <th>Nama Konsumen</th>
                    <th>Email</th>
                    <th width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach ($konsumen as $p)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $p->kategori_konsumen }}</td>
                    <td>{{ $p->user->name }}</td> <!-- Mengambil nama dari relasi user -->
                    <td>{{ $p->user->email }}</td> <!-- Mengambil email dari relasi user -->
                    <td>
                        <a href="#" class="btn btn-sm btn-primary btn-edit" data-toggle="modal" data-target="#modal-edit" data-id="{{ $p->id }}">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <button class="btn btn-sm btn-danger btn-hapus" data-id="{{ $p->id }}">
                            <i class="fas fa-trash-alt"></i> Delete
                        </button>
                    </td>
                </tr>
                @php $i++; @endphp
                @endforeach
            </tbody>
        </table>

    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form {{ $subtitle }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Main content -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="form-tambah" action="{{ route('konsumen.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf <!-- Tambahkan token CSRF -->
                        <div class="card-body">

                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="nama_konsumen" class="form-label fw-semibold">Nama Konsumen</label>
                                    <span class="text-danger">*</span> <!-- Menambahkan span untuk keterangan -->
                                    <input type="text" class="form-control" id="nama_konsumen" name="nama_konsumen"
                                        placeholder="Ex : Nama" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="link" class="form-label fw-semibold">Link</label>
                                    <input type="text" class="form-control" id="link" name="link"
                                        placeholder="Ex : https://...">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="urutan" class="form-label fw-semibold">Urutan</label>

                                    <input type="number" class="form-control" id="urutan" name="urutan"
                                        placeholder="Ex : 1">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-4">
                                    <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
                                    <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="2"></textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-4">
                                    <label for="gambar" class="form-label fw-semibold">Gambar</label>
                                    <span class="text-danger">*</span>
                                    <input type="file" class="form-control" id="gambar"
                                        name="gambar" onchange="previewImage()">

                                    <canvas id="preview_canvas"
                                        style="display: none; max-width: 100%; margin-top: 10px;"></canvas>
                                    <img id="preview_image" src="#" alt="Preview Logo"
                                        style="display: none; max-width: 100%; margin-top: 10px;">
                                    <script>
                                        function previewImage() {
                                            var previewCanvas = document.getElementById('preview_canvas');
                                            var previewImage = document.getElementById('preview_image');
                                            var fileInput = document.getElementById('gambar');
                                            var file = fileInput.files[0];
                                            var reader = new FileReader();

                                            reader.onload = function(e) {
                                                var img = new Image();
                                                img.src = e.target.result;

                                                img.onload = function() {
                                                    var canvasContext = previewCanvas.getContext('2d');
                                                    var maxWidth = 150; // Max width untuk pratinja gambar

                                                    var scaleFactor = maxWidth / img.width;
                                                    var newHeight = img.height * scaleFactor;

                                                    previewCanvas.width = maxWidth;
                                                    previewCanvas.height = newHeight;

                                                    canvasContext.drawImage(img, 0, 0, maxWidth, newHeight);

                                                    // Menampilkan pratinja logo setelah diperkecil
                                                    previewCanvas.style.display = 'block';
                                                    previewImage.style.display = 'none';
                                                };
                                            };

                                            if (file) {
                                                reader.readAsDataURL(file); // Membaca file yang dipilih sebagai URL data
                                            } else {
                                                previewImage.src = '';
                                                previewCanvas.style.display = 'none'; // Menyembunyikan pratinja gambar jika tidak ada file yang dipilih
                                            }
                                        }
                                    </script>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" id="btn-save-tambah"><i class="fas fa-save"></i> Simpan</button>
                            <button type="button" class="btn btn-danger float-right" data-dismiss="modal"><span aria-hidden="true">&times;</span> Close</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Edit {{ $subtitle }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Main content -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="form-edit" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf <!-- Tambahkan token CSRF -->
                        <input class="id" type="hidden" id="" name="id" value="">
                        <div class="card-body">
                            <!-- Tambahkan field input yang sesuai di sini -->
                            <div class="form-group">
                                <label for="nama_konsumen_edit">Nama Konsumen</label>
                                <input type="text" class="form-control" id="nama_konsumen_edit" name="nama_konsumen" required>
                            </div>
                            <div class="form-group">
                                <label for="link_edit">Link</label>
                                <input type="text" class="form-control" id="link_edit" name="link" required>
                            </div>
                            <div class="form-group">
                                <label for="urutan_edit">Urutan</label>
                                <input type="text" class="form-control" id="urutan_edit" name="urutan" required>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi_edit">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi_edit" name="deskripsi" required></textarea>
                            </div>
                            <div class="col-12">
                                <div class="mb-4">
                                    <label for="gambar" class="form-label fw-semibold">Gambar</label>
                                    <span class="text-danger">*</span>
                                    <input type="file" class="form-control" id="gambar_edit"
                                        name="gambar" onchange="previewImage2()">

                                    <canvas id="preview_canvas2"
                                        style="display: none; max-width: 100%; margin-top: 10px;"></canvas>
                                    <img id="preview_image2" src="#" alt="Preview Gambar"
                                        style="display: none; max-width: 100%; margin-top: 10px;">
                                    <script>
                                        function previewImage2() {
                                            var previewCanvas = document.getElementById('preview_canvas2');
                                            var previewImage2 = document.getElementById('preview_image2');
                                            var fileInput = document.getElementById('gambar_edit');
                                            var file = fileInput.files[0];
                                            var reader = new FileReader();

                                            reader.onload = function(e) {
                                                var img = new Image();
                                                img.src = e.target.result;

                                                img.onload = function() {
                                                    var canvasContext = previewCanvas.getContext('2d');
                                                    var maxWidth = 150; // Max width untuk pratinja gambar

                                                    var scaleFactor = maxWidth / img.width;
                                                    var newHeight = img.height * scaleFactor;

                                                    previewCanvas.width = maxWidth;
                                                    previewCanvas.height = newHeight;

                                                    canvasContext.drawImage(img, 0, 0, maxWidth, newHeight);

                                                    // Menampilkan pratinja logo setelah diperkecil
                                                    previewCanvas.style.display = 'block';
                                                    previewImage2.style.display = 'none';
                                                };
                                            };

                                            if (file) {
                                                reader.readAsDataURL(file); // Membaca file yang dipilih sebagai URL data
                                            } else {
                                                previewImage2.src = '';
                                                previewCanvas.style.display = 'none'; // Menyembunyikan pratinja gambar jika tidak ada file yang dipilih
                                            }
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="button" class="btn btn-primary" id="btn-save-edit"><i class="fas fa-check"></i> Update</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><span aria-hidden="true">&times;</span> Close</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection

@push('script')
{{-- SKRIP TAMBAHAN --}}



@endpush

@push('css')
<!-- <link rel="stylesheet" href="{{ asset('template/plugins/select2/css/custom.css') }}"> -->
@endpush