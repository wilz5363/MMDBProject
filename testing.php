<?php

include 'dbconnect.php';
$id = base64_encode(microtime(false));
$name = 'testing';
$type = 'video/mp4';
if (!isset($_FILES['lob_upload'])) {
// If nothing uploaded, display the upload form
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>"
          method="POST" enctype="multipart/form-data">
        Image filename: <input type="file" name="lob_upload">
        <input type="submit" value="Upload">
    </form>

    <?php
} // closing brace from 'if' in earlier PHP code
else {
    // else script was called with data to upload

//  // Delete any existing BLOB
//  $query = 'delete from btab where blobid = :myblobid';
//  $stmt = oci_parse ($conn, $query);
//  oci_bind_by_name($stmt, ':myblobid', $myblobid);
//  $e = oci_execute($stmt);

    // Insert the BLOB from PHP's temporary upload area

    $stmt = oci_parse($conn, 'insert into media_object (media_id,media_name,media_type)'
        .'values(:id,:name,:type)');
    oci_bind_by_name($stmt, ':id', $id);
    oci_bind_by_name($stmt, ':name',$name);
    oci_bind_by_name($stmt, ':type', $type);

    oci_execute($stmt);  // Note OCI_DEFAULT

    $lob = oci_new_descriptor($conn, OCI_D_LOB);
    $stmt2 = oci_parse($conn, 'insert into video(media_id, video_content)'.
            ' values (:id, empty_blob()) returning video_content into :video_content');
    oci_bind_by_name($stmt2, ':id', $id);
    oci_bind_by_name($stmt2, ':video_content', $lob, -1, OCI_B_BLOB);
    oci_execute($stmt2, OCI_DEFAULT);  // Note OCI_DEFAULT

    if ($lob->savefile($_FILES['lob_upload']['tmp_name'])) {
        oci_commit($conn);
        echo "BLOB uploaded";
    }
    else {
        echo "Couldn't upload BLOB\n";
    }
    $lob->free();
}

?>