<html>
<head>
<title>MBN Events Homepage</title>
</head>
<body>
<h1>This is a test homepage, and should only be reached if you have succesfully logged in</h1>
<a href="{{ URL::to('logout') }}">Log out</a>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src ="<?php echo asset('js/test.js')?>" type="text/javascript"></script>
</html>
