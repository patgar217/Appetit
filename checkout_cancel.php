<!--PROCESS: Cancel an Order -->
<?php
    session_start();
    include('conn.php');
    include ('header.php');
    $sql = "delete from purchase where purchaseid = '$_SESSION[pid]'";
	if ($conn-> query($sql)===TRUE){
        $q = "select * from purchase_detail where purchaseid = '$_SESSION[pid]'";
        $r = $conn->query($q);
        if ($r-> num_rows > 0){
            while ($row = $r-> fetch_assoc()){
                $query = "delete from purchase_detail where pdid = $row[pdid]" ;
                $conn->query($query);
            }
        }
    }
    header('location:index.php');
?>
