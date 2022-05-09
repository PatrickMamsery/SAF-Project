@extends('layouts.app')

@section('styles-links')
<link rel="stylesheet" href="/css/gallery.css">
<link rel="stylesheet" href="/css/bootstrap-notifications.min.css">
@endsection

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
                <img src="img/carousel/carousel3.jpg" alt="Carousel Image" class="w-100">
                <div class="carousel-caption1">
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
                <img src="img/carousel/new/img1.jpg" alt="Carousel Image" class="w-100">
            </div>

            <div class="carousel-item">
                <img src="img/carousel/new/img2.jpg" alt="Carousel Image" class="w-100">
            </div>

            <div class="carousel-item">
                <img src="img/carousel/new/img3.jpg" alt="Carousel Image" class="w-100">
            </div>

            <div class="carousel-item">
                <img src="img/carousel/new/img4.jpg" alt="Carousel Image" class="w-100">
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
    <div class="container">
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
                            St. Augustine's Choir is a choir that serves in the weekly Mass in the University Parish.
                            The choir is headquartered in Dar es Salaam, due to the fact that a large percentage of its choristers are located at the University of Dar es Salaam.
                            The choir was formed in 1970, with only 17 choristers, the only choir that serves Mass every Sunday at the University of Dar es Salaam.
                            A large group of these choristers are found at the University of Dar es Salaam, the Water Institute, the University of the Land and non-students from various parts of the country. 
                        </p>
                        <a href="{{ route('about') }}" class="btn btn-md btn-custom">Read More</a>
                    </div>
                </div>
            </div>
        </div>
   </div>

   <div class="works-section">
       <div class="container">
           <h2 class="text-center">Works</h2>
           <div class="bg-custom1 w-25 mx-auto d-none d-lg-block py-1 px-0"></div>
        <div class="row mt-3">
            <div class="col-md-3 mb-3">
                <div class="work-img">
                    <img src="/img/img53.jpg" alt="">
                </div>
                <div class="work-caption">
                    <h4>Namtegemea Mungu</h4>
                    <a href="">Find out more</a>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="work-img">
                    <img src="/img/img53.jpg" alt="">
                </div>
                <div class="work-caption">
                    <h4>Icheli Narrano</h4>
                    <a href="">Find out more</a>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="work-img">
                    <img src="/img/img53.jpg" alt="">
                </div>
                <div class="work-caption">
                    <h4>Dini ya Kweli</h4>
                    <a href="">Find out more</a>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="work-img">
                    <img src="/img/img53.jpg" alt="">
                </div>
                <div class="work-caption">
                    <h4>Nami Nimezitumainia Fadhili Zake</h4>
                    <a href="">Find out more</a>
                </div>
            </div>
        </div>
       </div>
   </div>

   <div class="trending">
       <div class="container">
        <h2 class="text-center">Trending</h2>
        <div class="bg-custom1 w-25 mx-auto d-none d-lg-block py-1 px-0"></div>

        <h4>Photos</h4>
           <div class="row mt-3">
               <div class="col-md-2 mb-3">
                <div class="rounded-circle img">
                    <img src="/img/img54.jpg" class="rounded" alt="">
                    <div class="overlay">
                        <div class="content"><a href="#">VIEW</a></div>
                    </div>
                </div>
               </div>
               <div class="col-md-2 mb-3">
                <div class="rounded-circle img">
                    <img src="/img/img54.jpg" class="rounded" alt="">
                    <div class="overlay">
                        <div class="content"><a href="#">VIEW</a></div>
                    </div>
                </div>
               </div>
               <div class="col-md-2 mb-3">
                <div class="rounded-circle img">
                    <img src="/img/img54.jpg" class="rounded" alt="">
                    <div class="overlay">
                        <div class="content"><a href="#">VIEW</a></div>
                    </div>
                </div>
               </div>
               <div class="col-md-2 mb-3">
                <div class="rounded-circle img">
                    <img src="/img/img54.jpg" class="rounded" alt="">
                    <div class="overlay">
                        <div class="content"><a href="#">VIEW</a></div>
                    </div>
                </div>
               </div>
               <div class="col-md-2 mb-3">
                <div class="rounded-circle img">
                    <img src="/img/img54.jpg" class="rounded" alt="">
                    <div class="overlay">
                        <div class="content"><a href="#">VIEW</a></div>
                    </div>
                </div>
               </div>
               <div class="col-md-2 mb-3">
                <div class="rounded-circle img">
                    <img src="/img/img54.jpg" class="rounded" alt="">
                    <div class="overlay">
                        <div class="content"><a href="#">VIEW</a></div>
                    </div>
                </div>
               </div>
           </div>

           {{-- <h4>Videos</h4>
           <div class="row mt-3">
               <div class="col-md-2 mb-3">
                <div class="rounded-circle img">
                    <img src="/img/img55.jpg" class="rounded" alt="">
                    <div class="overlay">
                        <div class="content">
                            <i class="material-icons">play_circle_outline</i>
                        </div>
                    </div>
                </div>
               </div>
               <div class="col-md-2 mb-3">
                <div class="rounded-circle img">
                    <img src="/img/img55.jpg" class="rounded" alt="">
                    <div class="overlay">
                        <div class="content">
                            <i class="material-icons">play_circle_outline</i>
                        </div>
                    </div>
                </div>
               </div>
               <div class="col-md-2 mb-3">
                <div class="rounded-circle img">
                    <img src="/img/img55.jpg" class="rounded" alt="">
                    <div class="overlay">
                        <div class="content">
                            <i class="material-icons">play_circle_outline</i>
                        </div>
                    </div>
                </div>
               </div>
               <div class="col-md-2 mb-3">
                <div class="rounded-circle img">
                    <img src="/img/img55.jpg" class="rounded" alt="">
                    <div class="overlay">
                        <div class="content">
                            <i class="material-icons">play_circle_outline</i>
                        </div>
                    </div>
                </div>
               </div>
               <div class="col-md-2 mb-3">
                <div class="rounded-circle img">
                    <img src="/img/img55.jpg" class="rounded" alt="">
                    <div class="overlay">
                        <div class="content">
                            <i class="material-icons">play_circle_outline</i>
                        </div>
                    </div>
                </div>
               </div>
               <div class="col-md-2 mb-3">
                <div class="rounded-circle img">
                    <img src="/img/img55.jpg" class="rounded" alt="">
                    <div class="overlay">
                        <div class="content">
                            <i class="material-icons">play_circle_outline</i>
                        </div>
                    </div>
                </div>
               </div>
           </div>
       </div>
   </div> --}}

   <div class="container">
       <h2 class="text-center">Upcoming Events</h2>
       <div class="row mt-3">
           <div class="col-sm-4 mb-3">
                <div class="rounded-circle img">
                    <img src="/img/img60.jpg" class="rounded" alt="Event 1">
                </div>
           </div>
           <div class="col-sm-4 mb-3">
                <div class="rounded-circle img">
                    <img src="/img/img57.jpg" class="rounded" alt="Event 2">
                </div>
           </div>
           <div class="col-sm-4 mb-3">
               <div class="rounded-circle img">
                   <img src="/img/img58.jpg" class="rounded" alt="Event 3">
               </div>
           </div>
       </div>
   </div>

   <div class="" style="margin-bottom: 100px">

   </div>
