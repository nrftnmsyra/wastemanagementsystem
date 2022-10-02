<?php
include('../connection.php');

if (isset($_POST['addrecord'])) {
    $id = $_POST['record_id'];

    $qty = $_POST['qty'];
    $unit = $_POST['unit'];
    $total = $_POST['total'];
    $date = $_POST['date'];
    $typeid = $_POST['type_id'];
   
    $sql = "UPDATE tbl_collection_record SET type_id='$typeid',
    quantity='$qty',unit='$unit',total_amount='$total',date='$date' WHERE record_id = '$id'";
    if (mysqli_query($connection, $sql)) {
        header('location: ../member/records.php');
    } else {
        echo "Error: " . $sql . " " . mysqli_error($connection);
    }
    mysqli_close($connection);
}
?>