angular.module('ttaControllers', [])

.controller('mainController', function ($scope, $http, $location) {
    $scope.items = [];
    
    location = '#home';  // Go back to home on refresh
    
    $scope.items[0] = { link : "home", caption : "Home" };
    $scope.items[1] = { link : "sponsorship", caption : "Sponsorship" };
    $scope.items[2] = { link : "culturalRegistration", caption : "Cultural Registration" };
    $scope.items[3] = { link : "memberRegistration", caption : "Member Registration" };
    $scope.items[4] = { link : "tbd", caption : "Events" };
    $scope.items[5] = { link : "aboutus", caption : "About Us" };
    $scope.items[6] = { link : "vision", caption : "Our Vision" };
    $scope.items[7] = { link : "contact", caption : "Contact" };
    
    $scope.active = $scope.items[0]; // for onload first element active
    $scope.activate = function (item) {
        $scope.active = item;
    };

    $http.get('../server/ads.php').success(function(data) {
          $scope.ads = data;
    });
})

.controller('homeController', function($scope) {
    $scope.myInterval = 3500;
    $scope.slides = [
      { image: '../resources/images/Diwali 2016.jpg'  }
      // ,{ image: '../resources/images/score.JPG'  }
    ];
})

.controller('culturalRegController', function($scope, $http) {
    $scope.resetValues = function() {
        $scope.cultural = {};
        $scope.cultural.typeofevent = 'Dancing';
    };
    $scope.resetValues();
    $scope.form = true;
    $scope.submitCulturalRegistration = function () {
        $http({
            method: 'POST',
            url: '../server/culturalRegistration.php',
            data: $scope.cultural,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function (data) {
            $scope.message = data.data;
        }, function () {
            $scope.message = "Error while registering, please send details to cultural@troytelugu.org"
        });
        $scope.form = false;
    };
})

.controller('contactController', function($scope, $http) {
    $scope.contact = {};
    $scope.sendContact = function () {
        $http({
            method: 'POST',
            url: '../server/contact.php',
            data: $scope.contact,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function (data) {
            $scope.message = data.data;
        }, function () {
            $scope.message = "Error while registering, please send details to cultural@troytelugu.org"
        });
        $scope.form = false;
    };
})

.controller('memberRegController', function($scope, $http) {
    $scope.member = {};
    $scope.childernOption = [
        { value:0, opt:"None" },
        { value:1, opt:"1 - One" },
        { value:2, opt:"2 - Two" },
        { value:3, opt:"3 - Three" },
        { value:4, opt:"4 - Four" },
        { value:5, opt:"5 - Five" }
    ];
    $scope.member.noOfChildren = 0;

    $scope.memberRegistration = function () {
        $http({
            method: 'POST',
            url: '../server/memberRegistration.php',
            data: $scope.member,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function (data) {
            $scope.message = data.data;
        }, function () {
            $scope.message = "Error while registering, please send details to cultural@troytelugu.org"
        });
        $scope.form = false;
    };
});
