<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mentor_db";

// Create connection
$conn =  mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $g_mail = $_POST['g_mail'];
    $phone = $_POST['phone'];
    $addres = $_POST['addres'];
	$father_name = $_POST['father_name'];
    // Email recipient
   

    // Send email
	$sql = "INSERT INTO admission_form (fname, lname, g_mail, phone, father_name, addres) VALUES ('$fname', '$lname', '$g_mail', '$phone', '$father_name', '$addres')";

if ($conn->query($sql) === TRUE) {

require 'phpmailer/src/phpmailer.php';
require 'phpmailer/src/SMTP.php';
require 'phpmailer/src/Exception.php';

$mail = new phpmailer\phpmailer\phpmailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hop543091@gmail.com';
        $mail->Password = 'pefb kylq ffxp ajqi';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('sainivarinder384@gmail.com', 'Your Name');
        $mail->addAddress($g_mail, $fname . ' ' . $lname);
        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Form Submission';
        $mail->Body = 'First Name: ' . $fname . '<br>'
                     . 'Last Name: ' . $lname . '<br>'
                     . 'Gmail: ' . $g_mail . '<br>'
                     . 'Mobile Number: ' . $phone . '<br>'
                     
                     . 'Address:' . $addres;

        $mail->send();
        echo 'Email sent successfully';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
}
$conn->close();

?>








<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Animated Login & Registration Form | Codehal</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="../assets/css/style.css" rel="stylesheet">
	<link href="../assets/css/backand_style.css" rel="stylesheet">
	<link href="../assets/css/student_form.css" rel="stylesheet">
	<link href="../assets/css/profile.css" rel="stylesheet">
	<link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="body_bg">
	
	<div class="wrapper">
		<div class="container">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				<div class="row">
					<h2>Admission Form</h2>
					<div class="col-sm-12 col-md-6">
						<div class="input-group mb-3">
							<input type="text" name="fname"  >
							<label for="">First Name</label>
						</div>
						<span class="error">*</span>
						<div class="input-group mb-3">
							<input type="text" name="lname">
							<label for="">Last Name</label>
						</div>
						<span class="error">*</span>
						<div class="input-group mb-3">
							<input type="mail" name="g_mail" >
							<label for="">G Mail</label>
						</div>
						<span class="error">*</span>			
					</div>
					<div class="col-sm-12 col-md-6">
						<div class="input-group mb-3">
							<input type="text" name="father_name" >
							<label for="">Father Name</label>
						</div>
						<span class="error">*</span>	
						<div class="input-group mb-3">
							<input type="num"  name="phone">
							<label for="">Phone</label>
						</div>
						<span class="error">*</span>	
						<div class="input-group mb-3">
							<input type="text" name="addres" >
							<label for="">Addres</label>
						</div>
						<span class="error">*</span>	
					</div>
					<div class="col-sm-12 col-md-12 mt-3" >
						<input type="submit" class="form_btn">
					</div>
				</div>
			</form>
		</div>
	</div>
  
  <script src="script.js"></script>
   <script >
   
   const signInBtnLink = document.querySelector('.signInBtn-link');
const signUpBtnLink = document.querySelector('.signUpBtn-link');
const wrapper = document.querySelector('.wrapper');
signUpBtnLink.addEventListener('click', () => {
    wrapper.classList.toggle('active');
});
signInBtnLink.addEventListener('click', () => {
    wrapper.classList.toggle('active');
});
   
   
   </script>
</body>
</html>