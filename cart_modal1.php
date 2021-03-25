<!-- Adding Items to Cart Modal1 -->
<div class="modal fade" id="details<?php echo $pfrow['productid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1>Order No.: <?php echo $_SESSION['pid'];?></h1>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <span class="glyphicon glyphicon-remove"></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid product_image" style="background-image: url(<?php if(empty($pfrow['photo'])){echo "upload/noimage.jpg";} else{echo $pfrow['photo'];} ?>);">
                    <div class="overlay align-items-center">
                        <form method="POST" action="purchase.php">
                            <div class="row">
                                <div class="col-xl-12 text-center">
                                    <h4 class="hero-heading text-center"><?php echo $pfrow['productname']; ?></h4>
                                    <p class="lead text-center"><?php echo $pfrow['productdes']; ?></p>
                                    <!-- Quantity -->
                                    <div class="quantity text-center">
                                        <h5>
                                            <label for="quantity">Quantity</label><br>
                                            <input type="text" class="form-controlq text-center" value = "1" name="quantity">
                                        </h5>
                                        <input type="hidden" name= "productid" value = "<?php echo $pfrow['productid']; ?>">
                                        <input type="hidden" name= "pid" value = "<?php echo $_SESSION['pid']; ?>">
                                    </div>
                                    
                                    <!--Add to Cart-->
                                    <button type="submit" class="btn success">
                                        PLACE ORDER
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
			</div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>