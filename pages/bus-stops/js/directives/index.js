'use strict';

/*
* Expose all Directives
*/
module.exports = function(app) {
  
  app.directive('googleMap', require('./GoogleMaps'));
  
};