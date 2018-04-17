<?php
	include_once 'header.php';
?>
<script>

 function calendar() {
 	var today = new Date().toISOString().split('T')[0];
 	document.getElementsByName("date")[0].setAttribute('min', today);

 	document.getElementById("form").reset();
}

 function vaildateForm() {

 	var details = document.forms["request"]["detail"].value;
 	if (details == "") {
 		alert("Detail section must be filled out.");
 		return false;
 	}
 	var date = document.forms["request"]["date"].value;
 	if (date == "") {
 		alert("A date must be selected");
 		return false;
 	}
 }
</script>
<section class="main-container">
	<div class="main-wrapper">
		<h2>Patient Page</h2>
	</div>

<div id="request">
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#request-modal" onclick="calendar()">Request Aid</button>
</div>
<div id="request-modal" class="modal fade" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<a class="close" data-dismiss="modal">×</a>
<h3>Request Form</h3>
</div>
<div class="modal-body">
<form class="request" name="request" action="includes/request.inc.php" onsubmit="return vaildateForm()" id="form" method="POST">
<strong>Details</strong>
<br/>
<textarea name="detail" rows="15" cols="48" placeholder="Type in the details of your request" maxlength="2000"></textarea>
<br/>
<strong>Type of Volunteer</strong>
<select class="form-control" style="width:auto" name="role" id="role">
   	<option value="virtualSpecialist">Virtual Specialist</option>
   	<option value="specialist">Specialist</option>
    <option value="generalPractitioner">General Practitioner</option>
</select>
<br/>
<strong>Date to Receive Aid</strong>
<input type="Date" name="date">
<br/>
<button class="btn btn-success" id="submit">Send</button>
<a href="#" class="btn" data-dismiss="modal">Close</a>
</form>
</div>
</div>
</div>
</div>
</section>

<?php
	include_once 'footer.php';
	/*
	if (isset($_SESSION['u_id'])) { to change content on page
	...
	} 
	*/
?>