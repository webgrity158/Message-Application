import angular from 'angular';
import { route } from 'ziggy-js';
import { Ziggy } from './ziggy';
const app = angular.module('nodeProjectApp', []);
app.config(function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

app.controller('SocketHomeController', ['$scope', '$rootScope', '$http', '$timeout', function ($scope, $rootScope, $http, $timeout) {
    $scope.inbox_messages = {};
    $scope.all_messages =  [];
    $scope.groups = [];
    $scope.unreads = [];
    $scope.active_page = 'all';
    $scope.is_default_screen = 1;
    $scope.chat_type = 'personal';  
    $scope.active_inbox_id = '';
    $scope.inbox = {
        'user_name': '',
        'user_id': '',
        'user_avatar': '',
        'messages': [],
        'type': '',
    }

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
            $scope.all_messages = payload.messages?.all_messages ?? [];
            $scope.groups = payload.messages?.groups ?? [];
            $scope.unreads = payload.messages?.unreads ?? [];
            $scope.inbox_messages = $scope.all_messages;
        }, function (error) {
            console.error(error);
        })
    };

    $scope.changePage = function(page) {
        $scope.active_page = page;
        if(page == 'all') {
            $scope.inbox_messages = $scope.all_messages;
        } else if(page == 'groups') {
            $scope.inbox_messages = $scope.groups;
        } else {
            $scope.inbox_messages = $scope.unreads;
        }
    };

    $scope.openInbox = function(message) {
        $scope.chat_type = message.type == 2 ? 'groups' : 'personal';
        $scope.is_default_screen = 0;
        $scope.active_inbox_id = message.inbox_id;

        $scope.inbox = {
            'name': message.name,
            'id': message.user_id,
            'avatar': message.avatar,
            'type': message.type == 2 ? 'groups' : 'personal',
        }
        var url = route('home.inboxData', {}, false, Ziggy);

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
            $scope.all_messages = payload.messages?.all_messages ?? [];
            $scope.groups = payload.messages?.groups ?? [];
            $scope.unreads = payload.messages?.unreads ?? [];
            $scope.inbox_messages = $scope.all_messages;
        }, function (error) {
            console.error(error);
        })
    }

}]);

export default app;
