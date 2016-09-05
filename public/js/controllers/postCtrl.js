angular.module('postCtrl', [])

    // inject the orderItem service into our controller
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

        $scope.latest = function() {
            $scope.selectedSorting = $scope.latest;
            postService.getLatestPosts()
                .success(function (data) {
                    $scope.posts = data;
                });
        };

        $scope.all = function() {
            $scope.selectedSorting = $scope.all;
            postService.getAllPosts()
                .success(function (data) {
                    $scope.posts = data;
                });
        };

        $scope.random = function() {
            $scope.selectedSorting = $scope.random;
            postService.getRandomPosts()
                .success(function (data) {
                    $scope.posts = data;
                });
        };

        $scope.selectedSorting = $scope.latest;
    });