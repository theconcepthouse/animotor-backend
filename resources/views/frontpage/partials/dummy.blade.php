
<!--cars booking Categoris Here -->

<section class="booking__landing__one_ mb-5">

    <div class="container">
        <div class="booking__landing__wrap1 trans50y">
            <div class="booking__landing__head pb__40">
                <ul class="nav nav-tabs fasilities__inner fasilities__innertwo" id="myTab2" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a href="#0" class="nav-link active" id="home-tabb1" data-bs-toggle="tab" data-bs-target="#homeb1" role="tab" aria-controls="homeb1" aria-selected="true">
                        <span class="fasilities__item align-items-center d-flex">
                           <span class="icon">
                              <img src="assets/img/banner/three/hotel.png" alt="icon">
                           </span>
                           <span class="fz-18 pratext d-block">
                              Hotels
                           </span>
                        </span>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#0" class="nav-link" id="profile-tabb1" data-bs-toggle="tab" data-bs-target="#profileb1" role="tab" aria-controls="profileb1" aria-selected="false">
                        <span class="fasilities__item align-items-center d-flex">
                           <span class="icon">
                              <img src="assets/img/banner/three/flight.png" alt="icon">
                           </span>
                           <span class="fz-18 pratext d-block">
                              Flights
                           </span>
                        </span>
                        </a>
                    </li>


                    <li class="nav-item" role="presentation">
                        <a href="#0" class="nav-link" id="contact-tabb111" data-bs-toggle="tab" data-bs-target="#contactb111" role="tab" aria-controls="contactb111" aria-selected="false">
                     <span class="fasilities__item align-items-center d-flex">
                        <span class="icon">
                           <img src="assets/img/banner/three/cars.png" alt="icon">
                        </span>
                        <span class="fz-18 pratext d-block">
                           Cars
                        </span>
                     </span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="booking__landing__body">
                <div class="tab-content" id="myTabContentbookin1">
                    <div class="tab-pane fade show active" id="homeb1" role="tabpanel" aria-labelledby="home-tabb1">
                        <div class="dating__body">
                            <div class="dating__body__box mb__30">
                                <div class="dating__item dating__hidden">
                                    <input type="text" placeholder="Enter Locality City">
                                </div>
                                <div class="dating__item dating__hidden">
                                    <div id="datepicker10" class="input-group date" data-date-format="dd-mm-yyyy">
                                        <input class="form-control" type="text" placeholder="Check in" readonly>
                                        <span class="calendaricon">
                                    <i class="material-symbols-outlined">
                                       calendar_month
                                    </i>
                                 </span>
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    </div>
                                </div>
                                <div class="dating__item dating__hidden">
                                    <div id="datepicker211" class="input-group date" data-date-format="dd-mm-yyyy">
                                        <input class="form-control" type="text" placeholder="Check Out" readonly>
                                        <span class="calendaricon">
                                    <i class="material-symbols-outlined">
                                       calendar_month
                                    </i>
                                 </span>
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    </div>
                                </div>
                                <div class="dating__item dating__inetial select__border">
                                    <select name="room">
                                        <option value="1">
                                            Room
                                        </option>
                                        <option value="2">
                                            Single Room
                                        </option>
                                        <option value="3">
                                            Dobble Room
                                        </option>
                                    </select>
                                </div>
                                <div class="dating__item">
                                    <button type="submit" class="cmn__btn">
                                 <span>
                                    Search Hotels
                                 </span>
                                    </button>
                                </div>
                            </div>
                            <div class="boock__check">
                                <input class="form-check-input" type="checkbox" value="" id="bcheckboky">
                                <label class="form-check-label" for="bcheckboky">
                                    I Agree support terms & condition
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profileb1" role="tabpanel" aria-labelledby="profile-tabb1">


                        <style>
                            @keyframes spinner {
                                0% {
                                    transform: translate3d(-50%, -50%, 0) rotate(0deg);
                                }
                                100% {
                                    transform: translate3d(-50%, -50%, 0) rotate(360deg);
                                }
                            }
                            .spin::before { animation: 1.5s linear infinite spinner; animation-play-state: inherit; border: solid 5px #cfd0d1;
                                border-bottom-color: #1c87c9; border-radius: 50%; content: ''; height: 40px; width: 40px; position: absolute;
                                top: 50%; left: 50%; transform: translate3d(-50%, -50%, 0); will-change: transform;}
                            iframe {height: 100vh !important; width: 100%;}
                        </style>


                        <div id='logs' ></div>
                        <iframe id='travelstartIframe-a45a3e91-5ca6-4579-bffa-71c01e600efc'
                                frameBorder='0'
                                scrolling='auto'
                                style='margin: 0px; padding: 0px; border: 0px; height: 0px; background-color: #fafafa;'>
                        </iframe>


                        <div class='spin'></div>
                        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js' type='text/javascript'></script>
                        <script type='text/javascript'>
                            // these variables can be configured
                            var travelstartIframeId = 'travelstartIframe-a45a3e91-5ca6-4579-bffa-71c01e600efc';
                            var iframeUrl = 'https://www.travelstart.com.ng';
                            var logMessages = false;
                            var showBanners = false;
                            var affId = '220755';
                            var affCampaign = '';
                            var affCurrency = 'Default'; // ZAR / USD / NAD / ...
                            var height = '0px';
                            var width = '100%';
                            var language = ''; // ar / en / leave empty for user preference

                            // do not change these
                            var iframe = $('#' + travelstartIframeId);
                            var iframeVersion = '11';
                            var autoSearch = false;
                            var affiliateIdExist = false;
                            var urlParams = {};
                            var alreadyExist = [];
                            var iframeParams = [];
                            var cpySource = '';
                            var match,
                                pl = /\+/g,
                                search = /([^&=]+)=?([^&]*)/g,
                                decode = function (s) { return decodeURIComponent(s.replace(pl, " ")); },
                                query  = window.location.search.substring(1);
                            while (match = search.exec(query)){
                                urlParams[decode(match[1])] = decode(match[2]);
                            }
                            for (var key in urlParams){
                                if (urlParams.hasOwnProperty(key)){
                                    if (key == 'search' && urlParams[key] == 'true'){
                                        autoSearch = true;
                                    }
                                    if(	key == 'affId' || key == 'affid' || key == 'aff_id'){
                                        affiliateIdExist = true ;
                                    }
                                    iframeParams.push(key + '=' + urlParams[key]);
                                    alreadyExist.push(key);
                                }
                            }
                            if(!('show_banners' in alreadyExist)){
                                iframeParams.push('show_banners=' + showBanners);
                            }
                            if(!('log' in alreadyExist)){
                                iframeParams.push('log='  + logMessages);
                            }
                            if(! affiliateIdExist){
                                iframeParams.push('affId='  + affId);
                            }
                            if(! affiliateIdExist){
                                iframeParams.push('language='  + language);
                            }
                            if(!('affCampaign' in alreadyExist)){
                                iframeParams.push('affCampaign='  + affCampaign);
                            }
                            if(cpySource !== '' && !('cpySource' in alreadyExist)){
                                iframeParams.push('cpy_source='  + cpySource);
                            }
                            if(!('utm_source' in alreadyExist)){
                                iframeParams.push('utm_source=affiliate');
                            }
                            if(!('utm_medium' in alreadyExist)){
                                iframeParams.push('utm_medium='  + affId);
                            }
                            if(!('isiframe' in alreadyExist)){
                                iframeParams.push('isiframe=true');
                            }
                            if(!('landing_page' in alreadyExist)){
                                iframeParams.push('landing_page=false');
                            }
                            if (affCurrency.length == 3){
                                iframeParams.push('currency=' + affCurrency);
                            }
                            if(!('iframeVersion' in alreadyExist)){
                                iframeParams.push('iframeVersion='  + iframeVersion);
                            }
                            if(!('host' in alreadyExist)){
                                iframeParams.push('host=' + window.location.href.split('?')[0]);
                            }
                            var newIframeUrl = iframeUrl + ('/?search=false') + '&' + iframeParams.join('&');
                            iframe.attr('src', newIframeUrl);

                            window.addEventListener('message', function(e) {
                                var $iframe = jQuery('#' + travelstartIframeId);
                                var eventName = e.data[0];
                                var data = e.data[1];
                                switch(eventName) {
                                    case 'setHeight':
                                        $iframe.height(data);
                                        setIframeSize(width, $iframe.height(data));
                                        break;
                                }
                            }, false);

                            function setIframeSize(newWidth, newHeight){
                                iframe.css('width', newWidth);
                                iframe.width(newWidth);
                                iframe.css('height', newHeight);
                                iframe.height(newHeight);
                            }
                            setIframeSize(width, height);
                        </script>
                        <script>
                            jQuery('#' + travelstartIframeId).ready(function () {$('.spin').css('display', 'none');});
                            jQuery('#' + travelstartIframeId).load(function () {$('.spin').css('display', 'none');	});
                        </script>


                    </div>

                    <div class="tab-pane fade" id="contactb111" role="tabpanel" aria-labelledby="contact-tabb111">
                        <div class="dating__body">
                            <div class="dating__body__box  mb__30">
                                <div class="dating__item dating__hidden">
                                    <input type="text" placeholder="From">
                                    <span class="calendaricon">
                                 <i class="material-symbols-outlined">
                                    location_on
                                 </i>
                              </span>
                                </div>
                                <div class="dating__item select__border">
                                    <select name="room">
                                        <option value="1">
                                            Time
                                        </option>
                                        <option value="2">
                                            in Time 8:10 am
                                        </option>
                                        <option value="3">
                                            in Time 9:10 am
                                        </option>
                                    </select>
                                </div>
                                <div class="dating__item dating__hidden">
                                    <div id="datepicker18" class="input-group date" data-date-format="dd-mm-yyyy">
                                        <input class="form-control" type="text" placeholder="Pick-up Date" readonly>
                                        <span class="calendaricon">
                                    <i class="material-symbols-outlined">
                                       calendar_month
                                    </i>
                                 </span>
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    </div>
                                </div>
                                <div class="dating__item dating__hidden">
                                    <div id="datepicker219" class="input-group date" data-date-format="dd-mm-yyyy">
                                        <input class="form-control" type="text" placeholder="Drop-off date" readonly>
                                        <span class="calendaricon">
                                    <i class="material-symbols-outlined">
                                       calendar_month
                                    </i>
                                 </span>
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    </div>
                                </div>
                                <div class="dating__item">
                                    <button type="submit" class="cmn__btn">
                                 <span>
                                    Search Cars
                                 </span>
                                    </button>
                                </div>
                            </div>
                            <div class="boock__check">
                                <input class="form-check-input" type="checkbox" value="" id="bcheckboktttu">
                                <label class="form-check-label" for="bcheckboktttu">
                                    Driver aged 25 - 70
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!--cars facilities here -->
<section class="hotel__facilities pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-6 col-xl-7 col-lg-7 wow fadeInDown">
                <div class="section__header section__center pb__60">
                    <h2>
                        Car Facilities
                    </h2>
                    <p class="max-636">
                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some
                    </p>
                </div>
            </div>
        </div>
        <div class="flight__facilites__wrap bus__facilities__wrap">
            <div class="row justify-content-between align-items-center">
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-5">
                    <div class="car__facilitiesthumb">
                        <img src="assets/img/cars/carapp.png" alt="img">
                    </div>
                </div>
                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-6">
                    <div class="car__facilities__wrap gy-3 row">
                        <div class="col-lg-6">
                            <div class="hotel__facilities__item wow fadeInDown" data-wow-duration="1.2s">
                                <div class="head__wrap">
                                    <img src="assets/img/room/seats.png" alt="img">
                                    <h5>
                                        <a href="car-grid.html">
                                            Comfortable setas
                                        </a>
                                    </h5>
                                </div>
                                <p>
                                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered...
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="hotel__facilities__item wow fadeInDown" data-wow-duration="1.4s">
                                <div class="head__wrap">
                                    <img src="assets/img/room/hotcoffee.png" alt="img">
                                    <h5>
                                        <a href="car-grid.html">
                                            Hot Coffee
                                        </a>
                                    </h5>
                                </div>
                                <p>
                                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered...
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="hotel__facilities__item wow fadeInDown" data-wow-duration="1.6s">
                                <div class="head__wrap">
                                    <img src="assets/img/room/wifi.png" alt="img">
                                    <h5>
                                        <a href="car-grid.html">
                                            Unlimited WIFI
                                        </a>
                                    </h5>
                                </div>
                                <p>
                                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered...
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="hotel__facilities__item wow fadeInDown" data-wow-duration="1.4s">
                                <div class="head__wrap">
                                    <img src="assets/img/room/supports.png" alt="img">
                                    <h5>
                                        <a href="car-grid.html">
                                            Unlimited Support
                                        </a>
                                    </h5>
                                </div>
                                <p>
                                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered...
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="carshape">
        <img src="assets/img/cars/carshapeapp.png" alt="img">
    </div>
