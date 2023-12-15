<?php
require 'src/PHPMailer.php';
require 'src/SMTP.php';

// Include your database connection here
include('includes/dbconnection.php');

// Function to send an email
function sendEmail($to, $subject, $message)
{
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';  // Replace with your SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'mwelwadavid201901322@gmail.com';  // Replace with your email
        $mail->Password   = 'your_password';  // Replace with your email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;  // Port may vary, check with your email provider

        // Recipients
        $mail->setFrom('mwelwadavid201901322@gmail.com', 'Doctors Appointment System');  // Replace with your email and name
        $mail->addAddress($to);

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

// Retrieve appointments with status 'Approved'
$sql = "SELECT * FROM tblappointment WHERE Status = 'Approved'";
$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($results as $row) {
    $to = $row['Email'];
    $subject = 'Your Appointment has been Approved';
    $message = 'Dear ' . $row['Name'] . ',<br>Your appointment with Appointment Number ' . $row['AppointmentNumber'] . ' has been approved.<br><br>Thank you.';

    // Send the email
    $emailSent = sendEmail($to, $subject, $message);

    // Update the Remark field in the database
    if ($emailSent) {
        $updateSql = "UPDATE tblappointment SET Remark = 'Email sent' WHERE ID = " . $row['ID'];
        $updateQuery = $dbh->prepare($updateSql);
        $updateQuery->execute();
    } else {
        $updateSql = "UPDATE tblappointment SET Remark = 'Email not sent' WHERE ID = " . $row['ID'];
        $updateQuery = $dbh->prepare($updateSql);
        $updateQuery->execute();
    }
}
