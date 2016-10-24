<?php
 include 'view/header.php';
 include 'view/navbar_admin.php';
 require_once 'model/course_db.php';
 ?>
<div class="container">

<div class="col-md-5 col-md-offset-3">
    <h1 class="page-header text-center">Course Add</h1>

  <form action="" method="post" class="form-horizontal">
      <input type="hidden" name="action" value="course_add" />


      <div class="form-group">
          <label class="control-label col-sm-4" for="name">Course Name:</label>
          <div class="col-sm-8">
              <input type="text" name="name" value="" required class="form-control" />
          </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-4" for="city">City:</label>
          <div class="col-sm-8">
              <input type="text" name="city" value="" required class="form-control"/>
          </div>
      </div>

      <div class="form-group">
          <label class="control-label col-sm-4" for="province">Province:</label>
          <div class="col-sm-8">
              <input type="text" name="province" value="" required class="form-control"/>
          </div>
      </div>

      <div class="form-group">
          <label class="control-label col-sm-4" for="tel">Telephone:</label>
          <div class="col-sm-8">
              <input type="number" name="tel" value="" required class="form-control"/>
          </div>
      </div>

      <div class="form-group">
          <label class="control-label col-sm-4" for="website">Website:</label>
          <div class="col-sm-8">
              <input type="text" name="website" value="" required class="form-control"/>
          </div>
      </div>

      <div class="form-group">
          <label class="control-label col-sm-4" for="email">Email:</label>
          <div class="col-sm-8">
              <input type="email" name="email" value="" required class="form-control"/>
          </div>
      </div>

      <div class="form-group">
          <label class="control-label col-sm-4" for="rating">Rating:</label>
          <div class="col-sm-8">
              <input type="number" name="rating" value="" required class="form-control"/>
          </div>
      </div>

      <div class="form-group">
          <label class="control-label col-sm-4" for="slope">Slope:</label>
          <div class="col-sm-8">
              <input type="number" name="slope" value="" required class="form-control"/>
          </div>
      </div>

      <div class="form-group">
          <label class="control-label col-sm-4" for="parOut">Par Out:</label>
          <div class="col-sm-8">
              <input type="number" name="parOut" value="" required class="form-control"/>
          </div>
      </div>

      <div class="form-group">
          <label class="control-label col-sm-4" for="parIn">Par In:</label>
          <div class="col-sm-8">
              <input type="number" name="parIn" value="" required class="form-control"/>
          </div>
      </div>

      <div class="form-group">
          <label class="control-label col-sm-4" for="parTotal">Par Total:</label>
          <div class="col-sm-8">
              <input type="number" name="parTotal" value="" required class="form-control"/>
          </div>
      </div>

      <div class="form-group">
          <label class="control-label col-sm-4" for="mOut">Meters Out:</label>
          <div class="col-sm-8">
              <input type="number" name="mOut" value="" required class="form-control"/>
          </div>
      </div>

      <div class="form-group">
          <label class="control-label col-sm-4" for="mIn">Meters In:</label>
          <div class="col-sm-8">
              <input type="number" name="mIn" value="" required class="form-control"/>
          </div>
      </div>

      <div class="form-group">
          <label class="control-label col-sm-4" for="mTotal">Meters Total:</label>
          <div class="col-sm-8">
              <input type="number" name="mTotal" value="" required class="form-control"/>
          </div>
      </div>


      <div class="form-group">
                <div class="col-sm-8">
            <input type="submit" value="Add Course" class="btn btn-success"/>
        </div>
        </form>
        <form action="" method="post" >
              <input type="submit" value="Cancel" class="btn btn-danger form-control"/>
          </form>
    </div>



</div>
</div>
<?php include '../../view/footer.php'; ?>
