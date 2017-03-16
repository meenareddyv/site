'use strict';
angular.module('ttaApp', [
    'ngRoute',
    'ttaControllers',
    'ttaDirectives',
    'ui.bootstrap',
    'ngAnimate',
    'ngTouch'    
])

.config(function($routeProvider) {
    $routeProvider
        .when('/', { redirectTo: '/home'})
        .when('/home', {templateUrl : '../views/home.html'})
        .when('/sponsorship', {templateUrl : '../views/sponsorship.html'})
        .when('/culturalRegistration', {templateUrl : '../views/culturalRegForm.html'})
        .when('/memberRegistration', {templateUrl : '../views/memberRegForm.html'})
        .when('/events', {templateUrl : '../views/events.html'})
        .when('/aboutus', {templateUrl : '../views/about.html'})
        .when('/vision', {templateUrl : '../views/vision.html'})
        .when('/contact', {templateUrl : '../views/contactForm.html'})
        .otherwise({redirectTo: '/'});
});