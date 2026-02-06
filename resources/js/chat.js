import angular from 'angular';
import { route } from 'ziggy-js';
import { Ziggy } from './ziggy';
const app = angular.module('nodeProjectApp', []);
app.config(function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

app.controller('SocketHomeController', ['$scope', '$rootScope', '$http', '$timeout', function ($scope, $rootScope, $http, $timeout) {
    $scope.messages = {
        "all_messages": [],
        'groups': [],
        "unreads": []
    };
    $scope.active_page = 'single-discussion';

    $scope.init = function() {
        var url = route('home.index', {}, false, Ziggy);
        $http({
			url: url,
			ignoreLoadingBar: true,
			method: "POST",
			timeout: 30000,
			headers: { "Content-Type": "application/x-www-form-urlencoded" },
		}).then(
        function(response) {
            console.log(response.data);
            const payload = response.data?.data ?? {};
            $scope.messages.all_messages = payload.messages?.all_messages ?? [];
            $scope.messages.groups = payload.messages?.groups ?? [];
            $scope.messages.unreads = payload.messages?.unreads ?? [];
            $scope.active_page = payload.active_page ?? $scope.active_page;
            console.log($scope.messages);
        }, function (error) {
            console.error(error);
        })
    };
}]);

export default app;
