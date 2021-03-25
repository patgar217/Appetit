<!-- PROCESS: Adding item to cart -->
<?php
    include('conn.php');
    $pid = $_POST['pid'];
    $productid = $_POST['productid'];
    $quantity = $_POST['quantity'];
    
    if ($quantity>0){
        $sql = "select * from purchase where purchaseid='$pid'";
        $query=$conn->query($sql);
        $purchase =$query->fetch_array();
        $total = $purchase['total'];
    
        $sql="select * from product where productid='$productid'";
        $query=$conn->query($sql);
        $row=$query->fetch_array();
    
        $subt=$row['price']*number_format($quantity) ;
        $total+=$subt;
        
        $sql = "select * from purchase_detail where purchaseid='$pid' and productid='$productid'";
        $result = $conn->query($sql);
    
        if ($result-> num_rows > 0){
            while ($row = $result-> fetch_assoc()){
                $quantity = $row['quantity'] + $quantity;
                $sql="update purchase_detail set quantity = $quantity where purchaseid='$pid' and productid='$productid'";
                $conn->query($sql);
            }
        }else{
            $sql="insert into purchase_detail (purchaseid, productid, quantity) values ('$pid', '$productid', '$quantity')";
            $conn->query($sql);
        }
        
        $sql="update purchase set total='$total' where purchaseid='$pid'";
        $conn->query($sql);
    }
    header('location:menu.php#BREAKFAST');
?>