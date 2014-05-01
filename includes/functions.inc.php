<?php 
include_once 'connect.inc.php';


function insertTime() {
	global $dbc;
	$date = $_POST['date'];
	$stime = $_POST['sTime'];
	$etime = $_POST['eTime'];
	$task = $_POST['task'];

	$query = "INSERT INTO times (id, date, startTime, endTime, task) VALUES (null, '$date', '$stime', '$etime', '$task')";

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