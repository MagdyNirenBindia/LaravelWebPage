@extends('layouts.webframe')

<?php use Illuminate\Support\Facades\Auth;
use App\User;
use App\Event;

// Get the currently authenticated user...
$user = Auth::user();

// Get the currently authenticated user's ID...
$id1 = Auth::id();
$events = Event::all();
$size = sizeof($events);
$nameCreator = User::find($id1)->name?>

<!DOCTYPE html>
<html>
<head>
    <title>MBN Events</title>
    </head>
<body>

<p>Search</p>

<!-- still to add the search function-->
<!--form>
<input type="text" name="valueToSearch" placeholder="Search by Event, Location...">
<input type="submit" name="search" Value="Filter"-->

<table width="800" border="1" cellpadding="1" cellspacing="1">

  <div id="displayEvents">
    <p>There are <em>{{$size}}</em> events on this page </p>
    @foreach ($events as $event)
        <p>This is {{ $event -> Name }}</p><a href="{{$event -> Name}}">    View Event</a>
    @endforeach
  </div>
</body>
</html>
