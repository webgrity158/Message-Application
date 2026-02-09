@extends('layouts.app')
@section('title', 'Socket Test')
@section('content')
<style>
	@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

	* {
		box-sizing: border-box;
	}

	body {
		background: #f6f5f7;
		display: flex;
		justify-content: center;
		align-items: center;
		flex-direction: column;
		font-family: 'Montserrat', sans-serif;
		height: 100vh;
		margin: -20px 0 50px;
	}

	h1 {
		font-weight: bold;
		margin: 0;
	}

	h2 {
		text-align: center;
	}

	p {
		font-size: 14px;
		font-weight: 100;
		line-height: 20px;
		letter-spacing: 0.5px;
		margin: 20px 0 30px;
	}

	span {
		font-size: 12px;
	}

	a {
		color: #333;
		font-size: 14px;
		text-decoration: none;
		margin: 15px 0;
	}

	button {
		border-radius: 20px;
		border: 1px solid #FF4B2B;
		background-color: #FF4B2B;
		color: #FFFFFF;
		font-size: 12px;
		font-weight: bold;
		padding: 12px 45px;
		letter-spacing: 1px;
		text-transform: uppercase;
		transition: transform 80ms ease-in;
	}

	button:active {
		transform: scale(0.95);
	}

	button:focus {
		outline: none;
	}

	button.ghost {
		background-color: transparent;
		border-color: #FFFFFF;
	}

	.form-feedback {
		margin: 8px 0;
		font-size: 12px;
		text-align: center;
	}

	.form-feedback.success {
		color: #27ae60;
	}

	.form-feedback.error {
		color: #f44336;
	}

	input.input-error {
		border: 1px solid #f44336;
		box-shadow: 0 0 0 2px rgba(244, 67, 54, 0.2);
	}

	.form-errors {
		margin: 0;
		padding: 0;
		list-style: none;
		text-align: left;
		color: #f44336;
		font-size: 12px;
	}

	form {
		background-color: #FFFFFF;
		display: flex;
		align-items: center;
		justify-content: center;
		flex-direction: column;
		padding: 0 50px;
		height: 100%;
		text-align: center;
	}

	input {
		background-color: #eee;
		border: none;
		padding: 12px 15px;
		margin: 8px 0;
		width: 100%;
	}

	.container {
		background-color: #fff;
		border-radius: 10px;
		box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
				0 10px 10px rgba(0,0,0,0.22);
		width: 768px;
		max-width: 100%;
	}

	.form-container {
		position: absolute;
		top: 0;
		height: 100%;
		transition: all 0.6s ease-in-out;
	}

	.sign-in-container {
		left: 0;
		width: 50%;
		z-index: 2;
	}

	.container.right-panel-active .sign-in-container {
		transform: translateX(100%);
	}

	.sign-up-container {
		left: 0;
		width: 50%;
		opacity: 0;
		z-index: 1;
	}

	.container.right-panel-active .sign-up-container {
		transform: translateX(100%);
		opacity: 1;
		z-index: 5;
		animation: show 0.6s;
	}

	@keyframes show {
		0%, 49.99% {
			opacity: 0;
			z-index: 1;
		}
		
		50%, 100% {
			opacity: 1;
			z-index: 5;
		}
	}

	.overlay-container {
		position: absolute;
		top: 0;
		left: 50%;
		width: 50%;
		height: 100%;
		overflow: hidden;
		transition: transform 0.6s ease-in-out;
		z-index: 100;
	}

	.container.right-panel-active .overlay-container{
		transform: translateX(-100%);
	}

	.overlay {
		background: #FF416C;
		background: -webkit-linear-gradient(to right, #FF4B2B, #FF416C);
		background: linear-gradient(to right, #FF4B2B, #FF416C);
		background-repeat: no-repeat;
		background-size: cover;
		background-position: 0 0;
		color: #FFFFFF;
		position: relative;
		left: -100%;
		height: 100%;
		width: 200%;
		transform: translateX(0);
		transition: transform 0.6s ease-in-out;
	}

	.container.right-panel-active .overlay {
		transform: translateX(50%);
	}

	.overlay-panel {
		position: absolute;
		display: flex;
		align-items: center;
		justify-content: center;
		flex-direction: column;
		padding: 0 40px;
		text-align: center;
		top: 0;
		height: 100%;
		width: 50%;
		transform: translateX(0);
		transition: transform 0.6s ease-in-out;
	}

	.overlay-left {
		transform: translateX(-20%);
	}

	.container.right-panel-active .overlay-left {
		transform: translateX(0);
	}

	.overlay-right {
		right: 0;
		transform: translateX(0);
	}

	.container.right-panel-active .overlay-right {
		transform: translateX(20%);
	}

	.social-container {
		margin: 20px 0;
	}

	.social-container a {
		border: 1px solid #DDDDDD;
		border-radius: 50%;
		display: inline-flex;
		justify-content: center;
		align-items: center;
		margin: 0 5px;
		height: 40px;
		width: 40px;
	}

	footer {
		background-color: #222;
		color: #fff;
		font-size: 14px;
		bottom: 0;
		position: fixed;
		left: 0;
		right: 0;
		text-align: center;
		z-index: 999;
	}

	footer p {
		margin: 10px 0;
	}

	footer i {
		color: red;
	}

	footer a {
		color: #3c97bf;
		text-decoration: none;
	}
</style>
<div ng-app="nodeProjectApp" ng-controller="AuthController" ng-cloak>
	<div class="container" ng-class="{'right-panel-active': !isLoginActive}" id="container">
		<div class="form-container sign-up-container">
			<form name="authRegisterForm" ng-submit="register()" novalidate>
				<h1>Create Account</h1>
				<div class="social-container">
					<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
					<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
					<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
				</div>
				<span>or use your email for registration</span>
				<input name="name" ng-model="registerForm.name" type="text" placeholder="Name" required autocomplete="name"
					ng-class="{'input-error': authRegisterForm.name.$touched && authRegisterForm.name.$invalid}" />
				<p class="form-feedback error" ng-if="authRegisterForm.name.$touched && authRegisterForm.name.$error.required">Name is required.</p>

				<input name="email" ng-model="registerForm.email" type="email" placeholder="Email" required autocomplete="email"
					ng-class="{'input-error': authRegisterForm.email.$touched && authRegisterForm.email.$invalid}" />
				<p class="form-feedback error" ng-if="authRegisterForm.email.$touched && authRegisterForm.email.$error.required">Email is required.</p>
				<p class="form-feedback error" ng-if="authRegisterForm.email.$touched && authRegisterForm.email.$error.email">Enter a valid email address.</p>

				<input name="password" ng-model="registerForm.password" type="password" placeholder="Password" required autocomplete="new-password" ng-minlength="8"
					ng-class="{'input-error': authRegisterForm.password.$touched && authRegisterForm.password.$invalid}" />
				<p class="form-feedback error" ng-if="authRegisterForm.password.$touched && authRegisterForm.password.$error.required">Password is required.</p>
				<p class="form-feedback error" ng-if="authRegisterForm.password.$touched && authRegisterForm.password.$error.minlength">Password must be at least 8 characters.</p>

				<input name="password_confirmation" ng-model="registerForm.password_confirmation" type="password" placeholder="Confirm Password" required autocomplete="new-password"
					ng-class="{'input-error': authRegisterForm.password_confirmation.$touched && authRegisterForm.password_confirmation.$invalid}" />
				<p class="form-feedback error" ng-if="authRegisterForm.password_confirmation.$touched && authRegisterForm.password_confirmation.$error.required">Please confirm your password.</p>
				<p class="form-feedback error" ng-if="registerForm.password && registerForm.password_confirmation && registerForm.password !== registerForm.password_confirmation">Passwords must match.</p>
				<ul class="form-errors" ng-if="registerState.errors.length">
					<li ng-repeat="error in registerState.errors track by $index"><% error %></li>
				</ul>
				<p class="form-feedback success" ng-if="registerState.successMessage"><% registerState.successMessage %></p>
				<button type="submit" ng-disabled="registerState.loading || authRegisterForm.$invalid"><% registerState.loading ? 'Processing...' : 'Sign Up' %></button>
			</form>
		</div>
		<div class="form-container sign-in-container">
			<form name="authLoginForm" ng-submit="login()" novalidate>
				<h1>Sign in</h1>
				<div class="social-container">
					<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
					<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
					<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
				</div>
				<span>or use your account</span>
				<input name="email" ng-model="loginForm.email" type="email" placeholder="Email" required autocomplete="email"
					ng-class="{'input-error': authLoginForm.email.$touched && authLoginForm.email.$invalid}" />
				<p class="form-feedback error" ng-if="authLoginForm.email.$touched && authLoginForm.email.$error.required">Email is required.</p>
				<p class="form-feedback error" ng-if="authLoginForm.email.$touched && authLoginForm.email.$error.email">Enter a valid email address.</p>

				<input name="password" ng-model="loginForm.password" type="password" placeholder="Password" required autocomplete="current-password"
					ng-class="{'input-error': authLoginForm.password.$touched && authLoginForm.password.$invalid}" />
				<p class="form-feedback error" ng-if="authLoginForm.password.$touched && authLoginForm.password.$error.required">Password is required.</p>
				<ul class="form-errors" ng-if="loginState.errors.length">
					<li ng-repeat="error in loginState.errors track by $index"><% error %></li>
				</ul>
				<p class="form-feedback success" ng-if="loginState.successMessage"><% loginState.successMessage %></p>
				<a href="#">Forgot your password?</a>
				<button type="submit" ng-disabled="loginState.loading || authLoginForm.$invalid"><% loginState.loading ? 'Processing...' : 'Sign In' %></button>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1>Welcome Back!</h1>
					<p>To keep connected with us please login with your personal info</p>
					<button class="ghost" ng-click="toggleLogin()" id="signIn">Sign In</button>
				</div>
				<div class="overlay-panel overlay-right">
					<h1>Hello, Friend!</h1>
					<p>Enter your personal details and start journey with us</p>
					<button class="ghost" id="signUp" ng-click="toggleLogin()">Sign Up</button>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
