<?php
include 'dbconnect.php';

$query = 'SELECT video_content FROM video WHERE media_id = :id';
$stmt = oci_parse ($conn, $query);
$id='MC4yODU5NzkwMCAxNDYyOTU4MDI5';
oci_bind_by_name($stmt, ':id', $id);
oci_execute($stmt);
$arr = oci_fetch_array($stmt, OCI_ASSOC);
$result = $arr['VIDEO_CONTENT']->load();

header("Content-type: video/mp4");
echo $result;
oci_close($conn);
exit();


