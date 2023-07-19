@extends('frontpage.layout')

@section('content')


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

@endsection
