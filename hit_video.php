<?php
/**
 * Created by PhpStorm.
 * User: Wilson
 * Date: 5/28/2016
 * Time: 2:55 PM
 */
$query = 'select MEDIA_ID, MEDIA_NAME, MEDIA_THUMBNAIL, MEDIA_PLAY_COUNT FROM MEDIA ORDER  BY MEDIA_PLAY_COUNT DESC';
$stmt = oci_parse($conn, $query);
oci_execute($stmt);
//$arr = oci_fetch_array($stmt, OCI_ASSOC);
?>
<div class="container">
    <h1 class="text-center page-header">Hits Video Top 20 2016</h1>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Track</th>
            <th>Play (All Time)</th>
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
                . '<a href="play.php?category=video&id=' . $arr[0] . '">'
                . '<img src="data:image/jpg;base64,' . base64_encode($arr['MEDIA_THUMBNAIL']->load()) . '" height ="64" width="64" alt="Image"> ' . $arr['MEDIA_NAME']
                . '</a>'
                . '</td>'
                . '<td>' . $arr['MEDIA_PLAY_COUNT'] . '</td>'
                . '</tr>';
        }
        oci_free_statement($stmt);
        oci_close($conn);
        ?>
        </tbody>
    </table>
</div>