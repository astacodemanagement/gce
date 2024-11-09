@extends('layouts.app')
@section('title', $title)
@section('subtitle', $subtitle)

@push('css')
<link rel="stylesheet" href="{{ asset('template') }}/plugins/select2/css/custom.css">
<style>
    .select2-container {
        width: 100% !important;
    }
</style>
@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <!-- Select2 untuk memilih konsumen -->
        <label for="select-customer">Pilih Konsumen</label>
        <select id="select-customer" class="form-control select2 mb-3" style="width: 100%;">
            <option value="" disabled selected>Pilih Konsumen...</option>
            @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>

        <br><br><br>

        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Waktu</th>
                    <th>Status</th>
                    <th width="15%">Customer</th>
                    <th width="20%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach ($chat as $p)
                <tr>
                    <td>{{ $i }}</td>
                    <td>
                    {{ $p->latest_message_time }}
                    </td>
                    <td>
                        @if ($p->is_read == 'Belum Dibaca')
                        <span class="badge bg-danger">Belum Dibaca</span>
                        @else
                        <span class="badge bg-success">Sudah Dibaca</span>
                        @endif
                    </td>
                    <td>
                         
                        {{ $p->sender->name ?? 'Unknown Sender' }} 
                    </td>
                    <td>
                        <a href="{{ route('chat.show', $p->sender_id) }}" class="btn btn-sm btn-info">
                            <i class="fas fa-eye"></i> Buka
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
</div>
@endsection

@push('script')
<!-- Menambahkan SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                        url: '{{ route("chat.destroy", ":id") }}'.replace(':id', id), // Memperbaiki penempatan tanda kutip
                        type: 'DELETE',
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    title: 'Sukses!',
                                    text: response.message, // Menampilkan pesan sukses
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

<script>
    $(document).ready(function() {
        $('#select-customer').select2();

        // Event handler untuk saat konsumen dipilih
        $('#select-customer').on('change', function() {
            var customerId = $(this).val(); // Mendapatkan ID konsumen yang dipilih
            if (customerId) {
                // Mengarahkan ke halaman chat dengan ID konsumen
                window.location.href = '/chat/' + customerId;
            }
        });
    });

    // Fokus pada kolom pencarian saat select2 dibuka
    $(document).on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
    });
</script>
@endpush