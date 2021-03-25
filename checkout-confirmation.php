<!-- CHECKOUT CONFIMATION PAGE -->
<?php
    session_start();
    include('conn.php');
    include ('header.php');
    $customer=$_POST['customer'];
	$orderType=$_POST['orderType'];
    $payment = $_POST['payment'];
    $opt = $_POST['opt'];
    if ($opt == 'submit'){
        $sql = "update purchase set customer='$customer', orderType='$orderType', payment='$payment' where purchaseid='$_SESSION[pid]'";
	    $conn->query($sql);
    }
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/style2.css">
</head>
<body>
    <div class="container">
        <!-- Hero Content-->
        <div class="hero-content pb-5 text-center" style="background-image: url(images/checkout-header.jpg);">
            <div class="container">
                <h2 class="preheading"><span class="text-primary">Appétit </span> / Checkout</h2>
                <h1 class="hero-heading">Checkout Confirmed</h1>
                <div class="row">   
                    <div class="col-xl-8 offset-xl-2">
                        <?php
                            $sql = "select * from purchase where purchaseid='$_SESSION[pid]'";
                            $query=$conn->query($sql);
                            $purchase =$query->fetch_array();
                        
                            if($opt == 'submit'){
                                echo "<p class='lead'>Order No.". $_SESSION['pid']." was placed on <strong>"?>
                                <?php echo date('M d, Y h:i A', strtotime($purchase['date_purchase'])) ?>
                                <?php echo "</strong> and is currently being prepared.</p>";
                            }else{
                                echo "<p class='lead'>Order No.". $_SESSION['pid']." was cancelled.</p>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <section>
            <div class="container">
                <div class="row mb-5"> 
                    <div class="col-lg-8">
                        <div class="cart">
                            <div class="cart-wrapper">
                                <div class="cart-header text-center">
                                    <div class="row"><!-- row -->
                                        <div class="col-7">Order</div>
                                        <div class="col-5">
                                            <div class="row">
                                                <div class="col-4">Price</div>
                                                <div class="col-4">Quantity</div>
                                                <div class="col-4">Total</div>
                                            </div>
                                        </div>
                                    </div> <!-- /row -->
                                </div>
                                <div class="cart-body">
                                    <?php
                                        $sql="select * from purchase_detail left join product on product.productid=purchase_detail.productid where purchaseid='$_SESSION[pid]'";
                                        $dquery=$conn->query($sql);
                                        while($drow=$dquery->fetch_array()){
                                            ?>
                                            <!-- Product-->
                                            <div class="cart-item">
                                                <div class="row d-flex align-items-center text-center">
                                                    <div class="col-3 product_img" style="background-image: url(<?php if(empty($drow['photo'])){echo "upload/noimage.jpg";} else{echo $drow['photo'];} ?>);">
                                                    </div> <!-- /col-3 -->
                                                    <div class="col-4">
                                                        <div class="d-flex align-items-center">
                                                            <div class="cart-title text-left">
                                                                <a class="product_name text-uppercase text-dark" href="#">
                                                                    <strong><?php echo $drow['productname']; ?></strong>
                                                                </a><br>
                                                                <span class="product_des text-muted text-sm"><?php echo $drow['productdes']; ?></span>
                                                                <br>
                                                            </div>
                                                        </div>
                                                    </div> <!-- /col-4 -->
                                                    <div class="col-5">
                                                        <div class="row">
                                                            <div class="col-4 product_price">&#8369; <?php echo number_format($drow['price'], 2); ?>
                                                            </div><!-- /col-4 -->
                                                            <div class="col-4 product_price">
                                                                    <?php
                                                                        $sql = "select * from purchase_detail where purchaseid='$_SESSION[pid]' and productid = '$drow[productid]'";
                                                                        $query=$conn->query($sql);
                                                                        $purchase =$query->fetch_array();
                                                                    ?>
                                                                    <?php echo $purchase['quantity']; ?>
                                                            </div><!-- /col-4 -->
                                                            <div class="col-4 product_price text-center">&#8369;
                                                                <?php
                                                                    $subt = $drow['price']*$purchase['quantity'];
                                                                    echo number_format($subt, 2);
                                                                ?>
                                                            </div><!-- /col-4 -->
                                                        </div><!-- /row -->
                                                    </div><!-- /col-5 -->
                                                </div><!-- /row -->
                                            </div><!-- /cart-item -->
                                            <?php
                                        }
                                    ?>
                                </div><!-- /cart-body -->
                            </div><!-- /cart-wrapper -->
                        </div><!-- /cart -->
                    </div><!-- /col-lg-8 -->
                    <div class="col-lg-4">
                        <div class="block">
                            <div class="block-header">
                                <h6 class="text-uppercase mb-0">Order Summary</h6>
                            </div>
                            <?php
                                $sql = "select * from purchase where purchaseid='$_SESSION[pid]'";
                                $query=$conn->query($sql);
                                $purchase =$query->fetch_array();
                                $total = $purchase['total'];
                                $subt = $total/1.12;
                                $vat = $total - $subt;
                            ?>
                            <div class="block-body bg-light pt-1">
                                <ul class="order-summary mb-0 list-unstyled">
                                    <li class="order-summary-item text-muted">
                                        <div class="row">
                                            <div class="col-5 des">
                                                <span>Order Subtotal: </span>
                                            </div>
                                            <div class="col-6">
                                                <span>&#8369;<?php echo number_format($subt, 2);?></span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="order-summary-item text-muted">
                                        <div class="row">
                                            <div class="col-5 des">
                                                <span>Tax: </span>
                                            </div>
                                            <div class="col-6">
                                                <span>&#8369;<?php echo number_format($vat, 2);?></span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="order-summary-item ">
                                        <div class="row">
                                            <div class="col-5 des text-muted">
                                                <span>Total: </span>
                                            </div>
                                            <div class="col-6">
                                                <span class="total">&#8369;<?php echo number_format($total, 2);?></span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div><!-- /block-body -->
                        </div>
                        <div class="block">
                            <div class="block-header">
                                <h6 class="text-uppercase mb-0">Invoice Information</h6>
                            </div>
                            <div class="block-body bg-light pt-1">
                                <ul class="order-summary mb-0 list-unstyled">
                                    <li class="order-summary-item text-muted">
                                        <div class="row">
                                            <div class="col-5 des">
                                                <span>Name: </span>
                                            </div>
                                            <div class="col-6">
                                                <span><?php echo $customer;?></span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="order-summary-item text-muted">
                                        <div class="row">
                                            <div class="col-5 des">
                                                <span>Order Type: </span>
                                            </div>
                                            <div class="col-6">
                                                <span><?php echo $orderType;?></span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="order-summary-item text-muted">
                                        <div class="row">
                                            <div class="col-5 des">
                                                <span>Payment Option: </span>
                                            </div>
                                            <div class="col-6">
                                                <span><?php echo $payment;?></span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div><!-- /block-body -->
                            <div class="block-body">
                                <?php
                                    if ($opt=='cancel'){
                                        ?>
                                        <form method="POST" action="cart.php">
                                            <button type="submit" class="btn btn-block place">
                                                EDIT ORDER
                                            </button>
                                        </form>
                                        <form method="POST" action="checkout_cancel.php">
                                            <button type="submit" class="btn btn-block cancel">
                                                EXIT
                                            </button>
                                        </form>
                                    <?php
                                    }else{
                                        ?>
                                        <form method="POST" action="index.php">
                                            <button type="submit" class="btn btn-block place">
                                                EXIT
                                            </button>
                                        </form>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div><!-- /block -->
                    </div><!-- /col-lg-4 -->
                </div><!-- /row -->
            </div><!-- /container -->
        </section>
    </div><!-- /container -->
</body>
