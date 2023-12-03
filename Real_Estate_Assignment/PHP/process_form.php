<?php
require 'vendor/autoload.php'; // Include PHPMailer autoload file

// Function to validate email address
function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Get form data
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];

// Validate form data
if (empty($name) || empty($mobile) || empty($email) || !isValidEmail($email)) {
    die('Please fill in all the required fields with valid data.');
}

// Save form data to database (replace with your database code)
// Example: $db->query("INSERT INTO contacts (name, mobile, email) VALUES ('$name', '$mobile', '$email')");

// Send email using PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server
$mail->SMTPAuth = true;
$mail->Username = 'username';
$mail->Password = 'pass';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom('your-email@example.com', 'Your Name');
$mail->addAddress('recipient@example.com', 'Recipient Name');
$mail->Subject = 'New Contact Form Submission';

// Email body
$mail->Body = "Name: $name\nMobile Number: $mobile\nEmail Address: $email";

// Send the email
if (!$mail->send()) {
    die('Error sending email.');
}

echo 'Form submitted successfully!';

?>
