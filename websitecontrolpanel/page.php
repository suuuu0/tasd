<?php
include("../include/configure.php");

$obj_page->ShowCourses();
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
									<a href="add_page.php">Add page</a>
								</div>
							</div>
						</div>
					</div>
					<div class="right_form_box">
						<table class="table_box">
							<?php
								$num = $obj_page->GetNumRows();
								if($num>0)
								{
							?>
							<tr>
								<th>SR.no</th>
								<th>Page Name</th>
								<th>Description</th>
								<th>EDIT</th>
								<th>DELETE</th>
							</tr>
							<?php 
								$sr = 1;
								while($record = $obj_page->GetArrayFromRecord())
								{
							?>
							<tr>
								<td><?php echo $sr; ?></td>
								<td><?php echo $record['pname']; ?></td>
								<td><?php echo $record['description']; ?></td>
								<td><a class="coures_edit_btn" href="edit_page.php?pid=<?php echo $record['pid']; ?>">EDIT</a></td>
								<td><a class="coures_delete_btn" href="delete_page.php?pid=<?php echo $record['pid']; ?>">DELETE</a></td>
							</tr>
							<?php
							$sr++;
								}
								}
								else
								{
							?>
							<tr>
								<td>not add record</td>
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