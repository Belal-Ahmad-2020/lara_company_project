@extends('layouts.frontend.app')

@section('title')
    Company - Portfolio
@endsection

@section('content')

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Portolio</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Portolio</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="row" data-aos="fade-up">
          <div class="col-lg-12 d-flex justify-content-center">
            {{ $images->links() }}
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up">

            @forelse ($images as $image)
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <img src="{{ $image->image }}" class="img-fluid" width="400" height="300" alt="">
                <div class="portfolio-info">
                  <h4>Gallery Image</h4>                  
                  <a href="{{ $image->image }}" data-gall="portfolioGallery" class="venobox preview-link" title="App 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            @empty
            <br><br><br>
                <p>No Image!</p>
                <br><br><br>
            @endforelse

      

        </div>

      </div>
    </section><!-- End Portfolio Section -->


@endsection