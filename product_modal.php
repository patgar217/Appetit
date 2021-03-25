<!-- Edit Product -->
<div class="modal fade" id="editproduct<?php echo $row['productid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1>EDIT PRODUCT</h1>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <span class="glyphicon glyphicon-remove"></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="editproduct.php?product=<?php echo $row['productid']; ?>" enctype="multipart/form-data">
                        <div class="form-group" style="margin-top:10px;">
                            <div class="row">
                                <div class="col-md-3" style="margin-top:7px;">
                                    <label class="control-label">Product Name:</label>
                                </div><!--/col-md-3-->
                                <div class="col-md-9">
                                    <input type="text" class="form-control" value="<?php echo $row['productname']; ?>" name="pname">
                                </div><!--/col-md-9-->
                            </div><!--/row-->
                        </div><!--/form-group-->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3" style="margin-top:7px;">
                                    <label class="control-label">Category:</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="form-control" name="category">
                                        <option value="<?php echo $row['categoryid']; ?>"><?php echo $row['catname']; ?></option>
                                        <?php
                                            $sql="select * from category where categoryid != '".$row['categoryid']."'";
                                            $cquery=$conn->query($sql);

                                            while($crow=$cquery->fetch_array()){
                                                ?>
                                                <option value="<?php echo $crow['categoryid']; ?>"><?php echo $crow['catname']; ?></option>
                                                <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div><!--/form-group-->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3" style="margin-top:7px;">
                                    <label class="control-label">Product Description:</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="pdes"><?php echo $row['productdes']; ?></textarea>
                                </div>
                            </div>
                        </div><!--/form-group-->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3" style="margin-top:7px;">
                                    <label class="control-label">Price:</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" value="<?php echo $row['price']; ?>" name="price">
                                </div>
                            </div>
                        </div><!--/form-group-->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="control-label">Photo:</label>
                                </div>
                                <div class="col-md-9 align-items-center">
                                    <input type="file" name="photo" class="photo">
                                </div>
                            </div>
                        </div><!--/form-group-->
                    </div><!--/container-fluid-->
			</div><!--/modal-body-->
            <div class="modal-footer">
                <button type="submit" class="btn success">Update</button>
                <button type="button" class="btn def" data-dismiss="modal">Close</button>
                </form>
            </div><!--/modal-body-->
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Delete Product -->
<div class="modal fade" id="deleteproduct<?php echo $row['productid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1>DELETE PRODUCT</h1>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <span class="glyphicon glyphicon-remove"></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <h1 class="control-label">Product Name:</h1>
                        </div><!--/col-md-3-->
                        <div class="col-md-9">
                        <h1 class="product_name"><?php echo $row['productname']; ?></h1>
                        </div><!--/col-md-9-->
                    </div><!--/row-->
                    <div class="row">
                        <div class="col-md-3">
                            <h1 class="control-label">Category:</h1>
                        </div><!--/col-md-3-->
                        <div class="col-md-9">
                        <h1 class="product_des"><?php echo $row['catname']; ?></h1>
                        </div><!--/col-md-9-->
                    </div><!--/row-->
                    <div class="row">
                        <div class="col-md-3">
                            <h1 class="control-label">Product Description:</h1>
                        </div><!--/col-md-3-->
                        <div class="col-md-9">
                        <h1 class="product_des"><?php echo $row['productdes']; ?></h1>
                        </div><!--/col-md-9-->
                    </div><!--/row-->
                    <div class="row">
                        <div class="col-md-3">
                            <h1 class="control-label">Price:</h1>
                        </div><!--/col-md-3-->
                        <div class="col-md-9">
                        <h1 class="product_des"><?php echo $row['price']; ?></h1>
                        </div><!--/col-md-9-->
                    </div><!--/row-->
                    <div class="row">
                        <div class="col-md-3">
                            <h1 class="control-label">Photo:</h1>
                        </div><!--/col-md-3-->
                        <div class="col-md-9">
                        <h1 class="product_des"><?php echo $row['photo']; ?></h1>
                        </div><!--/col-md-9-->
                    </div><!--/row-->
                </div>
                
                
            </div>
            <div class="modal-footer">
                <a href="delete_product.php?product=<?php echo $row['productid']; ?>" class="btn success"> Delete</a>
                <button type="button" class="btn def" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>