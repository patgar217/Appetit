<!-- CART PAGE -->
<?php include ('header.php');
    session_start();
?>
<body>
    <?php include ('navbar.php');?>   
    <div class="container">
        <!-- Hero Content-->
        <div class="hero-content pb-5 text-center" style="background-image: url(images/orders-header.jpg);">
            <div class="container">
                <h2 class="preheading"><span class="text-primary">Appétit </span> / Orders</h2>
                <h1 class="hero-heading">My Orders</h1>
                <div class="row">   
                    <div class="col-xl-8 offset-xl-2">
                        <p class="lead">You have 
                            <span><strong>
                            <?php
                                $sql = "select * from purchase_detail where purchaseid='$_SESSION[pid]'";
                                $result = $conn->query($sql);
                                echo $result-> num_rows;
                            ?>
                            </strong></span> order/s pending to be confirmed.</p>
                    </div>
                </div>
            </div>
        </div>
        <?php
            if ($result-> num_rows > 0){
                ?>
                <section>
                    <div class="container">
                        <div class="row"> 
                            <div class="col-lg-9">
                                <div class="cart">
                                    <div class="cart-wrapper">
                                        <div class="cart-header text-center">
                                            <div class="row"><!-- row -->
                                                <div class="col-6">Order</div>
                                                <div class="col-5">
                                                    <div class="row">
                                                        <div class="col-4">Price</div>
                                                        <div class="col-4">Quantity</div>
                                                        <div class="col-4">Total</div>
                                                    </div>
                                                </div>
                                                <div class="col-1"></div>
                                            </div> <!-- /row -->
                                        </div><!-- /cart-header -->
                                        <div class="cart-body">
                                            <?php
                                                $sql="select * from purchase_detail left join product on product.productid=purchase_detail.productid where purchaseid='$_SESSION[pid]'";
                                                $dquery=$conn->query($sql);
                                                while($drow=$dquery->fetch_array()){
                                                    ?>
                                                    <!-- Product-->
                                                    <div class="cart-item">
                                                        <div class="row align-items-center text-center">
                                                            <div class="col-2 product_img" style="background-image: url(<?php if(empty($drow['photo'])){echo "upload/noimage.jpg";} else{echo $drow['photo'];} ?>);">
                                                            </div> <!-- /col-2 -->
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
                                                                    <div class="col-4 product_price text-center">&#8369; <?php echo number_format($drow['price'], 2); ?>
                                                                    </div><!-- /col-4 -->
                                                                    <div class="col-4 product_price text-center">
                                                                            <?php
                                                                                $sql = "select * from purchase_detail where purchaseid='$_SESSION[pid]' and productid = '$drow[productid]'";
                                                                                $query=$conn->query($sql);
                                                                                $purchase =$query->fetch_array();
                                                                            ?>
                                                                            <?php echo $purchase['quantity']; ?>
                                                                    </div><!-- /col-4 -->
                                                                    <div class="col-4 text-center product_price">&#8369;
                                                                        <?php
                                                                            $subt = $drow['price']*$purchase['quantity'];
                                                                            echo number_format($subt, 2);
                                                                        ?>
                                                                    </div><!-- /col-4 -->
                                                                </div><!-- /row -->
                                                            </div><!-- /col-5 -->
                                                            <div class="col-1 text-center">
                                                                <div class="align-items-center">
                                                                    <form method = "POST" action = "cart_remove.php">
                                                                        <input type = 'hidden' name = 'pdid' value="<?php echo $purchase['pdid']?>">
                                                                        <input type = 'hidden' name = 'subt' value="<?php echo $subt?>">
                                                                        <input type = 'hidden' name = 'pid' value="<?php echo $_SESSION['pid']?>">
                                                                        <button type='submit' class="btn">
                                                                            <span class="glyphicon glyphicon-remove-circle"></span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div><!-- /col-1 -->
                                                        </div><!-- /row -->
                                                    </div><!-- /cart-item -->
                                                    <?php
                                                }
                                            ?>
                                            <div class="d-flex justify-content-between">
                                                <a class="btn btn-link def" href="menu.php">
                                                    <i class="fa fa-chevron-left"></i> Continue Adding Orders
                                                </a>
                                                <a class="btn success" href="checkout.php">Proceed to checkout <i class="fa fa-chevron-right"></i>
                                                </a>
                                            </div>
                                        </div><!-- /cart-body -->
                                    </div><!-- /cart-wrapper -->
                                </div><!-- /cart -->
                            </div><!-- /col-lg-9 -->
                            <div class="col-lg-3">
                                <div class="block">
                                    <div class="block-header">
                                        <h6 class="text-uppercase text-center">Order Summary</h6>
                                    </div><!-- /block-header -->
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
                                </div><!-- /block -->
                            </div><!-- /col-lg-3 -->
                        </div><!-- /row -->
                    </div><!-- /container -->
                </section>
                <?php
            }else{
                ?>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 text-center">
                            <h5 class="ask">
                                What would you like to do?
                            </h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 text-center">
                            <a class="btn success" href="menu.php">
                                Add Items
                            </a>
                            <form method="POST" action="checkout_cancel.php">
                                <button type="submit" class="btn success">
                                    Cancel Order
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
            }
        ?>
    </div>
</body>