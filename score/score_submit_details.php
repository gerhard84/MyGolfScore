<?php
echo	'<pre>';
var_dump($_POST);
echo'</pre>';
?>

<?php
require_once('../util/main.php');
include 'view/header.php';
include ('view/navbar.php');
//require_once('model/course_db.php');
//require_once('model/hole_db.php');
//require_once('model/player_db.php');
?>

  <div class="container">

  	<div class="col-md-8 col-md-offset-2">
  		<h1 class="page-header text-center">Submit Score</h1>

  		<form action="" method="post" class="form-horizontal" >
        <input type="hidden" name="action" value="view_submit_data" />
  			<div class="col-sm-8">
  				<div class="panel panel-primary">
  					<div class="panel-heading">Round Details</div>
  					<div class="panel-body">

              <div class="form-group">
                      <label class="control-label col-sm-4" for="player">Player:</label>
                      <div class="col-sm-8">
                        <input type='search' id='playerSearch' name="player" placeholder='Search Name' required class="form-control"/>
                        <input type="hidden" id='playerID'name="playerID" value="" />
                      </div>
                  </div>


                  <div class="form-group">
                  <label class="control-label col-sm-4" for="course_name">Course:</label>
                      <div class="col-sm-8">
                          <input type="search" id='courseSearch' name="course" placeholder='Search Course' required class="form-control"/>
                          <input type="hidden" id='courseID'name="courseID" value="" />
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="control-label col-sm-4" for="date">Date:</label>
                      <div class="col-sm-8">
                          <input required class="form-control" id="date" name="date" placeholder="DD/MM/YYY" type="text"/>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="control-label col-sm-4" for="holes">Holes:</label>
                      <div class="col-sm-4">
                        <label class="radio-inline">
                          <input type="radio" name="holes" id="front9" value="9">9
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="holes" id="back9" value="18">18
                        </label>
                      </div>
                  </div>

                  </div>
                </div>
                <div class="form-group">
                        <input type="submit" name="next" value="Next" class="btn btn-primary" />
                    </div>

                  </div>
            </form>
              </div>
              </div>

              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
              <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"></script>

              <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

              <script type="text/javascript">
                $(document).ready(function(){
                  $('#playerSearch').autocomplete({
                      source:'searchPlayer.php',
                      minLength:1,
                      select: function(event, ui){
                          // just in case you want to see the ID
                          var playerID = ui.item.value;
                          //console.log(playerID);
                          $('#playerID').val(playerID);
                          // now set the label in the textbox
                          var playerText = ui.item.label;
                          $('#playerSearch').val(playerText);
                          return false;
                      },
                      focus: function( event, ui ) {
                          // this is to prevent showing an ID in the textbox instead of name
                          // when the user tries to select using the up/down arrow of his keyboard
                          $( "#playerSearch" ).val( ui.item.label );
                          return false;
                      },

                 });

              });
              </script>

              <script type="text/javascript">
                $(document).ready(function(){
                  $('#courseSearch').autocomplete({
                      source:'searchCourse.php',
                      minLength:1,
                      select: function(event, ui){
                          // just in case you want to see the ID
                          var courseID = ui.item.value;
                          //console.log(courseID);
                          $('#courseID').val(courseID);
                          // now set the label in the textbox
                          var courseText = ui.item.label;
                          $('#courseSearch').val(courseText);
                          return false;
                      },
                      focus: function( event, ui ) {
                          // this is to prevent showing an ID in the textbox instead of name
                          // when the user tries to select using the up/down arrow of his keyboard
                          $( "#courseSearch" ).val( ui.item.label );
                          return false;
                      },

                 });

              });
              </script>

              <!-- Include Date Range Picker -->


              <script>
                $(document).ready(function(){
                  var date_input=$('input[name="date"]'); //our date input has the name "date"
                  var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
                  date_input.datepicker({
                    format: 'dd/mm/yyyy',
                    container: container,
                    todayHighlight: true,
                    autoclose: true,
                  })
                })
              </script>
