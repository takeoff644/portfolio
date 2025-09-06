
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Collect and sanitize input data
	$name = htmlspecialchars(trim($_POST['name']));
	$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
	$subject = htmlspecialchars(trim($_POST['subject']));
	$message = htmlspecialchars(trim($_POST['message']));

	// Validate email
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		// Set the recipient email address
		$to = "paul.mwaniki1@student.moringaschool.com";

		// Create the email content
		$email_content = "Name: $name\n";
		$email_content .= "Email: $email\n";
		$email_content .= "Subject: $subject\n\n";
		$email_content .= "Message:\n$message\n";

		// Create email headers
		$headers = "From: $name <$email>";

		// Send the email
		if (mail($to, $subject, $email_content, $headers)) {
			// Redirect to thank you page or show success message
			echo "Thank you for your message.";
		} else {
			echo "Oops! Something went wrong and we couldn't send your message.";
		}
	} else {
		echo "Invalid email address.";
	}
} else {
	echo "There was a problem with your submission, please try again.";
}
?>
