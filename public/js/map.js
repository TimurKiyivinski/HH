/* *
 * This file will be used to populate
 * data in the maps page
 * */

/* *
 * Returns an array of JSON data
 * @param int, area
 * */
function load_locations(call_url, map) {
    var locations;

    // JQuery AJAX call
    $.ajax({
        url: call_url,
        dataType: 'json',
        success: function(response) {
            locations = response;
            for (var i = 0; i < locations.length; i++)
            {
                // Create a new place
                var myPlace = new google.maps.LatLng(locations[i][0]['latitude'],locations[i][0]['longitude']);
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
    });
    return locations;
}
