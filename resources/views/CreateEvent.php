<!DOCTYPE html>
<html>
<head>
    <title>Create your Event</title>
    <link href="https://fonts.googleapis.com/css?family=Alex+Brush|Athiti|Calligraffitti|Parisienne|Ruthie" rel="stylesheet"> 
    <link href="<?php echo asset('css/NavBar.css')?>" type="text/css" rel="stylesheet" >
    </head>

    <body>
<div id="navbar">
  <ul>
  <li class="companyname">MBN</li>
  <li><a href="BrowseEvents.php">Browse Events</a></li>
  <li><a class="active" href="CreateEvent.php">Create my Event</a></li>
  <li><a href = "LogIn.php"> Sign out</a></li>
</ul>
  </div>

    <p>
    Create your events here...
    </p>
    
    <form>
     Event Name<br>
  <input type="text" name="Event Name"><br>
     Event Date<br>
  <input type="text" name="Date of Event"><br>
     Event Location<br>
  <input type="text" name="Event Location"><br>
        
     What's it about?<br>
        
 
  <input type="submit" value="Create Event!">
    </form>

</body>

</html>
