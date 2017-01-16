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
        <link rel="stylesheet" type="text/css" href="{{asset('css/BrowseEvents.css')}}"/>
    <link href="https://fonts.googleapis.com/css?family=Athiti|Indie+Flower|Nunito|Satisfy" rel="stylesheet">
    </head>
<body>
<div class="overlay">
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
  <section id="indisp">
  <h2>Search</h2>
  <p><input type="text" id="textSearchInput" placeholder="Search by Event Name" class="text"/><br/></p>
</section>

  <section id="indisp">
    <h3>Search by time range... </h3>
    <p>Start: <input type="date" id="startD" name="start" value="" class="text"><br>
    End: <input id="endD"type="date" name="end" value="" class="text"></p>
    <button id="dateSearchBtn" type="button" name="Search" class="box">Search By Date</button>
    <p id='errorMsg'>

    </p>
  </section>

  <section id="indisp">
  <h3>Narrow selection based on category...</h3>
    <select name="category" id="catSearchInput" class="box">
      <option value="ALL" id="text">Please Select</option>
      <!-- Add JS to enusre that the please select option
      can't be submitted-->
      <option value="Music" id="text">Music</option>
      <option value="Sports" id="text">Sports</option>
      <option value="Social" id="text">Social</option>
      <option value="Business" id="text">Businesss</option>
      <option value="Educational" id="text">Educational</option>
      <option value="Other" id="text">Other</option>
    </select>
    </section>
</div>


  <div id="displayEvents">
    <ol id="eventsOL">
        <p>
    @foreach ($events as $event)
        </p>
    <li>
      <p class="EventName">{{ $event -> Name }}</p>
      <p class="EventCat" style="display:none;">{{ $event -> Genre }}</p>
      <p class="EventDate" >{{ $event -> Date }}</p>
      <form class="viewEvent" action="/viewEvent" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="eventID" value="{{ $event -> id }}">
        <input class="viewBtn" type="submit" value="View Event" class="box">
      </form>

      <?php $count++; ?>
    </li>
        <p>
    @endforeach
        </p>
    </ol>
  </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src ="<?php echo asset('js/browse.js')?>" type="text/javascript"></script>
</html>
