<?php
require_once('../../util/main.php');
include 'view/header.php';
include ('view/navbar_admin.php');
require_once('model/course_db.php');
require_once('model/hole_db.php');
//echo	'<pre>';
//var_dump($_POST);
//echo'</pre>';
?>
<div class="container">
	<div class="col-md-8 col-md-offset-2">
		<h1 class="page-header text-center">Edit hole <?php echo $hole['holeNo'] ?>  for: </br> <?php echo $courseName ?></h1>
			<form action="" method="post" class="form-horizontal" >
				 <input type="hidden" name="action" value="hole_edit" >
				 <input type="hidden" name="course_id" value="<?php echo $course_id ?>" >
				 <input type="hidden" name="hole_id" value="<?php echo $hole_id ?>" >
		<div class="col-md-7 col-md-offset-2">
			<table class="table table-striped table-hover width: auto">
				<thead>
					<tr>
						<th>Hole</th>
						<th>Meters</th>
						<th>Par</th>
						<th>SI</th>
					</tr>
				</thead>
				<tbody>
					<tr>
					<td><input class='form-control' type='hidden' name='holeNo' id='holeNo' value='<?php echo $hole['holeNo'];?>'><?php echo $hole['holeNo'];?></td>
					<div class='col-xs-3'>
					<td><input class='form-control' type='number' name='meters' id='meters' value='<?php echo $hole['meters'];?>' required value=''></td>
					</div>
					<div class='col-xs-3'>
					<td><input class='form-control' type='number' name='par' id='par' value='<?php echo $hole['par'];?>' required value=''></td>
					</div>
					<div class='col-xs-3'>
					<td><input class='form-control' type='number' name='stroke' id='stroke' value='<?php echo $hole['stroke'];?>' required value=''></td>
					</div>
					</tr>
				</tbody>
			</table>


			<div class="btn-group inline col-md-12">
								<div class="col-md-4 col-md-offset-3 inline">
										<input type="submit" value="Update" class="btn btn-success form-control"/>
								</div>
								<div class="col-md-2  inline">
										<input type="button" name="cancel" value="Cancel" class="btn btn-danger" onClick="window.location='index.php'"/>
								</div>
						</div>
				</form>
		</div>
</div>
</div>
<?php include "view/footer.php";?>
