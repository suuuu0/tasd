<?php
include('../include/websiteheader.php');
?>

  <main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <h2>Trainers</h2>
        <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Trainers Section ======= -->
    <section id="trainers" class="trainers">
      <div class="container" data-aos="fade-up">
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
			<?php 
				$num = $obj_trainer->ShowTrainerFrountJion();
				
				if($num >0)
				{
					while($recoard = $obj_trainer->GetArrayFromRecord())
					{

			?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="<?php echo DTS_WS_SITE_UPLODE;?><?php echo $recoard['timg'] ;?>" class="img-fluid" alt="">
              <div class="member-content">
                <h4><?php echo $recoard['tname'] ?></h4>
                <span><?php echo $recoard['t_details'] ?></span>
                <p>
                  <?php echo $recoard['description'] ?>
                </p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
		  <?php
				}
				}
		  
		  ?>
        </div>
      </div>
    </section><!-- End Trainers Section -->

  </main><!-- End #main -->

<?php
include('../include/websitefooter.php');
?>