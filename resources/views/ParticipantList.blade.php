@extends('layouts.webframe')


@section('content')
<?php
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Event;
use App\Attendee;

//Calculating the progress of ticket sales
$ticketsSold = sizeof(Attendee::where('EventID',$eventID)->select('CustomerID')->groupby('CustomerID')->get());
$ticketCapacity = Event::find($eventID)->Ticket_Capacity;
$prcnt = ($ticketsSold/$ticketCapacity)*100;

//Generating array of particpants to the event

$participants = Attendee::where('EventID',$eventID)->select('CustomerID')->groupby('CustomerID')->get();
$count = 1;
?>
<!DOCTYPE html>
<html>
<head>
<title>MBN Events Sales</title>
</head>
<body>
  <div class="">
    <h1>{{Event::find($eventID)->Name}}</h1>
    <p>Total Tickets Issued:<strong> {{$ticketCapacity}}</strong>,<br> Of which sold:<strong> {{$ticketsSold}}</strong></p>
  </div>

  <div class="salesProgress"> 
  <p><progress value="{{$ticketsSold}}" max="{{$ticketCapacity}}"></progress>     {{round($prcnt,1,PHP_ROUND_HALF_UP)}}%</p>
  </div>

  <div class="participantList">
    <table width="800" border="1" cellpadding="1" cellspacing="1">
    <tr>
    <th>Participant Numb</th>
    <th>Participant Name</th>
    <th>Participant Email</th>
    </tr>
    @foreach ($participants as $participant)
    <tr>
      <?php $person = User::find($participant->CustomerID) ?>
      <td>{{$count}}</td>
      <td>{{$person->name}}</td>
      <td>{{$person->email}}</td>
    </tr>
    <?php $count++; ?>
    @endforeach
  </table>
  </div>


</body>
</html>
@endsection
