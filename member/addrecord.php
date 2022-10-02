<?php
include('../connection.php');
session_start();

$user = $_SESSION['username'];
if (isset($_POST['addrecord'])) {
    $qty = $_POST['qty'];
    $unit = $_POST['unit'];
    $total = $_POST['total'];
    $date = $_POST['date'];
    $shopid = $_POST['shop_id'];
    $typeid = $_POST['type_id'];
    $sql = "SELECT member_id FROM tbl_member WHERE username = '$user'";
                           $result = mysqli_query($connection, $sql);
                           while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
                           {

                            $memberid = $row["member_id"];
    $sql2 = "INSERT INTO tbl_collection_record (member_id, shop_id, type_id, quantity, unit, total_amount, date)
    VALUES ('$memberid','$shopid','$typeid','$qty','$unit','$total','$date')";
    if (mysqli_query($connection, $sql2)) {
        header('location: ../member/records.php');
    } else {
        echo "Error: " . $sql2 . " " . mysqli_error($connection);
    }
    mysqli_close($connection);
}
}
?>