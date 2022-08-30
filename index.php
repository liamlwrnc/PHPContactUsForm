<?php

$formdata = [];

if (isset($_POST['name'], $_POST['email'], $_POST['comments'])) {
	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$responses[] = 'email isnt valid';
	}
	if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['comments'])) {
		$responses[] = 'please complete all fields';
	} 
	if (!$responses) {

		$to = 'example@example.com';
		$from = 'example@example.com';
		$comments = $_POST['comments'];

		if (mail($to, $from, $comments)) {
			$formdata[] = 'submitted';		
		} else {
			$formdata[] = 'not submitted';
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
    <link rel="stylesheet" href="style.css">
		<title>Contact Us</title>
	</head>
	<body>
		<form class="contact-us" method="post" action="">
			<h1>Contact Form</h1>
			<div class="fields">
					<div><input id="option" type="text" name="name" placeholder="Name" required></div>
					<div><input id="option" type="email" name="email" placeholder="Email" required></div>
				<div><textarea id="option" name="comments" placeholder="Comments" required></textarea></div>
			<div><input type="submit" id="option"></div>
		</form>
	</body>
</html>