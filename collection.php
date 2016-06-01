<?php
/**
 * Created by PhpStorm.
 * User: Wilson
 * Date: 6/1/2016
 * Time: 5:52 AM
 */
$query = "select MEDIA_ID, MEDIA_NAME, MEDIA_THUMBNAIL, MEDIA_PLAY_COUNT, created_at FROM MEDIA where USERNAME ='{$_SESSION['user']}' ORDER by created_at";
$stmt = oci_parse($conn, $query);
oci_execute($stmt);
//$arr = oci_fetch_array($stmt, OCI_ASSOC);
?>
<div class="container">
    <h1 class="text-center page-header">Own Resource</h1>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Track</th>
            <th>Play (All Time)</th>
            <th>Uploaded At</th>
        </tr>
        </thead>
        <tbody>
        <?php
        echo '';

        $count = 0;
        while (($arr = oci_fetch_array($stmt, OCI_BOTH)) != false) {
            $id = $arr['MEDIA_ID'];
            echo '<a><tr>'
                . '<td>' . ++$count . '</td>'
                . '<td>'
                . '<a href="play.php?category=song&id=' . $arr[0] . '">'
                . '<img src="data:image/jpg;base64,' . base64_encode($arr['MEDIA_THUMBNAIL']->load()) . '" height ="64" width="64" alt="Image"> ' . $arr['MEDIA_NAME']
                . '</a>'
                . '</td>'
                . '<td>' . $arr['MEDIA_PLAY_COUNT'] . '</td>'
                . '<td>' . $arr['CREATED_AT'] . '</td>'
                . '</tr>';
        }
        oci_free_statement($stmt);
        oci_close($conn);
        ?>
        </tbody>
    </table>
</div>
<a class="btn btn-primary" href="upload_media.php"
   style="bottom:5%; right: 5%;position: fixed; border-radius: 50%; font-size: 45px; width:70px;height:70px;text-align: center;line-height:50px">+</a>