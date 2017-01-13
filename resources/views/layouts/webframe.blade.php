<!DOCTYPE html>
<html>
<head>
    <title>MBN Events</title>
</head>
<style>
ul li{
display: inline;
}
</style>
<body>
  <nav>
    <ul>
      <li><a href="<?= URL::to('/logout') ?>">Log out</a></li>
      <li><a href="/home">Home</a></li>
      <li><a href="createEvent">Create Event</a></li>
      <li><a href="BrowseEvents">Browse Events</a></li>
      <li><a href="/viewFeedback">View Feedback</a></li>
    </ul>
  </nav>
</body>
@yield('content')
</html>
