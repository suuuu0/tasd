<?php
include('../include/websiteheader.php');
?>
  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Events</h2>
        <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
      <div class="container" data-aos="fade-up">
        <div class="row">
		<?php 		
				$enum = $obj_event->ShowEventfront();
				if($enum >0)
				{
					while($e_record = $obj_event->GetArrayFromRecord())
					{
		?>
          <div class="col-md-6 d-flex align-items-stretch">
            <div class="card">
              <div class="card-img">
                <img src="<?php echo DTS_WS_SITE_UPLODE ?><?php echo $e_record['e_img'] ?>" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href=""><?php echo $e_record['ename'] ?></a></h5>
                <p class="fst-italic text-center"><?php echo $e_record['e_date'] ?></p>
                <p class="card-text"><?php echo $e_record['e_description'] ?></p>
              </div>
            </div>
          </div>
		  <?php 
					}
				}
		?>
        </div>
		

      </div>
    </section><!-- End Events Section -->

  </main><!-- End #main -->

<?php
include('../include/websitefooter.php');
?>