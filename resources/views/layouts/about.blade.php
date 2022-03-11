@extends('layouts.app')

@section('styles-links')
<link rel="stylesheet" href="/css/gallery.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
@endsection

@section('content')
   <div class="container-fluid mt-4">
    <h2 class="text-center">About Choir</h2>
    <div class="bg-custom1 w-25 mx-auto d-none d-lg-block py-1 px-0"></div>
    
    <div class="container row my-3">
        <div class="col-md-3 mb-3">
            <div class="card" style="width: 100%;">
                <img src="/img/augustine/augustine1.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">About Patron</h5>
                  <p class="card-text">Our patron saint is St. Augustine, who is known by his famous quote "he who sings well prays twice."</p>
                  <a href="#about_patron" class="btn btn-custom" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="about_patron">Learn more</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card" style="width: 100%;">
                <img src="/img/augustine/choir.webp" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">About Choir</h5>
                  <p class="card-text">St. Augustine's Choir is amongst choirs that serves in the weekly Mass in the University Parish...</p>
                  <a href="#about_choir" class="btn btn-custom" role="button" data-toggle="collapse">Learn more</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card" style="width: 100%;">
                <img src="/img/augustine/leadership.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Leardership</h5>
                  <p class="card-text">The choir is led by five elected student leaders, who in turn appoint other leaders to work with...</p>
                  <a href="#leadership" class="btn btn-custom" role="button" data-toggle="collapse">Learn more</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card" style="width: 100%;">
                <img src="/img/augustine/album.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Works | Album</h5>
                  <p class="card-text">So far the choir has a total of three albums, which are in the form of video and audio with ranging flavours...</p>
                  <a href="#works" class="btn btn-custom" role="button" data-toggle="collapse">Learn more</a>
                </div>
            </div>
        </div>
    </div>

    <!-- About Patron Content -->
    <div class="collapse mb-3" id="about_patron">
        <div class="container">
            <h4 class="ml-4 mt-3">Short History | Historia Fupi ya Somo wa Kwaya</h4>
            <p class="px-4">
                Agostino wa Hippo (Thagaste, leo Souk Ahras nchini Algeria, 13 Novemba 354, Hippo, leo Annaba, Algeria, 28 Agosti, 430) alikuwa mtawa, mwanateolojia, padri na hatimaye askofu mkuu wa Hippo.
                Ndiye kiongozi mkuu wa Kanisa Katoliki katika Afrika Kaskazini mwanzoni mwa karne ya 5.
                Kutokana na maisha, mafundisho na maandiko yake bora, tangu zamani anaheshimiwa kama mtakatifu na babu wa Kanisa.
                Mwaka 1298 Papa Bonifasi VIII alimuongezea sifa ya mwalimu wa Kanisa.
                Sikukuu yake huadhimishwa tarehe aliyoaga dunia.
            </p>
        
            <h5 class="ml-4">Asili</h5>
            <p class="px-4">
                Katika sehemu za magharibi za Afrika ya Kaskazini wenyeji walikuwa Waberberi kama mama yake, lakini watu wa mjini, kama baba yake, na wenye mashamba makubwa walikuwa wa asili ya Ulaya wakitumia hasa lugha ya Kilatini. Kwa jumla sehemu hii ya Afrika ilikuwa karibu na utamaduni wa Ulaya ya Magharibi.
                Mama yake (Monika, anayeheshimiwa kama mtakatifu) alikuwa Mkristo, kumbe baba (Patrisi) alifuata dini ya jadi ya kuabudu miungu mingi kabla hajabatizwa mwishoni mwa maisha yake.
            </p>
        
            <h5 class="ml-4">Utoto</h5>
            <p class="px-4">
                Agostino alizaliwa tarehe 13 Novemba 354 mjini Thagaste katika mkoa wa Numidia. Jina lake la kuzaliwa lilikuwa Aurelius Augustinus. Wakati ule Ukristo ulikuwa tayari dini iliyokubaliwa katika Dola la Roma; dhuluma dhidi ya Wakristo zilikuwa zimekwisha rasmi mwaka 313 kwa Hati ya Milano iliyotolewa na Konstantino Mkuu ili kuruhusu uhuru wa dini.
                Alikuwa na wadogo wawili, mmoja mwanamume, Naviji, na mwingine wa kike, ambaye hatujui jina lake, ila kwamba baada ya kufiwa mume wake akawa mmonaki na abesi.
                Monika alimuathiri sana Augustino na kumlea katika imani ya Kikristo. Mwanae aliweza kuandika kwamba alipokuwa ananyonya maziwa ya mama, alifyonza pia upendo kwa jina la Yesu. Akiwa mtoto alipokea chumvi kama ishara ya kuingia ukatekumeni akabaki daima anavutiwa na Yesu, hata alipozidi kusogea mbali na Kanisa lake.
            </p>
        
            <h5 class="ml-4">Ujana</h5>
            <p class="px-4">
                Wakati wote wa ujana wake alifuata anasa na uzushi, bila kujali machozi ya mama yake.
                Alipata elimu yake nzuri ya lugha na ya ufasaha wa kuhubiri huko Thagaste, Madaura na hata katika Chuo Kikuu cha Karthago (karibu na Tunis) ingawa hakuwa daima mwanafunzi mzuri, mbali ya kuwa na akili ya pekee. Alimudu kikamilifu Kilatini, lakini si sana Kigiriki.
                Akiwa huko Karthago, mwaka 373 alisoma kitabu cha maadili cha Sisero ambacho kilibadilisha hisia zake hivi kwamba “matumaini yote ya bure yakawa hayana maana kwangu, nikatamani hekima isiyokufa kwa ari isiyosemeka moyoni mwangu”.
                Lakini kwa kuamini ukweli haupatikani pasipo Yesu, ambaye hatajwi katika kitabu hicho, alianza kusoma Biblia, ila hakupenda tafsiri ya Kilatini wala yaliyomo, akiyaona tofauti na mtindo wa falsafa inayotafuta ukweli. Hivyo alisogea mbali na dini iliyoonekana kutotia maanani hoja za akili ambayo pamoja na imani ndizo “nguvu mbili zinazotuongoza kwenye ujuzi”. Ndivyo alivyoandika baadaye, akitoa pia kauli mbili za msingi kuhusu kulenga ukweli: “Usadiki ili uelewe”, halafu “uelewe ili usadiki”.
                Hapo, kusudi asiishi bila Mungu, alijitafutia dini ya kuridhisha hamu yake ya kujua ukweli na ya kuwa karibu na Yesu, akajiunga kwa karibu miaka 10 na Umani. Dini hiyo ilidai kufuata akili na kufafanua sababu ya mabaya kuwepo duniani kutokana na chanzo cha pili cha ulimwengu kilicho kinyume cha Mungu, ikikataa Agano la Kale ili kufuata Ukristo wa kiroho.
                Augustino alipenda pia maadili ya dini hiyo kwa sababu yalikuwa yanawadai sana baadhi ya waumini tu, yakiwaacha wengine wote wasijali zaidi. Hatimaye Wamani walikuwa wanasaidiana kupanda chati katika jamii. Lakini alipokutana na askofu wao Fausto, alikosa imani nao kwa kuona alivyoshindwa kujibu maswali yake.
            </p>
        
            <h5 class="ml-4">Padre na Askofu</h5>
            <p class="px-4">
                Mwaka 391 bila kutarajia alipewa daraja ya upadri huko Hippo, alipoanzisha monasteri, akigawa muda wake kati ya sala, masomo na mahubiri, halafu mwaka 395 akachaguliwa kuwa askofu msaidizi wa mji huo na mwaka 397 akawa askofu wa jimbo hilo.
        
                Ilimbidi akubali matakwa ya Mungu kwake, kwamba ajitoe kwa wengine na kuwashirikisha ujuzi wake ili kuishi kweli kwa ajili ya Kristo. “Kuhubiri mfululizo, kujadili, kusisitiza, kujenga, kuwa tayari kwa yeyote ni jukumu kubwa sana, ni mzigo mzito, ni juhudi ya ajabu”. Ilikuwa kama wongofu wake wa pili.
        
                Hapo alitegemeza maskini na mayatima, alisimamia malezi ya wakleri, akiwadai waishi pamoja, akaeneza monasteri za kiume na za kike. Alifanya adhimisho la ekaristi kuwa kiini cha maisha ya jumuia zake.
        
                Mahubiri yake mengi yanaonyesha alivyojua kujadiliana na umati akitumia maneno rahisi na ya kawaida na hata ucheshi katika kulinganisha Neno la Mungu na mazingira yao.
        
                Kwa tabia yake karimu na pendevu, hisia zake, uvumilivu na utayari wa kusamehe alifanya hata maadui kadhaa kuwa marafiki.
        
                Maisha yake ya Kiroho yaliyoongoza uandishi wa kanuni yake kwa watawa yamefuatwa na mashirika mengi ya kiume na ya kike hadi leo.
        
                Kwa miaka 35 mpaka kifo chake, mbali na kutimiza majukumu yake mengi, aliendelea kueleza na kutetea imani sahihi ya Kikristo kwa mahubiri, maandishi na vitabu vingi sana (hata vya mitindo mipya) dhidi ya aina zote za uzushi za wakati ule: Wamani, Wadonati, Wapelaji na Waario. Hivyo tangu alipokuwa hai, hakuongoza Kanisa la Afrika Kaskazini tu, bali alitegemeza imani kila mahali.
        
                Kwa njia hiyo amekuwa mwalimu muhimu sana katika Ukristo, hasa wa Magharibi (yaani Kanisa Katoliki na katika Uprotestanti uliotokea katika Kanisa hilo. Kwa mfano Martin Luther alimtaja kuwa baba yake wa kiroho pamoja na Mtume Paulo). Augustino alijilisha tunu za Kikristo na kutokeza utajiri wake wa dhati, akibuni mawazo na mifumo ya kulisha vizazi vijavyo. Hata nakala za vitabu vyake ni nyingi sana, zikithibitisha vilivyopendwa na kuenea.
        
                Hivyo aliathiri sana ustaarabu wa Magharibi unaozidi kuenea leo duniani kote. Mawazo yote yaliyomtangulia yanakutana katika maandishi yake na kuwa chemchemi ya mafundisho kwa nyakati zilizofuata.
            </p>
            
            <a href="https://www.vaticannews.va/sw/church/news/2018-08/mtakatifu-agostini-usadiki-ili-uelewe-halafu-uelewe-ili-usadiki.html" target="_blank">
                <button class="btn btn-custom ml-4">Read More</button>
            </a> 
        </div>
    </div>

    <!-- About Choir Content -->
    <div class="collapse mb-3" id="about_choir">
        <div class="container">
            <p class="px-4">
                St. Augustine's Choir is a choir that serves in the weekly Mass in the University Parish.
                The choir is headquartered in Dar es Salaam, due to the fact that a large percentage of its choristers are located at the University of Dar es Salaam.
                The choir was formed in 1970, with only 17 choristers, the only choir that serves Mass every Sunday at the University of Dar es Salaam.
                A large group of these choristers are found at the University of Dar es Salaam, the Water Institute, the University of the Land and non-students from various parts of the country.
                So far the choir has a total of no less than five hundred choristers, located in various parts of the World.
                The majority of these choristers are found in Dar es Salaam, Tanzania.
                In the country, other choristers are found in various regions including Arusha, Kilimanjaro, Katavi, Tanga, Zanzibar, Dodoma and Mwanza.
                Also, a small number of choristers are found in Ghana as well as Germany.
                The proliferation of choristers in different parts of the world is due to the idea that, these choristers join the choir during their studies at the University of Dar es Salaam, and then complete their studies to work in different parts of the country and even abroad.
            </p>
        </div>
    </div>

    <!-- Leardership Content -->
    <div class="collapse" id="leadership">
        <div class="container">
            <p class="px-4">
                The St. Augustine Choir is led by five elected student leaders, who in turn appoint other leaders to work with in the leadership.
                The elected leaders are the Chairman, the vice-chairman, the general secretary, the assistant secretary and the treasurer.
                This leadership comes to power every year with the votes of the choristers.
                Until 2019, the vice-chairman and assistant secretary were being selected from a group of already graduates, that is, non-students, but in 2019, the late Monsignor Deogratius Hukumu Mbiku issued a directive that all five leaders be elected from the choristers continuing their studies at the University.
            </p>

            <a href="#currentLeadership" target="">
                <button class="btn btn-custom ml-4">View Current Leadership</button>
            </a>
        </div>
    </div>

    <!-- Works/Album Content -->
    <div class="collapse" id="works">
        <div class="container">
            <p class="px-4">
                Currently, the choir has a total of three albums, which are in the form of video and audio.
                These albums include
                <ul style="list-style: none">
                    <li>
                        
                    </li>
                    <li>
                        I Cieli Narrano (Heaven proclaims the glory of God) of 2013
                    </li>
                    <li>
                        Dini Ya Kweli, a total of eleven songs recorded in 2016.
                    </li>
                </ul>
                Due to the great need of God's people to hear gospel songs, the choir is now in the process of releasing another album soon.
            </p>

            <a href="" target="">
                <button class="btn btn-custom ml-4">View Albums</button>
            </a>
        </div>
    </div>

