@extends('layouts.webframe')

@section('content')

<?php
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Event;
$id1 = Auth::id();
$event = Event::find($eventID);

?>




<!DOCTYPE html>
<html>
<h1>{{$event -> Name}}</h1>

<div id="description">
<p>{{$event -> Description}}</p>
</div>

<div id="details">
  <p>
    Creator: {{$event -> Creator}}<br/>
    Date: {{$event -> Date}}<br/>
    Number of Tickets: {{$event -> Ticket_Capacity}}
  </p>
</div>

<div id="attendEvent">
  <form class="eventform" action="attendEvent" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="eventID" value="{{ $event -> id }}">
    <input type='hidden' name='eventDate' value="{{$event -> Date}}">
    <input type="hidden" name="customerID" value="{{ $id1 }}">
    <input type="hidden" name="creatorID" value="{{ $event ->CreatorID }}">
    <input class="attendBtn" type="submit" value="Attend">
  </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src ="<?php echo asset('js/viewEvent.js')?>" type="text/javascript"></script>
</html>
@endsection
