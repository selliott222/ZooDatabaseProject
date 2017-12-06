
<?php
	$db = mysqli_connect('localhost','root','','zoos')
	or die('Error connecting to MySQL server.');
	
	$url = $_SERVER['REQUEST_URI'];
	$parts = parse_url($url);
	parse_str($parts['query'], $urlparams);
	$query_str = str_replace("%20", " ", $urlparams['query']);
	
	$query = $query_str;
	mysqli_query($db, $query) or die('Error querying database.');

	$pagecontents = file_get_contents("query.html");
	
	echo $pagecontents;
	
	$pieces = explode(' ', $query_str);
	$table = array_pop($pieces);
	
	$result = mysqli_query($db, $query);

	echo "<div class='query-content'>";
	
	echo '<h3>' . $urlparams['title'] . ': ' . $query_str . '<br> <br> </h3>';
	
	$counter = 0;
	
	while ($row = mysqli_fetch_array($result)) {
		$test = array_keys($row);
		foreach ($test as $value) {
			if (is_string($value))
			echo $row[$value] . '<br>';
		}
		
		echo '<br>';
		$counter++;
	}
	
	echo "total: " . $counter;
	
	echo "</div>";

?>