
<?php
	$db = mysqli_connect('localhost','root','','zoofriends')
	or die('Error connecting to MySQL server.');
	
	$url = $_SERVER['REQUEST_URI'];
	$parts = parse_url($url);
	parse_str($parts['query'], $urlparams);
	$query_str = str_replace("%20", " ", $urlparams['query']);
	
	$query = $query_str;
	mysqli_query($db, $query) or die('Error/Invalid querying database.');

	$pagecontents = file_get_contents("query.html");
	
	echo $pagecontents;
	
	$pieces = explode(' ', $query_str);
	$table = array_pop($pieces);
	
	$result = mysqli_query($db, $query);

	echo "<div class='query-content'>";
	
	echo '<h3>' . $urlparams['title'] . ':<br>' . $query_str . '<br> <br> </h3>';

	if (!(strpos(strtolower($query), 'select') !== false)) {
		echo 'Query Successful';
		die;
	}
	
	$counter = 0;
	
	while ($row = mysqli_fetch_array($result)) {
		$keys = array_keys($row);
		foreach ($keys as $value) {
			if (is_string($value)){
			
			if ($value == "Description"){
					if (strpos($row[$value], '.jpg') !== false) {
						
						echo '<div style="min-height: 100px;" > <img class="pic" style="width:140px; margin-right:10px; float:left; max-height: 80px;" src="';
						$pos = strpos($row[$value], '.jpg') + 4;
						echo substr($row[$value], 0, $pos) . '"/>';
						echo substr($row[$value], $pos) . '</div>';
						
					}
					else {
						echo $row[$value] . '<br>';
					}
				}
			else {
					echo $value . ': ' . $row[$value] . '<br>';
				}
			}
		}
		
		echo '<br>';
		$counter++;
	}
	
	echo "<h4>total: " . $counter . "</h4>";
	
	echo "</div>";

?>