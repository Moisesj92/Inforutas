'use strict';

/*
* Expose all Providers
*/
module.exports = function(app) {
  
  app.factory('GoogleMaps', require('./GoogleMaps'));
  
};