'use strict';

var angular = require('angular');

var app = angular.module('app', []);

require('./controllers')(app);
require('./services')(app);
require('./directives')(app);