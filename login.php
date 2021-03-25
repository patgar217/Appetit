<!--PROCESS: Login check-->
<?php
    include('conn.php');
    include ('header.php');
    session_start();
    $username = $_GET['username'];
    $password = $_GET['password'];

    $sql = "select * from admin where adminid = '$username'";
    $result = $conn -> query($sql)->fetch_assoc();
    if ($result!= NULL){
            if ($password == $result['password']){
                $_SESSION['signin'] = 1;
                $_SESSION['adminid'] = $username;
                header('location: sales.php');
            }else{
                $_SESSION['signin'] = 0;
                header('location: signin.php');
            }
    }else{
        $_SESSION['signin'] = 0;
        header('location: signin.php');
    }

?>