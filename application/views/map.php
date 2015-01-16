<html>
<head>
    <?=$head?>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8a5UQ6-o8U8ftyBe5AuSUuAq-4kRH01c">
    </script>
    <script type="text/javascript">
    // TODO: Use AJAX to get this data instead
    function getJSON(area) {
        var location1 = {
            "name" : "hell",
            "longitude" : 110.344055,
            "latitude" : 1.556316
        }
        var location2 = {
            "name" : "hello",
            "longitude" : 110.344155,
            "latitude" : 1.557316
        }
        var locations = [location1, location2];
        return locations;
    }
    // Initializes the map
    function initialize() {
        var mapOptions = {
            // TODO: Pressing the address in detail view will be the default center
            center: { lat: 1.557316, lng: 110.344155},
            zoom: 24
        };
        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        // Get locations
        var locations = getJSON(<?=json_encode($area)?>);
        for (var i = 0; i < locations.length; i++)
        {
            // Create a new place
            var myPlace = new google.maps.LatLng(locations[i]['latitude'],locations[i]['longitude']);
            // Create a marker at the place
            var myMarker = new google.maps.Marker({
                position: myPlace,
                map: map,
                title: locations[i]['name']
            });
            // Assign the place to a map
            myMarker.setMap(map);
        }
    }
    google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</head>
<body>
    <?=$banner?>
    <!--Title-->
    <div class="curved-title">
        <div>Maps</div>
    </div>
    <!--Map-->
    <div id="map-canvas" class="map-canvas"></div>
    <?=$navbar?>
</body>
</html>
