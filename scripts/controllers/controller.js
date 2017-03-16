angular.module('ttaControllers', [])

.controller('mainController', function ($scope, $http, $location, $window) {
    $scope.items = [];
    
    location = '#home';  // Go back to home on refresh
    
    var i = 0;
    $scope.items[i++] = { link : "home", caption : "Home" };
    $scope.items[i++] = { link : "sponsorship", caption : "Sponsorship" };
    // $scope.items[i++] = { link : "culturalRegistration", caption : "Cultural Registration" };
    $scope.items[i++] = { link : "memberRegistration", caption : "Member Registration" };
    $scope.items[i++] = { link : "events", caption : "Events" };
    $scope.items[i++] = { link : "aboutus", caption : "About Us" };
    $scope.items[i++] = { link : "vision", caption : "Our Vision" };
    $scope.items[i++] = { link : "contact", caption : "Contact" };
    
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
      { image: '../resources/images/ugadi2017_1.jpg'  }
     // ,{ image: '../resources/videos/teaser001.mp4'  }
    ];
})

.controller('culturalRegController', function($scope, $http) {
    $scope.resetValues = function() {
        $scope.cultural = {};
        $scope.cultural.typeofevent = 'Dancing';
    };
    $scope.resetValues();
    // $scope.form = true;
    $scope.form = false;
    $scope.message = "Enrollments for Deepavali have been closed, in case of any questions please write an email to cultural@troytelugu.org";
    $scope.submitCulturalRegistration = function () {
        $http({
            method: 'POST',
            url: '../server/culturalRegistration.php',
            data: $scope.cultural,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function (data) {
            $scope.message = data.data;
            $scope.form = false;
        }, function () {
            $scope.message = "Error while registering, please send details to cultural@troytelugu.org"
            $scope.form = false;
        });
    };
})

.controller('contactController', function($scope, $http) {
    $scope.contact = {};
    $scope.message = "";
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
    };
})

.controller('eventController', function($scope, $http) {
    $scope.photos = [];
    $scope.events = [];
    $scope.showPics = false;
    
    $http({
        method: 'GET',
        url: '../server/imgFiles.php',
        params: {folder : 'events'},
        headers: {'Content-Type': 'application/x-www-form-urlencoded'}
    }).then(function (data) {
        $scope.photos = [];
        angular.forEach(data.data, function(value) {
            $scope.events.push({event: value, desc: value.replace(/_/g,' ')});
        });
    }, function () {
        $scope.message = "Error while getting images, please check back later!";
    });
    
    $scope.displayEventPics = function(event) {
        $scope.showPics = false;
        $http({
            method: 'GET',
            url: '../server/imgFiles.php',
            params: {folder : 'events/' + event},
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function (data) {
            $scope.photos = [];
            angular.forEach(data.data, function(value) {
                $scope.photos.push({ src: '../resources/images/events/' + event + "/" + value, desc: value});
            });
            $scope.showPics = true;
        }, function () {
            $scope.message = "Error while getting images, please check back later!";
        });
    };
})

.controller('memberRegController', function($scope, $http) {
    $scope.member = {};
    $scope.message = "";
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
            $scope.message = "Error while registering, please send details to cultural@troytelugu.org";
        });
        $scope.form = false;
    };
});
