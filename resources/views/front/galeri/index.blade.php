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

  <!--Start Services Three-->
  <section class="services-three services-three--services">
      <div class="container">


          <div class="row">
              @foreach ($galeri as $p)
              <!--Start Services Three Single-->
              <div class="col-xl-4 col-lg-4 col-md-6">
                  <div class="services-three__single">
                      <div class="services-three__single-img">
                          <div class="inner">
                              <img src="upload/galeri/{{ $p->gambar }}" alt="">

                          </div>
                      </div>

                      <div class="services-three__single-content">
                          <div class="services-three__single-content-inner">
                              <h2><a href="road-transport.html">{{ $p->nama_galeri}}</a></h2>
                              <p>{{ $p->deskripsi}}</p>
                              <div class="btn-box">
                                  <a href="{{ $p->link}}">Selengkapnya <i class="icon-right-arrow-5"></i></a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <!--End Services Three Single-->
              @endforeach
              <!-- Pagination Links -->
              
            
                      <div class="card-body py-3">
                          {{ $galeri->links('vendor.pagination.bootstrap-4') }}
                      </div>
             



          </div>


      </div>
  </section>
  <!--End Services Three-->





  @endsection


  @push('scripts')
  @endpush