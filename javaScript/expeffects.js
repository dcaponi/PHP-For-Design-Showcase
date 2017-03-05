var app = angular.module('picApp', []);
app.controller('picAppCtrl', ['$scope', function($scope) {
    $scope.headText = "Our History";
    $scope.bgPic = {
            background: 'url(../Images/blue.jpg)'
        };
    
    $scope.bgPicTic = {
            background: 'url(../Images/city.jpg)'
        };
    
    $scope.Pic1 = function() {
        $scope.bgPic = {
            background: 'url(../Images/outside.jpg)'
        };
        $scope.headText = "Park Events";
    };
    $scope.Pic2 = function() {
        $scope.bgPic = {
            background: 'url(../Images/city-min.jpg)'
        };
        $scope.headText = "Intriguing Geology";
    };
    $scope.Pic3 = function() {
        $scope.bgPic = {
            background: 'url(../Images/yi.jpg)'
        };
        $scope.headText = "Vibrant Customs";
    };
    $scope.PicA = function() {
        $scope.bgPic = {
            background: 'url(../Images/blue.jpg)'
        };
        $scope.headText = "Our History";
    };

}]);


