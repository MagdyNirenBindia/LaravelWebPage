<!DOCTYPE html>
<html>
<head>
<title>Search Page</title>
</head>

    <body>
<h1>Search</h1>

<form action="action_page.php">
  Name of event:<br>
  <input type="text" name="eventname" placeholder="Search an event e.g. U2">
  <br>
  
<h2>Select a genre</h2>
<p>Click on the button to select a genre.</p>

<div class="Genre">
<button onclick="myFunction()" class="dropbtn">Genre</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="#Jazz">Jazz</a>
    <a href="#Pop">About</a>
    <a href="#Rock">Rock</a>
</div>
</div>

<h2>Select a Location</h2>
<p>Click on the button to select a Location.</p>

<div class="Location">
<button onclick="myFunction()" class="dropbtn">Location</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="#London">London</a>
    <a href="#Birmingham">Birmingham</a>
    <a href="#Manchester">Manchester</a>
</div>
</div>

<input type="submit" value="Submit">

</form> 

</body>
</html
