<!-- Sales Details -->
<div class="modal fade" id="details<?php echo $row['purchaseid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1>Order No.: <?php echo $row['purchaseid'];?></h1>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <span class="glyphicon glyphicon-remove"></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="block">
                        <div class="block-header">
                            <h6 class="text-uppercase mb-0">Invoice Information</h6>
                        </div>
                        <div class="block-body bg-light">
                            <ul class="order-summary list-unstyled">
                                <li class="order-summary-item">
                                    <div class="col-6 des">
                                        <span class="text-muted">Name: </span><span><?php echo $row['customer']; ?></span>
                                    </div>
                                    <div class="col-6 des">
                                        <span class="text-muted" >Date: </span><span><?php echo date('M d, Y h:i A', strtotime($row['date_purchase'])) ?></span>
                                    </div>
                                </li>
                                <li class="order-summary-item">
                                    <div class="col-6 des">
                                        <span class="text-muted">Order Type: </span><span><?php echo $row['orderType']; ?></span>
                                    </div>
                                    <div class="col-6 des">
                                        <span class="text-muted">Payment Option: </span><span><?php echo $row['payment']; ?></span>
                                    </div>
                                </li>
                            </ul>
                        </div><!-- /block-body -->
                    </div><!-- /block -->
                    <br>
                    <div class="block-header">
                        <h6 class="text-uppercase mb-0">Order Summary</h6>
                    </div>
                    <!--Edit-->
                    <div class="cart">
                        <div class="cart-wrapper">
                            <div class="cart-header">
                                <div class="row">
                                    <div class="col-6 text-center">Order</div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-4 text-center">Price</div>
                                            <div class="col-4 text-center">Quantity</div>
                                            <div class="col-4 text-center">Total</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cart-body">
                            <!-- Product-->
                                <div class="cart-item">
                                    <div class="row align-items-center text-center">
                                        <?php
                                            $sql="select * from purchase_detail left join product on product.productid=purchase_detail.productid where purchaseid='".$row['purchaseid']."'";
                                            $dquery=$conn->query($sql);
                                            while($drow=$dquery->fetch_array()){
                                                ?>
                                                <div class="col-2 product_img" style="background-image: url(<?php if(empty($drow['photo'])){echo "upload/noimage.jpg";} else{echo $drow['photo'];} ?>);">
                                                </div> <!-- /col-2 -->
                                                <div class="col-4">
                                                    <div class="d-flex align-items-center">
                                                        <div class="cart-title text-left">
                                                            <a class="product_name text-uppercase text-dark" href="#">
                                                                <strong><?php echo $drow['productname']; ?></strong>
                                                            </a><br>
                                                            <br>
                                                        </div>
                                                    </div>
                                                </div> <!-- /col-4 -->
                                                <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-4 product_price">&#8369; <?php echo number_format($drow['price'], 2); ?>
                                                        </div><!-- /col-4 -->
                                                        <div class="col-4 product_price"><?php echo $drow['quantity']; ?>
                                                        </div><!-- /col-4 -->
                                                        <div class="col-4 text-center product_price">&#8369;
                                                            <?php
                                                                $subt = $drow['price']*$drow['quantity'];
                                                                echo number_format($subt, 2);
                                                            ?>
                                                        </div><!-- /col-4 -->
                                                    </div><!-- /row -->
                                                </div><!-- /col-6 -->
                                                <?php
                                            }
                                        ?>
                                    </div>
                                    <div class="row align-items-right">
                                        <div class="col-10 text-right product_price"><strong>TOTAL:</strong></div>
                                        <div class="col-2 text-left product_price"><strong> &#8369; <?php echo number_format($row['total'], 2); ?></strong></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/Edit-->
                </div>
			</div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>