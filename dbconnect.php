<?php
error_reporting(E_ALL & ~E_NOTICE);
$tns = "
(DESCRIPTION =
    (ADDRESS_LIST =
      (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521))
    )
    (CONNECT_DATA =
        (SERVER = DEDICATED)
        (SERVICE_NAME = orcl)
    )
  )
       ";

$db_username = "WILSON_MMDB";
$db_password = "ChanWilson123";
try{
    $conn = oci_connect($db_username, $db_password, $tns);
}catch(PDOException $e){
    echo ($e->getMessage());
}