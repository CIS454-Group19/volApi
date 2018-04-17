<?php

session_start();

if (isset($_POST['submit'])) {

	include 'dbh.inc.php';

	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

		$sql = "SELECT * FROM users WHERE user_uid='$uid'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header("Location: ../index.php?login=errorOne");
			exit();
		} else {
			if ($row = mysqli_fetch_assoc($result)) {
				
				$passwordGet = "SELECT user_pwd FROM users WHERE user_uid='$uid'";
				$checkPwd = mysqli_query($conn, $passwordGet);
				$checker = mysqli_fetch_array($checkPwd);
				$lastCheck = $checker['user_pwd'];
				

				if ($pwd != $lastCheck) {
					header("Location: ../index.php?login=errorTwo");
					exit();

				} elseif ($pwd == $lastCheck) {
					//log in user
					$_SESSION['u_id'] = $row['user_id'];
					$_SESSION['u_first'] = $row['user_first'];
					$_SESSION['u_last'] = $row['user_last'];
					$_SESSION['u_email'] = $row['user_email'];
					$_SESSION['u_uid'] = $row['user_uid'];
					$_SESSION['u_role'] = $row['user_role'];

					//checking role of user logging in to direct to right web page
					$roleGet = "SELECT user_role FROM users WHERE user_uid='$uid'";
					$checkRole = mysqli_query($conn, $roleGet);
					$roleDetermine = mysqli_fetch_array($checkRole);
					$roleCheck = $roleDetermine['user_role'];
					$patient = "patient";

					if ($roleCheck == $patient) {
					header("Location: ../patient.php?login=patient"); //sends to webpage for patients
					exit();
				} else {
					header("Location: ../volunteer.php?login=notpatient"); //sends to webpage if not patient
					exit();
				}
				}
			}
		}
	}	else {
		header("Location: ../index.php?login=errorThree");
		exit();
	}
