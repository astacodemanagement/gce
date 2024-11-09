@extends('front.layouts.app')
@section('title', $title)
@section('subtitle', $subtitle)


@push('css')

@endpush


@section('content')
{!! RecaptchaV3::initJs() !!}
<!--Start Page Header-->
<section class="page-header">
    <div class="page-header__bg" style="background-image: url({{ asset('template/front') }}/hero.png)">
    </div>
    <div class="container">
        <div class="page-header__inner text-center">
            <h2>Halaman {{ $halaman->nama_halaman_statis }}</h2>
            <ul class="thm-breadcrumb">
                <li><a href="/">Beranda</a></li>
                <li><span class="icon-right-arrow-5"></span></li>
                <li>{{ $halaman->nama_halaman_statis }}</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Header-->

<!--Start Project Details Page-->
<section class="project-details-page">
    <div class="container">
        <div class="row">
            <!--Start Services Details Page Content-->
            <div class="col-xl-12">
                <div class="services-details-page__content">
                    <div class="services-details-page__content-img1">
                        <img src="/upload/halaman_statis/{{ $halaman->gambar }}" alt="#">
                    </div>

                    <div class="services-details-page__content-text1">
                        <div class="top-text">
                            
                                <h2>{{ $halaman->nama_halaman_statis }}</h2>
                            
                        </div>
                        <p>{!! $halaman->deskripsi !!}</p>
                        <br><br><br>
                    </div>

                </div>
            </div>
            <!--End Services Details Page Content-->
           
           
        </div>
    </div>
</section>
<!--End Project Details Page-->






@endsection


@push('scripts')

@endpush