<?php
include("../include/configure.php");

if(!isset($_SESSION['adminId']) && $_SESSION['adminId'] == '')
{
	header('location:index.php');exit;
}
$obj_admission->fetchdata();
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
									<h3>approved page</h3>
								</div>
							</div>
							<div class="col-8">
								<div class="add_caures_btn">	
									<a href="add_student_data.php">Add Student Data</a>
								</div>
							</div>
						</div>
					</div>
					<div class="right_form_box">
						<table class="table_box">
							<?php
								$num = $obj_admission->GetNumRows();
								if($num >0)
								{
							?>
							<tr>
								<th>SR.no</th>
								<th> Name</th>
								<th>lastname</th>
								<th>father_name</th>
								<th>G_mail</th>
								<th>Phone</th>
								<th>addres</th>
								
					
	                            <th>EDIT</th>
								<th>DELETE</th>
							</tr>
							<?php 
								$sr = 1;
								while($record = $obj_admission->GetArrayFromRecord())
								{
							?>
							<tr>
								<td><?php echo $sr ?></td>
								<td><?php echo $record['fname']; ?></td>
								<td><?php echo $record['lname']; ?></td>
								<td><?php echo $record['father_name']; ?></td>
								<td><?php echo $record['g_mail']; ?></td>
								<td><?php echo $record['phone']; ?></td>
								<td><?php echo $record['addres']; ?></td>
								
							<td>
								<form action= "approved.php" method="post">
                        <input type="hidden" name="aid" value="<?php echo $record['adid']; ?>">
                        
                        <input type="submit" name="submit">
                    </form>
					
								</td>
							</tr>
							<?php 
								$sr++;
								}
							}
							else
							{
							?>
							<tr>
								<td>No record add</td>
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