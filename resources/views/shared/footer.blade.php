<div class="footer container-fluid">
    <div class="text-center w-100 text-light" >
            <div class="row">
                <div class="col-md-3">
                    <img src="img/logo.png" alt="Logo" >
                </div>
                <div class="col-md-9 content">
                    <div class="row ">
                        <div class="col-md-4 site-map">
                                <ul>
                                    <strong>Site Map</strong>

                                    <li><a href="/">Home</a></li>
                                    <li><a href="{{ route('gallery') }}">Gallery</a></li>
                                    <li><a href="{{ route('about') }}">About</a></li>
                                    <li><a href="">Contacts</a></li>
                                </ul>
                        </div>
                        <div class="col-md-4">
                                <ul >
                            <strong>Upcoming Events</strong>

                                    <li><a href="">First</a></li>
                                    <li><a href="">Second</a></li>
                                    <li><a href="">Third</a></li>
                                    <li><a href="">Fourth</a></li>
                                </ul>
                        </div>
                        <div class="col-md-4 social-media">
                                <ul>
                                    <strong>Follow us on</strong>

                                    <li><a href="https://web.facebook.com/Kwaya-ya-MtAugustino-Parokia-ya-chuo-kikuu-110038991299260/">
                                        <img src="/icons/facebook.svg" alt="">
                                        <span>Facebook</span>
                                    </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <img src="/icons/twitter.svg" alt="">
                                            <span>Twitter</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com/st_augustine_choir_udsm/">
                                            <img src="/icons/instagram.svg" alt="">
                                            <span>Instagram</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.youtube.com/channel/UCxSb1bv9YHMR7eYUHSRu-1w">
                                            <img src="/icons/youtube.svg" alt="">
                                            <span>youtube</span>
                                        </a>
                                    </li>
                                </ul>
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