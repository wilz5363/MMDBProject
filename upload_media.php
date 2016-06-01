<?php
/**
 * Created by PhpStorm.
 * User: Wilson
 * Date: 5/28/2016
 * Time: 3:17 PM
 */

include "head.php";
$query = "select * from media where created_at = (select max(created_at) from media)";
$stmt = oci_parse($conn, $query);
oci_execute($stmt);
$arr = oci_fetch_array($stmt, OCI_ASSOC);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_FILES['mediaSource']['tmp_name'] and $_FILES['mediaThumbnail']['tmp_name']) {
        include_once "mime.php";

        $id = $id = base64_encode(microtime(false));
        $name = $_POST['nameInput'];
        $username = 'wilz5363';
        $source_name = $_FILES['mediaSource']['name'];
        $type = get_mime_type($source_name);
        if($type != "video/mp4"){
            $errMesssage = "File need to be MP4 (.mp4) extension";
        }else {

            $lob = oci_new_descriptor($conn, OCI_D_LOB);
            $thumblob = oci_new_descriptor($conn, OCI_D_LOB);
            $stmt = oci_parse($conn, 'insert into media (media_id, media_name, media_type, username, media_source, media_thumbnail)'
                . 'values(:id,:name,:type,:username,empty_blob(),empty_blob()) returning media_source, media_thumbnail into :media_source, :media_thumbnail');
            oci_bind_by_name($stmt, ':id', $id);
            oci_bind_by_name($stmt, ':name', $name);
            oci_bind_by_name($stmt, ':type', $type);
            oci_bind_by_name($stmt, ':username', $username);
            oci_bind_by_name($stmt, ':media_source', $lob, -1, OCI_B_BLOB);
            oci_bind_by_name($stmt, ':media_thumbnail', $thumblob, -1, OCI_B_BLOB);
            oci_execute($stmt, OCI_DEFAULT);

            if ($lob->savefile($_FILES['mediaSource']['tmp_name']) and $thumblob->savefile($_FILES['mediaThumbnail']['tmp_name'])) {
                oci_commit($conn);
                echo "BLOB uploaded";
                header("location: upload_media.php");

            } else {
                echo "Couldn't upload";
            }
            $lob->free();
        }

    }
}
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
            <form class="form-horizontal well" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
                  enctype="multipart/form-data">
                <fieldset>
                    <legend>Upload Media</legend>
                    <div class="form-group">
                        <label for="name" class="col-lg-2 control-label">Name: </label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="name" name="nameInput" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mediaFile" class="col-lg-2 control-label">Select a thumbnail</label>
                        <div class="col-lg-10">
                            <input type="file" class="form-control" id="mediaFile" name="mediaThumbnail" value="Upload">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mediaFile" class="col-lg-2 control-label">Select a media</label>
                        <div class="col-lg-10">
                            <input type="file" class="form-control" id="mediaFile" name="mediaSource" value="Upload">
                            <?php
                                if(isset($errMesssage)){
                                echo '<span class="text-warning">'.$errMesssage.'</span>';
                            }
                            ?>
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
        </div>
    </div>
</div>
<?php
//    echo '<img src="data:'.$arr['MEDIA_TYPE'].';base64,'. base64_encode($arr['MEDIA_THUMBNAIL']->load()).'" class="img-responsive" alt="Image">';
////not done yet    echo '<audio src="data:'.$arr['MEDIA_TYPE'].';base64,'. base64_encode($arr['MEDIA_SOURCE']->load()).'"></audio>';
////echo '<video src="loadTesting.php?v='.$arr['MEDIA_ID'].'"></video>';
//echo '<video width="1000" height="890" style="" controls autoplay>
//        <source src="loadTesting.php?v=' . $arr['MEDIA_ID'] . '" type="'.$arr['MEDIA_TYPE'].'">
//        </video>';
oci_close($conn);
?>

<?php include "footer.php"; ?>
