<?php $pageTitle = "Submit";?>
<?php
require_once('../util/main.php');
include ('view/header.php');
include ('view/navbar.php');
?>
<div class="container">
  <div class="col-md-8 col-md-offset-2">
    <h1 class="page-header text-center">Submit Score</h1>

    <form action="" method="post" class="form-horizontal">
      <input type="hidden" name="action" value="view_submit_data" />
    </br>
    </br>
      <div class="col-md-8 col-md-offset-2">
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
              <div class="col-md-8">
                <input required type="text" class="form-control" placeholder='Select Date' id="roundDate" name="roundDate"
                data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-end-date='0d' data-date-autoclose=true
                data-date-clear-btn=true data-date-today-highlight=true
                />
              </div>
            </div>

            <div class="row col-md-12 form-group ">
              <label class="control-label col-sm-4" for="holes">Holes:</label>
              <div class=" row col-md-8 ">
                <label class="radio-inline col-md-1">
                  <input type="radio" name="holes" id="front9" value="9">9
                </label>
                <label class="radio-inline col-md-3">
                  <input type="radio" name="holes" id="back9" value="18">18
                </label>
                <input type="submit" name="next" value="Next" class="btn btn-success col-md-3" />
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- JS and CSS for autocomplete and datepicker -->
  <link rel="stylesheet" type="text/css" href="<?php echo $app_path ?>assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" />
  <script type="text/javascript" src="<?php echo $app_path ?>assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
  <script type="text/javascript" src="<?php echo $app_path ?>assets/jQuery-2.2.3/jquery-2.2.3.min.js"></script>
  <script type="text/javascript" src="<?php echo $app_path ?>assets/jquery-ui-1.12.1/jquery-ui.min.js"></script>

  <!-- autocomplete playerSearch -->
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
  <!-- autocomplete courseSearch -->
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
