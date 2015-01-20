<html>
<head>
    <?=$head?>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8a5UQ6-o8U8ftyBe5AuSUuAq-4kRH01c">
    </script>
    <script type="text/javascript" src="<?=base_url('public/js/jquery-2.1.1.js')?>"></script>
    <script type="text/javascript" src="<?=base_url('public/js/map.js')?>"></script>
    <script type="text/javascript">
    // Initializes the map
    function initialize() {
        var mapOptions = {
            // TODO: Pressing the address in detail view will be the default center
        center: { lat: <?=$latitude?>, lng: <?=$longitude?>},
                zoom: <?=$zoom?>
        };
        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        //var areas = <?=json_encode($area_array)?>;
        // Load locations onto the map
        <?php
        foreach ($area_array as &$area_loop){
            $area_id = $area_loop['id'];
            $site_addr = json_encode(site_url('map/get_places/'.$area_id));
            echo "load_locations($site_addr, map, $latitude, $longitude);";
        }
        ?>
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
    <!--Navigation title-->
    <div class=" details-title bg-primary" style="display: <?=$display?>">
        <div class="bg-primary">
        Navigate
        </div>
    </div>
    <!--Navigation content-->
    <div style="display: <?=$display?>">
        <button class="btn btn-success btn-block" onclick="tryGeoLocation('walk')" >Walk</button>
        <button class="btn btn-info btn-block" onclick="tryGeoLocation('drive')" >Drive</button>
    </div>
    <?=$navbar?>
</body>
</html>
