<?php
include ('connection.php');
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$gender=$_POST['gender'];
$bday=$_POST['bday'];
$pnum=$_POST['pnum'];
$email=$_POST['email'];
$username=$_POST['username'];
$password=$_POST['password'];

$dateOfBirth = $bday;
$usercategory = 2;
$accstatus = 1;
$today = date("Y-m-d");
$diff = date_diff(date_create($dateOfBirth), date_create($today));
$age = $diff->format('%y');
$fullname = $fname . ' ' . $lname;

$sql3 = "SELECT username FROM tbl_user WHERE username='$username'";
    $result3 = mysqli_query($connection, $sql3);
    $row = mysqli_fetch_array($result3,MYSQLI_ASSOC);
    if(mysqli_num_rows($result3)==1)
    {
        echo "<script>alert('Sorry, username unavailable');
        window.location='register.html'</script>";
    }
    else
    {

$query= "insert into tbl_member (first_name, last_name, gender, age, contact, email_address, username, password, account_status) values ('$fname','$lname','$gender','$age','$pnum','$email', '$username', '$password', '$accstatus')";
$result= mysqli_query($connection, $query);

$query2= "insert into tbl_user (username, password, fullname, contact, email, user_category_id, status) values ('$username', '$password', '$fullname', '$pnum','$email', '$usercategory','$accstatus')";
$result2= mysqli_query($connection, $query2);

if($result==TRUE && $result2 ==TRUE)
     echo "<script>alert('signing up successfully. Please login.');
            window.location='index.php'</script>";
else
    echo "<script>alert('sign up failed');
            window.location='register.html'</script>";
    mysqli_close($connection);
    }
?>