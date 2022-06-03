@extends('layouts.landingpage')

@section('content')
<main>
    <section class="announcement__section">
        <div class="container">
            <div class="row g-5 mt-5 mx-auto">
                <div class="col-md-8">
                    <h1 class="pb-4 mb-4 fst-italic border-bottom">
                        Pengumuman
                    </h1>

                    @if (!$announcements->isEmpty())
                        @foreach ($announcements as $pengumuman)
                        <article class="blog-post mb-5">
                            <h2 class="blog-post-title">{{ $pengumuman->title }}</h2>
                            <img src="{{ $pengumuman->poster ? Storage::url($pengumuman->poster) : 'https://via.placeholder.com/1280x720' }}" alt="image" class="my-4 img-fluid">
                            <p class="blog-post-meta">
                                <i class="fa fa-solid fa-clock"></i>
                                {{ date('l F Y, H:i', strtotime($pengumuman->created_at)) }} by admin
                            </p>
                            <p>{!! $pengumuman->detail_announcements !!}</p>
                            <hr>
                        </article>
                        @endforeach
                    @else
                        @for ($i = 0; $i < 10; $i++)
                        <article class="blog-post mb-5">
                            <h2 class="blog-post-title">Sample pengumuman</h2>
                            <p class="blog-post-meta">
                                <i class="fa-solid fa-clock mr-1"></i>
                                January 1, 2021 by admin
                            </p>
                            <img src="https://via.placeholder.com/700x400" alt="image" class="my-4">
                            <p>This blog post shows a few different types of content that’s supported and styled with Bootstrap. Basic typography, lists, tables, images, code, and more are all supported as expected.</p>
                        
                            <p>This is some additional paragraph placeholder content. It has been written to fill the available space and show how a longer snippet of text affects the surrounding content. We'll repeat it often to keep the demonstration flowing, so be on the lookout for this exact same string of text.</p>
                            <hr>
                        </article>
                        @endfor 
                    @endif
                    
                </div>
        
                <div class="col-md-4">
                    <div class="position-sticky" style="top: 2rem;">
                        <div class="p-4 mb-3 bg-light rounded">
                            <h4 class="fst-italic">Pengumuman</h4>
                            <p class="mb-0"> </p>
                        </div>
            
                        <div class="p-4">
                                <h4 class="fst-italic">Archives</h4>
                                <ol class="list-unstyled mb-0">
                                    <li><a href="#">March 2021</a></li>
                                    <li><a href="#">February 2021</a></li>
                                    <li><a href="#">January 2021</a></li>
                                    <li><a href="#">December 2020</a></li>
                                    <li><a href="#">November 2020</a></li>
                                    <li><a href="#">October 2020</a></li>
                                    <li><a href="#">September 2020</a></li>
                                    <li><a href="#">August 2020</a></li>
                                    <li><a href="#">July 2020</a></li>
                                    <li><a href="#">June 2020</a></li>
                                    <li><a href="#">May 2020</a></li>
                                    <li><a href="#">April 2020</a></li>
                                </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<footer class="section-footer mt-5 mb-4 border-top">
    <div class="container pt-5 pb-5">
      <div class="row mx-auto mx-md-auto mt-4 justify-content-center">
        <div class="col-12">
          <div class="row">
            <div class="col-12">
              <div class="row">
                <div class="col-12 col-sm col-md-12 col-lg-5 ">
                    <ul class="list-unstyled">
                        <li>
                            <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
                                <img src="/Front-end/images/footer.png" alt="footer" class="footer">
                            </a>
                        </li>
                        <li>
                            <div class="row d-flex justify-content-center my-3">
                                <div class="col-1 col-sm-1 text-center">
                                    <i class="fa fa-solid fa-location-arrow"></i>
                                </div>
                                <div class="col">
                                    <p class="mb-0">
                                        Jl. Engku Putri, Tlk. Tering, Kec. Batam Kota, Kota Batam, Kepulauan Riau 29444
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row d-flex justify-content-center my-3">
                                <div class="col-1 col-sm-1">
                                    <i class="fa fa-solid fa-phone"></i>
                                </div>
                                <div class="col">
                                    <p class="mb-0">
                                        <a href="tel:+62812-907-9000" class="link-dark" style="color: white;">
                                            +62812-907-9000
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
                <div class="col-12 col-sm col-md col-lg-1 ">
                 
                </div>
                <div class="col-12 col-sm col-md-3 col-lg-2 py-5 ">
                  <h5>COMPANY</h5>
                  <ul class="list-unstyled">
                    <li><a href="#" style="color: white;">Beranda</a></li>
                    <li><a href="#" style="color: white;">Layanan</a></li>
                    <li><a href="#" style="color: white;">Informasi</a></li>
                    <li><a href="#" style="color: white;">Fasilitas</a></li>
                    <li><a href="#" style="color: white;">Tentang</a></li>
                  </ul>
                </div>
                <div class="col-12 col-sm col-md-3 col-lg-2 py-5 ">
                  <h5>Social Media</h5>
                  <ul class="list-unstyled">
                    <li>Facebook</li>
                    <li>Twitter</li>
                    <li>Youtube</li>
                  </ul>
                </div>
                <div class="col-12 col-sm col-md-3 col-lg-2 py-5 ">
                    <h5>Get Connected</h5>
                    <ul class="list-unstyled">
                      <li>Batam Centre</li>
                      <li>Indonesia</li>
                      <li>0821 - 2222 - 8888</li>
                      <li>support@masjidagungbatam.id</li>
                    </ul>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</footer>

<div class="container-fluid">
    <div class="row d-flex justify-content-center text-center align-items-center">
        <div class="col-auto text-gray-500 font-weight-light mb-4">
            • Made with <i class="fa fa-heart" style="color: red;"></i> in Batam •
        </div>
    </div>
</div>
@endsection