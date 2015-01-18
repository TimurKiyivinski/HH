/* *
 * This file will be used to populate
 * data in the maps page
 * */

// Default user location
var user_location = [];
user_location['lat'] = -1;
user_location['long'] = -1;

var userMap;
var myStyle;
var myDestination;
var directionsService;
var directionsDisplay;

/* *
 * Check for geolocation support &
 * handles support and error functions
 */
function tryGeoLocation(clickStyle){
    if (clickStyle == 'walk'){
        myStyle = google.maps.TravelMode.WALKING;
    } else {
        myStyle = google.maps.TravelMode.DRIVING; 
    }
    // Check for geolocation support
    if (navigator.geolocation)
        navigator.geolocation.getCurrentPosition(enableNavigation, errorNavigation);
}

/* *
 * Enables navigation functionality on the map
 */
function enableNavigation(location){
    console.log('Getting location');
    // Get latitude & longitude
    user_location['lat'] = location.coords.latitude;
    user_location['long'] = location.coords.longitude;

    directionsDisplay.setMap(userMap);

    // Logging
    console.log('User location:');
    console.log(user_location['lat']);
    console.log(user_location['long']);

    // User location
    var myStart = new google.maps.LatLng(user_location['lat'], user_location['long']);

    // Make a route
    calcRoute(myStart, myDestination, myStyle);
}

/* *
 * Alerts the user that the navigation failed
 */
function errorNavigation(){
    console.log('An error has occured.');
}

function calcRoute(origin, destination) {
    //var selectedMode = document.getElementById("mode").value;
    var request = {
        origin: origin,
        destination: destination,
        travelMode: myStyle
    };
    directionsService.route(request, function(response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
        }
    });
}

/* *
 * Returns an array of JSON data
 * @param int, area
 * */
function load_locations(call_url, map, dest_lat, dest_long) {
    var locations;

    var enableNavigation = (dest_lat == -1 || dest_long == -1) ?
        0 : 1;

    // JQuery AJAX call
    $.ajax({
        url: call_url,
        dataType: 'json',
        success: function(response) {
            // Set locations as the returned JSON
            locations = response;
            console.log('Received JSON data');
            
            userMap = map;

            // Add the markers
            for (var i = 0; i < locations.length; i++){
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

                // Check if this marker is intended for navigation
                if (enableNavigation == 1){
                    console.log('Navigation enabled.');
                    if (locations[i][0]['latitude'] == dest_lat && locations[i][0]['longitude'] == dest_long){
                        console.log('Destination acquired.');
                        myDestination = myPlace;
                    }
                }
            }

            if (enableNavigation == 1){
                // Direction services
                directionsService = new google.maps.DirectionsService();
                directionsDisplay = new google.maps.DirectionsRenderer();
            }
        }
    });
    return locations;
}
