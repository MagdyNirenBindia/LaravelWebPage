<html>
<head>
<title>MBN Events Homepage</title>
</head>
<body>
<h1>This is a test homepage, and should only be reached if you have succesfully logged in</h1>
<a href="<?= URL::to('/logout') ?>">Log out</a>
<a href="Example.blade.php">test</a>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<img src="<?php echo asset('images/4i.jpg')?>" alt="test image"/>
<script src ="<?php echo asset('js/test.js')?>" type="text/javascript"></script>
</body>
</html>
