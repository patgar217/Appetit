<!-- PROCESS: Removing items in the cart -->
<?php
    include('conn.php');
    $pdid = $_POST['pdid'];
    $subt = $_POST['subt'];
    $pid = $_POST['pid'];

    $sql = "select * from purchase where purchaseid='$pid'";
    $query=$conn->query($sql);
    $purchase =$query->fetch_array();

    $total = $purchase['total']-$subt;

    $sql="update purchase set total = $total where purchaseid='$pid'";
    $conn->query($sql);

    $query = "delete from purchase_detail where pdid =  '$pdid'";
    $conn->query($query);

    header('location: cart.php');
?>