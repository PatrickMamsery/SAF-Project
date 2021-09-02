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

   <div class="about-section">
    <div class="container-fluid">
        <h2 class="text-center">About Choir</h2>
        <div class="bg-custom1 w-25 mx-auto d-none d-lg-block py-1 px-0"></div>
            <div class="row d-flex">
                <div class="col-md-4">
                    <div class="about-img">
                        <img src="/img/img20.jpg" style="object-fit: contain;" alt="About pic">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="about-content">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque congue purus at porta tristique. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla commodo posuere felis a dignissim. In arcu enim, tincidunt sed massa eget, dictum lacinia lorem. Donec porta vitae dui in pulvinar. Phasellus id mollis eros. Nunc in mattis ante, id volutpat ex. Sed tempor ligula in orci ornare semper. Donec dignissim porta tortor, in auctor sem suscipit ac. Sed semper id ante ac imperdiet.
                            Sed a diam vel enim faucibus congue maximus vitae elit. Nam finibus ex commodo nulla ullamcorper, sed lobortis massa interdum. Ut nec dictum urna. Sed eu maximus augue, eu aliquam elit. Etiam a condimentum quam. Morbi feugiat lectus sit amet orci lobortis vulputate. Donec tempor dolor a urna porta ornare.
                            Phasellus cursus ultricies libero, iaculis lacinia risus posuere id. Duis interdum interdum ligula eu dapibus. Ut felis risus, commodo vel convallis a, venenatis vel mauris. Sed in molestie augue, non elementum nunc. Cras eget ornare sapien. Donec vulputate neque enim, ut dictum dolor faucibus id. Ut mollis tortor dolor, ac suscipit neque finibus at. Duis risus tellus, placerat sed accumsan ut, ultricies vel urna. Proin lorem ligula, fringilla sed pulvinar vel, maximus pharetra tellus. 
                        </p>
                        <button class="btn btn-md btn-custom">Read More</button>
                    </div>
                </div>
            </div>
        </div>
   </div>

   

   <div class="" style="margin-bottom: 100px">

   </div>
@endsection