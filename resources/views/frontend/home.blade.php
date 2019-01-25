<!DOCTYPE html>

<head>

<!-- Basic Page Needs
================================================== -->
<title>GIS Basket</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="{{ url('assets/frontend') }}/css/style.css">
@if(session()->exists('difable_mode'))
	@if(session()->get('difable_mode') == 1)
		<link rel="stylesheet" href="{{ url('assets/frontend') }}/css/colors/blue.css" id="colors">
	@else
		<link rel="stylesheet" href="{{ url('assets/frontend') }}/css/colors/main.css" id="colors">
	@endif
@else
	<link rel="stylesheet" href="{{ url('assets/frontend') }}/css/colors/main.css" id="colors">
@endif

<style>
    #streetView, #geoLocation, #scrollEnabling {
        position: absolute;
        top: 15px;
        right: 60px;
        z-index: 999;
        font-size: 13px;
        line-height: 21px;
    }

    #map-container.fullwidth-home-map .main-search-inner {
        bottom: 0;
    }
</style>
</head>

<body>

<!-- Wrapper -->
<div id="wrapper">

<!-- Header Container
================================================== -->
<header id="header-container">

	<!-- Header -->
	<div id="header">
		<div class="container">
			
			<!-- Left Side Content -->
			<div class="left-side">
				
				<!-- Logo -->
				<div id="logo">
                <a href="{{ route('home') }}"><img src="{{ url('assets/frontend') }}/images/logo.png" alt=""></a>
				</div>

				<!-- Mobile Navigation -->
				<div class="mmenu-trigger">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>

				<!-- Main Navigation -->
				@include('layouts.menu_frontend')
				<div class="clearfix"></div>
				<!-- Main Navigation / End -->
				
			</div>
			<!-- Left Side Content / End -->


			<!-- Right Side Content / End -->
			<div class="right-side">
				<div class="header-widget">
                    @if(Auth::check())
                        <a href="{{ route('logout') }}" class="sign-in popup-with-zoom-anim" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="sl sl-icon-logout"></i> Sign out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <a href="#sign-in-dialog" class="sign-in popup-with-zoom-anim"><i class="sl sl-icon-login"></i> Sign In</a>
                    @endif
						<!-- <label class="switch" style="margin-top: 10px;"><input type="checkbox" id="difable_mode" @if(session()->exists('difable_mode'))@if(session()->get('difable_mode') == 1) checked @endif @endif  ><span class="slider round"></span></label>
						<a href="#" class="sign-in popup-with-zoom-anim"> Difable Mode</a> -->
				</div>
			</div>
			<!-- Right Side Content / End -->

			<!-- Sign In Popup -->
			<div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">

				<div class="small-dialog-header">
					<h3>Sign In</h3>
				</div>

				<!--Tabs -->
				<div class="sign-in-form style-1">

					<ul class="tabs-nav">
                        <li class=""><a href="#tab1">Log In </a></li>
					</ul>

					<div class="tabs-container alt">

						<!-- Login -->
						<div class="tab-content" id="tab1" style="display: none;">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                @if($errors->has('password') || $errors->has('email'))
                                <div class="notification error closeable">
                                    <p>{{ $errors->first('email') }}</p>
                                    <p>{{ $errors->first('password') }}</p>
                                    <a class="close"></a>
                                </div>
                                @endif

                                <p class="form-row form-row-wide">
                                    <label for="username">Username:
                                        <i class="im im-icon-Male"></i>
                                        <input type="email" class="input-text" name="email" id="email" value="" />
                                    </label>
                                </p>

                                <p class="form-row form-row-wide">
                                    <label for="password">Password:
                                        <i class="im im-icon-Lock-2"></i>
                                        <input class="input-text" type="password" name="password" id="password"/>
                                    </label>
                                </p>

                                <div class="form-row">
                                    <input type="submit" class="button border margin-top-5" name="login" value="Login" />
                                </div>
                                
                            </form>
                        </div>


					</div>
				</div>
			</div>
			<!-- Sign In Popup / End -->

		</div>
	</div>
	<!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->


