
@extends('layouts.webframe')
<?php use Illuminate\Support\Facades\Auth;
use App\User;
use App\Event;
use App\Attendee;

// Get the currently authenticated user...
$user = Auth::user();

// Get the currently authenticated user's ID...
$id = Auth::id();

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
  $attEvents = Attendee::find($id);
 ?>

<div>
  {{$attEvents}}
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src ="<?php echo asset('js/test.js')?>" type="text/javascript"></script>
</body>
</html>
