 <?php
include("../include/configure.php");
//print_r($_SESSION);exit;
if(!isset($_SESSION['adminId']) && $_SESSION['adminId'] == '')
{
	header('location:index.php');exit;
}	
$obj_course->ShowCourses();
?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet"  href="<?php echo DTS_WS_SITE_WEB_ASSETS; ?>css/bootstrap.min.css">
	<link rel="stylesheet"  href="<?php echo DTS_WS_SITE_WEB_ASSETS; ?>css/backand_style.css">
	<title><?php echo PAGES_TITLE; ?></title>
</head>
<body>
<!-- start header -->
	<?php include("../include/backand_header.php"); ?>
<!-- and header -->
<!-- center part start-->

	<div class="container-fluid ">
		<div class="row">
			<!-- side baar start-->
			<div class="col-3">
				<?php include("../include/side_bar_link.php") ?>
			</div>
			<!-- side baar and-->
			<div class="col-9">
				<div class="padding_all">
					<div class="catrgory_section">
						<div class="row">
							<div class="col-4">
								<div class="category_text">
									<h3>Coureses Page</h3>
								</div>
							</div>
							<div class="col-8">
								<div class="add_caures_btn">	
									<a href="add_courses.php">Add Coures</a>
								</div>
							</div>
						</div>
					</div>
					<div class="right_form_box">
					
						<table class="table_box">
						<?php
							$cnum = $obj_course->GetNumRows();
							if($cnum>0)
								{
								?>
									<tr>
										<th>Sr.No</th>
										<th>Courses Name</th>
										<th>Courses Description</th>
										<th>Courses Price</th>
										<th>Courses Image</th>
										<th>Edit</th>
										<th>Delete</th>
									</tr>
									<?php
									$sr =1;
									while ($record = $obj_course->GetArrayFromRecord()) 
									{
									?>
									<tr>
										<td><?php echo $sr;?></td>
										<td><?php echo $record['cname'];?></td>
										<td><?php echo $record['description'];?></td>
										<td><?php echo $record['price'];?></td>
										<td><?php echo $record['cimg'];?></td>
										<td><a class="coures_edit_btn" href="edit_course.php?cid=<?php echo $record['cid'];?>">EDIT</a></td>
										<td><a class="coures_delete_btn" href="delete_course.php?cid=<?php echo $record['cid'];?>">DELETE</a></td>
									</tr>
									<?php
									$sr++;
									}
								}
								else
								{	
								?>
								<tr>
									<td>No Record Found</td>
								</tr>
								<?php
								}
							?>
							
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- center part and-->

<!-- start footer -->
<!-- and footer -->
</body>
</html>