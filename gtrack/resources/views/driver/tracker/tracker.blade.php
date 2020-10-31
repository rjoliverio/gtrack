@extends('layouts.driver_master')

@section('title')
    GTrack | Location
@endsection

@section('css')
    <script src='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css' rel='stylesheet' />
    <link href={{asset('css/admin-map.css')}} rel="stylesheet">
@endsection

@section('content')
    <div class="text-center mb-1">
        <button class="btn btn-success share-location">Share Location</button>
    </div>
    <div class="container-fluid text-center bg-light menu-container">
        <div id="menu">
            <input
            id="streets-v11"
            type="radio"
            name="rtoggle"
            value="streets-v11"
            checked="checked"
            />
            <label for="streets-v11">streets</label>&nbsp;
            <input id="outdoors-v11" type="radio" name="rtoggle" value="outdoors-v11" />
            <label for="outdoors-v11">outdoors</label>&nbsp;
            <input id="satellite-v9" type="radio" name="rtoggle" value="satellite-v9" />
            <label for="satellite-v9">satellite</label>
        </div>
    </div>
    {{-- for directions --}}
    {{-- <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.js"></script>
    <link
        rel="stylesheet"
        href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.css"
        type="text/css"
    /> --}}
    {{-- for directions --}}

    {{-- for geocoder --}}
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.min.js"></script>
    <link
    rel="stylesheet"
    href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.css"
    type="text/css"
    />

    <!-- Promise polyfill script required to use Mapbox GL Geocoder in IE 11 -->
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>
    {{-- for geocoder --}}
    <section class="map_box_container">
        <!--MAP-->
    <div id='map'></div>
    </section>
@endsection

