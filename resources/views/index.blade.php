@extends('layouts.frontend.app')

@section('title')
    Company - Home
@endsection

@include('layouts.frontend.slider')

@section('content')
    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>About Us</strong></h2>
          </div>
  
          <div class="row content">
            <div class="col-lg-6" data-aos="fade-right">
              <h2>{{ $about->title }}</h2>
              <h3>{{ $about->short_des }}</h3>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
              <p>
                  {{ $about->long_des }}
              </p>
              {{-- <ul>
                <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequa</li>
                <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit</li>
                <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in</li>
              </ul> --}}

            </div>
          </div>
  
        </div>
      </section><!-- End About Us Section -->
  

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</strong></h2>
          <p>Laborum repudiandae omnis voluptatum consequatur mollitia ea est voluptas ut</p>
        </div>

        <div class="row">     
          @forelse ($services as $service)
          <div class="col-lg-4 col-md-6 col-sm-12 d-flex align-items-stretch justify_items-center p-1 mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box iconbox-orange ">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,582.0697525312426C382.5290701553225,586.8405444964366,449.9789794690241,525.3245884688669,502.5850820975895,461.55621195738473C556.606425686781,396.0723002908107,615.8543463187945,314.28637112970534,586.6730223649479,234.56875336149918C558.9533121215079,158.8439757836574,454.9685369536778,164.00468322053177,381.49747125262974,130.76875717737553C312.15926192815925,99.40240125094834,248.97055460311594,18.661163978235184,179.8680185752513,50.54337015887873C110.5421016452524,82.52863877960104,119.82277516462835,180.83849132639028,109.12597500060166,256.43424936330496C100.08760227029461,320.3096726198365,92.17705696193138,384.0621239912766,124.79988738764834,439.7174275375508C164.83382741302287,508.01625554203684,220.96474134820875,577.5009287672846,300,582.0697525312426"></path>
                </svg>
                <i class="bx bx-file"></i>
              </div>
              <h4><a href="">{{ $service->title }}</a></h4>
              <p>{{ $service->description }}</p>
            </div>
          </div>
          @empty
           <br><br><br><br><br><br><br><br>
          @endforelse             
        </div>
      </div>
    </section><!-- End Services Section -->


      <!-- ======= Portfolio Section ======= -->
      <section id="portfolio" class="portfolio">
        <div class="container">
  
          <div class="section-title" data-aos="fade-up">
            <h2>Gallery</h2>
          </div>
  
          <div class="row" data-aos="fade-up">
            <div class="col-lg-12 d-flex justify-content-center mb-4">
              {{-- <ul id="portfolio-flters">
                <li data-filter="*" class="filter-active">All</li>
                <li data-filter=".filter-app">App</li>
                <li data-filter=".filter-card">Card</li>
                <li data-filter=".filter-web">Web</li>
              </ul> --}}
              {{ $images->links() }}
            </div>
          </div>
  
          <div class="row portfolio-container" data-aos="fade-up">
            @forelse ($images as $img)
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <img src="{{ $img->image }}" class="img-fluid img-responsive" width="400" height="400" alt="">
              <div class="portfolio-info">
                <h4>Gallery Image</h4>                
                <a href="{{ asset($img->image) }}" data-gall="portfolioGallery" class="venobox preview-link" title="Gallery Images"><i class="bx bx-plus"></i></a>
                {{-- <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a> --}}
              </div>
            </div>
            @empty
            <br><br><br><br>
              <p>No Image Founded!</p>
              <b><br><br><br><br>
            @endforelse


          </div>                                         
        </div>
      </section><!-- End Portfolio Section -->
  
      <!-- ======= Our Brands Section ======= -->
      <section id="clients" class="clients">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Brands</h2>
          </div>
  
          <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">
            @forelse ($brands as $brand)
            <div class="col-lg-3 col-md-4 col-6">
                <div class="client-logo">
                  <img src="{{ $brand->brand_image }}" class="img-fluid" alt="">
                </div>
              </div>    
              @empty
              <br><br><br><br><br><br>                       
            @endforelse           
          </div>
  
        </div>
      </section><!-- End Our Brands Section -->
@endsection