<!-- Map
================================================== -->
<div id="map-container" class="fullwidth-home-map">

    <div id="map" data-map-zoom="13">
        <!-- map goes here -->
    </div>

	<div class="main-search-inner">

		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<form action="" method="get">
                        <div class="main-search-input">

                            <div class="main-search-input-item">
                                <input type="text" placeholder="What are you looking for?" value="" id="q" name="q" autocomplete="off" required/>
                            </div>
							<div class="main-search-input-item">
								<select data-placeholder="All Categories" class="chosen-select" name="category">
									<option value="0">All Categories</option>
									<option value="1">Lapangan</option>
									<option value="2">Club</option>
								</select>
							</div>

                            <button class="button">Search</button>

                        </div>
					</form>
				</div>
			</div>
		</div>

	</div>

    <!-- Scroll Enabling Button -->
	<a href="#" id="scrollEnabling" title="Enable or disable scrolling on map">Enable Scrolling</a>
</div>



</div>
<!-- Wrapper / End -->



<!-- Scripts
================================================== -->
<script type="text/javascript" src="{{ url('assets/frontend') }}/scripts/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="{{ url('assets/frontend') }}/scripts/mmenu.min.js"></script>
<script type="text/javascript" src="{{ url('assets/frontend') }}/scripts/chosen.min.js"></script>
<script type="text/javascript" src="{{ url('assets/frontend') }}/scripts/slick.min.js"></script>
<script type="text/javascript" src="{{ url('assets/frontend') }}/scripts/rangeslider.min.js"></script>
<script type="text/javascript" src="{{ url('assets/frontend') }}/scripts/magnific-popup.min.js"></script>
<script type="text/javascript" src="{{ url('assets/frontend') }}/scripts/waypoints.min.js"></script>
<script type="text/javascript" src="{{ url('assets/frontend') }}/scripts/counterup.min.js"></script>
<script type="text/javascript" src="{{ url('assets/frontend') }}/scripts/jquery-ui.min.js"></script>
<script type="text/javascript" src="{{ url('assets/frontend') }}/scripts/tooltips.min.js"></script>
<script type="text/javascript" src="{{ url('assets/frontend') }}/scripts/custom.js"></script>

<!-- Google Autocomplete -->
<script>

    var newHeight = $(window).height() - 80;
    $("#map").height(newHeight);


</script>

<!-- Maps -->
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('MAP_API_KEY') }}&amp;libraries=places"></script>
<script type="text/javascript" src="{{ url('assets/frontend') }}/scripts/infobox.min.js"></script>
<script type="text/javascript" src="{{ url('assets/frontend') }}/scripts/markerclusterer.js"></script>

<script>
var infoBox_ratingType='star-rating';

