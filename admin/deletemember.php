<?php
include('../connection.php');


if(isset($_POST['deletemember']))
{
    $id = $_POST['username'];

    $query = "DELETE FROM tbl_member WHERE username='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        header("Location:member.php");
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}
