var post = angular.module('post', ['postCtrl', 'postService']), function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });