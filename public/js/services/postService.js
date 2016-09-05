angular.module('postService', [])

    .factory('postService', function ($http) {

        return {
            getLatestPosts: function()
            {
                return $http.get('/post?order=latest');
            },
            getRandomPosts: function()
            {
                return $http.get('/post?order=random');
            },
            getAllPosts: function () {
                return $http.get('/post');
            },
            get: function (postId) {
                return $http.get('/post/' + postId);
            },
            sendPost: function (author, content) {
                return $http({
                    method: 'POST',
                    url: '/post',
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    data: $.param({'author': author, 'content': content})
                });
            }
        }

    });