</section>
<!--cars facilities End -->

<!-- cars ticket here -->
<section class="cars__ticket bgsection pt-120 pb-120">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-xxl-6 col-xl-6 col-lg-6">
                <div class="train__ticket__content car__ticket__content">
                    <div class="section__header mb__30 wow fadeInDown">
                        <h2>
                            Book your ride to anywhere with Swiftbookings
                        </h2>
                        <p>
                            There are many variations of passages of Lorem Ipsum available, but the  have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use...
                        </p>
                    </div>
                    <ul class="offer__list pb__40 wow fadeInUp">
                        <li>
                     <span class="thumb">
                        <img src="assets/img/bus/b3.png" alt="img">
                     </span>
                            <span class="text">
                        Unlimited Offers
                     </span>
                        </li>
                        <li>
                     <span class="thumb">
                        <img src="assets/img/bus/b2.png" alt="img">
                     </span>
                            <span class="text">
                        24X7 Support
                     </span>
                        </li>
                        <li>
                     <span class="thumb">
                        <img src="assets/img/bus/b6.png" alt="img">
                     </span>
                            <span class="text">
                        Cheapest Price
                     </span>
                        </li>
                        <li>
                     <span class="thumb">
                        <img src="assets/img/bus/b4.png" alt="img">
                     </span>
                            <span class="text">
                        100% Trust pay
                     </span>
                        </li>
                    </ul>
                    <a href="car-list.html" class="cmn__btn wow fadeInDown">
                  <span>
                     Explore deals
                  </span>
                    </a>
                </div>
            </div>
            <div class="col-xxl-5 col-xl-5 col-lg-5">
                <div class="worldwide__tumb__wrapper">
                    <div class="thumb__innner">
                        <div class="tumb wow fadeInDown" data-wow-duration="1.2s">
                            <img src="assets/img/cars/car1.jpg" alt="img">
                        </div>
                        <div class="tumb wow fadeInUp" data-wow-duration="1.2s">
                            <img src="assets/img/cars/car2.jpg" alt="img">
                        </div>
                    </div>
                    <div class="thumb__innner">
                        <div class="tumb wow fadeInUp" data-wow-duration="1.2s">
                            <img src="assets/img/cars/carman1.jpg" alt="img">
                        </div>
                        <div class="tumb wow fadeInDown" data-wow-duration="1.2s">
                            <img src="assets/img/cars/carman2.jpg" alt="img">
                        </div>
                    </div>
                    <div class="car__rount">
                        <img src="assets/img/cars/carround.png" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- cars ticket end -->

<!--cars facilities here -->
<section class="hotel__facilities  pt-120 pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-6 col-xl-7 col-lg-7 wow fadeInDown">
                <div class="section__header section__center pb__60">
                    <h2>
                        Car Information Service
                    </h2>
                    <p class="max-636">
                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form
                    </p>
                </div>
            </div>
        </div>
        <div class="flight__facilites__wrap bus__facilities__wrap">
            <div class="row flex-row-reverse justify-content-between align-items-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="car__facilities__wrap gy-3 row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="hotel__facilities__item wow fadeInDown" data-wow-duration="1.2s">
                                <div class="head__wrap">
                                    <img src="assets/img/cars/location.png" alt="img">
                                    <h5>
                                        <a href="car-list.html">
                                            Over 50,000 locations
                                        </a>
                                    </h5>
                                </div>
                                <p>
                                    There are many variations of passages of Lorem Ipsum available...
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="hotel__facilities__item wow fadeInDown" data-wow-duration="1.4s">
                                <div class="head__wrap">
                                    <img src="assets/img/cars/bookiing.png" alt="img">
                                    <h5>
                                        <a href="car-list.html">
                                            No booking fees
                                        </a>
                                    </h5>
                                </div>
                                <p>
                                    There are many variations of passages of Lorem Ipsum available...
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="hotel__facilities__item wow fadeInDown" data-wow-duration="1.6s">
                                <div class="head__wrap">
                                    <img src="assets/img/cars/rental.png" alt="img">
                                    <h5>
                                        <a href="car-list.html">
                                            Low rental rates
                                        </a>
                                    </h5>
                                </div>
                                <p>
                                    There are many variations of passages of Lorem Ipsum available...
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="hotel__facilities__item wow fadeInDown" data-wow-duration="1.4s">
                                <div class="head__wrap">
                                    <img src="assets/img/cars/customer.png" alt="img">
                                    <h5>
                                        <a href="car-list.html">
                                            24/7 customer service
                                        </a>
                                    </h5>
                                </div>
                                <p>
                                    There are many variations of passages of Lorem Ipsum available...
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="car__facilitiesthumb2">
                        <img src="assets/img/cars/car-ingo.png" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--cars facilities End -->

