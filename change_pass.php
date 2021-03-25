<!--PROCESS: Password change-->
<?php
    include('conn.php');
    include ('header.php');
    session_start();
    $username = $_GET['username'];
    $password_old = $_GET['password_old'];
    $password_1 = $_GET['password_1'];
    $password_2 = $_GET['password_2'];
    

    $sql = "select * from admin where adminid = '$username'";
    $result = $conn -> query($sql)->fetch_assoc();
    if ($result!= NULL){
        if ($password_old == $result['password']){
            if ($password_1 == $password_2){
                $_SESSION['changepass'] = 1;
                $sql = "update admin set password = '$password_1' where adminid='$username'";
                $conn->query($sql);
                header('location: profile.php');
            }else{
                $_SESSION['changepass'] = 2;
                header('location: profile.php');
            }
        }else{
            $_SESSION['changepass'] = 3;
            header('location: profile.php');
        }
    }
?>