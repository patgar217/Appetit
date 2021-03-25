<!-- PROCESS: Creating a new purchase id -->
<?php
    session_start();
    include('conn.php');
    $sql="insert into purchase (customer, orderType, payment, total, date_purchase) values ('', '', '',0, NOW())";
    $conn->query($sql);
    $pid=$conn->insert_id;
    $_SESSION['pid'] = $pid;
    header('location:menu.php#BREAKFAST');
?>