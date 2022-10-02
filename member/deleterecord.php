<?php
include('../connection.php');

if($_REQUEST['record_id']) {
    $id= $_REQUEST['record_id'];
    $sql = "DELETE FROM tbl_collection_record WHERE record_id = '$id'";
    if (mysqli_query($connection, $sql)) {
        header('location: ../member/records.php');
    } else {
        echo "Error: " . $sql . " " . mysqli_error($connection);
    }
    mysqli_close($connection);
}
?>