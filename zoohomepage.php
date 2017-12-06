
<?php
	$db = mysqli_connect('localhost','root','','zoos')
	or die('Error connecting to MySQL server.');
	 
	$query = "SELECT * FROM animal";
	mysqli_query($db, $query) or die('Error querying database.');

	$pagecontents = file_get_contents("zoohomepage.html");

	echo str_replace("", "", $pagecontents);

?>