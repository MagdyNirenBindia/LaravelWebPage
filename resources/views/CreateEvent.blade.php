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
    <title>Create your Event</title>
  </head>
  <body>
    <div id="form">
      <form class="" action="createEvent" method="post">
        <input type="text" name="name" placeholder="Add a name" ><br>
        <input type="text" name="date" placeholder="Add a date (eg. 2016-03-24 17:00:00)" ><br>
        <input type="text" name = "ticketCapacity" placeholder="Ticket Capacity"><br>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="creator" value="{{ $nameCreator }}">
        <input type="submit">
      </form>
    </div>
    <nav>
      <a href="home">Return to Homepage</a>
    </nav>
  </body>
</html>
