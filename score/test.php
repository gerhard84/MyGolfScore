
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	<title>jQuery Calculation Plug-in</title>

	<!---// load jQuery v1.3.1 from the GoogleAPIs CDN //--->

</head>
<body>
		<!--// load jQuery Plug-ins //-->
	<script type="text/javascript" src="../assets/jQuery-2.2.3/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="../assets/jquery.field.js"></script>
	<script type="text/javascript" src="../assets/jquery.calculation.js"></script>
	<script type="text/javascript">
	$(document).ready(
		function (){

			// automatically update the "#totalSum" field every time
			// the values are changes via the keyup event
			$("input[name^=f9hScore]").sum("keyup", "#f9Gross");
		}
	);
	</script>

<form action="" method="post">
	<fieldset>
		<legend>Calculation Examples</legend>
		<div id="formContent">
			<table class="table table-striped table-hover width: auto">
				<thead>
					<tr>
						<th>Hole</th>
						<?php for($i=1;$i<=9;$i++) { ?>
						<th><?php echo $i;?></th>
						<?php } ?>
						<th>Gross</th>
						<th>Net</th>
					</tr>
				</thead>
				<tbody>
						<tr>
							<th>Score</th>
						<?php for($i=1;$i<=9;$i++) { ?>
						<td><input class='form-control' type='text' name='f9hScore[]' id='f9hScore' value='0' required value=''></td>
						<?php } ?>
						<td><input class='form-control' type='text' name='f9Gross' id='f9Gross' value='0' required value='' readonly="readonly"></td>
						<td><input class='form-control' type='text' name='f9Total' id='f9Total' value='0' required value='' readonly="readonly"></td>
						</tr>
				</tbody>
			</table>
		</div>
	</fieldset>
</form>

</body>
</html>
