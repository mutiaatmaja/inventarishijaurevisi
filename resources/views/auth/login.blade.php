<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Halaman Login</title>
	<style>
		body {
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
			margin: 0;
			background-color: #f4f4f4;
		}

		.login-container {
			background-color: #33cc33;
			padding: 20px;
			border-radius: 8px;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
			width: 300px;
			text-align: center;
		}

		.logo {
			width: 100px;
			margin-bottom: 20px;
		}

		h2 {
			margin-bottom: 20px;
			color: white;
		}

		.input-group {
			margin-bottom: 15px;
			text-align: left;
		}

		label {
			display: block;
			margin-bottom: 5px;
			color: #fff;
		}

		input {
			width: 90%;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 100px;
		}

		.form-check {
			margin-top: 10px;
		}

		button {
			width: 100%;
			padding: 10px;
			background-color: #28a745;
			color: white;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}

		button:hover {
			background-color: #218838;
		}

		.invalid-feedback {
			color: #dc3545;
			display: none;
		}

		.is-invalid+.invalid-feedback {
			display: block;
		}
	</style>
</head>

<body>
	<div class="login-container">
		<img class="logo" src="{{ asset('logo.png') }}" alt="Logo">
		<h2>Login</h2>
		<form method="POST" action="{{ route('login') }}">
			@csrf
			<div class="input-group">
				<label for="email">Email</label>
				<input class="" id="email" name="email" type="email" value="{{ old('email') }}" required
					autocomplete="email" autofocus placeholder="Masukkan email Anda">

				@error('email')
					<span>
						<strong style="color: #dc3545">{{ $message }}</strong>
					</span>
				@enderror
			</div>

			<div class="input-group">
				<label for="password">Password</label>
				<input class="" id="password" name="password" type="password" required autocomplete="current-password"
					placeholder="Masukkan password Anda">
				@error('password')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror

			</div>

			<button type="submit">Login</button>

		</form>
	</div>
</body>

</html>
