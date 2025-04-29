<!DOCTYPE html>
<html>
 <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <title>@yield('title')</title>
		<style>
		.error{color:red;}
		</style>
	</head>
<body>
    <div class="container">
        <h1 class="text-center">Laravel 7 CRUD with Layout</h1>
        @yield('content')
		<footer class="text-center">
        <p>© 2025 My Website</p>
    </footer>
    </div>
	
</body>
</html>
