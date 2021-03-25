<!--PROCESS: Add new admin-->
<?php
    include('conn.php');
    include ('header.php');
    session_start();
    $username = $_GET['uname'];
    $password = $_GET['password'];
    $password_1 = $_GET['password_1'];
    $fname = $_GET['fname'];
    $lname = $_GET['lname'];
    $age = $_GET['age'];
    $contact= $_GET['contact'];

    $sql = "select * from admin where adminid = '$username'";
    $result = $conn -> query($sql)->fetch_assoc();
    if ($result== NULL){
        if ($password == $password_1){
                $_SESSION['newadmin'] = 1;
                $sql = "insert into admin (adminid, password, fname, lname, age, contact, hiredate) values ('$username','$password','$fname','$lname','$age','$contact', NOW())";
                $conn->query($sql);
                header('location: newAdmin.php');
        }else{
            $_SESSION['newadmin'] = 2;
            header('location: newAdmin.php');
        }
        
    }else{
        $_SESSION['newadmin'] = 3;
        header('location: newAdmin.php');
    }
?>