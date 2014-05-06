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
		<label for="stime">Start Time: </label><input type="text" id="stime" name='startTime'>
		<label for="etime">End Time: </label><input type="text" id="etime" name='endTime'>
		<?php echo time(); ?>
		<textarea name="task" id="task" cols="30" rows="10" placeholder="Task Details"></textarea>
		<button type="submit">Submit</button>
	</form>
	<?php 
	
// $times = get_data('times', 'date', 'startTime', 'endTime', 'task'); , 1399406598
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

		if (count($myResults) >0) {
			foreach ($myResults as $key => $value) {
				$subtotal = date("H:i", $value['endTime']) - date("H:i", $value['startTime']);
				$total += $subtotal;
				?>
				<tr>

					<td><?php echo date("m-d-Y", $value['startTime']); ?></td>
					<td><?php echo $value['task']; ?></td>
					<td><?php echo date("H:i", $value['startTime']); ?></td>
					<td><?php echo date("H:i", $value['endTime']); ?></td>
					<td class="total"><?php echo $subtotal; ?></td>
				</tr>
				<?php
			}
		}

	 ?>
	</table>
<?php echo $total . " total hours to date."; ?>


	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.datetimepicker.js"></script>
	<script src="js/script.js"></script>
</body>
</html>