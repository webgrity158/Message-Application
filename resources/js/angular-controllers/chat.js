import { nodeProjectApp as app } from './module';
import { route } from 'ziggy-js';
import { Ziggy } from '../ziggy';

const getCsrfToken = () => {
    const meta = document.querySelector('meta[name="csrf-token"]');
    return meta?.getAttribute('content') ?? window.nodeProjectConfig?.csrfToken;
};

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
        'name': '',
        'id': '',
        'avatar': '',
        'messages': [],
        'type': '',
    }
    $scope.user_id = window.authUser?.id ?? 0;
    $scope.user_name = window.authUser?.name ?? "dummy";
    $scope.user_avatar = window.authUser?.avatar ?? "https://cdn-icons-png.flaticon.com/512/3177/3177440.png ";
    $scope.is_new_chat_window_active = 0;

    $scope.init = function() {
        const url = route('back-end.home.initData', {}, false, Ziggy);
        $http({
			url: url,
			ignoreLoadingBar: true,
			method: "POST",
			timeout: 30000,
			headers: {
				"Content-Type": "application/x-www-form-urlencoded",
				"X-CSRF-TOKEN": getCsrfToken(),
			},
		}).then(
        function(response) {
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

        const inboxUserId = message.user_id ?? message.id;
        $scope.inbox = {
            'name': message.name,
            'id': inboxUserId,
            'avatar': message.avatar,
            'type': message.type == 2 ? 'groups' : 'personal',
        }
        const url = route('back-end.home.inboxData', {}, false, Ziggy);
        const payload = new URLSearchParams();
        payload.append('user_id', inboxUserId);
        payload.append('type', message.type ?? '1');
        $http({
			url: url,
			ignoreLoadingBar: true,
			method: "POST",
			timeout: 30000,
            data: payload.toString(),
			headers: {
				"Content-Type": "application/x-www-form-urlencoded",
				"X-CSRF-TOKEN": getCsrfToken(),
			},
		}).then(
        function(response) {
            const payload = response.data?.data ?? {};
            $scope.inbox.messages = payload.messages ?? [];
        }, function (error) {
            console.error(error);
        })
    }

    $scope.toggleNewChatWindow = function() {
        console.log("Toggle New Chat Window");
        $scope.is_new_chat_window_active = !$scope.is_new_chat_window_active;
    }

}]);

export default app;
