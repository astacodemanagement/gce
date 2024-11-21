@extends('front.layouts.app')
@section('title', $title)
@section('subtitle', $subtitle)


@push('css')
<style>
    #termsModal {
        transform: translateY(1000px);
        padding-top: 100px;
    }
</style>
@endpush


@section('content')
<!-- {!! RecaptchaV3::initJs() !!} -->
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
<section class="request-services-one" style="margin-top: -50px;">
    <div class="container">
        <div class="request-services-one__top">
            <div class="sec-title">
                <div class="sub-title">
                    <h5><span class="icon-right-arrow-1"></span> Jika sudah punya akun, bisa <a href="/login_pengguna" style="color: white;">klik login disini!</a></h5>
                </div>
                <h2>Mari Bergabung Bersama Kami</h2>
            </div>
        </div>

        <div class="row justify-content-center">

            <!--Start Single Tab-->
            <div class="col-xl-6 col-lg-8 col-md-10">
                <div class="tab" id="track">
                    <div class="request-services-one__single-tab">
                        @if (session('success'))
                        <div class="alert alert-success">
                            {!! session('success') !!}
                        </div>
                        @endif


                        <form action="{{ route('pendaftaran.submit_pendaftaran') }}" method="POST" id="" class="default-form2 contact-form-validated request-services-one__form" novalidate="novalidate">
                            @csrf
                            <div class="request-services-one__form-top">
                                <div class="title-box">
                                    <h3>Informasi Umum :</h3>
                                </div>

                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12" style="padding-bottom: 10px;">
                                        <div class="input-box">
                                            <label>Kategori Konsumen</label>
                                            <div class="select-box">
                                                <select class="selectmenu wide" name="kategori_konsumen" id="kategori_konsumen">
                                                    <option value="personal" {{ old('kategori_konsumen') == 'personal' ? 'selected' : '' }}>Personal</option>
                                                    <option value="corporate" {{ old('kategori_konsumen') == 'corporate' ? 'selected' : '' }}>Corporate</option>
                                                </select>
                                            </div>
                                            @error('kategori_konsumen')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-lg-12 col-md-12" id="nama_perusahaan_box" style="{{ old('kategori_konsumen') == 'corporate' ? 'display: block;' : 'display: none;' }}">
                                        <div class="input-box">
                                            <label>Nama Perusahaan</label>
                                            <input type="text" placeholder="Artaboga" name="nama_perusahaan" value="{{ old('nama_perusahaan') }}">
                                            @error('nama_perusahaan')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                                    <script>
                                        $(document).ready(function() {
                                            $('#kategori_konsumen').change(function() {
                                                if ($(this).val() === 'corporate') {
                                                    $('#nama_perusahaan_box').show();
                                                } else {
                                                    $('#nama_perusahaan_box').hide();
                                                }
                                            });

                                            if ($('#kategori_konsumen').val() !== 'corporate') {
                                                $('#nama_perusahaan_box').hide();
                                            }
                                        });
                                    </script>

                                    <div class="col-xl-12 col-lg-12 col-md-12">
                                        <div class="input-box">
                                            <label>Nama Lengkap</label>
                                            <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" placeholder="Ronald Richards" required="">
                                            @error('nama_lengkap')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-lg-12 col-md-12" style="padding-bottom: 10px;">
                                        <div class="input-box">
                                            <label>Jenis Kelamin</label>
                                            <div class="select-box">
                                                <select class="selectmenu wide" name="jenis_kelamin">
                                                    <option value="Pria" {{ old('jenis_kelamin') == 'Pria' ? 'selected' : '' }}>Pria</option>
                                                    <option value="Wanita" {{ old('jenis_kelamin') == 'Wanita' ? 'selected' : '' }}>Wanita</option>
                                                </select>
                                            </div>
                                            @error('jenis_kelamin')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-lg-12 col-md-12">
                                        <div class="input-box">
                                            <label>Tanggal Lahir</label>
                                            <input type="date" class="form-control wide" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" style="padding: .75rem .75rem;">
                                            @error('tanggal_lahir')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-lg-12 col-md-12">
                                        <div class="input-box">
                                            <label>No WhatsApp</label>
                                            <input type="number" placeholder="085-xxx-xxx-xxx" name="no_telp" value="{{ old('no_telp') }}">
                                            @error('no_telp')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-lg-12 col-md-12">
                                        <div class="input-box">
                                            <label>Email</label>
                                            <input type="email" name="email" value="{{ old('email') }}" placeholder="ronald@gmail.com" required="">
                                            @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-lg-12 col-md-12">
                                        <div class="input-box">
                                            <label>Alamat</label>
                                            <textarea class="form-control" name="alamat" style="height: 80px;">{{ old('alamat') }}</textarea>
                                            @error('alamat')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-lg-12 col-md-12">
                                        <div class="input-box">
                                            <label>Password</label>
                                            <input type="password" id="password" placeholder="Password" name="password" class="form-control">
                                            @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-lg-12 col-md-12">
                                        <div class="input-box">
                                            <label>Konfirmasi Password</label>
                                            <input type="password" id="confirmation_password" placeholder="Ulangi Password" name="password_confirmation" class="form-control">
                                            @error('password_confirmation')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <div id="password_match_message" style="margin-top: 5px;"></div> <!-- Tempat untuk pesan kecocokan password -->
                                        </div>
                                    </div>

                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            const passwordInput = document.getElementById('password');
                                            const confirmationInput = document.getElementById('confirmation_password');
                                            const matchMessage = document.getElementById('password_match_message');

                                            function checkPasswordMatch() {
                                                if (passwordInput.value && confirmationInput.value) {
                                                    if (passwordInput.value === confirmationInput.value) {
                                                        matchMessage.textContent = 'Password sama';
                                                        matchMessage.style.color = 'green';
                                                    } else {
                                                        matchMessage.textContent = 'Password belum sama';
                                                        matchMessage.style.color = 'red';
                                                    }
                                                } else {
                                                    matchMessage.textContent = '';
                                                }
                                            }

                                            passwordInput.addEventListener('input', checkPasswordMatch);
                                            confirmationInput.addEventListener('input', checkPasswordMatch);
                                        });
                                    </script>




                                    <div class="col-xl-12 col-lg-12 col-md-12">
                                        <div class="input-box">
                                            <label>Kode Referal</label>
                                            <input type="text" placeholder="Kode Referal" name="kode_referal" value="{{ old('kode_referal') }}">
                                            @error('kode_referal')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div style="margin-bottom: 10px;">
                                        <span style="color: grey;">Sudah punya akun? <a href="/login_pengguna" style="color: #007bff;">Login sekarang</a></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="input-box">
                                        <label>
                                            <input type="checkbox" id="terms_checkbox" onclick="toggleSubmitButton()" disabled>
                                            Saya setuju dengan
                                            <span style="color: #007bff; cursor: pointer;" onclick="openTerms()">syarat dan ketentuan</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                    <div class="col-md-6">
                                        {!! RecaptchaV3::field('register') !!}
                                        @if ($errors->has('g-recaptcha-response'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="request-services-one__form-btn">
                                        <button class="thm-btn" type="submit" id="submit_button" data-loading-text="Mohon tunggu..." disabled>
                                            <span class="txt">Daftar Sekarang</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <!-- Modal untuk syarat dan ketentuan -->
                        <div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="termsModalLabel" aria-hidden="true" data-backdrop="static" style="z-index: 9999;">
                            <div class="modal-dialog modal-xl" style="margin-top: 7em; padding-bottom:5rem;" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="termsModalLabel">Syarat dan Ketentuan</h5>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Isi syarat dan ketentuan -->
                                        {!! $profil->deskripsi_2 !!}
                                    </div>
                                    <div class="modal-footer">
                                        <!-- Checkbox dalam modal -->
                                        <label>
                                            <input type="checkbox" id="agreeCheckbox" onclick="toggleCloseButton()"> Setuju dengan syarat & ketentuan
                                        </label>

                                        <!-- Tombol OK -->
                                        <button type="button" class="btn btn-secondary" id="closeButton" onclick="closeTermsModal()" disabled>OK</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Script -->
                        <script>
                            // Mengaktifkan tombol submit jika ada perubahan apapun pada checkbox
                            function toggleSubmitButton() {
                                const checkbox = document.getElementById('terms_checkbox');
                                const submitButton = document.getElementById('submit_button');
                                submitButton.disabled = !checkbox.checked; // Aktifkan tombol jika checkbox dicentang
                            }

                            // Tampilkan modal syarat dan ketentuan
                            function openTerms() {
                                const agreeCheckbox = document.getElementById('agreeCheckbox');
                                const closeButton = document.getElementById('closeButton');

                                // Tampilkan modal
                                $('#termsModal').modal({
                                    backdrop: false, // Nonaktifkan backdrop
                                    keyboard: true // Izinkan menutup dengan ESC
                                }).modal('show');
                            }

                            // Menutup modal dan memperbarui checkbox utama
                            function closeTermsModal() {
                                $('#termsModal').modal('hide');
                                const termsCheckbox = document.getElementById('terms_checkbox');
                                termsCheckbox.disabled = false;
                                termsCheckbox.checked = true; // Centang checkbox utama
                                toggleSubmitButton(); // Perbarui status tombol submit
                            }

                            // Aktifkan tombol OK dalam modal
                            function toggleCloseButton() {
                                const agreeCheckbox = document.getElementById('agreeCheckbox');
                                const closeButton = document.getElementById('closeButton');
                                closeButton.disabled = !agreeCheckbox.checked;
                            }

                            // Deteksi perubahan pada checkbox secara dinamis
                            document.getElementById('terms_checkbox').addEventListener('change', toggleSubmitButton);
                        </script>


                    </div>
                </div>
                <!--End Single Tab-->
            </div>



        </div>
    </div>

</section>
<!--End Request Services One-->





@endsection


@push('scripts')

@endpush