<!--PROCESS: Profile change-->
<?php
    include('conn.php');
    include ('header.php');
    session_start();
    $username = $_GET['username'];
    $fname = $_GET['fname'];
    $lname = $_GET['lname'];
    $age = $_GET['age'];
    $contact= $_GET['contact'];

    $sql = "select * from admin where adminid = '$username'";
    $result = $conn -> query($sql)->fetch_assoc();
    if ($result!= NULL){
        $sql = "update admin set fname = '$fname', lname = '$lname', age = '$age', contact = '$contact' where adminid='$username'";
        $conn->query($sql);
        $_SESSION['changeinfo'] = 1;
        header('location: profile.php');
    }
?>