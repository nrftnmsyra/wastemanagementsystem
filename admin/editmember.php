<?php
include('../connection.php');

if (isset($_POST['editmember'])) {
    $user = $_POST['username'];

    $status = $_POST['status'];

    $query = "UPDATE tbl_member SET account_status='$status' WHERE username='$user'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        header("Location:member.php");
    } else {
        echo '<script> alert("Data Not Updated"); </script>';
    }
}
