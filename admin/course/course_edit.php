<?php $pageTitle = "Admin-Holes";?>
<?php
include 'view/header.php';
include ('view/navbar_admin.php');
?>
<div class="container">
    <div class="col-md-5 col-md-offset-3">
        <h1 class="page-header text-center">Edit Course</h1>

        <form action="" method="post" class="form-horizontal">
            <input type="hidden" name="action" value="course_edit" />
            <input type="hidden" name="course_id" value="<?php echo $course_id; ?>" />

            <div class="form-group">
                <label class="control-label col-sm-4" for="name">Course Name:</label>
                <div class="col-sm-8">
                    <input type="text" name="name" value="<?php echo $name; ?>" required class="form-control" />
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-4" for="city">City:</label>
                <div class="col-sm-8">
                    <input type="text" name="city" value="<?php echo $city; ?>" required class="form-control"/>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-4" for="province">Province:</label>
                <div class="col-sm-8">
                    <input type="text" name="province" value="<?php echo $province; ?>" required class="form-control"/>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-4" for="tel">Telephone:</label>
                <div class="col-sm-8">
                    <input type="text" name="tel" value="<?php echo $tel; ?>" required class="form-control"/>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-4" for="website">Website:</label>
                <div class="col-sm-8">
                    <input type="text" name="website" value="<?php echo $website; ?>" required class="form-control"/>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-4" for="email">Email:</label>
                <div class="col-sm-8">
                    <input type="text" name="email" value="<?php echo $email; ?>" required class="form-control"/>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-4" for="rating">Rating:</label>
                <div class="col-sm-8">
                    <input type="number" name="rating" value="<?php echo $rating; ?>" required class="form-control"/>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-4" for="slope">Slope:</label>
                <div class="col-sm-8">
                    <input type="number" name="slope" value="<?php echo $slope; ?>" required class="form-control"/>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-4" for="parOut">Par Out:</label>
                <div class="col-sm-8">
                    <input type="number" name="parOut" value="<?php echo $parOut; ?>" required class="form-control"/>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-4" for="parIn">Par In:</label>
                <div class="col-sm-8">
                    <input type="number" name="parIn" value="<?php echo $parIn; ?>" required class="form-control"/>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-4" for="parTotal">Par Total:</label>
                <div class="col-sm-8">
                    <input type="number" name="parTotal" value="<?php echo $parTotal; ?>" required class="form-control"/>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-4" for="mOut">Meters Out:</label>
                <div class="col-sm-8">
                    <input type="number" name="mOut" value="<?php echo $mOut; ?>" required class="form-control"/>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-4" for="mIn">Meters In:</label>
                <div class="col-sm-8">
                    <input type="number" name="mIn" value="<?php echo $mIn; ?>" required class="form-control"/>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-4" for="mTotal">Meters Total:</label>
                <div class="col-sm-8">
                    <input type="number" name="mTotal" value="<?php echo $mTotal; ?>" required class="form-control"/>
                </div>
            </div>

            <div class="btn-group inline col-md-12">
                <div class="col-md-3 col-md-offset-4 inline">
                    <input type="submit" value="Update" class="btn btn-success form-control"/>
                </div>
                <div class="col-md-2  inline">
                    <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onClick="window.location='index.php'"/>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include '../../view/footer.php'; ?>
