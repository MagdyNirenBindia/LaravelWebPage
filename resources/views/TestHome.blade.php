
@extends('layouts.webframe')


@section('content')
<?php use Illuminate\Support\Facades\Auth;
use App\User;
use App\Event;
use App\Attendee;

// Get the currently authenticated user...
$user = Auth::user();

// Get the currently authenticated user's ID...
$id = Auth::id();
$events = Event::all();
$nameCurUser = User::find($id)->name?>

<!DOCTYPE html>
<html>
<head>
<title>MBN Events Homepage</title>
</head>
<body>
<h1>Welcome {{$nameCurUser}}</h1>
<p>This is a test homepage, and should only be reached if you have succesfully logged in</p>
<!--img src="<?php echo asset('images/4i.jpg')?>" alt="test image"/-->
<h2>Events you're attending:</h2>
<?php
  $attEvents = Attendee::where('CustomerID',$id)->select('EventID')->groupby('EventID')->get();
 ?>
<div id="EventsAttn">
  @foreach ($attEvents as $attEvent)
    <p>
      {{Event::find($attEvent->EventID)->Name}}
      <form class="" action="/feedback" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="eventID" value="{{ $attEvent -> EventID }}">
        <input type="submit" name="review" value="Give Feedback">
      </form>
    </p>
    @endforeach
</div>

<h2>Events you have created</h2>
<?php
  $crtdEvents = Event::where('CreatorID',$id)->get();
 ?>
<div id="EventsCrtd">
  @foreach ($crtdEvents as $crtdEvent)
    <p>
      {{Event::find($crtdEvent->id)->Name}}
    </p>
    @endforeach
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src ="<?php echo asset('js/test.js')?>" type="text/javascript"></script>
</body>
</html>
@endsection
