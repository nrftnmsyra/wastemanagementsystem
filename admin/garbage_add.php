<?php
include ('connection.php');
$name=$_POST['name'];
$desc=$_POST['desc'];
$reward=$_POST['reward'];

$query= "insert into tbl_garbage_type (name, description, reward) values ('$name','$desc','$reward')";
$result= mysqli_query($connection, $query);

if($result==TRUE)
      echo "<script>alert('$name added!');
            window.location='../admin/garbage-type.php'</script>";
else
    echo "<script>alert('operation failed.');
    window.location='../admin/garbage-type.php'</script>";
    mysqli_close($connection);
?>