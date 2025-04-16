<!-- resources/views/map.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Street View Directions</title>
<script async
        src="https://maps.googleapis.com/maps/api/js?key="Your_Api_Key"&libraries=places&loading=async&callback=initMap">
</script>

    <style>
        #map, #pano { height: 400px; width: 100%; }
    </style>
</head>
<body>
    <input id="destination" type="text" placeholder="Enter destination" />
    <button onclick="calculateRoute()">Get Directions</button>
    
    <div id="map"></div>
    <div id="pano"></div>

    <script>
    let map, directionsService, directionsRenderer, panorama;

    window.initMap = function () {
        directionsService = new google.maps.DirectionsService();
        directionsRenderer = new google.maps.DirectionsRenderer();

        navigator.geolocation.getCurrentPosition(function(position) {
            const origin = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };

            map = new google.maps.Map(document.getElementById("map"), {
                center: origin,
                zoom: 14
            });

            directionsRenderer.setMap(map);

            panorama = new google.maps.StreetViewPanorama(
                document.getElementById("pano"),
                { position: origin, pov: { heading: 165, pitch: 0 }, zoom: 1 }
            );

            map.setStreetView(panorama);
        });
    }
</script>

</body>
</html>
