<?php
include('../connection.php');

if (isset($_POST['add_recycle_center'])) {
    $shop_name = $_POST["shop_name"];
    $address = $_POST['address_shop'];
    $contact = $_POST['contact'];
    $email = $_POST['email_address'];
    $sql = "INSERT INTO tbl_junkshop (shop_name,address_shop,contact,email_address)
    VALUES ('$shop_name','$address','$contact','$email')";
    if (mysqli_query($connection, $sql)) {
        header('location: recycle-center.php');
    } else {
        echo "Error: " . $sql . " " . mysqli_error($connection);
    }
    mysqli_close($connection);
}

if (isset($_POST['add_garbage_type'])) {
    $gname = $_POST["name"];
    $description = $_POST['description'];
    $reward = $_POST['reward'];
    $sql = "INSERT INTO tbl_garbage_type (name,description,reward)
    VALUES ('$gname','$description','$reward')";
    if (mysqli_query($connection, $sql)) {
        header('location: garbage-type.php');
    } else {
        echo "Error: " . $sql . " " . mysqli_error($connection);
    }
    mysqli_close($connection);
}
