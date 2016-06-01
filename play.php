<?php
/**
 * Created by PhpStorm.
 * User: Wilson
 * Date: 5/29/2016
 * Time: 2:20 PM
 */

$category = $_GET['category'];
$media_id = $_GET['id'];
include "head.php";
//$update_query = "update MEDIA set media_play_count = MEDIA_PLAY_COUNT + 1 where media_id = '$media_id'";
//$update_stmt = oci_parse($conn, $update_query);
//oci_execute($update_stmt);

$query = "select * from media where media_id = '$media_id'";
$stmt = oci_parse($conn, $query);
oci_execute($stmt);
$arr = oci_fetch_array($stmt, OCI_ASSOC);


if($category == 'song'){
    $query2 = "select MEDIA_ID, MEDIA_NAME, MEDIA_THUMBNAIL, MEDIA_PLAY_COUNT FROM MEDIA where ISSONG  = '1'";
}else{
    $query2 = "select MEDIA_ID, MEDIA_NAME, MEDIA_THUMBNAIL, MEDIA_PLAY_COUNT FROM MEDIA";
}
$stmt2 = oci_parse($conn, $query2);
oci_execute($stmt2);
?>
<div class="container">
    <div class="row">
        <h4 class="page-header">
            Now Playing <span class="small"><?php echo $arr['MEDIA_NAME']; ?></span>
        </h4>
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <?php if ($category == 'song') {
               if($arr['ISSONG'] == 0){
                   echo '<h4 class="text-warning">This song has no permission to play in song mode, but it\'s available in video.</h4>';
               }else{
                   echo '<img src="data:' . $arr['MEDIA_TYPE'] . ';base64,' . base64_encode($arr['MEDIA_THUMBNAIL']->load()) . '" width="64" height="64" alt="Image">';
                   echo '<audio width="100%" controls autoplay>'
                       . '<source src="loadTesting.php?v=' . $arr['MEDIA_ID'] . '" type="' . $arr['MEDIA_TYPE'] . '">'
                       . '</audio>';
               }
                ?>
            <?php } else if ($category == 'video') {
                echo '<video width="100%" height="500px" controls autoplay>'
                    . '<source src="loadTesting.php?v=' . $arr['MEDIA_ID'] . '" type="' . $arr['MEDIA_TYPE'] . '">'
                    . '</video>';
                ?>
            <?php } ?>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <table class="table">
                <thead>
                <tr>
                    <th>Songs</th>
                </tr>
                </thead>
                <tbody>
                <?php
                echo '';
                $count = 0;
                while (($arr2 = oci_fetch_array($stmt2, OCI_BOTH)) != false) {
                    $id = $arr['MEDIA_ID'];
                    echo '<a><tr>'
                        . '<td>' . ++$count . '</td>'
                        . '<td>'
                        . '<a href="play.php?category=' . $category . '&id=' . $arr2[0] . '">'
                        . '<img src="data:image/jpg;base64,' . base64_encode($arr2['MEDIA_THUMBNAIL']->load()) . '" height ="64" width="64" alt="Image"> ' . $arr2['MEDIA_NAME']
                        . '</a>'
                        . '</td>'
                        . '</tr>';
                }
                oci_free_statement($stmt2);
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>


<?php
oci_close($conn);
include "footer.php";
?>
