<?php
/**
 * Created by PhpStorm.
 * User: Wilson
 * Date: 5/29/2016
 * Time: 5:24 PM
 */
include "head.php";
$q = $_GET['q'];
$search_query = "select MEDIA_ID, MEDIA_NAME, MEDIA_THUMBNAIL, MEDIA_PLAY_COUNT FROM MEDIA where SOUNDEX(MEDIA_NAME) = SOUNDEX('".$q."') or media_name like ('%".$q."%') ORDER  BY MEDIA_PLAY_COUNT DESC ";
$search_query2 = "select MEDIA_ID, MEDIA_NAME, MEDIA_THUMBNAIL, MEDIA_PLAY_COUNT FROM MEDIA where ISSONG = '1' and (SOUNDEX(MEDIA_NAME) = SOUNDEX('".$q."') or media_name like ('%".$q."%'))";
$stmt = oci_parse($conn, $search_query);
oci_execute($stmt);
$stmt2 = oci_parse($conn, $search_query2);
oci_execute($stmt2);

?>

<div class="container">
    <h1 class="text-center page-header">Searh Results</h1>
    <h3>Videos</h3>
    <?php
        if(true){?>
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
        <?php }else{
            echo '<h3>No video found.</h3>';
        }
    ?>
    <h3>Songs</h3>
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
        while (($arr2 = oci_fetch_array($stmt2, OCI_BOTH)) != false) {
            $id = $arr2['MEDIA_ID'];
            echo '<a><tr>'
                . '<td>' . ++$count . '</td>'
                . '<td>'
                . '<a href="play.php?category=song&id=' . $arr2[0] . '">'
                . '<img src="data:image/jpg;base64,' . base64_encode($arr2['MEDIA_THUMBNAIL']->load()) . '" height ="64" width="64" alt="Image"> ' . $arr2['MEDIA_NAME']
                . '</a>'
                . '</td>'
                . '<td>' . $arr2['MEDIA_PLAY_COUNT'] . '</td>'
                . '</tr>';
        }
        oci_free_statement($stmt2);
        oci_close($conn);
        ?>
        </tbody>
    </table>

</div>
<?php
include "footer.php"?>