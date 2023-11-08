<?php
include('../include/websiteheader.php');
?>

  <main id="main" data-aos="fade-in">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
	 
        <h2>Courses</h2>
        <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
      </div>
	  
    </div><!-- End Breadcrumbs -->

    <!-- ======= Courses Section ======= -->
    <section id="courses" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
			<?php 
				$num = $obj_course->ShowCoursesFront();
				
				if($num > 0)
				{
					while($recoard = $obj_course->GetArrayFromRecord())
					{
						
			?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="course-item">
              <img src="<?php echo DTS_WS_SITE_UPLODE;?><?php echo $recoard['cimg'] ;?>" class="img-fluid" alt="">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4><?php echo $recoard['cname'] ;?></h4>
                  <p class="price"><i class="fa fa-inr" aria-hidden="true"></i><?php echo $recoard['price'] ;?></p>
                </div>

                <h3><a href="course-details.html"><?php echo $recoard['tname'] ;?></a></h3>
                <p><?php echo $recoard['description'] ;?></p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <img src="<?php echo DTS_WS_SITE_UPLODE;?><?php echo $recoard['timg'] ;?>" class="img-fluid" alt="">
                    <span><?php echo $recoard['tname'] ;?></span>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    
					<button class="arrow_icon_btn"><a href="pricing.php"><span class="pay_class"><b>Pay</b></span></a></button>
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- End Course Item-->
		  
		  <?php
				}
				}
		  
		  ?>
        </div>
      </div>
    </section><!-- End Courses Section -->

  </main><!-- End #main -->
<?php
include('../include/websitefooter.php');
?>
