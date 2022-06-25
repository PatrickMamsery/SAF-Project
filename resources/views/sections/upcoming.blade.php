<div class="upcoming-wrapper pt-section pb-section">
    <div class="container">
            <div class="row">
                <div class="col-md-6 content">
                <h2 class="section-title mb-3">{{ $infos->count() }} Upcoming Events</h2>
                <div class="body">
                    @if ($infos->count() == 0)
                        <ul>
                            <li>   
                                <div class="link">
                                    <img src="/icons/right-arrow.png" alt="">
                                    <a   data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Upcoming one </a>
                                </div>
                                <div class="collapse" id="collapseExample">
                                    Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
                                </div>
                            </li>
                            <li>   
                                <div class="link">
                                    <img src="/icons/right-arrow.png" alt="">
                                    <a   data-bs-toggle="collapse" data-bs-target="#collapseExampl" aria-expanded="false" aria-controls="collapseExample">Upcoming two </a>
                                </div>
                                <div class="collapse" id="collapseExampl">
                                    Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
                                </div>
                            </li>
                            <li>   
                                <div class="link">
                                    <img src="/icons/right-arrow.png" alt="">
                                    <a   data-bs-toggle="collapse" data-bs-target="#collapseExamp" aria-expanded="false" aria-controls="collapseExample">Upcoming three </a>
                                </div>
                                <div class="collapse" id="collapseExamp">
                                    Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
                                </div>
                            </li>
                        </ul>

                    @else

                        <ul>
                            @foreach ($infos as $info)
                                <li>
                                    <div class="link">
                                        <img src="/icons/right-arrow.png" alt="">
                                        <a   data-bs-toggle="collapse" data-bs-target="#collapse{{ $info->id }}" aria-expanded="false" aria-controls="collapseExample">{{ $info->title }} </a>
                                    </div>
                                    <div class="collapse" id="collapse{{ $info->id }}">
                                        {!! $info->content !!}
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                    @endif
                </div>
                </div>
                <div class="col-md-6 images">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @if ($infos->count() == 0)
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="/img/img60.jpg" alt="First slide">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Upcoming One</h5>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="/img/img57.jpg" alt="First slide">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Upcoming two</h5>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="/img/img58.jpg" alt="First slide">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Upcoming three</h5>
                                    </div>
                                </div>

                            @else

                                @foreach ($infos as $key=>$info)
                                    <div class="carousel-item {{ $key == 0 ? "active" : "" }}">
                                        <img class="d-block w-100" src="{{ $info->media }}" alt="First slide">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>{{ $info->title }}</h5>
                                        </div>
                                    </div>
                                @endforeach

                            @endif
                        </div>
                      </div>
                </div>
            </div>
    </div>
</div>