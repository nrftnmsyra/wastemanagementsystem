<?php
session_start();
$error = '';
include "connection.php";
if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = mysqli_query($connection, "SELECT * FROM tbl_user WHERE username='$username' AND password='$password'");
    if (mysqli_num_rows($query)==0)
    {
        echo "<script>alert('Invalid username or password!');
        window.location='index.php'</script>";
    }
    else
    {
        $row = mysqli_fetch_assoc($query);
        $_SESSION['username']=$row['username'];
        
        if($row['user_category_id']=="1")
        {
            header("Location: ../wastemgr/admin/index.php");
        }
        else if ($row['user_category_id']=="2")
        {
            header("Location: ../wastemgr/member/index.php");
        }
        else
        {
            echo "<script>alert('login failed');
            window.location='index.php'</script>"; 
        }
    }
}