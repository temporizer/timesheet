<?php 

define('HOST', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', 'root');
define('DATABASE', 'timesheet');

$dbc = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or "Error". mysqli_error();
mysqli_set_charset($dbc, 'utf8');



 ?>