<?php $pageTitle = "Admin-Holes";?>
<?php
require_once('../../util/main.php');
include 'view/header.php';
include ('view/navbar_admin.php');
require_once('model/course_db.php');
require_once('model/hole_db.php');
?>
<div class="container">
	<div class="col-md-8 col-md-offset-2  ">
		<h1 class="page-header text-center">Edit Holes for <?php echo $courseName ?></h1>
		<form action="" method="post" class="form-horizontal" >
			<input type="hidden" name="action" value="holes_edit" >
			<input type="hidden" name="course_id" value="<?php echo $course_id ?>" >
			<div class="col-md-5 ">
				<div class="panel panel-primary">
					<div class="panel-heading">Front 9</div>
					<div class="panel-body">
						<table class="table table-striped table-hover width: auto">
							<thead>
								<tr>
									<th>Hole</th>
									<th>Meters</th>
									<th>Par</th>
									<th>SI</th>
									<th>Edit</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($holesF9 as $hole) : ?>
									<tr>
										<td><?php echo $hole['holeNo'];?></td>
										<td><?php echo $hole['meters'];?></td>
										<td><?php echo $hole['par'];?></td>
										<td><?php echo $hole['stroke'];?></td>
										<td>
											<form action="" method="post">
												<input type="hidden" name="action" value="hole_view_edit">
												<input type="hidden" name="course_id" value="<?php echo $course['courseID'];?>">
												<input type="hidden" name="hole_id" value="<?php echo $hole['holeID'];?>">
												<button type="submit" class="btn btn-warning btn-sm">Edit</button>
											</form>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-5 ">
				<div class="panel panel-primary">
					<div class="panel-heading">Back 9</div>
					<div class="panel-body">
						<table class="table table-striped table-hover width: auto">
							<thead>
								<tr>
									<th>Hole</th>
									<th>Meters</th>
									<th>Par</th>
									<th>SI</th>
									<th>Edit</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($holesB9 as $hole) : ?>
									<tr>
										<td><?php echo $hole['holeNo'];?></td>
										<td><?php echo $hole['meters'];?></td>
										<td><?php echo $hole['par'];?></td>
										<td><?php echo $hole['stroke'];?></td>
										<td>
											<form action="" method="post">
												<input type="hidden" name="action" value="hole_view_edit">
												<input type="hidden" name="course_id" value="<?php echo $course['courseID'];?>">
												<input type="hidden" name="hole_id" value="<?php echo $hole['holeID'];?>">
												<button type="submit" class="btn btn-warning btn-sm">Edit</button>
											</form>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="btn-group  col-md-12">
				<div class="col-md-2 col-md-offset-3 inline">
					<input type="button" name="cancel" value="Cancel" class=" col-md-offset-5 btn btn-danger" onClick="window.location='index.php'"/>
				</div>
			</div>
		</form>
	</div>
</div>
<?php include "view/footer.php";?>
