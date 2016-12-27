<?php use Illuminate\Support\Facades\Auth;
use App\User;

// Get the currently authenticated user...
$user = Auth::user();

// Get the currently authenticated user's ID...
$id = Auth::id();

$name = User::find($id)->name?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>View details</title>
</head>
<body>
  <h1>Event Sucessfully Created by <?=$name?></h1>
  <p id="displayEvent"></p>
  <nav>
    <ul>
      <li><a href="<?= URL::to('/logout') ?>">Log out</a></li>
      <li><a href="TESTpage.blade.php">test</a></li>
      <li><a href="createEvent">Create Event</a></li>
      <li><a href="/data">Show Data</a></li>
    </ul>
  </nav>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="{{asset('js/eventCreated.js')}}"></script>
</body>
</html>
