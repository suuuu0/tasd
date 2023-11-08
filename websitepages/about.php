<?php
include('../include/websiteheader.php');
 
?>
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>About Us</h2>
        <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="../assets/img/about.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
            <p class="fst-italic">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
              <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
              <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
            </ul>
            <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
            </p>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
		<?php 
			include('../include/total_count.php');
		?>

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Testimonials</h2>
          <p>What are they saying</p>
        </div>
		
        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">	
          <div class="swiper-wrapper">
			<?php 
				$obj_review->ShowCourses();
				$num = $obj_review->GetNumRows();
				if($num > 0)
				{
				while($vdata = $obj_review->GetArrayFromRecord() )
				{

			?>
            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="<?php echo DTS_WS_SITE_UPLODE;?><?php echo $vdata['vimg'] ;?>" class="testimonial-img" alt="">
                  <h3><?php echo $vdata['vname']?></h3>
                  <h4><?php echo $vdata['vcourse']?></h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    <?php echo $vdata['description']?>
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->
			  <?php 
					}
				}
			?>
          </div>
        </div>
      </div>
    </section><!-- End Testimonials Section -->

  </main><!-- End #main -->

<?php
include('../include/websitefooter.php');
?>