angular.module('postCtrl', [])
    .controller('postController', function ($scope, $http, postService) {
        $scope.posts = [];

        $scope.author = "";

        $scope.content = "";

        $scope.sendPost = function () {
            postService.sendPost($scope.author, $scope.content)
                .success(function (data) {
                    $scope.posts = $scope.selectedSorting();
                });
        };

        $scope.latest = function () {
            $scope.selectedSorting = $scope.latest;
            postService.getLatestPosts()
                .success(function (data) {
                    $scope.posts = data;
                });
        };

        $scope.all = function () {
            $scope.selectedSorting = $scope.all;
            postService.getAllPosts()
                .success(function (data) {
                    $scope.posts = data;
                });
        };

        $scope.random = function () {
            $scope.selectedSorting = $scope.random;
            postService.getRandomPosts()
                .success(function (data) {
                    $scope.posts = data;
                });
        };

        $scope.selectedSorting = $scope.latest;
        $scope.selectedSorting();
    })
.directive('postDate', function() {
   return function ($scope, element, attrs) {
       $scope.$watch(attrs.postDate, function(value){
           element.text(value.date.replace(/\.[0-9]+/, ''));
       });
   }
});