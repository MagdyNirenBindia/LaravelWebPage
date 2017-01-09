<?php use Illuminate\Support\Facades\Auth;
use App\User;

// Get the currently authenticated user...
$user = Auth::user();

// Get the currently authenticated user's ID...
$id = Auth::id();

$nameCreator = User::find($id)->name?>

<!DOCTYPE html>
<html>
<head>
<title>MBN Events Homepage</title>
</head>
<body>
<h1>Welcome {{$nameCreator}}</h1>
<p>This is a page to view all your events</p>
<nav>
  <ul>
    <li><a href="<?= URL::to('/logout') ?>">Log out</a></li>
    <li><a href="createEvent">Create Event</a></li>
    <li><a href="BrowseEvents">Browse Events</a></li>
    <li><a href="/data">Show Data</a></li>
  </ul>
</nav>
<!--img src="<?php echo asset('images/4i.jpg')?>" alt="test image"/-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src ="<?php echo asset('js/test.js')?>" type="text/javascript"></script>

<?php

	$query = "SELECT * FROM `events_confirmed`where  $id = `Customer ID`";
	$search_result = filterTable($query);
function filterTable($query)
{
$servername = "127.0.0.1";
$username = "sid";
$password = "magdy";
$dbname = "eventsweb";
// Create connection
     $connect = mysqli_connect($servername, $username, $password, $dbname);
     $filter_Result= mysqli_query($connect, $query);
     return $filter_Result;

}
?>

<h2>Events You are Attending:</h2>
<table width="800" border="1" cellpadding="1" cellspacing="1">

<tr>
<th>Event Name</th>
<th>Event Date</th>
</tr>

<?php while($row = mysqli_fetch_array($search_result)):?>
<tr>

	 <td><?php echo $row['Event Name'];?></td>
	 <td><?php echo $row['Event Date'];?></td>

</tr>
<?php endwhile;?>



</table>

<?php

	$query2 = "SELECT * FROM `events_confirmed`where  $id = `Creator ID`";
	$search_result2 = filterTable2($query2);
function filterTable2($query2)
{
$servername = "127.0.0.1";
$username = "sid";
$password = "magdy";
$dbname = "eventsweb";
// Create connection
     $connect2 = mysqli_connect($servername, $username, $password, $dbname);
     $filter_Result2= mysqli_query($connect2, $query2);
     return $filter_Result2;

}
?>

<h2>List of people who are attending your events:</h2>
<table width="800" border="1" cellpadding="1" cellspacing="1">

<tr>
<th>Event Name</th>
<th>Event Date</th>
<th>Attendee Name</th>
<th>Attendee E-Mail Address</th>

</tr>

<?php while($row2 = mysqli_fetch_array($search_result2)):?>
<tr>

	 <td><?php echo $row2['Event Name'];?></td>
	 <td><?php echo $row2['Event Date'];?></td>
	 <td><?php echo $row2['Attendee'];?></td>
	 <td><?php echo $row2['Attendee e-mail'];?></td>
</tr>
<?php endwhile;?>



</table>


</body>


</html>
