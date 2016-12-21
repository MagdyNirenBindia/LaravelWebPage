<?php use Illuminate\Support\Facades\Auth;
use App\User;

// Get the currently authenticated user...
$user = Auth::user();

// Get the currently authenticated user's ID...
$id = Auth::id();

$name = User::find($id)->name?>

<html>
<h1>Event Created Sucessfully by <?=$name?></h1>
<nav>
  <ul>
    <li><a href="<?= URL::to('/logout') ?>">Log out</a></li>
    <li><a href="TESTpage.blade.php">test</a></li>
    <li><a href="createEvent">Create Event</a></li>
    <li><a href="/data">Show Data</a></li>
  </ul>
</nav>
</html>
