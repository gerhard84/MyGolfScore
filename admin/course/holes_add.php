<?php require_once('../../util/main.php');
include 'view/header.php';
include ('view/navbar_admin.php');
require_once('model/course_db.php');
require_once('model/hole_db.php'); ?>
<div class="container">

	<div class="col-md-8 col-md-offset-2">
		<h1 class="page-header text-center">Add Holes</h1>

		<form action="" method="post" class="form-horizontal" >
			 <input type="hidden" name="action" value="holes_add" >
			 <input type="hidden" name="course_id" value="<?php echo $course_id ?>" >

			<div class="col-md-6">
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
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Hole</th>
									<th>Meters</th>
									<th>Par</th>
									<th>SI</th>
								</tr>
							</tfoot>
							<tbody>
								<?php
								for($i=1;$i<=9;$i++)
								{
									echo "<tr>";
									echo "<td><input class='form-control' type='hidden' name='holeNo[]' id='holeNo[]' value='$i' '>$i</td>";
									echo "<div class='col-xs-3'>";
									echo "<td><input class='form-control' type='number' name='meters[]' id='meters[]' value='' required value=''></td>";
									echo "</div>";
									echo "<div class='col-xs-3'>";
									echo "<td><input class='form-control' type='number' name='par[]' id='par[]' value='' required value=''></td>";
									echo "</div>";
									echo "<div class='col-xs-3'>";
									echo "<td><input class='form-control' type='number' name='stroke[]' id='stroke[]' value='' required value=''></td>";
									echo "</div>";
									echo "</tr>";
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<div class="col-md-6">
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
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Hole</th>
									<th>Meters</th>
									<th>Par</th>
									<th>SI</th>
								</tr>
							</tfoot>
							<tbody>
							<?php
							for($i=10;$i<=18;$i++)
							{
								echo "<tr>";
								echo "<td><input class='form-control' type='hidden' name='holeNo[]' id='holeNo[]' value='$i' '>$i</td>";
								echo "<div class='col-xs-3'>";
								echo "<td><input class='form-control' type='number' name='meters[]' id='meters[]' value='' required value=''></td>";
								echo "</div>";
								echo "<div class='col-xs-3'>";
								echo "<td><input class='form-control' type='number' name='par[]' id='par[]' value='' required value=''></td>";
								echo "</div>";
								echo "<div class='col-xs-3'>";
								echo "<td><input class='form-control' type='number' name='stroke[]' id='stroke[]' value='' required value=''></td>";
								echo "</div>";
								echo "</tr>";
							}
							?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="form-group">
				<input type="submit" name="" value="Add Holes" class="btn btn-primary" />
			</div>
		</form>
		<form action="" method="post" >
					<input type="submit" value="Cancel" class="btn btn-danger form-control"/>
			</form>
	</div>
</div>
<?php include "view/footer.php";?>
