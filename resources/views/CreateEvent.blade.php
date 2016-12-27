<?php use Illuminate\Support\Facades\Auth;
use App\User;

// Get the currently authenticated user...
$user = Auth::user();

// Get the currently authenticated user's ID...
$id = Auth::id();

$nameCreator = User::find($id)->name?>
<!-- Need to add the javascript to validate the
forms and set minimum character requirements for
 the different fields as well as dictate the format-->
<!DOCTYPE html>
<html>
  <head>
    <title>Create your Event</title>
  </head>
  <body>
    <div id="form">
      <form class="" action="createEvent" method="post">
        <input type="text" name="name" placeholder="Add a name" ><br/>
        <input type="datetime-local" name="date"><br/>
        <input type="number" name = "ticketCapacity" placeholder="Ticket Capacity" min="1" max="3000"><br/>
        <select name="category">
          <option value="Error">Please Select</option>
          <!-- Add JS to enusre that the please select option
          can't be submitted-->
          <option value="Music">Music</option>
          <option value="Sports">Sports</option>
          <option value="Social">Social</option>
          <option value="Business">Businesss</option>
        </select><br/>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="creator" value="{{ $nameCreator }}">
        <input type="hidden" name="creatorID" value="{{ $id }}">
        <input type="submit">
      </form>
    </div>
    <nav>
      <a href="home">Return to Homepage</a>
    </nav>
  </body>
</html>
