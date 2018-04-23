<?php
session_start();
	include_once 'dbh.inc.php';

	$uid = $_SESSION['u_id'];
	$uidVol = 1; //fix 
	$request = mysqli_real_escape_string($conn, $_POST['detail']);
	$date = mysqli_real_escape_string($conn, $_POST['date']);
	$status = 3;

	$sql = "INSERT INTO appointment (user_idPatient, user_idVolunteer,appointment_detail, appointment_date, appointment_status) VALUES (?, ?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		echo "SQL error";
	} else {
		mysqli_stmt_bind_param($stmt, "iissi", $uid, $uidVol, $request, $date, $status);
		mysqli_stmt_execute($stmt);
	}
	header("Location: ../index.php?login=$uid");
	exit();