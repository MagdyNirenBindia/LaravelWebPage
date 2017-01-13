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
    <h1>Create a new event</h1>
    <div id="form">
      <form class="eventform" action="createEvent" method="post">
        <p><span class="name">Name of Event:</span> <input type="text" id="name" name="name" placeholder="Eg. Birthday" ><br/>
        <span class="date">Date of Event:</span> <input type="datetime-local" id="date" name="date"><br/>
      <span class="numTickets">Number of Tickets:</span> <input type="number" id="ticketCapacity" name ="ticketCapacity" placeholder="Ticket Capacity" min="1" max="3000"><br/>
        <span class="endDate">End Date for Ticket Sales:</span> <input type="datetime-local" id="endDate" name="endDate"><br/>
        <span class="location">Event Location: </span><input type="text" id="location" name="location" placeholder="Eg. Buckingham Palace"><br>
        <span class="category">Category:</span> <select name="category" id="category">
          <option value="Error">Please Select</option>
          <!-- Add JS to enusre that the please select option
          can't be submitted-->
          <option value="Music">Music</option>
          <option value="Sports">Sports</option>
          <option value="Social">Social</option>
          <option value="Business">Businesss</option>
        </select><br/>
        <span class="description">Event Description:</span><br> <textarea name="description" id="description" rows="4" cols="60" placeholder="Eg. Concert honoring my glory! Bring Friends, but make sure to have them sign up first!"></textarea>
        <span class="description" id="descriptionAlert" style="display:none;">Please enter at least five words</span><br/>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="creator" value="{{ $nameCreator }}">
        <input type="hidden" name="creatorID" value="{{ $id }}">
        <input id="submit" type="submit"></p>
      </form>
    </div>
    <nav>
      <a href="home">Return to Homepage</a>
    </nav>
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src ="<?php echo asset('js/createEvent.js')?>" type="text/javascript"></script>
</html>
