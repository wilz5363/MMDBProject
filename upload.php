<?php
/**
 * Created by PhpStorm.
 * User: Wilson
 * Date: 5/11/2016
 * Time: 12:38 AM
 */
session_start();
$section = 'upload';
$title = 'Upload';
$id = base64_encode(microtime(false));
if (!isset($_SESSION['username'])) {
    header('location:index.php');
}
//include 'dbconnect.php';
include 'header.php';



echo microtime(false);

if (!isset($_FILES['lob_upload'])) {
    ?>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" role="form">
                <legend>Upload Media</legend>

                <div class="form-group">
                    <label for="mediaId">ID this media on live is <span style="color: red"><?php echo $id;?></span></label>
                </div>

                <div class="form-group">
                    <label for="mediaName">Name: </label>
                    <input type="text" name="mediaNameInput" id="mediaName" class="form-control" required>
                </div>

                <div class="form-group">
                    <div class="input-group">
                <span class="input-group-btn">
                    <span class="btn btn-primary btn-file">
                        Browse<input type="file">
                    </span>
                </span>
                        <input type="text" class="form-control" readonly>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
        </div>
    </div>


<?php } ?>
<?php include 'footer.php'; ?>
