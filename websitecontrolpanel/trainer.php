<?php
include("../include/configure.php");

if(!isset($_SESSION['adminId']) && $_SESSION['adminId'] == '')
{
	header('location:index.php');exit;
	
}
$obj_trainer->ShowCourses();
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
									<a href="add_trainer.php">Add Trainer</a>
								</div>
							</div>
						</div>
					</div>
					<div class="right_form_box">
						<table class="table_box">
							<?php
								$tnum = $obj_trainer->GetNumRows();
								if($tnum>0)
								{
									?>
										<tr>
											<th>SR.no</th>
											<th>Trainer Name</th>
											<th>Trainer Details</th>
											<th>Description</th>
											<th>Image</th>
											<th>Phone</th>
											<th>Username</th>
											<th>Password</th>
											<th>EDIT</th>
											<th>DELETE</th>
										</tr>
										<?php 
											$sr =1;
											while($record = $obj_trainer->GetArrayFromRecord() )
											{
										?>
									<tr>
										<td><?php echo $sr;?></td>
										<td><?php echo $record['tname']?></td>
										<td><?php echo $record['t_details']?></td>
										<td><?php echo $record['description']?></td>
										<td><?php echo $record['timg']?></td>
										<td><?php echo $record['phone']?></td>
										<td><?php echo $record['username']?></td>
										<td><?php echo $record['password']?></td>
										<td><a class="coures_edit_btn" href="edit_trainer.php?tid=<?php echo $record['tid'] ?>&?cid=<?php echo $record['cid'] ?>">EDIT</a></td>
										<td><a class="coures_delete_btn" href="delete_trainer.php?tid=<?php echo $record['tid'];?>">DELETE</a></td>
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