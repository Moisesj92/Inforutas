'use strict';

/*
* AppCtrl
*/
module.exports = ['$scope', '$http', '$timeout', 'GoogleMaps',
  function($scope, $http, $timeout, google) {
    
  $scope.routes = {};

  // Init google maps with the zoom set at 13 and center in Maracay
  $scope.zoom = 13;
  $scope.center = [10.245309, -67.5959691];

  $http.get('/data/routes.json').success(function(busRoutes) {
    $scope.routes = busRoutes;
  });

  $scope.changeRoute = function(route) {
    $scope.showMenu = false;

    $timeout(function() {
      $scope.from = route.from.coor;
      $scope.to = route.to.coor;
      $scope.waypoints = route.waypoints;
    }, 200);

  };

  $scope.toggleMenu = function() {
    $scope.showMenu = !$scope.showMenu;
  };

}];