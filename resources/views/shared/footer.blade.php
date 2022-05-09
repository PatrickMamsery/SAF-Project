<div class="footer">
    <div class="text-center bg-dark w-100 text-light" style="position: absolute; margin-bottom: 0;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <img src="img/logo.png" alt="Logo" style="object-fit: contain;">
                </div>
                <div class="col-md-9">
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <strong><h6>Site Map</h6></strong>
                            <div class="site-map">
                                <ul style="padding-left: 0!important;">
                                    <li><a href="/">Home</a></li>
                                    <li><a href="{{ route('gallery') }}">Gallery</a></li>
                                    <li><a href="{{ route('about') }}">About</a></li>
                                    <li><a href="">Contacts</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <strong><h6>Upcoming Events</h6></strong>
                            <div class="site-map">
                                <ul style="padding-left: 0!important;">
                                    <li><a href="">First</a></li>
                                    <li><a href="">Second</a></li>
                                    <li><a href="">Third</a></li>
                                    <li><a href="">Fourth</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <h6>Follow us on</h6>
                            <div class="social-media d-flex justify-content-center">
                                <ul style="padding-left: 0%!important">
                                    <li><a href="https://web.facebook.com/Kwaya-ya-MtAugustino-Parokia-ya-chuo-kikuu-110038991299260/">
                                        <img src="/icons/facebook.svg" alt="">
                                    </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <img src="/icons/twitter.svg" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com/st_augustine_choir_udsm/">
                                            <img src="/icons/instagram.svg" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.youtube.com/channel/UCxSb1bv9YHMR7eYUHSRu-1w">
                                            <img src="/icons/youtube.svg" alt="">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center p-2" style="background-color: rgb(12, 11, 11)!important;">
                   Copyright &copy; {{ now()->year }}
                </div>
            </div>
        </div>
    </div>
</div>