@endsection

@section('javascript')
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script type="text/javascript">
    var notificationsWrapper   = $('.dropdown-notifications');
    var notificationsToggle    = notificationsWrapper.find('a[data-toggle]');
    var notificationsCountElem = notificationsToggle.find('i[data-count]');
    var notificationsCount     = parseInt(notificationsCountElem.data('count'));
    var notifications          = notificationsWrapper.find('ul.dropdown-menu');

    if (notificationsCount <= 0) {
      notificationsWrapper.hide();
    }

    // Enable pusher logging - don't include this in production
    // Pusher.logToConsole = true;

    var pusher = new Pusher('9ec98ba9455e0f69e474', {
      encrypted: true
    });

    // Subscribe to the channel we specified in our Laravel Event
    var channel = pusher.subscribe('new-registered-member');

    // Bind a function to a Event (the full Laravel class)
    channel.bind('App\\Events\\NewRegisteredMember', function(data) {
      var existingNotifications = notifications.html();
      var avatar = Math.floor(Math.random() * (71 - 20 + 1)) + 20;
      var newNotificationHtml = `
        <li class="notification active">
            <div class="media">
              <div class="media-left">
                <div class="media-object">
                  <img src="https://api.adorable.io/avatars/71/`+avatar+`.png" class="img-circle" alt="50x50" style="width: 50px; height: 50px;">
                </div>
              </div>
              <div class="media-body">
                <strong class="notification-title">`+data.message+`</strong>
                <!--p class="notification-desc">Extra description can go here</p-->
                <div class="notification-meta">
                  <small class="timestamp">about a minute ago</small>
                </div>
              </div>
            </div>
        </li>
      `;
      notifications.html(newNotificationHtml + existingNotifications);

      notificationsCount += 1;
      notificationsCountElem.attr('data-count', notificationsCount);
      notificationsWrapper.find('.notif-count').text(notificationsCount);
      notificationsWrapper.show();
    });
  </script>
@endsection