<html>
<head>
    <?=$head?>
    <?=$js?>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8a5UQ6-o8U8ftyBe5AuSUuAq-4kRH01c">
    </script>
    <script type="text/javascript" src="<?=base_url('public/js/map.js')?>"></script>
    <script type="text/javascript">
    // Initializes the map
    function initialize() {
        var mapOptions = {
                center: { lat: <?=$latitude?>, lng: <?=$longitude?>},
                zoom: <?=$zoom?>
        };
        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        // Load locations onto the map
        <?php
if ($enable_navigation == 0)
{
    foreach ($area_array as &$area_loop){
        $area_id = $area_loop['id'];
        $site_addr = json_encode(site_url($href['ajax']['map'].'/'.$area_id));
        $go_url = json_encode(site_url($href['places']['details']));
        echo "load_locations($site_addr, $go_url, map, $latitude, $longitude);";
    }
}
else
{
        $site_addr = json_encode(site_url($href['ajax']['nav'].'/'.$place_id));
        $go_url = json_encode(site_url($href['places']['details']));
        echo "load_locations($site_addr, $go_url, map, $latitude, $longitude);";
}
        ?>
    }
    google.maps.event.addDomListener(window, 'load', initialize);
    tryGeoLocation(<?=$enable_navigation?>);
    </script>
</head>
<body>
    <?=$banner?>
        <div class="container">
        <!--Title-->
        <div class="curved-title">
            <div>Maps</div>
        </div>
        <!--Map-->
        <div id="map-canvas" class="map-canvas"></div>
    </div>
    <?=$navbar?>
</body>
</html>
