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
                    <th width="15%">Kategori Konsumen</th>
                    <th>Nama Konsumen</th>
                    <th>Email</th>
                    <th>No Telp</th>
                    <th width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach ($konsumen as $p)
                <tr>
                    <td>{{ $i }}</td>
                    <td>
                        @if (strtoupper($p->kategori_konsumen) == 'PERSONAL')
                        <span class="badge bg-success">{{ strtoupper($p->kategori_konsumen) }}</span>
                        @elseif (strtoupper($p->kategori_konsumen) == 'CORPORATE')
                        <span class="badge bg-primary">{{ strtoupper($p->kategori_konsumen) }}</span>
                        @else
                        <span class="badge bg-secondary">{{ strtoupper($p->kategori_konsumen) }}</span>
                        @endif
                    </td>

                    <td>{{ $p->user->name }}</td>
                    <td>{{ $p->user->email }}</td>
                    <td>{{ $p->no_telp }}</td>
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


<div class="modal fade" id="modal-edit">
    <div class="modal-dialog modal-xl"> <!-- Tambahkan class modal-lg -->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Detail {{ $subtitle }}</h4>
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
                        @csrf
                        <input class="id" type="hidden" id="" name="id" value="">
                        <div class="card-body">
                            <div class="row">
                                <!-- Kolom untuk Nama Konsumen, Jenis Kelamin, dan Tanggal Lahir -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name_edit">Nama Konsumen</label>
                                        <input type="text" class="form-control" id="name_edit" name="name" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="jenis_kelamin_edit">Jenis Kelamin</label>
                                        <input type="text" class="form-control" id="jenis_kelamin_edit" name="jenis_kelamin" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="tanggal_lahir_edit">Tanggal Lahir</label>
                                        <input type="text" class="form-control" id="tanggal_lahir_edit" name="tanggal_lahir" required>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="kategori_konsumen_edit">Kategori Konsumen</label>
                                        <input type="text" class="form-control" id="kategori_konsumen_edit" name="kategori_konsumen" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="no_telp_edit">No Telp</label>
                                        <input type="text" class="form-control" id="no_telp_edit" name="no_telp" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email_edit">Email</label>
                                        <input type="text" class="form-control" id="email_edit" name="email" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nama_perusahaan_edit">Nama Perusahaan</label>
                                        <input type="text" class="form-control" id="nama_perusahaan_edit" name="nama_perusahaan" required>
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="kode_referal_edit">Kode Referal</label>
                                        <input type="text" class="form-control" id="kode_referal_edit" name="kode_referal" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="alamat_edit">Alamat</label>
                                        <textarea class="form-control" id="alamat_edit" name="alamat" required></textarea>
                                    </div>
                                </div>

                                <!-- Status Verifikasi dengan Select (Combo Box) -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="status_edit">Status Verifikasi</label>
                                        <select class="form-control" id="status_edit" name="status" required>
                                            <option value="Aktif">Aktif - Approve</option>
                                            <option value="Non Aktif">Non Aktif - Reject</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Catatan Alasan (Hidden by default) -->
                                <div class="col-md-12" id="alasan_group" style="display: none;">
                                    <div class="form-group">
                                        <label for="alasan_edit">Catatan Alasan</label>
                                        <textarea class="form-control" id="alasan_edit" name="alasan"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Footer -->
                        <div class="card-footer">
                            <button type="button" class="btn btn-primary" id="btn-save-edit"><i class="fas fa-check"></i> Update</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><span aria-hidden="true">&times;</span> Close</button>
                        </div>
                    </form>

                    <script>
                        document.getElementById('status_edit').addEventListener('change', function() {
                            var alasanGroup = document.getElementById('alasan_group');
                            if (this.value === 'Non Aktif') {
                                alasanGroup.style.display = 'block'; // Menampilkan catatan alasan jika Reject dipilih
                            } else {
                                alasanGroup.style.display = 'none'; // Menyembunyikan catatan alasan jika bukan Reject
                            }
                        });
                    </script>



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

{{-- PERINTAH EDIT DATA --}}
<script>
    $(document).ready(function() {

        $('#example1').on('click', '.btn-edit', function(e) {
            e.preventDefault();
            var id = $(this).data('id');

            $.ajax({
                method: 'GET',
                url: '{{ route("data_pendaftaran.edit", ":id") }}'.replace(':id', id),
                success: function(data) {
                    console.log(data); // Cek data yang diterima dari server
                    // Mengisi data pada form modal
                    $('.id').val(data.id);
                    $('#name_edit').val(data.user.name);
                    $('#nama_perusahaan_edit').val(data.nama_perusahaan);
                    $('#jenis_kelamin_edit').val(data.jenis_kelamin);
                    $('#tanggal_lahir_edit').val(data.tanggal_lahir);
                    $('#kategori_konsumen_edit').val(data.kategori_konsumen);
                    $('#no_telp_edit').val(data.no_telp);
                    $('#alamat_edit').val(data.alamat);
                    $('#kode_referal_edit').val(data.kode_referal);
                    $('#email_edit').val(data.user.email);
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
                url: '/data_pendaftaran/' + id,
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

@endpush

@push('css')
<!-- <link rel="stylesheet" href="{{ asset('template/plugins/select2/css/custom.css') }}"> -->
@endpush