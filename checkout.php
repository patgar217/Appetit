<!-- CHECKOUT PAGE -->
<?php include ('header.php');
    session_start();
?>

<body>
    <?php include ('navbar.php');?>  
    <div class="container pb-6">
        <!-- Hero Content-->
        <div class="hero-content pb-5 text-center" style="background-image: url(images/checkout-header.jpg);">
            <div class="container">
                <h2 class="preheading"><span class="text-primary">Appétit </span> / Checkout</h2>
                <h1 class="hero-heading">Order No.: <?php echo $_SESSION['pid'];?></h1>
                <div class="row">   
                    <div class="col-xl-8 offset-xl-2">
                        <p class="lead">You have 
                            <span><strong>
                            <?php
                                $sql = "select * from purchase_detail where purchaseid='$_SESSION[pid]'";
                                $result = $conn->query($sql);
                                echo $result-> num_rows;
                            ?>
                            </strong></span> order/s ready for checkout.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php
            $sql = "select * from purchase_detail where purchaseid='$_SESSION[pid]'";
            $result = $conn->query($sql);
        
            if ($result-> num_rows > 0){
                ?>
                <div class="row checkout">
                    <div class="col-lg-7 info">
                        <div class="block-header">
                            <h6>Invoice Information </h6>
                        </div>
                        <div class="row"> 
                            <form method = "POST" action="checkout-confirmation.php">
                                <div class="col-md-12 mb-4">
                                    <label class="form-label" for="customer">Customer's Name</label>
                                    <input class="form-control form-control-underlined" type="text" name="customer" placeholder="Customer's Name" required>
                                    
                                    <label class="form-label" for="orderType">Order Type</label><br>
                                    <input type="radio" id="dine" name="orderType" value="Dine-In" required>
                                    <label class="form-rcontrol" for="dine">Dine-In</label>
                                    <input type="radio" id="take" name="orderType" value="Take-Out">
                                    <label class="form-rcontrol" for="take">Take-Out</label><br>

                                    <label class="form-label" for="payment">Payment Option</label><br>
                                    <input type="radio" id="cash" name="payment" value="Cash" required>
                                    <label class="form-rcontrol" for="cash">Cash</label>
                                    <input type="radio" id="credit" name="payment" value="Credit Card">
                                    <label class="form-rcontrol" for="credit">Credit Card</label>
                                    <input type="radio" id="gcash" name="payment" value="GCash">
                                    <label class="form-rcontrol" for="gcash">GCash</label><br>
                                </div>
                                <div class="col-md-12">
                                    <p class="terms text-muted">Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a href="#">privacy policy</a>.</p>
                                    <p class="terms text-muted">I have read and agree to the website <a href="#">terms and conditions</a>. * </p>
                                    <button type="submit" class="btn btn-block place"  name = "opt" value="submit">
                                        PLACE ORDER
                                    </button>
                                    <button type="submit" class="btn btn-block cancel" name = "opt" value="cancel">
                                        CANCEL ORDER
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-5 ord">
                        <div class="block-header">
                            <h6>Order Summary </h6>
                        </div>
                        <table class="table border-bottom border-dark mb-5">
                            <tbody>
                                <?php
                                    $sql="select * from purchase_detail left join product on product.productid=purchase_detail.productid where purchaseid='$_SESSION[pid]'";
                                    $dquery=$conn->query($sql);
                                    while($drow=$dquery->fetch_array()){
                                        ?>
                                        <tr class="text-sm">
                                            <?php
                                                $sql = "select * from purchase_detail where purchaseid='$_SESSION[pid]' and productid = '$drow[productid]'";
                                                $query=$conn->query($sql);
                                                $purchase =$query->fetch_array();
                                            ?>
                                            <th class="py-4 order-summary-item des text-muted"><?php echo $drow['productname']; ?> <span>x <?php echo $purchase['quantity']; ?></span></th>
                                            <td class="py-4 order-summary-item text-right text-muted">&#8369;
                                                <?php
                                                    $subt = $drow['price']*$purchase['quantity'];
                                                    echo number_format($subt, 2);
                                                ?>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    $sql = "select * from purchase where purchaseid='$_SESSION[pid]'";
                                    $query=$conn->query($sql);
                                    $purchase =$query->fetch_array();
                                    $total = $purchase['total'];
                                    $subt = $total/1.12;
                                    $vat = $total - $subt;
                                ?>
                                <tr>
                                    <th class="py-4 order-summary-item des align-bottom">Order Subtotal </th>
                                    <td class="py-4 order-summary-item text-right text-muted">&#8369;<?php echo number_format($subt, 2);?></td>
                                </tr>
                                <tr>
                                    <th class="py-4 order-summary-item des align-bottom">Tax </th>
                                    <td class="py-4 order-summary-item text-right text-muted">&#8369;<?php echo number_format($vat, 2);?></td>
                                </tr>
                            <tr>
                            <th class="py-4 order-summary-item des total border-dark align-bottom">Total</th>
                            <td class="py-4 order-summary-item total text-right h3 border-dark">&#8369;<?php echo number_format($total, 2);?></td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
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