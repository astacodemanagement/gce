@extends('layouts.app')
@section('title', $title)
@section('subtitle', $subtitle)

@section('content')
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-tambah"><i class="fas fa-plus-circle"></i> Tambah Data</a>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Nama Informasi</th>
                    <th>Deskripsi</th>
                    <th width="5%">Gambar</th>
                    <th width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach ($informasi as $p)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $p->nama_informasi }}</td>
                    <td>{{ $p->deskripsi }}</td>
                    <td>
                        <a href="/upload/informasi/{{ $p->gambar }}" target="_blank">
                            <img style="max-width:100px; max-height:100px"
                                src="/upload/informasi/{{ $p->gambar }}" alt="">
                        </a>
                    </td>
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
                    <form id="form-tambah" action="{{ route('informasi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf <!-- Tambahkan token CSRF -->
                        <div class="card-body">

                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="nama_informasi" class="form-label fw-semibold">Nama Informasi</label>
                                    <span class="text-danger">*</span> <!-- Menambahkan span untuk keterangan -->
                                    <input type="text" class="form-control" id="nama_informasi" name="nama_informasi"
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
                                <label for="nama_informasi_edit">Nama Informasi</label>
                                <input type="text" class="form-control" id="nama_informasi_edit" name="nama_informasi" required>
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

{{-- PERINTAH SIMPAN DATA --}}
<script>
    $(document).ready(function() {
        $('#form-tambah').on('submit', function(event) {
            event.preventDefault();
            const tombolSimpan = $('#btn-save-tambah');

            // Buat objek FormData
            var formData = new FormData(this);

            // Disable tombol simpan untuk menghindari submit ganda
            tombolSimpan.prop('disabled', true).text('Menyimpan...');

            $.ajax({
                url: '{{ route('informasi.store') }}',
                type: 'POST',
                data: formData,
                processData: false, // Menghindari jQuery memproses data
                contentType: false, // Menghindari jQuery mengatur Content-Type
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // Menutup modal setelah sukses
                    $('#modal-tambah').modal('hide');

                    // Menampilkan pesan sukses
                    Swal.fire({
                        title: 'Sukses!',
                        text: response.message || 'Data berhasil disimpan.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Reload halaman setelah sukses
                            location.reload();
                        }
                    });
                },
                error: function(xhr) {
                    // Tangani error respon dari controller
                    let errors = xhr.responseJSON.errors;
                    let errorMessages = '';

                    if (errors) {
                        // Looping untuk menampilkan semua pesan error
                        $.each(errors, function(field, messages) {
                            errorMessages += messages.join('<br>') + '<br>';
                        });
                    } else {
                        // Jika error umum yang tidak ada di errors
                        errorMessages = xhr.responseJSON.message ||
                            'Terjadi kesalahan, coba lagi.';
                    }

                    // Menampilkan pesan error
                    Swal.fire({
                        title: 'Error!',
                        html: errorMessages,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });

                    console.log(xhr.responseText); // Log untuk debugging
                },
                complete: function() {
                    // Re-enable tombol simpan setelah request selesai
                    tombolSimpan.prop('disabled', false).text('Simpan');
                }
            });
        });
    });
</script>
{{-- PERINTAH SIMPAN DATA --}}


{{-- PERINTAH EDIT DATA --}}
<script>
    $(document).ready(function() {

        $('#example1').on('click', '.btn-edit', function(e) {
            e.preventDefault();
            var id = $(this).data('id');

            $.ajax({
                method: 'GET',
                url: '{{ route("informasi.edit", ":id") }}'.replace(':id', id), // Memperbaiki penempatan tanda kutip
                success: function(data) {
                    console.log(data); // Cek data yang diterima dari server
                    // Mengisi data pada form modal
                    $('.id').val(data.id);
                    $('#nama_informasi_edit').val(data.nama_informasi);
                    $('#link_edit').val(data.link);
                    $('#urutan_edit').val(data.urutan);
                    $('#deskripsi_edit').val(data.deskripsi);
                    $('#modal-edit').modal('show');
                },

                error: function(xhr) {
                    // Tangani kesalahan jika ada
                    alert('Error: ' + xhr.statusText);
                }
            });
        });


    });
