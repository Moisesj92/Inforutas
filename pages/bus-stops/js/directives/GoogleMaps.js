'use strict';

/*
* googleMap | google-map 
*
* Directive for the google map object
*/
module.exports = ['GoogleMaps', function(google) {

  var directionsService;
  var directionsDisplay;

  return {
    retrict: 'E',
    template: '<div id="map-canvas"></div>',
    link: function(scope, el, attrs) {
      google.maps.event.addDomListener(window, 'load', function() { 
        initMap(el, attrs); 
      });
      scope.$watchGroup(['from', 'to', 'waypoints'], function(newVal, oldVal) {
        if(newVal[0] && newVal[1]) {
          refreshRoute(newVal[0], newVal[1], newVal[2]);
        }
      });
    }
  };

  /*
  * initMap
  */
  function initMap(el, attrs) {
    directionsService = new google.maps.DirectionsService();
    directionsDisplay = new google.maps.DirectionsRenderer();
    var center = JSON.parse(attrs.center);
    var mapOptions = {
      zoom: parseInt(attrs.zoom, 10),
      center: new google.maps.LatLng(center[0], center[1])
    };

    var map = new google.maps.Map(el[0].children[0], mapOptions)
    directionsDisplay.setMap(map);
  }

  /*
  * refreshRoute
  * Whenever there's a change in route this method is called
  * thus mapping the new route
  */
  function refreshRoute(from, to, waypoints) {
    for (var i = waypoints.length - 1; i >= 0; i--) {
      waypoints[i] = {
        location: new google.maps.LatLng(waypoints[i][0], waypoints[i][1]),
        stopover: true
      };
    };
    var request = {
      origin: new google.maps.LatLng(from[0], from[1]),
      destination: new google.maps.LatLng(to[0], to[1]),
      travelMode: google.maps.TravelMode.DRIVING,
      waypoints: waypoints || []
    };
    directionsService.route(request, function(result, status) {
      result.routes[0].legs.forEach(function(leg) {
        console.log('Start: ' + leg.start_address);
        console.log('End: ' + leg.end_address);
        console.log('Duration:' + leg.duration.text);
        console.log('=====');
      });
      if (status == google.maps.DirectionsStatus.OK) {
        directionsDisplay.setDirections(result);
      }
    });
  }
  
}];