(function($){
    "use strict";
    function mainMap(){
        var ib=new InfoBox();

        function locationData(locationURL,locationImg,locationTitle,locationAddress,locationRating,locationRatingCounter){
            var infoRating = '<div class="'+infoBox_ratingType+'" data-rating="'+locationRating+'"><div class="rating-counter">('+locationRatingCounter+' reviews)</div></div>';
            if(!locationRating){
                infoRating = '';
            }
            return(''+
                '<a href="'+locationURL+'" class="listing-img-container">'+
                '<div class="infoBox-close"><i class="fa fa-times"></i></div>'+
                '<img src="'+locationImg+'" alt="">'+
                '<div class="listing-item-content">'+
                '<h3>'+locationTitle+'</h3>'+
                '<span>'+locationAddress+'</span>'+
                '</div>'+
                '</a>'+
                '<div class="listing-content">'+
                '<div class="listing-title">'+
                infoRating +
                '</div>'+
                '</div>')
        }

        var locations=[
            
            <?php $no=1; foreach ($lapangan as $row): ?>
            [
                locationData('<?= route('detail.lapangan', $row->id) ?>','<?= $row->thumb_img ?>',"<?= $row->nama ?>",'<?= $row->alamat ?>','<?= $row->rating ?>','<?= $row->review()->where('status',1)->count() ?>'),
                <?= $row->lat ?>,
                <?= $row->long ?>,
                <?= $no ?>,
                '<i class="im im-icon-Football-2"></i>'
            ],
            <?php $no++; endforeach; ?>
            
            <?php foreach ($club as $row): ?>
			<?php $icon = $row->difable == 1 ? '<i class="im im-icon-Waiter"></i>' : '<i class="im im-icon-Basket-Ball"></i>'; ?>
            [
                locationData('<?= route('detail.club', $row->id) ?>','<?= $row->thumb_img ?>',"<?= $row->nama ?>",'<?= $row->alamat ?>',false,false),
                <?= $row->lat ?>,
                <?= $row->long ?>,
                <?= $no ?>,
                '<?= $icon ?>'
            ],
            <?php $no++; endforeach; ?>
        ];

        google.maps.event.addListener(ib, 'domready', function () {
            if (infoBox_ratingType = 'numerical-rating') { numericalRating('.infoBox .' + infoBox_ratingType + ''); }
            if (infoBox_ratingType = 'star-rating') { starRating('.infoBox .' + infoBox_ratingType + ''); }
        }); 

        var mapZoomAttr = $('#map').attr('data-map-zoom'); 
        var mapScrollAttr = $('#map').attr('data-map-scroll'); 

        if (typeof mapZoomAttr !== typeof undefined && mapZoomAttr !== false) { 
            var zoomLevel = parseInt(mapZoomAttr); 
        } else { 
            var zoomLevel = 5; 
        }

        if (typeof mapScrollAttr !== typeof undefined && mapScrollAttr !== false) { 
            var scrollEnabled = parseInt(mapScrollAttr); 
        } else {
            var scrollEnabled = false; 
        }

        var map = new google.maps.Map(
            document.getElementById('map'), 
            { 
                zoom: zoomLevel, 
                scrollwheel: scrollEnabled, 
                center: new google.maps.LatLng(-8.65, 115.22), 
                mapTypeId: google.maps.MapTypeId.ROADMAP, 
                zoomControl: false, 
                mapTypeControl: false, 
                scaleControl: false, 
                panControl: false, 
                navigationControl: false, 
                streetViewControl: false, 
                gestureHandling: 'cooperative', 
                styles: [{
                            featureType: 'poi.business',
                            stylers: [{visibility: 'off'}]
                        },
                        {
                            featureType: 'poi.place_of_worship',
                            stylers: [{visibility: 'off'}]
                        },
                        {
                            featureType: 'poi.sports_complex',
                            stylers: [{visibility: 'off'}]
                        },
                        {
                            featureType: 'poi.attraction',
                            stylers: [{visibility: 'off'}]
                        },
                        {
                            featureType: 'poi.school',
                            stylers: [{visibility: 'off'}]
                        },
                        { "featureType": "poi", "elementType": "labels.text.fill", "stylers": [{ "color": "#747474" }, { "lightness": "23" }] }, { "featureType": "poi.attraction", "elementType": "geometry.fill", "stylers": [{ "color": "#f38eb0" }] }, { "featureType": "poi.government", "elementType": "geometry.fill", "stylers": [{ "color": "#ced7db" }] }, { "featureType": "poi.medical", "elementType": "geometry.fill", "stylers": [{ "color": "#ffa5a8" }] }, { "featureType": "poi.park", "elementType": "geometry.fill", "stylers": [{ "color": "#c7e5c8" }] }, { "featureType": "poi.place_of_worship", "elementType": "geometry.fill", "stylers": [{ "color": "#d6cbc7" }] }, { "featureType": "poi.school", "elementType": "geometry.fill", "stylers": [{ "color": "#c4c9e8" }] }, { "featureType": "poi.sports_complex", "elementType": "geometry.fill", "stylers": [{ "color": "#b1eaf1" }] }, { "featureType": "road", "elementType": "geometry", "stylers": [{ "lightness": "100" }] }, { "featureType": "road", "elementType": "labels", "stylers": [{ "visibility": "off" }, { "lightness": "100" }] }, { "featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{ "color": "#ffd4a5" }] }, { "featureType": "road.arterial", "elementType": "geometry.fill", "stylers": [{ "color": "#ffe9d2" }] }, { "featureType": "road.local", "elementType": "all", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "road.local", "elementType": "geometry.fill", "stylers": [{ "weight": "3.00" }] }, { "featureType": "road.local", "elementType": "geometry.stroke", "stylers": [{ "weight": "0.30" }] }, { "featureType": "road.local", "elementType": "labels.text", "stylers": [{ "visibility": "on" }] }, { "featureType": "road.local", "elementType": "labels.text.fill", "stylers": [{ "color": "#747474" }, { "lightness": "36" }] }, { "featureType": "road.local", "elementType": "labels.text.stroke", "stylers": [{ "color": "#e9e5dc" }, { "lightness": "30" }] }, { "featureType": "transit.line", "elementType": "geometry", "stylers": [{ "visibility": "on" }, { "lightness": "100" }] }, { "featureType": "water", "elementType": "all", "stylers": [{ "color": "#d2e7f7" }] }] 
            }
        ); 
            
        $('.listing-item-container').on('mouseover', function () { 
            var listingAttr = $(this).data('marker-id'); 
            if (listingAttr !== undefined) { 
                var listing_id = $(this).data('marker-id') - 1; 
                var marker_div = allMarkers[listing_id].div; 
                $(marker_div).addClass('clicked'); 
                $(this).on('mouseout', function () { 
                    if ($(marker_div).is(":not(.infoBox-opened)")) { 
                        $(marker_div).removeClass('clicked'); 
                    } 
                }); 
            } 
        }); 
            
        var boxText = document.createElement("div"); 
            boxText.className = 'map-box'
        var currentInfobox; 
        var boxOptions = { content: boxText, disableAutoPan: false, alignBottom: true, maxWidth: 0, pixelOffset: new google.maps.Size(-134, -55), zIndex: null, boxStyle: { width: "270px" }, closeBoxMargin: "0", closeBoxURL: "", infoBoxClearance: new google.maps.Size(25, 25), isHidden: false, pane: "floatPane", enableEventPropagation: false, }; 
        var markerCluster, overlay, i; 
        var allMarkers = []; 
        var clusterStyles = [{ textColor: 'white', url: '', height: 50, width: 50 }]; 
        var markerIco; 

        for (i = 0; i < locations.length; i++) { 
            markerIco = locations[i][4]; 
            var overlaypositions = new google.maps.LatLng(locations[i][1], locations[i][2]), 
                overlay = new CustomMarker(overlaypositions, map, { marker_id: i }, markerIco); 
                allMarkers.push(overlay); 

            google.maps.event.addDomListener(overlay, 'click', (function (overlay, i) { 
                return function () { 
                    ib.setOptions(boxOptions); 
                    boxText.innerHTML = locations[i][0]; 
                    ib.close(); 
                    ib.open(map, overlay); 
                    currentInfobox = locations[i][3]; google.maps.event.addListener(ib, 'domready', function () { 
                        $('.infoBox-close').click(function (e) { 
                            e.preventDefault(); ib.close(); 
                            $('.map-marker-container').removeClass('clicked infoBox-opened'); 
                        }); 
                    }); 
                } 
            })(overlay, i)); 
        }

        var options = { imagePath: 'images/', styles: clusterStyles, minClusterSize: 2 }; 

        //untuk clustering marker yang berdekatan
        markerCluster = new MarkerClusterer(map, allMarkers, options);

        google.maps.event.addDomListener(window, "resize", function () { 
            var center = map.getCenter(); 
            google.maps.event.trigger(map, "resize"); 
            map.setCenter(center); 
        }); 
        
        var zoomControlDiv = document.createElement('div'); 
        var zoomControl = new ZoomControl(zoomControlDiv, map); 
        
        function ZoomControl(controlDiv, map) { 
            zoomControlDiv.index = 1; 
            map.controls[google.maps.ControlPosition.RIGHT_CENTER].push(zoomControlDiv); 
            controlDiv.style.padding = '5px'; 
            controlDiv.className = "zoomControlWrapper"; 
            var controlWrapper = document.createElement('div'); 
            controlDiv.appendChild(controlWrapper); 
            var zoomInButton = document.createElement('div'); 
            zoomInButton.className = "custom-zoom-in"; 
            controlWrapper.appendChild(zoomInButton); 
            var zoomOutButton = document.createElement('div'); 
            zoomOutButton.className = "custom-zoom-out"; 
            controlWrapper.appendChild(zoomOutButton); 

            google.maps.event.addDomListener(zoomInButton, 'click', function () { 
                map.setZoom(map.getZoom() + 1); 
            }); 
            
            google.maps.event.addDomListener(zoomOutButton, 'click', function () { map.setZoom(map.getZoom() - 1); }); 
        }
        var scrollEnabling = $('#scrollEnabling'); 
        
        $(scrollEnabling).click(function (e) { 
            e.preventDefault(); $(this).toggleClass("enabled"); 
            if ($(this).is(".enabled")) { 
                map.setOptions({ 'scrollwheel': true }); 
            } else { 
                map.setOptions({ 'scrollwheel': false }); 
            } 
        })

        $("#geoLocation, .input-with-icon.location a").click(function (e) { 
            e.preventDefault(); geolocate(); 
        }); 
        
        function geolocate() { 
            if (navigator.geolocation) { 
                navigator.geolocation.getCurrentPosition(function (position) { 
                    var pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude); 
                    map.setCenter(pos); map.setZoom(12); 
                }); 
            } 
        }

    }

    var map = document.getElementById('map'); 
    
    if (typeof (map) != 'undefined' && map != null) { 
        google.maps.event.addDomListener(window, 'load', mainMap); 
    }

    function singleListingMap() {
        var myLatlng = new google.maps.LatLng({ lng: $('#singleListingMap').data('longitude'), lat: $('#singleListingMap').data('latitude'), }); 
        var single_map = new google.maps.Map(
            document.getElementById('singleListingMap'), 
            { 
                zoom: 15, 
                center: myLatlng, 
                scrollwheel: false, 
                zoomControl: false, 
                mapTypeControl: false, 
                scaleControl: false, 
                panControl: false, 
                navigationControl: false, 
                streetViewControl: false, 
                styles: [{
                            featureType: 'poi.business',
                            stylers: [{visibility: 'off'}]
                        },
                        {
                            featureType: 'poi.place_of_worship',
                            stylers: [{visibility: 'off'}]
                        },
                        {
                            featureType: 'poi.sports_complex',
                            stylers: [{visibility: 'off'}]
                        },
                        {
                            featureType: 'poi.attraction',
                            stylers: [{visibility: 'off'}]
                        },
                        {
                            featureType: 'poi.school',
                            stylers: [{visibility: 'off'}]
                        },{ "featureType": "poi", "elementType": "labels.text.fill", "stylers": [{ "color": "#747474" }, { "lightness": "23" }] }, { "featureType": "poi.attraction", "elementType": "geometry.fill", "stylers": [{ "color": "#f38eb0" }] }, { "featureType": "poi.government", "elementType": "geometry.fill", "stylers": [{ "color": "#ced7db" }] }, { "featureType": "poi.medical", "elementType": "geometry.fill", "stylers": [{ "color": "#ffa5a8" }] }, { "featureType": "poi.park", "elementType": "geometry.fill", "stylers": [{ "color": "#c7e5c8" }] }, { "featureType": "poi.place_of_worship", "elementType": "geometry.fill", "stylers": [{ "color": "#d6cbc7" }] }, { "featureType": "poi.school", "elementType": "geometry.fill", "stylers": [{ "color": "#c4c9e8" }] }, { "featureType": "poi.sports_complex", "elementType": "geometry.fill", "stylers": [{ "color": "#b1eaf1" }] }, { "featureType": "road", "elementType": "geometry", "stylers": [{ "lightness": "100" }] }, { "featureType": "road", "elementType": "labels", "stylers": [{ "visibility": "off" }, { "lightness": "100" }] }, { "featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{ "color": "#ffd4a5" }] }, { "featureType": "road.arterial", "elementType": "geometry.fill", "stylers": [{ "color": "#ffe9d2" }] }, { "featureType": "road.local", "elementType": "all", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "road.local", "elementType": "geometry.fill", "stylers": [{ "weight": "3.00" }] }, { "featureType": "road.local", "elementType": "geometry.stroke", "stylers": [{ "weight": "0.30" }] }, { "featureType": "road.local", "elementType": "labels.text", "stylers": [{ "visibility": "on" }] }, { "featureType": "road.local", "elementType": "labels.text.fill", "stylers": [{ "color": "#747474" }, { "lightness": "36" }] }, { "featureType": "road.local", "elementType": "labels.text.stroke", "stylers": [{ "color": "#e9e5dc" }, { "lightness": "30" }] }, { "featureType": "transit.line", "elementType": "geometry", "stylers": [{ "visibility": "on" }, { "lightness": "100" }] }, { "featureType": "water", "elementType": "all", "stylers": [{ "color": "#d2e7f7" }] }] 
            }); 

            $('#streetView').click(function (e) { 
                e.preventDefault(); 
                single_map.getStreetView().setOptions({ 
                    visible: true, position: myLatlng 
                }); 
            }); 
            
            var zoomControlDiv = document.createElement('div'); 
            var zoomControl = new ZoomControl(zoomControlDiv, single_map); 

            function ZoomControl(controlDiv, single_map) { 
                zoomControlDiv.index = 1; 
                single_map.controls[google.maps.ControlPosition.RIGHT_CENTER].push(zoomControlDiv); 
                controlDiv.style.padding = '5px'; 
                var controlWrapper = document.createElement('div'); 
                controlDiv.appendChild(controlWrapper); 
                var zoomInButton = document.createElement('div'); 
                zoomInButton.className = "custom-zoom-in";
                 controlWrapper.appendChild(zoomInButton); 
                 var zoomOutButton = document.createElement('div'); 
                 zoomOutButton.className = "custom-zoom-out"; 

                 controlWrapper.appendChild(zoomOutButton); 
                 google.maps.event.addDomListener(zoomInButton, 'click', function () { 
                     single_map.setZoom(single_map.getZoom() + 1); 
                }); 

                google.maps.event.addDomListener(zoomOutButton, 'click', function () { 
                    single_map.setZoom(single_map.getZoom() - 1); 
                }); 
            }

            var singleMapIco = "<i class='" + $('#singleListingMap').data('map-icon') + "'></i>"; 
            new CustomMarker(myLatlng, single_map, { marker_id: '1' }, singleMapIco);
    }

    var single_map = document.getElementById('singleListingMap'); 
    
    if (typeof (single_map) != 'undefined' && single_map != null) { 
        google.maps.event.addDomListener(window, 'load', singleListingMap); 
    }

    function CustomMarker(latlng, map, args, markerIco) { 
        this.latlng = latlng; this.args = args; 
        this.markerIco = markerIco; 
        this.setMap(map); 
    }

    CustomMarker.prototype = new google.maps.OverlayView(); 
    CustomMarker.prototype.draw = function () {
        var self = this; var div = this.div; if (!div) {
            div = this.div = document.createElement('div'); 
            div.className = 'map-marker-container'; 
            div.innerHTML = '<div class="marker-container">' +
                '<div class="marker-card">' +
                '<div class="front face">' + self.markerIco + '</div>' +
                '<div class="back face">' + self.markerIco + '</div>' +
                '<div class="marker-arrow"></div>' +
                '</div>' +
                '</div>'
            google.maps.event.addDomListener(div, "click", function (event) { 
                $('.map-marker-container').removeClass('clicked infoBox-opened'); 
                google.maps.event.trigger(self, "click"); 
                $(this).addClass('clicked infoBox-opened'); 
            }); 
            
            if (typeof (self.args.marker_id) !== 'undefined') { 
                div.dataset.marker_id = self.args.marker_id; 
            }

            var panes = this.getPanes(); panes.overlayImage.appendChild(div);
        }

        var point = this.getProjection().fromLatLngToDivPixel(this.latlng); 
        if (point) { 
            div.style.left = (point.x) + 'px'; 
            div.style.top = (point.y) + 'px'; 
        }

    }; 
    
    CustomMarker.prototype.remove = function () { 
        if (this.div) { 
            this.div.parentNode.removeChild(this.div); 
            this.div = null; 
            $(this).removeClass('clicked'); 
        } 
    }; 
    
    CustomMarker.prototype.getPosition = function () { 
        return this.latlng; 
    };
    
})(this.jQuery);

$("#difable_mode").change(function () {
    if($("#difable_mode").is(':checked')){
        window.location.href = "<?= route( 'home.difable_mode',['mode'=>1]) ?>";
    }else{
        window.location.href = "<?= route( 'home.difable_mode',['mode'=>0]) ?>";
	}
});
</script>

@if($errors->has('password') || $errors->has('email'))
<script>
	$(document).ready(function(){
		$.magnificPopup.open({
			items: {
				src: '#sign-in-dialog'
			},
			type: 'inline'
		});
	});
</script>
@endif

</body>
</html>