<!-- cars client here -->
<section class="cars__testimonial__section bgsection pt-120 pb-120">
    <div class="container">
        <div class="row justify-content-center justify-content-between">
            <div class="col-xxl-5 col-xl-6 col-lg-6">
                <div class="carss__testimonial owl-theme owl-carousel">
                    <div class="flight__client__item">
                        <div class="header">
                            <img src="assets/img/testimonial/commonquote.png" alt="img">
                            <p>
                                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                            </p>
                        </div>
                        <div class="lastcommon">
                            <img src="assets/img/testimonial/devid.png" alt="img">
                            <ul class="ratting">
                                <li>
                                    <img src="assets/img/testimonial/star.png" alt="img">
                                </li>
                                <li>
                                    <img src="assets/img/testimonial/star.png" alt="img">
                                </li>
                                <li>
                                    <img src="assets/img/testimonial/star.png" alt="img">
                                </li>
                                <li>
                                    <img src="assets/img/testimonial/wihtstar.png" alt="img">
                                </li>
                                <li>
                                    <img src="assets/img/testimonial/wihtstar.png" alt="img">
                                </li>
                            </ul>
                            <h5>
                                Devid Warner
                            </h5>
                            <span class="degisnation">
                        Customer
                     </span>
                        </div>
                    </div>
                    <div class="flight__client__item">
                        <div class="header">
                            <img src="assets/img/testimonial/commonquote.png" alt="img">
                            <p>
                                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                            </p>
                        </div>
                        <div class="lastcommon">
                            <img src="assets/img/testimonial/wilsond.png" alt="img">
                            <ul class="ratting">
                                <li>
                                    <img src="assets/img/testimonial/star.png" alt="img">
                                </li>
                                <li>
                                    <img src="assets/img/testimonial/star.png" alt="img">
                                </li>
                                <li>
                                    <img src="assets/img/testimonial/star.png" alt="img">
                                </li>
                                <li>
                                    <img src="assets/img/testimonial/wihtstar.png" alt="img">
                                </li>
                                <li>
                                    <img src="assets/img/testimonial/wihtstar.png" alt="img">
                                </li>
                            </ul>
                            <h5>
                                Jenny Wilson
                            </h5>
                            <span class="degisnation">
                        Marketing Coordinator
                     </span>
                        </div>
                    </div>
                    <div class="flight__client__item">
                        <div class="header">
                            <img src="assets/img/testimonial/commonquote.png" alt="img">
                            <p>
                                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                            </p>
                        </div>
                        <div class="lastcommon">
                            <img src="assets/img/testimonial/cody.png" alt="img">
                            <ul class="ratting">
                                <li>
                                    <img src="assets/img/testimonial/star.png" alt="img">
                                </li>
                                <li>
                                    <img src="assets/img/testimonial/star.png" alt="img">
                                </li>
                                <li>
                                    <img src="assets/img/testimonial/star.png" alt="img">
                                </li>
                                <li>
                                    <img src="assets/img/testimonial/wihtstar.png" alt="img">
                                </li>
                                <li>
                                    <img src="assets/img/testimonial/wihtstar.png" alt="img">
                                </li>
                            </ul>
                            <h5>
                                Cody Fisher
                            </h5>
                            <span class="degisnation">
                        Medical Assistant
                     </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-6 wow fadeInDown">
                <div class="section__header">
                    <h2>
                        What do clients tell us?
                    </h2>
                    <p class="pb__40">
                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators...
                    </p>
                    <a href="car-grid.html" class="cmn__btn">
                  <span>
                     Explore deals
                  </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="car__quote">
        <img src="assets/img/cars/quote.png" alt="img">
    </div>
