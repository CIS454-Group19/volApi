<?php
session_start();
	include_once 'dbh.inc.php';

	$uid = $_SESSION['u_id'];
	$request = mysqli_real_escape_string($conn, $_POST['detail']);
	$role = mysqli_real_escape_string($conn, $_POST['role']);
	$date = mysqli_real_escape_string($conn, $_POST['date']);

	$sql = "INSERT INTO appointmentrequest (user_idPatient, appointment_detail, appointment_date, volunteer_role) VALUES (?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		echo "SQL error";
	} else {
		mysqli_stmt_bind_param($stmt, "isss", $uid, $request, $date, $role);
		mysqli_stmt_execute($stmt);
	}
	header("Location: ../index.php?login=$uid");
	exit();