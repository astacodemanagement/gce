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
                    <th>Nama Faq</th>
                    <th>Tanya</th>
                    <th>Jawab</th>
                     
                    <th width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach ($faq as $p)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $p->tanya }}</td>
                    <td>{{ $p->nama_faq }}</td>
                    <td>{{ $p->jawab }}</td>
                    
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
                    <form id="form-tambah" action="{{ route('faq.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf <!-- Tambahkan token CSRF -->
                        <div class="card-body">

                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="nama_faq" class="form-label fw-semibold">Nama Faq</label>
                                    <span class="text-danger">*</span> <!-- Menambahkan span untuk keterangan -->
                                    <input type="text" class="form-control" id="nama_faq" name="nama_faq"
                                        placeholder="Ex : Nama" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="tanya" class="form-label fw-semibold">Tanya</label>
                                    <input type="text" class="form-control" id="tanya" name="tanya"
                                        placeholder="Ex : Siapakah?">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-4">
                                    <label for="jawab" class="form-label fw-semibold">Jawab</label>
                                    <textarea class="form-control" name="jawab" id="jawab" cols="30" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="urutan" class="form-label fw-semibold">Urutan</label>

                                    <input type="number" class="form-control" id="urutan" name="urutan"
                                        placeholder="Ex : 1">
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
                                <label for="nama_faq_edit">Nama Faq</label>
                                <input type="text" class="form-control" id="nama_faq_edit" name="nama_faq" required>
                            </div>
                            <div class="form-group">
                                <label for="tanya_edit">Link</label>
                                <input type="text" class="form-control" id="tanya_edit" name="tanya" required>
                            </div>
                            <div class="form-group">
                                <label for="jawab_edit">Jawab</label>
                                <textarea class="form-control" id="jawab_edit" name="jawab" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="urutan_edit">Urutan</label>
                                <input type="text" class="form-control" id="urutan_edit" name="urutan" required>
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
                url: '{{ route('faq.store') }}',
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
                url: '{{ route("faq.edit", ":id") }}'.replace(':id', id), // Memperbaiki penempatan tanda kutip
                success: function(data) {
                    console.log(data); // Cek data yang diterima dari server
                    // Mengisi data pada form modal
                    $('.id').val(data.id);
                    $('#nama_faq_edit').val(data.nama_faq);
                    $('#tanya_edit').val(data.tanya);
                    $('#urutan_edit').val(data.urutan);
                    $('#jawab_edit').val(data.jawab);
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
                url: '/faq/' + id,
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
                        url: '{{ route("faq.destroy", ":id") }}'.replace(':id', id), // Memperbaiki penempatan tanda kutip
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
<!-- <tanya rel="stylesheet" href="{{ asset('template/plugins/select2/css/custom.css') }}"> -->
@endpush