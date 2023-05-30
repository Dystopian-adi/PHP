<?php
if($_SERVER['REQUEST_METHOD']=="POST")
{
	if(isset($_POST['reported_by']) && isset($_POST['email']) && isset($_POST['report_desc'])){
		
		$name = $_POST['reported_by'];
		$email = $_POST['email'];
		$report_type = $_POST['report_type'];
		$desc = $_POST['report_desc'];
		$subject = "Someone reported a video in our app!";
		$video_url = $_POST['reported_content'];
		$appname = $_POST['appname'];
		$package_name = $_POST['package_name'];


		// $con=mysqli_connect("localhost","drsyttvbhp","Knj9nRTh4c","drsyttvbhp");
		$con = mysqli_connect("localhost","root","","test");
		$result=mysqli_query($con,"INSERT INTO `reports`(`id`, `reported_by`, `report_type`, `reported_content`, `report_desc`, `email`, `appname`, `package_name`, `created_at`) VALUES ('NULL','$name','$report_type','$video_url','$subject','$email','$appname','$package_name',CURRENT_TIMESTAMP)");

        include("../mail.php");
        $body = '<html><body>';
		$body .= '<h1>From Report Api!</h1>';
		$body .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
		$body .= "<tr><td><strong>App name:</strong> </td><td>" .$appname. "</td></tr>";
		$body .= "<tr><td><strong>Package name:</strong> </td><td>" .$package_name. "</td></tr>";
		$body .= "<tr style='background: #eee;'><td><strong>Reported By Name:</strong> </td><td>" .$name. "</td></tr>";
		$body .= "<tr><td><strong>Email:</strong> </td><td>" .$email. "</td></tr>";
		$body .= "<tr><td><strong>Type of Report:</strong> </td><td>" .$report_type. "</td></tr>";
		$body .= "<tr><td><strong>Description:</strong> </td><td>" .$desc. "</td></tr>";
		$body .= "<tr><td><strong>Reported video URL To Change:</strong> </td><td>" .$video_url. "</td></tr>";
		$body .= "</table>";
		$body .= "</body></html>";

        email($subject,$name,$body);
	}
}