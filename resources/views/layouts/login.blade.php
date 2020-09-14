<!DOCTYPE html>
<html lang="en" class="admin-login">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/css/admin.css">
	<title>Admin Control Panel</title>
</head>
<body class="admin-login">
	<div class="grid-x grid-margin-x admin-login-holder">
		<div class="large-5 cell admin-login-holder__form">
			<div class="admin-login-holder__form__wrapper">
				@yield('content')
			</div>
		</div>
		<div class="large-7 cell admin-login-holder__background">

		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="/js/admin.vendors.js"></script>
</body>
</html>
