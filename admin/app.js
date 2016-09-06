/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var app = angular.module('myApp', [])
      
.controller('customersCtrl', function($scope, $http) {
   $scope.total = 0;
   $scope.payments = {};
   $scope.events = { "Tennis (Senior)":0, "Tennis (Junior)":0, "Throwball":0, "Volleyball":0 };
   $scope.rowHeader = [];
   $scope.rowHeader['All'] = [ '#', 'Reg Id', 'Captain', 'Contact#', 'Email ID', 'Event', 'Category', 'Fee', 'Status' ];
   $scope.rowHeader['Fee Receipt'] = ['#', 'Payment Status', 'Amount'];
   $scope.rowHeader['Event tally'] = ['#', 'Event', 'Entries'];
   $scope.report = 'All';
    $http.get("api_sports.php")
   .then(function (response) {
       $scope.rows = response.data;
       angular.forEach($scope.rows, function(value, key) {
           $scope.total = $scope.total + Number(value[6]);
           if ( isNaN($scope.payments[value[7]]) )
               $scope.payments[value[7]] = 0;
           $scope.payments[value[7]] += Number(value[6]);
           var key = value[4];
           if ( key === "Tennis" )
               key += " (" + value[5] + ")"
           $scope.events[key]++;
       });
       console.log("Total is " + $scope.total);
   });
});
