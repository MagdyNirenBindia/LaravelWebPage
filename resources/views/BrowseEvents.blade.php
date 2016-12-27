<?php
if(isset($_POST['search']))
	{

	$valueToSearch = $_POST['valueToSearch'];
	$query="SELECT * FROM events WHERE CONCAT('id', 'Name', 'Ticket_Capacity', 'Start_Date', 'End_Date','Date', 'Location', 'Creator', 'Genre', 'Description')LIKE '%".$valueToSearch."%'";
	$search_result = filterTable ($query);
	}
	else{

	$query = "SELECT * FROM `event`";
	$search_result = filterTable ($query);
}
function filterTable($query)
{
$servername = "127.0.0.1";
$username = "sid";
$password = "magdy";
$dbname = "EventsWeb";
// Create connection
     $connect = mysqli_connect($servername, $username, $password, $dbname);
     $filter_Result= mysqli_query($connect, $query);
     return $filter_Result;

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>MBN Events</title>
    </head>
<body>
  <nav>
    <ul>
      <li><a href="<?= URL::to('/logout') ?>">Log out</a></li>
      <li><a href="/home">Home</a></li>
      <li><a href="createEvent">Create Event</a></li>
      <li><a href="/data">Show Data</a></li>
    </ul>
  </nav>
<p>Search</p>


<form>
<input type="text" name="valueToSearch" placeholder="Search by Event, Location...">
<input type="submit" name="search" Value="Filter">

<table width="800" border="1" cellpadding="1" cellspacing="1">

<tr>
<th>Name</th>
<th>Start</th>
<th>End</th>
<th>EventDate</th>
<th>Location</th>
<th>Creator</th>
<th>Genre</th>
<th>Description</th>
<th>Tickets Available</th>
<th>Purchase</th>
<th>Review  </th>
</tr>


<?php while($row = mysqli_fetch_array($search_result)):?>
<tr>

     <td><?php echo $row['Name'];?></td>
	 <td><?php echo $row['Start_Date'];?></td>
	 <td><?php echo $row['End_Date'];?></td>
	 <td><?php echo $row['Date'];?></td>
	 <td><?php echo $row['Location'];?></td>
	 <td><?php echo $row['Creator'];?></td>
	 <td><?php echo $row['Genre'];?></td>
	 <td><?php echo $row['Description'];?></td>
     <td><?php echo $row['Ticket_Capacity'];?></td>
     <td><input type="button" value = "Purchase"/></td>
     <td><a href=''>Review and Feedback</a></td>
</tr>
<?php endwhile;?>
</table>
</form>
</body>
</html>
