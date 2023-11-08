<?php
include('../include/websiteheader.php');


	$tid = isset($_GET['tid'])?$_GET['tid']:1;
	$obj_trainer->FetchData($tid)
?>
  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Student Profile</h2>
        <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Events Section ======= -->
   <section>
    <div class="rt-container">
          <div class="col-rt-12">
              <div class="Scriptcontent">
              
				<!-- Student Profile -->
				<div class="student-profile py-4">
				  <div class="container">
					<div class="row">
					 <?php 
						$num = $data = $obj_trainer->GetNumRows();
						if($num > 0)
						{
							while($data = $obj_trainer->GetArrayFromRecord())
							{
					?>
					  <div class="col-lg-4">
						<div class="card shadow-sm">
						  <div class="card-header bg-transparent text-center">
							<img class="profile_img" src="<?php echo DTS_WS_SITE_UPLODE  ?><?php echo $data['timg']; ?>" alt="student dp" width="100%">
							
						  </div>
						  <!--div class="card-body">
							<p class="mb-0"><strong class="pr-1">Student ID:</strong>321000001</p>
							<p class="mb-0"><strong class="pr-1">Class:</strong>4</p>
							<p class="mb-0"><strong class="pr-1">Section:</strong>A</p>
						  </div-->
						</div>
					  </div>
					  <div class="col-lg-8">
						<div class="card shadow-sm">
						  <div class="card-header bg-transparent border-0">
							<h3 class="mb-0"><i class="far fa-clone pr-1"></i>Student Details<span><a href="<?php echo DTS_WS_SITE_WEBSITEPAGES; ?>edit_student_data.php?tid=<?php echo $_GET['tid']; ?>" class="edit_btn_profile">Edit</a></span></h3>
							
							</div>
						  <div class="card-body pt-0">
							<table class="table table-bordered">
								
								  <tr>
									<th width="30%">Name</th>
									<td width="2%">:</td>
									<td><?php echo $data['tname'] ?></td>
								  </tr>
								  <tr>
									<th width="30%">Course</th>
									<td width="2%">:</td>
									<td><?php echo $data['t_details'] ?></td>
								  </tr>
								  <tr>
									<th width="30%">Fee</th>
									<td width="2%">:</td>
									<td><?php echo $data['description'] ?></td>
								  </tr>
								  <tr>
									<th width="30%">G mail</th>
									<td width="2%">:</td>
									<td><?php echo $data['t_mail'] ?></td>
								  </tr>
								  <tr>
									<th width="30%">Phone</th>
									<td width="2%">:</td>
									<td><?php echo $data['phone'] ?></td>
								  </tr>
								  
							</table>
							 
						  </div>
						</div>
						  <div style="height: 26px"></div>
						<div class="card shadow-sm">
						  <div class="card-header bg-transparent border-0">
							<h3 class="mb-0"><i class="far fa-clone pr-1"></i>Other Information</h3>
						  </div>
						  <div class="card-body pt-0">
							  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
						  </div>
						</div>
					  </div>
					  <?php
										}
									}

							  ?>
					</div>
				  </div>
				</div>
				<!-- partial -->
           
    		</div>
		</div>
    </div>
</section>

  </main><!-- End #main -->

<?php
include('../include/websitefooter.php');
?>