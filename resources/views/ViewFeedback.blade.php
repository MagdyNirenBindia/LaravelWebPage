@extends('layouts.webframe')

@section('content')
<?php use Illuminate\Support\Facades\Auth;
use App\User;
use App\Event;
use App\Feedback;

// Get the currently authenticated user...
$user = Auth::user();

// Get the currently authenticated user's ID...
$id = Auth::id();
$feedbacks = Feedback::all();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Review All the Events</title>
  </head>
<body>
<table width="800" border="1" cellpadding="1" cellspacing="1">
<tr>
<th>Event Name</th>
<th>Feedback</th>
<th>Rating</th>
<th>Reviewed By</th>
</tr>
@foreach($feedbacks as $feedback)
<tr>
<td>{{Event::find($feedback->EventID)->Name}}</td>
<td>{{$feedback -> Feedback}}</td>
<td>{{$feedback -> Rating}}</td>
<td>{{User::find($feedback -> CustomerID)->name}}</td>
</tr>
@endforeach
</table>
</body>
</html>


@endsection