<!-- Social Activities Section -->
    <div class="container-fluid my-3" id="social">
        <h2 class="text-center">Social Activities</h2>
        <div class="bg-custom1 w-25 mx-auto d-none d-lg-block py-1 px-0"></div>
        <div class="row mt-3">
            <div class="col-md-9">
                <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="5000"> 
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
                            <img src="img/carousel/social/social1.webp" alt="Carousel Image" class="w-100">
                            <div class="carousel-caption d-none d-md-block bg-custom w-100 ml-0">
                                <h5>First Slide Caption</h5>
                                <p>Some text to describe pic</p>
                            </div>
                        </div>
            
                        <div class="carousel-item">
                            <img src="img/carousel/social/social2.png" alt="Carousel Image" class="w-100">
                            <div class="carousel-caption d-none d-md-block bg-custom w-100 ml-0">
                                <h5>Second Slide Caption</h5>
                                <p>Some text to describe pic</p>
                            </div>
                        </div>
            
                        <div class="carousel-item">
                            <img src="img/carousel/social/social3.jpg" alt="Carousel Image" class="w-100">
                            <div class="carousel-caption d-none d-md-block bg-custom w-100 ml-0">
                                <h5>Third Slide Caption</h5>
                                <p>Some text to describe pic</p>
                            </div>
                        </div>
            
                        <div class="carousel-item">
                            <img src="img/carousel/social/social1.webp" alt="Carousel Image" class="w-100">
                            <div class="carousel-caption d-none d-md-block bg-custom w-100 ml-0">
                                <h5>Fourth Slide Caption</h5>
                                <p>Some text to describe pic</p>
                            </div>
                        </div>
            
                        <div class="carousel-item">
                            <img src="img/carousel/social/choir.webp" alt="Carousel Image" class="w-100">
                            <div class="carousel-caption d-none d-md-block bg-custom w-100 ml-0">
                                <h5>Fifth Slide Caption</h5>
                                <p>Some text to describe pic</p>
                            </div>
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
            <div class="col-md-3">
                <h6>Social Events</h6>
                <p>
                    This choir is also involved in various social events including organizing friendly games between neighboring choirs, such as football, volleyball and other games.
                    The choir also has a tradition of performing charitable acts in various charities, as part of a thank-you note and as part of a practical demonstration of what was sung in the "Dini ya Kweli" album.
                </p>
                <p>
                    To view more of our social events, laughter, joy, and sadness, visit our social pages below:
                </p>
                <div>
                    <ul class="social pt-3">
                        <li><a href="https://www.facebook.com/" target="_blank"><i class="bx bxl-facebook"></i></a></li>
                        <li><a href="https://www.twitter.com/" target="_blank"><i class="bx bxl-twitter"></i></a></li>
                        <li><a href="https://www.youtube.com/" target="_blank"><i class="bx bxl-youtube"></i></a></li>
                        <li><a href="https://www.instagram.com/" target="_blank"><i class="bx bxl-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

   </div>


    {{-- Three description pics --}}
    <h2 class="text-center">Descriptive Activities</h2>
    <div class="bg-custom1 w-25 mx-auto d-none d-lg-block py-1 px-0"></div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4 desc-img mb-3">
                <div class="desc-img">
                    <img src="img/augustine/augustine1.jpeg" alt="Desc_pic" style="object-fit: contain;">
                </div>
                <div class="desc-caption">
                    <h4>Activity 1</h4>
                </div>
            </div>
            <div class="col-md-4 desc-img mb-3">
                <div class="desc-img">
                    <img src="img/augustine/augustine1.jpeg" alt="Desc_pic" style="object-fit: contain;">
                </div>
                <div class="desc-caption">
                    <h4>Activity 2</h4>
                </div>
            </div>
            <div class="col-md-4 desc-img mb-3">
                <div class="desc-img">
                    <img src="img/augustine/augustine1.jpeg" alt="Desc_pic" style="object-fit: contain;">
                </div>
                <div class="desc-caption">
                    <h4>Activity 2</h4>
                </div>
            </div>
        </div>
    </div>

    {{-- Uongozi --}}
    <h2 class="text-center mt-4">Leadership</h2>
    <div class="bg-custom1 w-25 mx-auto d-none d-lg-block py-1 px-0"></div>
    <div class="container mt-4" id="currentLeadership">
        <h4 class="ml-4 mt-3">Executive Committee</h4>
        <div class="row">
            <div class="col">
                <img class="rounded-circle" src="img/augustine/avatar-female.png" alt="leader1">
            </div>
            <div class="col">
                <img class="rounded-circle" src="img/augustine/avatar.png" alt="leader1">
            </div>
            <div class="col">
                <div class="center-leader">
                    <img class="rounded-circle" src="img/augustine/avatar.png" alt="leader1">
                </div>
            </div>
            <div class="col">
                <img class="rounded-circle" src="img/augustine/avatar.png" alt="leader1">
            </div>
            <div class="col">
                <img class="rounded-circle" src="img/augustine/avatar-female.png" alt="leader1">
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <h4 class="ml-4 mt-3">Technical Committee</h4>
        <div class="row">
            <div class="col">
                <img class="rounded-circle" src="img/augustine/avatar-female.png" alt="leader1">
            </div>
            <div class="col">
                <img class="rounded-circle" src="img/augustine/avatar.png" alt="leader1">
            </div>
            <div class="col">
                <div class="center-leader">
                    <img class="rounded-circle" src="img/augustine/avatar.png" alt="leader1">
                </div>
            </div>
            <div class="col">
                <img class="rounded-circle" src="img/augustine/avatar.png" alt="leader1">
            </div>
            <div class="col">
                <img class="rounded-circle" src="img/augustine/avatar-female.png" alt="leader1">
            </div>
        </div>
    </div>

    <div class="" style="margin-bottom: 100px">

    </div>
@endsection