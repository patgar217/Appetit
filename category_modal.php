<!-- Edit Category -->
<div class="modal fade" id="editcategory<?php echo $row['categoryid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1>EDIT CATEGORY</h1>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <span class="glyphicon glyphicon-remove"></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="editcategory.php?category=<?php echo $row['categoryid']; ?>" enctype="multipart/form-data">
                    <div class="form-group" style="margin-top:10px;">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Category Name:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="<?php echo $row['catname']; ?>" name="cname">
                            </div>
                        </div>
                    </div>
                </div>
			</div>
            <div class="modal-footer">
                <button type="submit" class="btn success">Update</button>
                <button type="button" class="btn def" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Delete Category -->
<div class="modal fade" id="deletecategory<?php echo $row['categoryid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1>DELETE CATEGORY</h1>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <span class="glyphicon glyphicon-remove"></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <h1 class="control-label">Category Name:</h1>
                        </div><!--/col-md-3-->
                        <div class="col-md-9">
                        <h1 class="product_name"><?php echo $row['catname']; ?></h1>
                        </div><!--/col-md-9-->
                    </div><!--/row-->
                </div><!--/container-fluid-->
            </div>
            <div class="modal-footer">
                <a href="delete_category.php?category=<?php echo $row['categoryid']; ?>" class="btn success"> Delete</a>
                <button type="button" class="btn def" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>