@section('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- ---------------------------------------------------- -->
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.21.0/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/7.21.0/firebase-analytics.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.21.0/firebase-database.js"></script>

<script>
  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  var firebaseConfig = {
    apiKey: "AIzaSyBgm4wnKRFsVZBNvj4kntTzNB-gBw4nnSc",
    authDomain: "mapsample-51a36.firebaseapp.com",
    databaseURL: "https://mapsample-51a36.firebaseio.com",
    projectId: "mapsample-51a36",
    storageBucket: "mapsample-51a36.appspot.com",
    messagingSenderId: "42946705440",
    appId: "1:42946705440:web:1b76b0abc758b9f2f9a445",
    measurementId: "G-YNRQ8ZCTXD"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();
var database = firebase.database();
</script>
<!-- ------------------------------------------------- -->
<script>
// share-location
var collector = {{ Auth::user()->user_id }};
    
  var watchID=null;
  var markers=null;
  var truckIcon=null;
  var startla=[];
    // var truckIcon=[];
    var startla=[];
    database.ref('drivers/'+collector).once('value', function(snapshot){
        if(snapshot.val().active==1){
            $('.share-location').removeClass('btn-success');
            $('.share-location').addClass('btn-danger');
            $('.share-location').text('Stop Sharing');

            truckIcon=document.createElement('div');
            truckIcon.classList.add("truckIcon");
            
            var mark_pop = new mapboxgl.Popup({ offset: 30 })
                .setText(snapshot.val().route)
                .addTo(map);
            markers=new mapboxgl.Marker(truckIcon, {
                anchor: 'bottom',
                offset: [0, 6]
            })
            .setLngLat([snapshot.val().longitude, snapshot.val().latitude])
            .addTo(map)
            .setPopup(mark_pop);

            startla.push([snapshot.val().longitude, snapshot.val().latitude]);

            function success(coord){
                database.ref('drivers/'+collector).set({
                    latitude: coord.coords.latitude,
                    longitude: coord.coords.longitude,
                    route:"Poblacion",
                    driver_id:collector,
                    active:1
                });
            }
            function error(errorObj) { 
                alert(errorObj.code + ": " + errorObj.message);
                swal(errorObj.code + ": " + errorObj.message, {
                    icon: "error",
                });
            }
            
            if (navigator.geolocation) {
                watchID=navigator.geolocation.watchPosition(success,error,{enableHighAccuracy: true, maximumAge: 10000});
            }else{
                swal("Browser unable to support GPS", {
                    icon: "error",
                });
            }
        }else{
            $('.share-location').removeClass('btn-danger');
            $('.share-location').addClass('btn-success');
            $('.share-location').text('Share Location');
        }
    });
    $('.share-location').on('click',function(){
        if($(this).hasClass('btn-success')){
            $(this).removeClass('btn-success');
            $(this).addClass('btn-danger');
            $(this).text('Stop Sharing');
            function success(coord){
                database.ref('drivers/'+collector).set({
                    latitude: coord.coords.latitude,
                    longitude: coord.coords.longitude,
                    route:"Poblacion",
                    driver_id:collector,
                    active:1
                });
            }
            function error(errorObj) { 
                alert(errorObj.code + ": " + errorObj.message);
                swal(errorObj.code + ": " + errorObj.message, {
                    icon: "error",
                });
            }
            if (navigator.geolocation) {
                watchID=navigator.geolocation.watchPosition(success,error,{enableHighAccuracy: true, maximumAge: 10000});
            }else{
                swal("Browser unable to support GPS", {
                    icon: "error",
                });
            }
            location.reload();
        }else{
            $(this).removeClass('btn-danger');
            $(this).addClass('btn-success');
            $(this).text('Share Location');
            if(watchID!=null){
                navigator.geolocation.clearWatch(watchID);
            }
            database.ref('drivers/'+collector).set({
                latitude: 0,
                longitude: 0,
                route:"Poblacion",
                driver_id:collector,
                active:0
            });
            markers.remove();
        }
    });
//get user location
//navigator.geolocation.getCurrentPosition(success, error, options);

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(success);
    }
    function success(position) {
        var coord=[];
        coord.push([position.coords.longitude,position.coords.latitude]);
        localStorage.setItem("user-coords", JSON.stringify(coord));
    }
    var coord = localStorage.getItem("user-coords");
    localStorage.removeItem("user-coords");
    coord=JSON.parse(coord);
    // alert(coord[0]);
//mapbox init
    mapboxgl.accessToken = 'pk.eyJ1IjoicmpvbGl2ZXJpbyIsImEiOiJja2ZhanZrZnkwajFjMnJwN25mem1tenQ0In0.fpQUiUyn3J0vihGxhYA2PA';
    var map = new mapboxgl.Map({
      container: 'map',
      style: 'mapbox://styles/mapbox/streets-v11',
      center:coord[0],
      zoom:14
    });
// user location button
    var userloc=new mapboxgl.GeolocateControl({
            positionOptions: {
                enableHighAccuracy: true
            },
            trackUserLocation: true
        });
    //adding user location button to map
    map.addControl(userloc,'top-left');

//navigation controls
    map.addControl(new mapboxgl.NavigationControl(),'top-left');

//change map style
    $('input:radio[name=rtoggle]').on('change',function(){
        name=$('input:radio[name=rtoggle]:checked').val();
        map.setStyle('mapbox://styles/mapbox/' +name);
    });

//popup user location 
    $('.mapboxgl-ctrl-group').on('click',function(){
        var popup = new mapboxgl.Popup({ closeOnClick: true })
            .setLngLat(coord[0])
            .setHTML('<span>You are here!</span>')
            .addTo(map);
    });
  </script>
  {{-- firebase integration --}}
  <script>
    // get driver start marker
    
    

//get dumspters location
var dump_popups=[];
    database.ref('dumpsters').once('value', function(snapshot){
        snapshot.forEach(function(idSnapshot){
            dump_popups[idSnapshot.val().dumpster_id]= new mapboxgl.Popup({ closeOnClick: false })
            .setLngLat([idSnapshot.val().longitude, idSnapshot.val().latitude])
            .setHTML('<span><i class="fas fa-dumpster"></i>: '+idSnapshot.val().landmark+'</span>')
            .addTo(map);
        });
    });
//get driver fleet realtime
// var startla=[];  
    map.on('load', function () {
        database.ref('drivers/'+collector).on('value', function(snapshot){
            if(snapshot.val().active==1){
                markers.setLngLat([snapshot.val().longitude, snapshot.val().latitude]);
                startla.push([snapshot.val().longitude, snapshot.val().latitude]);

                if (map.getLayer("route"+snapshot.val().driver_id)!=null) {
                    map.removeLayer("route"+snapshot.val().driver_id);
                }
                if (map.getSource("route"+snapshot.val().driver_id)) {
                        map.removeSource("route"+snapshot.val().driver_id);
                }

                map.addSource('route'+snapshot.val().driver_id, {
                    'type': 'geojson',
                    'data': {
                        'type': 'Feature',
                        'properties': {},
                        'geometry': {
                            'type': 'LineString',
                            'coordinates': startla
                        }
                    }
                });
                // if (map.getLayer("route")!=null) {
                //     map.removeLayer("route");
                // }
                map.removeLayer('route'+snapshot.val().driver_id);
                    map.addLayer({
                        'id': 'route'+snapshot.val().driver_id,
                        'type': 'line',
                        'source': 'route'+snapshot.val().driver_id,
                        'layout': {
                        'line-join': 'round',
                        'line-cap': 'round'
                            },
                    'paint': {
                        'line-color': '#888',
                        'line-width': 8
                    }
                    });
            }else{
                map.removeLayer('route'+snapshot.val().driver_id);
            }
        });     
    });
    </script>
@endsection