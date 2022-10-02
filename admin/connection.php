<?php
$namahos = "localhost";
$pengguna_mysql = "root";
$katalaluan_mysql = "";
$pdata_mysql = "waste";

$connection = mysqli_connect ($namahos, $pengguna_mysql, $katalaluan_mysql) or die ("Sorry, Database not connected");

mysqli_select_db ($connection, $pdata_mysql) or die ("No database chosen");
?>
