<?php
include('../connection.php');

if (isset($_POST['editRecycleCenter'])) {
    $id = $_POST['edit_shop_id'];

    $sname = $_POST['shop_name'];
    $address = $_POST['address_shop'];
    $contact = $_POST['contact'];
    $email = $_POST['email_address'];

    $query = "UPDATE tbl_junkshop SET shop_name='$sname', address_shop='$address', contact='$contact', email_address='$email' WHERE shop_id='$id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        header("Location:recycle-center.php");
    } else {
        echo '<script> alert("Data Not Updated"); </script>';
    }
}
