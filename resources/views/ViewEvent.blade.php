@extends('layouts.webframe')

@section('content')

<?php
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Event;
use App\Attendee;
$id1 = Auth::id();
$matchThese = ['CustomerID' => $id1, 'EventID' => $eventID];
$isAttending1 = Attendee::where($matchThese)->select('CustomerID')->groupby('CustomerID')->get();
$isAtn = 0;
if ($isAttending1->isEmpty()){
  $isAtn = 0;
}
else{
  $isAtn = 1;
}
$event = Event::find($eventID);
$ticketsSold = sizeof(Attendee::where('EventID',$eventID)->select('CustomerID')->groupby('CustomerID')->get());
$ticketCapacity = Event::find($eventID)->Ticket_Capacity;
$atCapacity = 1;
if ($ticketsSold >= $ticketCapacity) {
  $atCapacity = 1;
}
else{
  $atCapacity = 0;
}
?>




<!DOCTYPE html>
<html>
<h1>{{$event -> Name}}</h1>

<div id="description">
<p>{{$event -> Description}}</p>
</div>

<p id="cap" style="display:none;">{{$atCapacity}}</p>
<p id="isAtnd" style="display:none;">{{$isAtn}}</p>

<div id="details">
  <p>
    Creator: {{$event -> Creator}}<br/>
    Date: <span id="date12">{{$event -> Date}}</span><br/>
    Location: {{$event -> Location}}<br/>
    Number of Tickets: {{$event -> Ticket_Capacity}}<br/>
    Tickets Sold until: <span id="endDate" >{{$event -> End_Date}}</span>
  </p>
</div>


<p id="endSaleNotice"></p>

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

<div class="reviewEvent" style="display:none;">
  <form class="" action="/feedback" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="eventID" value="{{ $event -> id}}">
    <input type="submit" name="review" value="Give Feedback">
  </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src ="<?php echo asset('js/viewEvent.js')?>" type="text/javascript"></script>
</html>
@endsection
