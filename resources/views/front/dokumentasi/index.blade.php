@extends('front.layouts.app')
@section('title', $title)
@section('subtitle', $subtitle)

@push('css')
<style>
    .accrodion-content {
        display: none;
        /* Sembunyikan konten secara default */
    }

    .accrodion.active .accrodion-content {
        display: block;
        /* Tampilkan konten jika aktif */
    }
</style>
@endpush


@section('content')

<!--Start Page Header-->
<section class="page-header">
    <div class="page-header__bg" style="background-image: url({{ asset('themplete/front') }}/hero.png)">
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

<!-- Start Faq One-->
<section class="faq-one faq-one--two">
    <!-- <div class="big-title">
        <h2>faq</h2>
    </div> -->

    <div class="container">
        <div class="row">
            <!-- Start Faq One Faq-->
            <div class="col-xl-12">
                <div class="faq-one__faq">

                    <div class="sec-title-two">
                        <div class="sub-title">
                            <h5>Simak Dengan Teliti</h5>
                        </div>
                        <h2>Informasi & Dokumentasi</h2>
                    </div>

                    <ul class="accrodion-grp faq-one__accrodion" data-grp-name="faq-one-accrodion">
                        @foreach ($dokumentasi as $p)
                        <!-- Start Faq One Single-->
                        <li class="accrodion">
                            <div class="accrodion-title">
                                <h2><span>{{ $p->urutan }}.</span> {{ $p->nama_dokumentasi }}</h2>
                            </div>
                            <div class="accrodion-content">
                                <div class="inner">
                                    <p style="color: white;">{!! $p->deskripsi !!}</p>
                                </div>
                            </div>
                        </li>
                        <!-- End Faq One Single-->
                        @endforeach
                    </ul>
                    
                </div>
            </div>
            <!-- End Faq One Faq-->


        </div>
    </div>
</section>
<!-- End Faq One-->





@endsection


@push('scripts')


@endpush