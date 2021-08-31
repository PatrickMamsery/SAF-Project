@extends('layouts.app')

@section('content')
   <div class="container-fluid">
       <div id="carousel" class="carousel slide" data-ride="carousel" data-interval="5000"> 
        {{-- Carousel Indicators --}}
        <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
            <li data-target="#carousel" data-slide-to="3"></li>
            <li data-target="#carousel" data-slide-to="4"></li>
        </ol>

        {{-- Carousel Content --}}
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/carousel/img7.jpg" alt="Carousel Image" class="w-100">
                <div class="carousel-caption">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-8 bg-custom d-none d-lg-block py-3 px-0">
								<h1>St. Augustine Family</h1>
								<div class="border-top border-primary w-50 mx-auto my-3"></div>
								<h3 class="pb-3">Welcome to St. Augustine Family</h3>
							</div>
						</div>
					</div>
				</div>
            </div>

            <div class="carousel-item">
                <img src="img/carousel/img8.jpg" alt="Carousel Image" class="w-100">
            </div>

            <div class="carousel-item">
                <img src="img/carousel/img7.jpg" alt="Carousel Image" class="w-100">
            </div>

            <div class="carousel-item">
                <img src="img/carousel/img8.jpg" alt="Carousel Image" class="w-100">
            </div>

            <div class="carousel-item">
                <img src="img/carousel/img7.jpg" alt="Carousel Image" class="w-100">
            </div>
        </div>
        {{-- End Carousel Content --}}

        {{-- Previous & Next Buttons --}}
        <a href="#carousel" class="carousel-control-prev" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </a>

        <a href="#carousel" class="carousel-control-next" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </a>
        {{-- End Previous & Next Buttons --}}

       </div>
   </div>
   <div class="" style="margin-bottom: 100px">

   </div>
@endsection