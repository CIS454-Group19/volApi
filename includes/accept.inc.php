<?php
session_start();
	include_once 'dbh.inc.php';

	$appointment = 1; // need to get
	$uidVol = $_SESSION['u_id'];
	$status = mysqli_real_escape_string($conn, $_POST['button']);

	$sql = "UPDATE appointment SET appointment_status = '$status', user_idVolunteer = '$uidVol'  WHERE appointment_num = '1'";

	mysqli_query($conn, $sql);
	header("Location: ../index.php?login=$uid");
	exit();
