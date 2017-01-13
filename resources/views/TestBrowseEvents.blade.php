@extends('layouts.webframe')

<?php use Illuminate\Support\Facades\Auth;
use App\User;
use App\Event;

// Get the currently authenticated user...
$user = Auth::user();
$count = 1;
// Get the currently authenticated user's ID...
$id1 = Auth::id();
$events = Event::all();
$size = sizeof($events);
$nameCurUser = User::find($id1)->name?>

<!DOCTYPE html>
<html>
<head>
    <title>MBN Events</title>
    </head>
<body>

<div id="numEvents">
  <h2>
  <?php if ($size==1): ?>
    There is <em>{{$size}}</em> event on this page
  <?php else: ?>
    There are <em>{{$size}}</em> events on this page
  <?php endif; ?>
</h2>
</div>

<div id="searchbar">
  <h2>Search</h2>
  <p><input type="text" id="textSearchInput" placeholder="Search by Event Name"/><br/></p>

  <section>
    <h3>Search by Time Range </h3>
    <p>Start: <input type="date" id="startD" name="start" value=""><br>
    End: <input id="endD"type="date" name="end" value=""></p>
    <button id="dateSearchBtn" type="button" name="Search">Search By Date</button>
  </section>


  <h3>Narrow Selection Based on Category</h3>
    <select name="category" id="catSearchInput">
      <option value="ALL">Please Select</option>
      <!-- Add JS to enusre that the please select option
      can't be submitted-->
      <option value="Music">Music</option>
      <option value="Sports">Sports</option>
      <option value="Social">Social</option>
      <option value="Business">Businesss</option>
    </select>
  </p>
</div>


  <div id="displayEvents">
    <ol id="eventsOL">
    @foreach ($events as $event)
    <li>
      <article>
      <p class="EventName">{{ $event -> Name }}</p>
      <p class="EventCat" style="display:none;">{{ $event -> Genre }}</p>
      <p class="EventDate" >{{ $event -> Date }}</p>
      <form class="viewEvent" action="/viewEvent" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="eventID" value="{{ $event -> id }}">
        <input class="viewBtn" type="submit" value="View Event">
      </form>
      <?php $count++; ?>
      </article>
    </li>
    @endforeach
    </ol>
  </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src ="<?php echo asset('js/browse.js')?>" type="text/javascript"></script>
</html>
