<html>
<head>
<title>MBN Events Homepage</title>
</head>
<body>
<p>This is a test homepage, and should only be reached if you have succesfully logged in</p>
<nav>
  <a href="<?= URL::to('/logout') ?>">Log out</a>
  <a href="TESTpage.blade.php">test</a>
  <a href="CreateEvent.blade.php">Create Event</a>
</nav>
<!--img src="<?php echo asset('images/4i.jpg')?>" alt="test image"/-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src ="<?php echo asset('js/test.js')?>" type="text/javascript"></script>
</body>
</html>
