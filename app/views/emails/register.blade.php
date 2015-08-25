<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
	  .receipt{padding: 20px;border: 10px solid rgb(51,204,204); margin: 5px;}
	</style>
</head>
<body>
	<h1>Hello, {{ $first_name }}!</h1>

	<p>
	Welcome to PNPAA Website and accounting system.
	As a member of PNPAA, you are automatically registered with the details you provided to PNPAA.
	The PNPAA accounting system contains your payment information about the Solidarity Act, PNPAA Coop  contribution and other cool stuffs.
	</p>

	<h3>Your login information are as follows:</h3>
	<ul>
		<li>Username: {{ $username }}</li>
		<li>Password: {{ $password }}</li>
	</ul>
</body>
</html>