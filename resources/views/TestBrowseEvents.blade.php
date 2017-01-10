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

<p>Search</p>

<!-- still to add the search function-->
<!--form>
<input type="text" name="valueToSearch" placeholder="Search by Event, Location...">
<input type="submit" name="search" Value="Filter"-->

<table width="800" border="1" cellpadding="1" cellspacing="1">

  <div id="displayEvents">
    <?php if ($size==1): ?>
    <p>There is <em>{{$size}}</em> event on this page </p>
  <?php else: ?>
      <p>There are <em>{{$size}}</em> events on this page </p>
    <?php endif; ?>
    @foreach ($events as $event)
        <p><em>Event {{$count}}:</em> {{ $event -> Name }}<br/><em>Creator:</em> {{$event -> Creator}}</p>
        <form action="attendEvent" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="eventID" value="{{ $event -> id }}">
          <input type="hidden" name="customerID" value="{{ $id1 }}">
          <input type="hidden" name="creatorID" value="{{ $event ->CreatorID }}">
          <input type="submit" value="Attend">
        </form>
        <?php $count++; ?>
    @endforeach
  </div>
</body>
</html>
