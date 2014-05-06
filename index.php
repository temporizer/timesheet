<?php include_once "includes/functions.inc.php"; 
		if($_SERVER['REQUEST_METHOD'] == "POST") {
				insertTime();
		}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Time Sheet</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/jquery.datetimepicker.css">
</head>
<body>
	<h1>Time sheet</h1>


	<form action="index.php" method="POST">
		<label for="date">Date: </label><input type="text" id="date" name='date' placeholder="Date">
		<label for="stime">Start Time: </label><input type="text" id="stime" name="sTime" placeholder="Start Time">
		<label for="etime">End Time: </label><input type="text" id="etime" name="eTime" placeholder="End Time">
		<textarea name="task" id="task" cols="30" rows="10" placeholder="Task Details"></textarea>
		<button type="submit">Submit</button>
	</form>
	<?php 
	
// $times = get_data('times', 'date', 'startTime', 'endTime', 'task');
?>
	<table>
		<tr>
			<td>Date</td>
			<td>Task</td>
			<td>Start Time</td>
			<td>End Time</td>
			<td># Hours</td>
		</tr>
	<?php 
		$total = NULL;
		$myResults = getTimes();
		foreach ($myResults as $key => $value) {
			$subTotal = $value['endTime'] - $value['startTime'];
			$total += $subTotal;
			?>
			<tr>

				<td><?php echo $value['date']; ?></td>
				<td><?php echo $value['task']; ?></td>
				<td><?php echo $value['startTime']; ?></td>
				<td><?php echo $value['endTime']; ?></td>
				<td class="total"><?php echo $subTotal; ?></td>
			</tr>
			<?php
		}

	 ?>
	</table>
<?php echo $total . " total hours to date."; ?>


	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.datetimepicker.js"></script>
	<script src="js/script.js"></script>
</body>
</html>