</script>
{{-- PERINTAH EDIT DATA --}}


{{-- PERINTAH UPDATE DATA --}}
<script>
    $(document).ready(function() {
        $('#btn-save-edit').click(function(e) {
            e.preventDefault();

            const tombolUpdate = $('#btn-save-edit');
            var id = $('.id').val();
            var formData = new FormData($('#form-edit')[0]);

            // Ubah teks tombol menjadi "Updating..." dan disable tombolnya
            tombolUpdate.text('Updating...');
            tombolUpdate.prop('disabled', true);

            $.ajax({
                type: 'POST', // Gunakan POST karena kita override dengan PUT
                url: '/informasi/' + id,
                data: formData,
                // headers: {
                //     'X-HTTP-Method-Override': 'PUT'
                // },
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('form').find('.error-message').remove();
                },
                success: function(response) {
                    $('#modal-edit').modal('hide');
                    Swal.fire({
                        title: 'Sukses!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed || result.isDismissed) {
                            location.reload();
                        }
                    });
                },
                complete: function() {
                    // Kembalikan teks tombol ke "Update" dan enable tombolnya
                    tombolUpdate.text('Update');
                    tombolUpdate.prop('disabled', false);
                },
                error: function(xhr) {
                    // Jika bukan error 422 (validasi), tetap sembunyikan modal
                    if (xhr.status !== 422) {
                        $('#modal-edit').modal('hide');
                    }

                    var errorMessages = xhr.responseJSON.errors;
                    var errorMessage = '';

                    if (errorMessages) {
                        // Jika ada pesan error validasi
                        $.each(errorMessages, function(key, value) {
                            errorMessage += value + '<br>';
                        });
                    } else {
                        // Jika error di luar validasi, tampilkan pesan error dari server
                        errorMessage = xhr.responseJSON.message || 'Terjadi kesalahan';
                    }

                    Swal.fire({
                        title: 'Error!',
                        html: errorMessage,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });

                    // Kembalikan tombol ke keadaan semula jika terjadi error
                    tombolUpdate.text('Update');
                    tombolUpdate.prop('disabled', false);
                }
            });
        });
    });
</script>

{{-- PERINTAH UPDATE DATA --}}


{{-- PERINTAH HAPUS DATA --}}
<script>
    $(document).ready(function() {
        $('#example1').on('click', '.btn-hapus', function(e) {
            e.preventDefault();
            var id = $(this).data('id');

            Swal.fire({
                title: 'Apakah yakin akan menghapus data?',
                text: "Data tidak bisa dikembalikan jika sudah dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Lakukan permintaan AJAX ke endpoint penghapusan
                    $.ajax({
                        url: '{{ route("informasi.destroy", ":id") }}'.replace(':id', id), // Memperbaiki penempatan tanda kutip
                        type: 'DELETE',
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function(response) {
                            if (response.hasOwnProperty('message') && response.message === 'Data Berhasil Dihapus') {
                                Swal.fire({
                                    title: 'Sukses!',
                                    text: response.message,
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                }).then((result) => {
                                    if (result.isConfirmed || result.isDismissed) {
                                        location.reload(); // Merefresh halaman setelah data dihapus
                                    }
                                });
                            } else {
                                Swal.fire({
                                    title: 'Gagal!',
                                    text: response.message || 'Gagal menghapus data',
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                });
                            }
                        },
                        error: function(xhr) {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Terjadi kesalahan saat menghapus data',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                            console.log(xhr.responseText); // Tampilkan pesan error jika terjadi
                        }
                    });
                }
            });
        });
    });
</script>
{{-- PERINTAH HAPUS DATA --}}

@endpush

@push('css')
<!-- <link rel="stylesheet" href="{{ asset('template/plugins/select2/css/custom.css') }}"> -->
@endpush