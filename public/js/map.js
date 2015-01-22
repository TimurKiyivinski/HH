/* *
 * This file will be used to populate
 * data in the maps page
 * */

// Default user location
var user_location = [];
user_location['lat'] = -1;
user_location['long'] = -1;

var userMap;
var myDestination;
var directionsService;
var directionsDisplay;
var enableNav;

// Different pointers for different areas, $area - 1
var mapPointers = [];
mapPointers[0] = "http://www.google.com/mapfiles/ms/micons/blue-dot.png";
mapPointers[1] = "http://www.google.com/mapfiles/ms/micons/red-dot.png";
mapPointers[2] = "http://www.google.com/mapfiles/ms/micons/purple-dot.png";
mapPointers[3] = "http://www.google.com/mapfiles/ms/micons/yellow-dot.png";
mapPointers[4] = "http://www.google.com/mapfiles/ms/micons/green-dot.png";
mapPointers[5] = "http://www.google.com/mapfiles/ms/micons/ltblue-dot.png";
mapPointers[6] = "http://www.google.com/mapfiles/ms/micons/pink-dot.png";
mapPointers[7] = "http://www.google.com/mapfiles/ms/micons/red-dot.png";
mapPointers[8] = "http://www.google.com/mapfiles/ms/micons/range-dot.png";

/* *
 * Check for geolocation support &
 * handles support and error functions
 */
function tryGeoLocation(enable_navigation){
    enableNav = enable_navigation;
    // Check for geolocation support
    if (navigator.geolocation)
        navigator.geolocation.getCurrentPosition(getUserLocation, errorLocation);
}

/* *
 * Gets the user's current location
 * */
function getUserLocation(location)
{
    console.log('Getting location');
    
    user_location['lat'] = location.coords.latitude;
    user_location['long'] = location.coords.longitude;
    
    // Logging
    console.log('User location:');
    console.log(user_location['lat']);
    console.log(user_location['long']);
    
    if (enableNav == 0)
        enableUserMarker();
    else
        enableNavigation();
}

/* *
 * Enables a marker for the user's current location
 * */
function enableUserMarker()
{
    // User location
    var myStart = new google.maps.LatLng(user_location['lat'], user_location['long']);

    // Create a marker at the user
    var userMarker = new google.maps.Marker({
        position: myStart,
        map: userMap,
        icon: mapPointers[0],
        title: 'You are here',
        animation: google.maps.Animation.DROP
    });

    // Assign the marker to a map
    userMarker.setMap(userMap);
}

/* *
 * Enables navigation functionality on the map
 */
function enableNavigation(location){

    directionsDisplay.setMap(userMap);

    // User location
    var myStart = new google.maps.LatLng(user_location['lat'], user_location['long']);

    // Make a route
    calcRoute(myStart, myDestination);
}

/* *
 * Alerts the user that the navigation failed
 */
function errorLocation(){
    console.log('An error has occured.');
    alert('Error getting location!');
}

function calcRoute(origin, destination) {
    userMap.setCenter(origin);
    var myStyle = google.maps.TravelMode.WALKING;
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
function load_locations(call_url, go_url, map, dest_lat, dest_long) {
    var locations;

    var enableNavigation = (dest_lat == -1 || dest_long == -1) ?
        0 : 1;

    var areaID = parseInt(call_url.substr(call_url.length - 1));

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
                var myPlace = new google.maps.LatLng(locations[i][0]['latitude'], locations[i][0]['longitude']);

                // Create a marker at the place
                var myMarker = new google.maps.Marker({
                    position: myPlace,
                    map: map,
                    icon: mapPointers[areaID + 1],
                    title: locations[i]['name'],
                    animation: google.maps.Animation.DROP
                });

                // Assign the place to a map
                myMarker.setMap(map);
                with ({ goto_url: go_url, place: locations[i]}) {
                    google.maps.event.addListener(myMarker, 'click', function() {
                        window.location = goto_url + '/' + place[0]['place_id'];
                    });
                }

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
