@extends('layouts.app')
@section('title','Halaman Profil')
@section('subtitle','Menu Profil')
@push('css')
<link rel="stylesheet" href="{{ asset('template') }}/plugins/summernote/summernote-bs4.min.css">
@endpush


@section('content')

<div class="card">

  <!-- /.card-header -->
  <div class="card-body">

    {{-- <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-profil"><i class="fas fa-plus-circle"></i> Tambah Data</a> --}}


    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th width="2%">No</th>
          <th>Nama Profil</th>
          <th>Alias</th>
          <th>No Telp</th>
          <th>Email</th>
          <th>Website</th>
          <th>Alamat</th>
          <th>Biaya Admin</th>
          <th>Gambar</th>
          <th>Logo</th>
          <th>Favicon</th>
          <th>Banner</th>
          <th width="5%">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        @foreach ($prf as $p)
        <tr>
          <td>{{ $i }}</td>
          <td>{{ $p->nama_profil}}</td>
          <td>{{ $p->alias}}</td>
          <td>{{ $p->no_telp}}</td>
          <td>{{ $p->email}}</td>
          <td>{{ $p->link}}</td>
          <td>{{ $p->alamat}}</td>
          <td><span class="float-left badge bg-success">Rp. {{ number_format($p->biaya_admin) }}</span></td>


          <td>
            <a href="/upload/profil/{{ $p->gambar}}" target="_blank"><img style="max-width:50px; max-height:50px" src="/upload/profil/{{ $p->gambar}}" alt="{{ $p->alias}}"></a>
          </td>
          <td>
            <a href="/upload/profil/{{ $p->logo}}" target="_blank"><img style="max-width:50px; max-height:50px" src="/upload/profil/{{ $p->logo}}" alt="{{ $p->alias}}"></a>
          </td>
          <td>
            <a href="/upload/profil/{{ $p->favicon}}" target="_blank"><img style="max-width:50px; max-height:50px" src="/upload/profil/{{ $p->favicon}}" alt="{{ $p->alias}}"></a>
          </td>
          <td>
            <a href="/upload/profil/{{ $p->banner}}" target="_blank"><img style="max-width:50px; max-height:50px" src="/upload/profil/{{ $p->banner}}" alt="{{ $p->alias}}"></a>
          </td>



          <td>
            <a href="#" class="btn btn-sm btn-warning btn-edit" data-toggle="modal" data-target="#modal-profil-edit" data-id="{{ $p->id }}" style="color: black">
              <i class="fas fa-edit"></i> Lihat & Edit
            </a>
          </td>


        </tr>
        <?php $i++; ?>
        @endforeach

      </tbody>

    </table>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->




<div class="modal fade" id="modal-profil-edit">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Form Edit Profil</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- Main content -->

        <div class="col-md-12">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#general" data-toggle="tab">General</a></li>
                <li class="nav-item"><a class="nav-link" href="#display" data-toggle="tab">Display</a></li>
              </ul>
            </div>
            <form id="form-edit" method="POST" enctype="multipart/form-data">
              @method('PUT')
              @csrf <!-- Tambahkan token CSRF -->
              <div class="card-body">
                <div class="tab-content">

                  <div class="active tab-pane" id="general">


                    <input type="hidden" id="id" name="id" value="">
                    <div class="card-body">

                      <div class="row">
                        <div class="col-md-4 col-sm-4 col-12">
                          <!-- Kolom untuk input kode resi dan nama konsumen -->
                          <div class="form-group">
                            <label for="nama_profil_edit">Nama Profil</label>
                            <input type="text" class="form-control" id="nama_profil_edit" name="nama_profil" placeholder="Masukkan Nama Profil">
                          </div>
                        </div>

                        <div class="col-md-4 col-sm-4 col-12">
                          <div class="form-group">
                            <label for="alias_edit">Alias</label>
                            <input type="text" class="form-control" id="alias_edit" name="alias" placeholder="Masukkan Alias">
                          </div>
                        </div>

                        <div class="col-md-4 col-sm-4 col-12">
                          <div class="form-group">
                            <label for="email_edit">Email</label>
                            <input type="email" class="form-control" id="email_edit" name="email" placeholder="Masukkan Email">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-4 col-sm-4 col-12">
                          <!-- Kolom untuk input kode resi dan nama konsumen -->
                          <div class="form-group">
                            <label for="no_telp_edit">No Telp</label>
                            <input type="number" class="form-control" id="no_telp_edit" name="no_telp" placeholder="Masukkan No Telp">
                          </div>
                        </div>

                        <div class="col-md-4 col-sm-4 col-12">
                          <div class="form-group">
                            <label for="no_wa_edit">No WA</label>
                            <input type="number" class="form-control" id="no_wa_edit" name="no_wa" placeholder="Masukkan No WA">
                          </div>
                        </div>

                        <div class="col-md-4 col-sm-4 col-12">
                          <div class="form-group">
                            <label for="link_edit">Link</label>
                            <input type="text" class="form-control" id="link_edit" name="link" placeholder="Masukkan Link">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-4 col-sm-4 col-12">
                          <!-- Kolom untuk input kode resi dan nama konsumen -->
                          <div class="form-group">
                            <label for="no_rekening_edit">No Rekening</label>
                            <input type="number" class="form-control" id="no_rekening_edit" name="no_rekening" placeholder="Masukkan No Rekening">
                          </div>
                        </div>

                        <div class="col-md-4 col-sm-4 col-12">
                          <div class="form-group">
                            <label for="bank_edit">Bank</label>
                            <input type="text" class="form-control" id="bank_edit" name="bank" placeholder="Masukkan Bank">
                          </div>
                        </div>

                        <div class="col-md-4 col-sm-4 col-12">
                          <div class="form-group">
                            <label for="atas_nama_edit">Atas Nama</label>
                            <input type="text" class="form-control" id="atas_nama_edit" name="atas_nama" placeholder="Masukkan Atas Nama">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12 col-sm-12 col-12">
                          <!-- Kolom untuk input kode resi dan nama konsumen -->
                          <div class="form-group">
                            <label for="deskripsi_utama_edit">Deskripsi Utama</label>
                            <textarea id="deskripsi_utama_edit" name="deskripsi_utama" class="form-control" cols="30" rows="2"></textarea>
                          </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-12">
                          <div class="form-group">
                            <label for="deskripsi_2_edit">Deskripsi Ke-2</label>
                            <textarea id="deskripsi_2_edit" name="deskripsi_2" class="form-control" cols="30" rows="2"></textarea>
                          </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-12">
                          <div class="form-group">
                            <label for="deskripsi_3_edit">Deskripsi Ke-3</label>
                            <textarea id="deskripsi_3_edit" name="deskripsi_3" class="form-control" cols="30" rows="2"></textarea>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6 col-sm-6 col-12">
                          <!-- Kolom untuk input kode resi dan nama konsumen -->
                          <div class="form-group">
                            <label for="biaya_admin_edit">Biaya Admin</label>
                            <input type="number" class="form-control" id="biaya_admin_edit" name="biaya_admin" placeholder="Masukkan Biaya Admin">
                          </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <label for="biaya_pembatalan_edit">Biaya Pembatalan</label>
                            <input type="text" class="form-control" id="biaya_pembatalan_edit" name="biaya_pembatalan" placeholder="Masukkan Biaya Pembatalan">
                          </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-12">
                          <!-- Kolom untuk input kode resi dan nama konsumen -->
                          <div class="form-group">
                            <label for="alamat_edit">Alamat</label>
                            <textarea id="alamat_edit" name="alamat" class="form-control" cols="30" rows="2"></textarea>
                          </div>
                        </div>


                      </div>


                    </div>



                  </div>

                  <div class="tab-pane" id="display">

                    <div class="card-body">


                      <div class="row">
                        <div class="col-3">
                          <div class="mb-4">
                            <label for="gambar" class="form-label fw-semibold">Gambar</label>
                            <span class="text-danger">*</span>
                            <input type="file" class="form-control" id="gambar_edit"
                              name="gambar" onchange="previewImage()">

                            <canvas id="preview_canvas"
                              style="display: none; max-width: 100%; margin-top: 10px;"></canvas>
                            <img id="preview_image" src="#" alt="Preview Gambar"
                              style="display: none; max-width: 100%; margin-top: 10px;">
                            <script>
                              function previewImage() {
                                var previewCanvas = document.getElementById('preview_canvas');
                                var previewImage = document.getElementById('preview_image');
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

                        <div class="col-3">
                          <div class="mb-4">
                            <label for="logo" class="form-label fw-semibold">Logo</label>
                            <span class="text-danger">*</span>
                            <input type="file" class="form-control" id="logo_edit"
                              name="logo" onchange="previewImage2()">

                            <canvas id="preview_canvas2"
                              style="display: none; max-width: 100%; margin-top: 10px;"></canvas>
                            <img id="preview_image2" src="#" alt="Preview Logo"
                              style="display: none; max-width: 100%; margin-top: 10px;">
                            <script>
                              function previewImage2() {
                                var previewCanvas2 = document.getElementById('preview_canvas2');
                                var previewImage2 = document.getElementById('preview_image2');
                                var fileInput = document.getElementById('logo_edit');
                                var file = fileInput.files[0];
                                var reader = new FileReader();

                                reader.onload = function(e) {
                                  var img = new Image();
                                  img.src = e.target.result;

                                  img.onload = function() {
                                    var canvasContext = previewCanvas2.getContext('2d');
                                    var maxWidth = 150; // Max width untuk pratinja logo

                                    var scaleFactor = maxWidth / img.width;
                                    var newHeight = img.height * scaleFactor;

                                    previewCanvas2.width = maxWidth;
                                    previewCanvas2.height = newHeight;

                                    canvasContext.drawImage(img, 0, 0, maxWidth, newHeight);

                                    // Menampilkan pratinja logo setelah diperkecil
                                    previewCanvas2.style.display = 'block';
                                    previewImage2.style.display = 'none';
                                  };
                                };

                                if (file) {
                                  reader.readAsDataURL(file); // Membaca file yang dipilih sebagai URL data
                                } else {
                                  previewImage2.src = '';
                                  previewCanvas2.style.display = 'none'; // Menyembunyikan pratinja logo jika tidak ada file yang dipilih
                                }
                              }
                            </script>
                          </div>
                        </div>

                        <div class="col-3">
                          <div class="mb-4">
                            <label for="favicon" class="form-label fw-semibold">Favicon</label>
                            <span class="text-danger">*</span>
                            <input type="file" class="form-control" id="favicon_edit"
                              name="favicon" onchange="previewImage3()">

                            <canvas id="preview_canvas3"
                              style="display: none; max-width: 100%; margin-top: 10px;"></canvas>
                            <img id="preview_image3" src="#" alt="Preview Favicon"
                              style="display: none; max-width: 100%; margin-top: 10px;">
                            <script>
                              function previewImage3() {
                                var previewCanvas3 = document.getElementById('preview_canvas3');
                                var previewImage3 = document.getElementById('preview_image3');
                                var fileInput = document.getElementById('favicon_edit');
                                var file = fileInput.files[0];
                                var reader = new FileReader();

                                reader.onload = function(e) {
                                  var img = new Image();
                                  img.src = e.target.result;

                                  img.onload = function() {
                                    var canvasContext = previewCanvas3.getContext('2d');
                                    var maxWidth = 150; // Max width untuk pratinja favicon

                                    var scaleFactor = maxWidth / img.width;
                                    var newHeight = img.height * scaleFactor;

                                    previewCanvas3.width = maxWidth;
                                    previewCanvas3.height = newHeight;

                                    canvasContext.drawImage(img, 0, 0, maxWidth, newHeight);

                                    // Menampilkan pratinja favicon setelah diperkecil
                                    previewCanvas3.style.display = 'block';
                                    previewImage3.style.display = 'none';
                                  };
                                };

                                if (file) {
                                  reader.readAsDataURL(file); // Membaca file yang dipilih sebagai URL data
                                } else {
                                  previewImage3.src = '';
                                  previewCanvas3.style.display = 'none'; // Menyembunyikan pratinja favicon jika tidak ada file yang dipilih
                                }
                              }
                            </script>
                          </div>
                        </div>

                        <div class="col-3">
                          <div class="mb-4">
                            <label for="banner" class="form-label fw-semibold">Banner</label>
                            <span class="text-danger">*</span>
                            <input type="file" class="form-control" id="banner_edit"
                              name="banner" onchange="previewImage4()">

                            <canvas id="preview_canvas4"
                              style="display: none; max-width: 100%; margin-top: 10px;"></canvas>
                            <img id="preview_image4" src="#" alt="Preview Banner"
                              style="display: none; max-width: 100%; margin-top: 10px;">
                            <script>
                              function previewImage4() {
                                var previewCanvas4 = document.getElementById('preview_canvas4');
                                var previewImage4 = document.getElementById('preview_image4');
                                var fileInput = document.getElementById('banner_edit');
                                var file = fileInput.files[0];
                                var reader = new FileReader();

                                reader.onload = function(e) {
                                  var img = new Image();
                                  img.src = e.target.result;

                                  img.onload = function() {
                                    var canvasContext = previewCanvas4.getContext('2d');
                                    var maxWidth = 150; // Max width untuk pratinja banner

                                    var scaleFactor = maxWidth / img.width;
                                    var newHeight = img.height * scaleFactor;

                                    previewCanvas4.width = maxWidth;
                                    previewCanvas4.height = newHeight;

                                    canvasContext.drawImage(img, 0, 0, maxWidth, newHeight);

                                    // Menampilkan pratinja banner setelah diperkecil
                                    previewCanvas4.style.display = 'block';
                                    previewImage4.style.display = 'none';
                                  };
                                };

                                if (file) {
                                  reader.readAsDataURL(file); // Membaca file yang dipilih sebagai URL data
                                } else {
                                  previewImage4.src = '';
                                  previewCanvas4.style.display = 'none'; // Menyembunyikan pratinja banner jika tidak ada file yang dipilih
                                }
                              }
                            </script>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-4 col-sm-4 col-12">
                          <!-- Kolom untuk input kode resi dan nama konsumen -->
                          <div class="form-group">
                            <label for="facebook_edit">Facebook</label>
                            <input type="text" class="form-control" id="facebook_edit" name="facebook" placeholder="Masukkan Facebook">
                          </div>
                        </div>

                        <div class="col-md-4 col-sm-4 col-12">
                          <div class="form-group">
                            <label for="instagram_edit">Instagram</label>
                            <input type="text" class="form-control" id="instagram_edit" name="instagram" placeholder="Masukkan Instagram">
                          </div>
                        </div>

                        <div class="col-md-4 col-sm-4 col-12">
                          <div class="form-group">
                            <label for="twitter_edit">Twitter</label>
                            <input type="text" class="form-control" id="twitter_edit" name="twitter" placeholder="Masukkan Twitter">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4 col-sm-4 col-12">
                          <!-- Kolom untuk input kode resi dan nama konsumen -->
                          <div class="form-group">
                            <label for="linkedin_edit">Linkedin</label>
                            <input type="text" class="form-control" id="linkedin_edit" name="linkedin" placeholder="Masukkan Linkedin">
                          </div>
                        </div>

                        <div class="col-md-4 col-sm-4 col-12">
                          <div class="form-group">
                            <label for="youtube_edit">Youtube</label>
                            <input type="text" class="form-control" id="youtube_edit" name="youtube" placeholder="Masukkan Youtube">
                          </div>
                        </div>

                        <div class="col-md-4 col-sm-4 col-12">
                          <div class="form-group">
                            <label for="website_edit">Website</label>
                            <input type="text" class="form-control" id="website_edit" name="website" placeholder="Masukkan Website">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12 col-sm-12 col-12">
                          <!-- Kolom untuk input kode resi dan nama konsumen -->
                          <div class="form-group">
                            <label for="map_edit">Map</label>
                            <textarea id="map_edit" name="map" class="form-control" cols="30" rows="2"></textarea>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12 col-sm-12 col-12">
                            <!-- Kolom untuk input kode resi dan nama konsumen -->
                            <div class="form-group">
                              <label for="map_edit">Default Profil</label>



                              <select class="form-control" name="default_profil" id="default_profil_edit">
                                <option value="">--Default Profil--</option>
                                <option value="Poto" {{ old('default_profil') == 'Poto' ? 'selected' : '' }}>
                                  Poto
                                </option>
                                <option value="Video"
                                  {{ old('default_profil') == 'Video' ? 'selected' : '' }}>
                                  Video
                                </option>
                              </select>
                            </div>
                          </div>


                        </div>

                      </div>

                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="button" class="btn btn-primary" id="btn-save-edit"><i class="fas fa-check"></i> Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span aria-hidden="true">&times;</span> Close</button>
                  </div>
                </div>
            </form>
          </div>
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
{{--SKRIP TAMBAHAN  --}}
<!-- jQuery -->
<script src="{{ asset('template') }}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('template') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- SweetAlert CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

@push('script')



<script>
  $(function() {
    $('#deskripsi_utama_edit').summernote({
      height: 200,
      callbacks: {
        onInit: function() {
          $('#deskripsi_utama_edit').summernote('code', data.deskripsi_utama_edit);
        }
      }
    });
  });
</script>


<script>
  $(function() {
    $('#deskripsi_2_edit').summernote({
      height: 200,
      callbacks: {
        onInit: function() {
          $('#deskripsi_2_edit').summernote('code', data.deskripsi_2_edit);
        }
      }
    });
  });
</script>


<script>
  $(function() {
    $('#deskripsi_3_edit').summernote({
      height: 200,
      callbacks: {
        onInit: function() {
          $('#deskripsi_3_edit').summernote('code', data.deskripsi_3_edit);
        }
      }
    });
  });
</script>




{{-- perintah edit data --}}
<script>
  $(document).ready(function() {


    $('.dataTable tbody').on('click', 'td .btn-edit', function(e) {
      // $('.btn-edit').click(function(e) {
      e.preventDefault();
      var profilId = $(this).data('id');


      // Ajax request untuk mendapatkan data profil
      $.ajax({
        type: 'GET',
        url: '/profil/' + profilId + '/edit',

        success: function(data) {
          console.log(data)
          // Mengisi data pada form modal
          $('#id').val(data.id); // Menambahkan nilai id ke input tersembunyi
          $('#nama_profil_edit').val(data.nama_profil);
          $('#alias_edit').val(data.alias);
          $('#no_telp_edit').val(data.no_telp);
          $('#no_wa_edit').val(data.no_wa);
          $('#email_edit').val(data.email);
          $('#alamat_edit').val(data.alamat);
          $('#biaya_admin_edit').val(data.biaya_admin);
          $('#biaya_pembatalan_edit').val(data.biaya_pembatalan);
          $('#no_rekening_edit').val(data.no_rekening);
          $('#bank_edit').val(data.bank);
          $('#atas_nama_edit').val(data.atas_nama);
          $('#link_edit').val(data.link);
          $('#facebook_edit').val(data.facebook);
          $('#instagram_edit').val(data.instagram);
          $('#twitter_edit').val(data.twitter);
          $('#linkedin_edit').val(data.linkedin);
          $('#website_edit').val(data.website);
          $('#youtube_edit').val(data.youtube);
          $('#default_profil_edit').val(data.default_profil);
          $('#deskripsi_utama_edit').summernote('code', data.deskripsi_utama);
          $('#deskripsi_2_edit').summernote('code', data.deskripsi_2);
          $('#deskripsi_3_edit').summernote('code', data.deskripsi_3);

          $('#map_edit').val(data.map);
          // Menampilkan modal
          $('#modal-profil-edit').modal('show');
        },
        error: function(error) {
          console.log(error);
        }
      });

    });
  });
</script>
{{-- perintah edit data --}}


{{-- perintah update data --}}
<script>
  $(document).ready(function() {
    $('#btn-save-edit').click(function(e) {
      e.preventDefault();

      const tombolUpdate = $('#btn-save-edit');
      var id = $('#id').val();
      var formData = new FormData($('#form-edit')[0]);

      // Ubah teks tombol menjadi "Updating..." dan disable tombolnya
      tombolUpdate.text('Updating...');
      tombolUpdate.prop('disabled', true);

      $.ajax({
        type: 'POST', // Gunakan POST karena kita override dengan PUT
        url: '/profil/' + id,
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
{{-- perintah update data --}}


@endpush