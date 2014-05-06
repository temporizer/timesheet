<?php 
include_once 'connect.inc.php';


function insertTime() {
	global $dbc;
	$startTime = strtotime($_POST['startTime']);
	$endTime = strtotime($_POST['endTime']);
	// $startTime = $_POST['startTime'];
	// $endTime = $_POST['endTime'];
	$task = $_POST['task'];

	$query = "INSERT INTO times (id, startTime, endTime, task) VALUES (null, $startTime, $endTime, '$task')";

	mysqli_query($dbc, $query);
}

function getTimes() {
	global $dbc;
	$results = null;
	$sql = "SELECT * FROM times";
	$query = mysqli_query($dbc, $sql);
	$num_results = mysqli_num_rows($query);

	for ($i=0; $i<$num_results; $i++) {
		$results[] = mysqli_fetch_assoc($query);
	}
		return $results;
}

?>