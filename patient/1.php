<?php
	include("connection.php");
	$id=$_POST['id'];
	$sq="UPDATE patient_master SET view=1 WHERE patient_id='$id'";
	$qw=mysqli_query($con,$sq);
	header("location:view_record.php");
?>