<DOCTYPE html>
<html>
  <head>
  <title>The William Podcast Show</title>
  <link rel="stylesheet" type="text.css" href="style.css">
  <style>
.floating-box {
    display: inline-block;
    width: 30%;
    height: 250px;
    margin: 10px;
    border: 3px solid #73AD21;
}


</style>
  </head>
  <body style = "color: blue;">
    <header>
   
			<h1>The William Podcast Show</h1>
	
      
    </header>
    
	<ul>

		<li><a href='index.php'>Home</a></li>
		<!--<li><a href='?controller=posts&action=index'>Posts</a></li>-->
		<li><a href='?controller=episodes&action=index'>Episodes</a></li>
		<li><a href='?controller=commercials&action=index'>Commercials</a></li>
		<li><a href='?controller=characters&action=index'>Characters</a></li>
		<li><a href='?controller=settings&action=index'>Settings</a></li>
		<li><a href='?controller=artworks&action=index'>Artwork</a></li>
	</ul>
	

	
   	<?php require_once('routes.php'); ?>
   	
    <footer>
      Copyright
    </footer>
  <body>
<html>