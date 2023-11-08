<?php
include('../include/websiteheader.php');

if(isset($_POST['submit']))	
{
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $father_name = $_POST['father_name'];
  $parent_phone = $_POST['parent_phone'];
  $course = $_POST['course'];
  $year = $_POST['year'];
  $address = $_POST['address']; 
$message = '
 <head>
   <link href="<?php echo DTS_WS_SITE_WEB_ASSETS; ?>css/style.css" rel="stylesheet" type="text/css"/>
 </head>

<div class="container">
     <div class="row">
	     <div class="col-md-12"></div>
			 <div class="email-template">
			 <h1 class="logo me-auto"><a href="index.php">Mentor</a></h1>
			 <h2>New Student Registration for TASD</h2>
			 <h3>Following is your detail in our portal</h3>
			 <h4>First Name: '.$first_name.' '.$last_name.'</h4>
			 <h4>Email Address: '.$email.'</h4>
			 <h4>Phone Number: '.$phone.'</h4>
			 <h4>Father Number: '.$father_name.'</h4>
			 <h4>Parents Number: '.$parent_phone.'</h4>
			 <h4>Course: '.$course.'</h4>
			 <h4>Year: '.$year.'</h4>
			 <h4>Address: '.$address.'</h4>
			 <a href="">http://localhost/tasd</a>
			 <p>You are Successfully Registered on our Web Portal. If you have any changes in your
			 Details. Kindly update with following detail:</p>
			 <h4>Username:</h4>
			 <h4>Password:</h4>
		 </div>
	 </div>
 </div>';
$to = "somebody@example.com, somebodyelse@example.com";
$subject = "New Student Rgistration for TASD";

echo $message;
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <webmaster@example.com>' . "\r\n";
$headers .= 'Cc: myboss@example.com' . "\r\n";

//mail($to,$subject,$message,$headers);
}

?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Contact Us</h2>
        <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div data-aos="fade-up">
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container" data-aos="fade-up">
        <div class="row mt-5">
          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>A108 Adam Street, New York, NY 535022</p>
              </div>
              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@example.com</p>
              </div>
              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+1 5589 55488 55s</p>
              </div>
            </div>
          </div>
          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="contact.php" method="post" role="form" class="">
              <div class="row mb-2">
                <div class="col-md-6 form-group">
                  <input type="text" name="first_name" class="form-control" id="name" placeholder="First Name">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name">
                </div>
              </div>
			  <div class="row mb-2">
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone">
                </div>
              </div>
			  <div class="row mb-2">
                <div class="col-md-6 form-group">
                  <input type="text" class="form-control" name="father_name" id="father_name" placeholder="Father name">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="tel" class="form-control" name="parent_phone" id="parent_phone" placeholder="Parent Phone">
                </div>
              </div>
		       <div class="row mb-2">
                <div class="col-md-6 form-group">
                  <input type="text" class="form-control" name="course" id="course" placeholder="Course Name">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="date" class="form-control" name="year" id="year" placeholder="Year">
                </div>
              </div>
              <div class="form-group mt-3 mb-2">
                <textarea class="form-control" name="address" rows="5" placeholder="Address"></textarea>
              </div>
              
              <div class="text-center"><button type="submit" name="submit" class="concat-page-btn">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

<?php
include('../include/websitefooter.php');
?>