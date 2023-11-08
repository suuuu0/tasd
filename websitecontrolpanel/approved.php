<?php
include("../include/configure.php");
require 'phpmailer/src/phpmailer.php';
require 'phpmailer/src/SMTP.php';
require 'phpmailer/src/Exception.php';



if(isset($_POST['submit']) && isset($_POST['aid']) )
{
    
    $student_id = $_POST['aid'];
   
$obj_appr->fetchdata($student_id);
$record = $obj_appr->GetNumRows();
if($record >0)
{
	$data= $obj_appr->GetArrayFromRecord();
}


    $username = generateRandomString();
    $password = generateRandomString();
    // Create a new PHPMailer instance
    $mail = new phpmailer\phpmailer\phpmailer(true);

    try {

        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server address
        $mail->SMTPAuth = true;
        $mail->Username = 'hop543091@gmail.com'; // Replace with your email address
        $mail->Password = 'pefb kylq ffxp ajqi'; // Replace with your email password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('sainivarinder384@gmail.com', 'varinder'); // Replace with your name and email address
        $mail->addAddress($data['g_mail'], $data['fname']); // Add student email and name

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'Account Approval';
        $mail->Body = "Your account has been approved.<br>Username: $username<br>Password: $password";

        // Send email
        $mail->send();

        echo 'Email sent successfully';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    // Save username and password in appstudent table (simulated database operation)
    // Example: saveToAppStudentTable($adid, $username, $password);
    $obj_student->password = ($password);
    $obj_student->username = ($username);
    $obj_student->sname = ($data['fname']);
    $obj_student->lname = ($data['lname']);
    $obj_student->phone = ($data['phone']);
    $obj_student->e_mail = ($data['g_mail']);
    $obj_student->addrecord();

}

// Function to generate random strings
function generateRandomString($length = 8) {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

?>






