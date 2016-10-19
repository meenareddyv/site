angular.module('ttaDirectives', [])

.directive('ttaHeader', function() {
    return {
        restrict: 'E',
        templateUrl: '../views/header.html'
    };
})

.directive('ttaScroller', function() {
    return {
        restrict: 'E',
        templateUrl: '../views/scroll.html'
    };
})

.directive('ttaFooter', function() {
    return {
        restrict: 'E',
        templateUrl: '../views/footer.html'
    };
});