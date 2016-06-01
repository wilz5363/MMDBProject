<?php
/**
 * Created by PhpStorm.
 * User: Wilson
 * Date: 5/29/2016
 * Time: 5:40 PM
 */
include 'dbconnect.php';
include "head.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if ($_FILES['mediaThumbnail']['tmp_name']) {

        $lob = oci_new_descriptor($conn, OCI_D_LOB);
        $stmt = oci_parse($conn, "select media_id from media'
        . 'where media_thumbnail like :image_source");
        oci_bind_by_name($stmt, ':image_source',$lob->load($_FILES['mediaThumbnail']['tmp_name']));
        oci_execute($stmt, OCI_DEFAULT);
        $lob->free();

        while($arr = oci_fetch_array($stmt,OCI_BOTH) != false){
            echo $arr['MEDIA_ID'];
        }
    }
}


?>
<form class="form-horizontal well" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
      enctype="multipart/form-data">
    <fieldset>
        <legend>Upload Media</legend>
        <div class="form-group">
            <label for="mediaFile" class="col-lg-2 control-label">Select a thumbnail</label>
            <div class="col-lg-10">
                <input type="file" class="form-control" id="mediaFile" name="mediaThumbnail" value="Upload">
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                <button type="reset" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </fieldset>
</form>
<?php


?>