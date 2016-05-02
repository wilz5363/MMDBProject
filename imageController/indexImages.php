<?php
/**
 * Created by PhpStorm.
 * User: Wilson
 * Date: 5/2/2016
 * Time: 4:34 PM
 */
include  '../dbconnect.php';
$myblobid = $_GET['id'];
$query = 'SELECT BLOBDATA FROM BTAB WHERE BLOBID = :MYBLOBID';
$stmt = oci_parse ($conn, $query);
oci_bind_by_name($stmt, ':MYBLOBID', $myblobid);
oci_execute($stmt);
$arr = oci_fetch_array($stmt, OCI_ASSOC);
$result = $arr['BLOBDATA']->load();

header("Content-type: image/JPEG");
echo $result;

oci_close($conn);