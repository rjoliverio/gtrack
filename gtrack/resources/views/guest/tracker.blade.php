@extends('layouts.guest_master')

@section('title')
    GTrack | Track Collector
@endsection

@section('css')
<script src='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css' rel='stylesheet' />
<link href={{asset('css/map-css.css')}} rel="stylesheet">

@endsection

@section('content')
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
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.js"></script>
    <link
        rel="stylesheet"
        href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.css"
        type="text/css"
    />
    {{-- for directions --}}

    {{-- for geocoder --}}
    {{-- <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.min.js"></script>
    <link
    rel="stylesheet"
    href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.css"
    type="text/css"
    /> --}}

    <!-- Promise polyfill script required to use Mapbox GL Geocoder in IE 11 -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script> --}}
    {{-- for geocoder --}}

    <div id='map' style='width:100%; height:100%;'></div>

@endsection

@section('scripts')
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
      zoom:10
    });
//driving direction
map.addControl(
    new MapboxDirections({
        accessToken: mapboxgl.accessToken
    }),
    'top-left'
);
// //geocoder/search bar
//     map.addControl(
//         new MapboxGeocoder({
//             accessToken: mapboxgl.accessToken,
//             mapboxgl: mapboxgl
//         }),'top-left'
//     );
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
        if(name=="satellite-v9"){
            $('#menu > label').css('color', 'white');
        }else{
            $('#menu > label').css('color', '#212529');
        }
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
    var markers=[];
    var truckIcon=[];
    var startla=[];
    database.ref('drivers').once('value', function(snapshot){
        var count=0;
        snapshot.forEach(function(idSnapshot){
            startla[idSnapshot.val().driver_id]=[];
            truckIcon[idSnapshot.val().driver_id]= document.createElement('div');
            truckIcon[idSnapshot.val().driver_id].classList.add("truckIcon");
            if(idSnapshot.val().active!=0){
                markers[idSnapshot.val().driver_id]=new mapboxgl.Marker(truckIcon[idSnapshot.val().driver_id], {
                        anchor: 'bottom',
                        offset: [0, 6]
                    })
                    .setLngLat([idSnapshot.val().longitude, idSnapshot.val().latitude])
                    .addTo(map);
            }else{
                count++;
            }
        });
        if(count==3){
            alert("No Collection Schedule Today!");
        }
    });

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
    map.on('load', function () {
        database.ref('drivers').on('value', function(snapshot){
            snapshot.forEach(function(idSnapshot){
                markers[idSnapshot.val().driver_id].setLngLat([idSnapshot.val().longitude, idSnapshot.val().latitude]);
                startla[idSnapshot.val().driver_id].push([idSnapshot.val().longitude, idSnapshot.val().latitude]);
                
                // console.log(startla);
                // start=[];
                // start.push()
                if (map.getLayer("route"+idSnapshot.val().driver_id)!=null) {
                    map.removeLayer("route"+idSnapshot.val().driver_id);
                }
                if (map.getSource("route"+idSnapshot.val().driver_id)) {
                        map.removeSource("route"+idSnapshot.val().driver_id);
                }

                map.addSource('route'+idSnapshot.val().driver_id, {
                    'type': 'geojson',
                    'data': {
                        'type': 'Feature',
                        'properties': {},
                        'geometry': {
                            'type': 'LineString',
                            'coordinates': startla[idSnapshot.val().driver_id]
                        }
                    }
                });
                // if (map.getLayer("route")!=null) {
                //     map.removeLayer("route");
                // }
                map.removeLayer('route'+idSnapshot.val().driver_id);
                    map.addLayer({
                        'id': 'route'+idSnapshot.val().driver_id,
                        'type': 'line',
                        'source': 'route'+idSnapshot.val().driver_id,
                        'layout': {
                        'line-join': 'round',
                        'line-cap': 'round'
                            },
                    'paint': {
                        'line-color': '#888',
                        'line-width': 8
                    }
                    });
                
            });
        });     
    });
    </script>
@endsection