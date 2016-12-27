<?php use Illuminate\Support\Facades\Auth;
use App\User;

// Get the currently authenticated user...
$user = Auth::user();

// Get the currently authenticated user's ID...
$id = Auth::id();

$nameCreator = User::find($id)->name?>

<!DOCTYPE html>
<html>
<head>
<title>MBN Events Homepage</title>
</head>
<body>
<h1>Welcome {{$nameCreator}}</h1>
<p>This is a test homepage, and should only be reached if you have succesfully logged in</p>
<nav>
  <ul>
    <li><a href="<?= URL::to('/logout') ?>">Log out</a></li>
    <li><a href="createEvent">Create Event</a></li>
    <li><a href="/data">Show Data</a></li>
  </ul>
</nav>
<!--img src="<?php echo asset('images/4i.jpg')?>" alt="test image"/-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src ="<?php echo asset('js/test.js')?>" type="text/javascript"></script>
</body>
</html>
