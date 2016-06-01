<?php
include 'dbconnect.php';

$id = $_GET['v'];
$query = 'SELECT media_type, media_source FROM media WHERE media_id = :id';
$stmt = oci_parse ($conn, $query);
//$id = 'MC42ODU4ODMwMCAxNDY0NDk4MjI2';
oci_bind_by_name($stmt, ':id', $id);
oci_execute($stmt);
$arr = oci_fetch_array($stmt, OCI_ASSOC);
$result = $arr['MEDIA_SOURCE']->load();

//header("Content-type: video/mp4");
echo $result;
//header("Content-type: audio/mp3");
//echo $result;
oci_close($conn);
exit();


