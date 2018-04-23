<?php
session_start();
	include_once 'dbh.inc.php';

	$uid = $_SESSION['u_id'];
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$location = mysqli_real_escape_string($conn, $_POST['location']);
	$bio = mysqli_real_escape_string($conn, $_POST['bio']);
	$pwd = mysqli_real_escape_string($conn, $_POST['password']);

	if ($email != "") {
		$updateEmail = "UPDATE users SET user_email = '$email' WHERE user_id = '$uid'";
		mysqli_query($conn, $updateEmail);
	}

	if ($location != "") {
		$updateLocation = "UPDATE users SET user_location = '$location' WHERE user_id = '$uid'";
		mysqli_query($conn, $updateLocation);
	}

	if ($bio != "") {
		$updateBio = "UPDATE users SET user_bio = '$bio' WHERE user_id = '$uid'";
		mysqli_query($conn, $updateBio);
	}

	if ($pwd != "") {
		$updatePwd = "UPDATE users SET user_pwd = '$pwd' WHERE user_id = '$uid'";
		mysqli_query($conn, $updatePwd);
	}
	header("Location: ../index.php?login=$uid");
	exit();