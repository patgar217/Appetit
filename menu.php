<!-- MENU PAGE -->
<?php include ('header.php');
    session_start();
?>
<body>
    <?php include ('navbar.php');?>   
    <div class="container">
        <!-- Hero Content-->
        <div class="hero-content pb-5 text-center" style="background-image: url(images/menu-header.jpg);">
            <div class="container">
                <h2 class="preheading"><span class="text-primary">Appétit </span> / Menu</h2>
                <h1 class="hero-heading">Our Menu</h1>
                <div class="row">   
                    <div class="col-xl-8 offset-xl-2">
                        <p class="lead">Check out Appétit's take on the traditional Asian & International cuisines.</p>
                    </div>
                </div>
            </div>
        </div>
        <ul class="nav nav-tabs justify-content-center">
            <br>
            <?php
                $sql="select * from category order by categoryid asc limit 1";
                $fquery=$conn->query($sql);
                $frow=$fquery->fetch_array();
                ?>
                    <li class="active">
                        <a data-toggle="tab" href="#<?php echo $frow['catname'] ?>"><?php echo $frow['catname'] ?>
                            <span class="text-secondary">
                                <?php
                                    $sql_frow = "SELECT * FROM product WHERE categoryid = '$frow[categoryid]'";
                                    $n_frow = $conn->query($sql_frow);
                                    echo mysqli_num_rows($n_frow);
                                ?>
                            </span>
                        </a>
                    </li>
                <?php

                $sql="select * from category order by categoryid asc";
                $nquery=$conn->query($sql);
                $num=$nquery->num_rows-1;

                $sql="select * from category order by categoryid asc limit 1, $num";
                $query=$conn->query($sql);
                while($row=$query->fetch_array()){
                    ?>
                    <li>
                        <a data-toggle="tab" href="#<?php echo $row['catname'] ?>"><?php echo $row['catname'] ?>
                            <span class="text-secondary">
                                <?php
                                    $sql_row = "SELECT * FROM product WHERE categoryid = '$row[categoryid]'";
                                    $n_row = $conn->query($sql_row);
                                    echo mysqli_num_rows($n_row);
                                ?>
                            </span>
                        </a>
                    </li>
                    <?php
                }
            ?>
        </ul>
        <div class="tab-content">
            <?php
                $sql="select * from category order by categoryid asc limit 1";
                $fquery=$conn->query($sql);
                $ftrow=$fquery->fetch_array();
                ?>
                    <div id="<?php echo $ftrow['catname']; ?>" class="tab-pane fade in active" style="margin-top:20px;">
                        <?php

                            $sql="select * from product where categoryid='".$ftrow['categoryid']."'";
                            $pfquery=$conn->query($sql);
                            while($pfrow=$pfquery->fetch_array()){
                                ?>
                                    <div class="col-sm-6 product_item">
                                        <div class="row">
                                            <div class="col-3 product_img" style="background-image: url(<?php if(empty($pfrow['photo'])){echo "upload/noimage.jpg";} else{echo $pfrow['photo'];} ?>);">
                                            </div>
                                            <div class="col-6">
                                                <h4 class="product_name"><?php echo $pfrow['productname']; ?></h4>
                                                <p class="product_des"><?php echo $pfrow['productdes']; ?></p>
                                            </div>
                                            <div class="col-3">
                                                <div class="product_price text-center">
                                                    &#8369; <?php echo number_format($pfrow['price'], 2); ?>
                                                </div>
                                                <div>
                                                    <a href="#details<?php echo $pfrow['productid']; ?>" data-toggle="modal" class="btn success">Add Order </a>
                                                    <?php include('cart_modal1.php'); ?>
                                                </div>
                                            </div>
                                        </div> <!-- / .row -->
                                    </div>
                                <?php
                            }
                        ?>
                    </div>
                <?php

                $sql="select * from category order by categoryid asc";
                $tquery=$conn->query($sql);
                $tnum=$tquery->num_rows-1;

                $sql="select * from category order by categoryid asc limit 1, $tnum";
                $cquery=$conn->query($sql);
                while($trow=$cquery->fetch_array()){
                    ?>
                    <div id="<?php echo $trow['catname']; ?>" class="tab-pane fade" style="margin-top:20px;">
                        <?php
                            $sql="select * from product where categoryid='".$trow['categoryid']."'";
                            $pquery=$conn->query($sql);
                            $inc=4;
                            while($prow=$pquery->fetch_array()){
                                ?>
                                    <div class="col-md-6 product_item">
                                        <div class="row">
                                            <div class="col-3 product_img" style="background-image: url(<?php if(empty($prow['photo'])){echo "upload/noimage.jpg";} else{echo $prow['photo'];} ?>);">
                                            </div>
                                            <div class="col-6">
                                                <h4 class="product_name"><?php echo $prow['productname']; ?></h4>
                                                <p class="product_des"><?php echo $prow['productdes']; ?></p>
                                            </div>
                                            <div class="col-3">
                                                <div class="product_price text-center">
                                                    &#8369; <?php echo number_format($prow['price'], 2); ?>
                                                </div>
                                                <div>
                                                    <a href="#details<?php echo $prow['productid']; ?>" data-toggle="modal" class="btn success">Add Order </a>
                                                    <?php include('cart_modal2.php'); ?>
                                                </div>
                                            </div>
                                        </div> <!-- / .row -->
                                    </div>
                                <?php
                            }
                        ?>
                    </div>
                    <?php
                }
            ?>
	    </div>
    </div>
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
