@extends('layouts.app')

@section('content')
   <div class="container-fluid" style="margin-top: 70px">
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
            </div>

            <div class="carousel-item">
                <img src="img/carousel/img7.jpg" alt="Carousel Image" class="w-100">
            </div>

            <div class="carousel-item">
                <img src="img/carousel/img7.jpg" alt="Carousel Image" class="w-100">
            </div>

            <div class="carousel-item">
                <img src="img/carousel/img7.jpg" alt="Carousel Image" class="w-100">
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
@endsection