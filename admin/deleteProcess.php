<?php
include('../connection.php');


if(isset($_POST['deleteRecycleCenter']))
{
    $id = $_POST['delete_shop_id'];

    $query = "DELETE FROM tbl_junkshop WHERE shop_id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        header("Location:recycle-center.php");
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}

if(isset($_POST['delete_garbage_type']))
{
    $id = $_POST['type_id'];

    $query = "DELETE FROM tbl_garbage_type WHERE type_id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        header("Location:garbage-type.php");
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}
?>