</section>
<!-- cars client End -->

<!--cars two qustions start-->
<section class="question__section pt-120 pb-120">
    <div class="container">
        <div class="row justify-content-center wow fadeInDown">
            <div class="col-lg-6">
                <div class="section__header section__center pb__40">
                    <h2>
                        If you got questions we have answer
                    </h2>
                    <p>
                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,
                    </p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-8">
                <div class="qustion__content">
                    <div class="accordion__wrap">
                        <div class="accordion" id="accordionExample">
                            <!--Accordion items-->
                            <div class="accordion-item wow fadeInUp" data-wow-duration="0.9s">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        What is e recharge?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--Accordion items-->
                            <div class="accordion-item wow fadeInUp" data-wow-duration="1s">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        What is recharge credit?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--Accordion items-->
                            <div class="accordion-item wow fadeInUp" data-wow-duration="1.4s">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        How reliable is recharge com?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--Accordion items-->
                            <div class="accordion-item wow fadeInUp" data-wow-duration="1.6s">
                                <h2 class="accordion-header" id="headingThreem">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThreem" aria-expanded="false" aria-controls="collapseThreem">
                                        What is recharge application?
                                    </button>
                                </h2>
                                <div id="collapseThreem" class="accordion-collapse collapse" aria-labelledby="headingThreem" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--Accordion items-->
                            <div class="accordion-item wow fadeInUp" data-wow-duration="1.8s">
                                <h2 class="accordion-header" id="headingThreemm">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThreemm" aria-expanded="false" aria-controls="collapseThreemm">
                                        How do I recharge a phone number?
                                    </button>
                                </h2>
                                <div id="collapseThreemm" class="accordion-collapse collapse" aria-labelledby="headingThreemm" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--Accordion items-->
                            <div class="accordion-item wow fadeInUp" data-wow-duration="1.9s">
                                <h2 class="accordion-header" id="headingThreemmm">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThreemmm" aria-expanded="false" aria-controls="collapseThreemmm">
                                        What is the primary function of the recharge payment application?
                                    </button>
                                </h2>
                                <div id="collapseThreemmm" class="accordion-collapse collapse" aria-labelledby="headingThreemmm" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--Accordion items-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--cars two qustions start-->
