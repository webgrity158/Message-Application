import { nodeProjectApp as app } from './module';
import { route } from 'ziggy-js';
import { Ziggy } from '../ziggy';

const getCsrfToken = () => {
    const meta = document.querySelector('meta[name="csrf-token"]');
    return meta?.getAttribute('content') ?? window.nodeProjectConfig?.csrfToken;
};

const toUrlEncoded = (payloadObject) => {
    const payload = new URLSearchParams();

    Object.entries(payloadObject).forEach(([key, value]) => {
        if (value !== undefined && value !== null) {
            payload.append(key, value);
        }
    });

    return payload.toString();
};

const extractErrors = (error) => {
    if (!error || !error.data) {
        return [error?.statusText ?? 'Something went wrong.'];
    }

    if (error.data.errors) {
        return Object.values(error.data.errors).reduce((acc, messages) => acc.concat(messages), []);
    }

    if (Array.isArray(error.data.message)) {
        return error.data.message;
    }

    if (error.data.message) {
        return [error.data.message];
    }

    return [error.statusText ?? 'Something went wrong.'];
};

const MIN_PASSWORD_LENGTH = 8;
const EMAIL_REGEX = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

const isValidEmail = (value) => EMAIL_REGEX.test(value);

const trim = (value) => (value || '').toString().trim();

const validateRegisterFormData = (form) => {
    const errors = [];

    if (!trim(form.name)) {
        errors.push('Name is required.');
    }

    if (!trim(form.email)) {
        errors.push('Email is required.');
    } else if (!isValidEmail(form.email)) {
        errors.push('Enter a valid email address.');
    }

    if (!form.password) {
        errors.push('Password is required.');
    } else if (form.password.length < MIN_PASSWORD_LENGTH) {
        errors.push(`Password must be at least ${MIN_PASSWORD_LENGTH} characters.`);
    }

    if (!form.password_confirmation) {
        errors.push('Please confirm your password.');
    }

    if (form.password && form.password_confirmation && form.password !== form.password_confirmation) {
        errors.push('Passwords do not match.');
    }

    return [...new Set(errors)];
};

const validateLoginFormData = (form) => {
    const errors = [];

    if (!trim(form.email)) {
        errors.push('Email is required.');
    } else if (!isValidEmail(form.email)) {
        errors.push('Enter a valid email address.');
    }

    if (!form.password) {
        errors.push('Password is required.');
    }

    return [...new Set(errors)];
};

app.config(function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

app.controller('AuthController', ['$scope', '$http', '$timeout', '$window', function ($scope, $http, $timeout, $window) {
    $scope.isLoginActive = true;
    $scope.registerForm = {
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
    };
    $scope.loginForm = {
        email: '',
        password: '',
    };
    $scope.registerState = {
        loading: false,
        errors: [],
        successMessage: '',
    };
    $scope.loginState = {
        loading: false,
        errors: [],
        successMessage: '',
    };

    $scope.toggleLogin = function () {
        $scope.isLoginActive = !$scope.isLoginActive;
        $scope.clearMessages();
    };

    $scope.clearMessages = function () {
        $scope.registerState.errors = [];
        $scope.loginState.errors = [];
        $scope.registerState.successMessage = '';
        $scope.loginState.successMessage = '';
    };

    $scope.register = function () {
        if ($scope.registerState.loading) {
            return;
        }

        $scope.registerState.loading = true;
        $scope.registerState.errors = [];
        $scope.registerState.successMessage = '';

        const clientErrors = validateRegisterFormData($scope.registerForm);

        if (clientErrors.length) {
            $scope.registerState.errors = clientErrors;
            $scope.registerState.loading = false;
            return;
        }

        const url = route('back-end.auth.register', {}, false, Ziggy);
        const payload = toUrlEncoded($scope.registerForm);

        $http({
            url,
            method: 'POST',
            data: payload,
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'X-CSRF-TOKEN': getCsrfToken(),
            },
        }).then(function (response) {
            $scope.registerState.successMessage = response.data?.message ?? 'Account created. Please sign in.';
            ['name', 'email', 'password', 'password_confirmation'].forEach((key) => {
                $scope.registerForm[key] = '';
            });

            $timeout(function () {
                $scope.isLoginActive = true;
            }, 400);
        }, function (error) {
            $scope.registerState.errors = extractErrors(error);
        }).finally(function () {
            $scope.registerState.loading = false;
        });
    };

    $scope.login = function () {
        if ($scope.loginState.loading) {
            return;
        }

        $scope.loginState.loading = true;
        $scope.loginState.errors = [];
        $scope.loginState.successMessage = '';

        const clientErrors = validateLoginFormData($scope.loginForm);

        if (clientErrors.length) {
            $scope.loginState.errors = clientErrors;
            $scope.loginState.loading = false;
            return;
        }

        const url = route('back-end.auth.authenticate', {}, false, Ziggy);
        const payload = toUrlEncoded($scope.loginForm);

        $http({
            url,
            method: 'POST',
            data: payload,
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'X-CSRF-TOKEN': getCsrfToken(),
            },
        }).then(function (response) {
            $scope.loginState.successMessage = response.data?.message ?? 'Signed in successfully.';
            const homeUrl = route('front-end.home', {}, false, Ziggy);
            $timeout(function () {
                $window.location.href = homeUrl;
            }, 300);
        }, function (error) {
            $scope.loginState.errors = extractErrors(error);
        }).finally(function () {
            $scope.loginState.loading = false;
        });
    };
}]);

export default app;
