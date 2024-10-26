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
        </div>

        <div class="row">
            <!--Start Request Services One Form-->
            <div class="col-xl-12">
                <div class="request-services-one__form-box">
                    <div class="request-services-one__form-tab tabs-box">
                        <ul class="tab-buttons clearfix list-unstyled">
                            <li data-tab="#profil" class="tab-btn active-btn"><span>Profil</span></li>
                            <li data-tab="#track" class="tab-btn"><span>Order Saya</span></li>
                            <li data-tab="#track" class="tab-btn"><span>Pembayaran</span></li>
                        </ul>

                        <div class="tabs-content">

                            <!--Start Single Tab-->
                            <div class="tab active-tab" id="profil">
                                <div class="request-services-one__single-tab">
                                    <form id="contact-form2"
                                        class="default-form2 contact-form-validated request-services-one__form"
                                        action="assets/inc/sendemail.php" novalidate="novalidate">

                                        <div class="request-services-one__form-top">
                                            <div class="title-box">
                                                <h3>Informasi Umum :</h3>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="input-box">
                                                        <label>Nama Lengkap</label>
                                                        <input type="text" name="name" id="name" value=""
                                                            placeholder="Nama Lengkap">
                                                    </div>
                                                </div>

                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="input-box">
                                                        <label>Jenis Kelamin</label>
                                                        <div class="select-box">
                                                            <select class="selectmenu wide" name="jenis_kelamin" id="jenis_kelamin">
                                                                <option value="Laki-laki" selected="selected">Laki-laki</option>
                                                                <option value="Perempuan">Perempuan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                               

                                                <!-- <div class="col-xl-4 col-lg-4 col-md-4">
                                                    <div class="input-box">
                                                        <label>Email</label>
                                                        <input type="email" name="email" id="email" value=""
                                                            placeholder="Email">
                                                    </div>
                                                </div> -->
                                            </div>

                                            <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="input-box">
                                                        <label>Tanggal Lahir</label>
                                                        <input type="date" class="form-control wide" name="tanggal_lahir" id="tanggal_lahir" value="" style="background-color: #3b3232; color:white;">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="input-box">
                                                        <label>No Telp</label>
                                                        <input type="number" name="no_telp" id="no_telp" value=""
                                                            placeholder="No Telp">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="request-services-one__form-bottom">
                                            <div class="title-box">
                                                <h3>Data Pelengkap :</h3>
                                            </div>

                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12">
                                                    <div class="input-box">
                                                        <label>Alamat</label>
                                                        <textarea class="form-control" name="alamat" style="height: 80px;">{{ old('alamat') }}</textarea>
                                                        @error('alamat')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12">
                                                    <div class="input-box">
                                                        <label>Nama Perusahaan</label>
                                                        <input type="text" name="nama_perusahaan" id="nama_perusahaan" value=""
                                                            placeholder="Nama Perusahaan">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12">
                                                    <div class="input-box">
                                                        <label>Kode Referal</label>
                                                        <input type="text" name="kode_referal" id="kode_referal" value=""
                                                            placeholder="Kode Referal" readonly>
                                                    </div>
                                                </div>

                                            </div>

                                         
                                            <div class="request-services-one__form-bottom-tag">
                                                <div class="title">
                                                    <h3>Extra services:</h3>
                                                </div>

                                                <div class="tag-box">
                                                    <div class="single-tags">
                                                        <input type="checkbox" name="express-delivery"
                                                            id="tag_1">
                                                        <label for="tag_1"><span></span>Express Delivery</label>
                                                    </div>

                                                    <div class="single-tags">
                                                        <input type="checkbox" name="express-delivery"
                                                            id="tag_2">
                                                        <label for="tag_2"><span></span>Insurance</label>
                                                    </div>

                                                    <div class="single-tags">
                                                        <input type="checkbox" name="express-delivery"
                                                            id="tag_3">
                                                        <label for="tag_3"><span></span>Packaging</label>
                                                    </div>

                                                    <div class="single-tags">
                                                        <input type="checkbox" name="express-delivery"
                                                            id="tag_4">
                                                        <label for="tag_4"><span></span>Fragile</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6">
                                                <div class="request-services-one__form-btn">
                                                    <button class="thm-btn" type="submit"
                                                        data-loading-text="Please wait...">
                                                        <span class="txt">Submit Now</span>
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
                                    <form id="contact-form2"
                                        class="default-form2 contact-form-validated request-services-one__form"
                                        action="assets/inc/sendemail.php" novalidate="novalidate">

                                        <div class="request-services-one__form-top">
                                            <div class="title-box">
                                                <h3>General Information:</h3>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-4 col-lg-4 col-md-4">
                                                    <div class="input-box">
                                                        <label>Full Name</label>
                                                        <input type="text" name="name" value=""
                                                            placeholder="Ronald Richards" required="">
                                                    </div>
                                                </div>

                                                <div class="col-xl-4 col-lg-4 col-md-4">
                                                    <div class="input-box">
                                                        <label>Phone Number</label>
                                                        <input type="text" placeholder="+1256 456 7890"
                                                            name="phone">
                                                    </div>
                                                </div>

                                                <div class="col-xl-4 col-lg-4 col-md-4">
                                                    <div class="input-box">
                                                        <label>Email Address</label>
                                                        <input type="email" name="email" value=""
                                                            placeholder="ronald@gmail.com" required="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xl-4 col-lg-4 col-md-4">
                                                    <div class="input-box">
                                                        <label>Freight Type</label>
                                                        <div class="select-box">
                                                            <select class="selectmenu wide">
                                                                <option selected="selected">Air Freight</option>
                                                                <option>Air Freight</option>
                                                                <option>Air Freight</option>
                                                                <option>Air Freight</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-4 col-lg-4 col-md-4">
                                                    <div class="input-box">
                                                        <label>Departure City</label>
                                                        <input type="text" placeholder="New York" name="city">
                                                    </div>
                                                </div>

                                                <div class="col-xl-4 col-lg-4 col-md-4">
                                                    <div class="input-box">
                                                        <label>Delivery City</label>
                                                        <input type="text" placeholder="Las Angle" name="city2">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="request-services-one__form-bottom">
                                            <div class="title-box">
                                                <h3>Dimensions of Departure:</h3>
                                            </div>

                                            <div class="row">
                                                <div class="col-xl-3 col-lg-3 col-md-3">
                                                    <div class="input-box">
                                                        <label>Incoterms</label>
                                                        <div class="select-box">
                                                            <select class="selectmenu wide">
                                                                <option selected="selected">Value 1</option>
                                                                <option>Value 2</option>
                                                                <option>Value 3</option>
                                                                <option>Value 4</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-3 col-lg-3 col-md-3">
                                                    <div class="input-box">
                                                        <label>Height</label>
                                                        <input type="number" placeholder="3" name="height">
                                                    </div>
                                                </div>

                                                <div class="col-xl-3 col-lg-3 col-md-3">
                                                    <div class="input-box">
                                                        <label>Width</label>
                                                        <input type="number" placeholder="3" name="width">
                                                    </div>
                                                </div>

                                                <div class="col-xl-3 col-lg-3 col-md-3">
                                                    <div class="input-box">
                                                        <label>Length</label>
                                                        <input type="number" placeholder="4" name="length">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="request-services-one__form-bottom-tag">
                                                <div class="title">
                                                    <h3>Extra services:</h3>
                                                </div>

                                                <div class="tag-box">
                                                    <div class="single-tags">
                                                        <input type="checkbox" name="express-delivery"
                                                            id="tag_5">
                                                        <label for="tag_5"><span></span>Express Delivery</label>
                                                    </div>

                                                    <div class="single-tags">
                                                        <input type="checkbox" name="express-delivery"
                                                            id="tag_6">
                                                        <label for="tag_6"><span></span>Insurance</label>
                                                    </div>

                                                    <div class="single-tags">
                                                        <input type="checkbox" name="express-delivery"
                                                            id="tag_7">
                                                        <label for="tag_7"><span></span>Packaging</label>
                                                    </div>

                                                    <div class="single-tags">
                                                        <input type="checkbox" name="express-delivery"
                                                            id="tag_8">
                                                        <label for="tag_8"><span></span>Fragile</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6">
                                                <div class="request-services-one__form-btn">
                                                    <button class="thm-btn" type="submit"
                                                        data-loading-text="Please wait...">
                                                        <span class="txt">Submit Now</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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