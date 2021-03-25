<!-- PRODUCT PAGE -->
<?php include('header.php'); ?>
<head>
    <!-- Swiper-->
    <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/varkala/1-2/vendor/swiper/css/swiper.min.css">
    <!-- AOS - AnimationOnScroll-->
    <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/varkala/1-2/vendor/aos/aos.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/varkala/1-2/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- Price Slider Stylesheets -->
    <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/varkala/1-2/vendor/nouislider/nouislider.css">
    <!-- Theme stylesheet-->
    <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/varkala/1-2/css/style.default.d1b89a2d.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/varkala/1-2/css/custom.0a822280.css">
</head>
<body>
<?php include('navbarA.php'); ?>
    <div class="container">
        <!--Hero Content-->
        <div class="hero-content pb-5 text-center" style="background-image: url(images/product-header.jpg);">
            <div class="container">
            <h2 class="preheading"><span class="text-primary">Appétit </span> / Product</h2>
            <h1 class="hero-heading">Product</h1>
                <div class="row">   
                <div class="col-xl-8 offset-xl-2">
                    <p class="lead">These are Appétit's products. You may add or delete some of them to cater our customer's preferences.</p>
                </div>
                </div>
            </div>
        </div>
        <!--EDIT-->
        <div class="products-grid col-xl-12 col-lg-10 order-lg-2">
            <header class="product-grid-header">
                <div class="mr-3 mb-10">
                    <select id="catList" class="btn catList">
                        <option value="0">All Category</option>
                        <?php
                            $sql="select * from category";
                            $catquery=$conn->query($sql);
                            while($catrow=$catquery->fetch_array()){
                                $catid = isset($_GET['category']) ? $_GET['category'] : 0;
                                $selected = ($catid == $catrow['categoryid']) ? " selected" : "";
                                echo "<option$selected value=".$catrow['categoryid'].">".$catrow['catname']."</option>";
                            }
                        ?>
                    </select>
                </div><!--/mr-3 mb-10-->
                <div class="mr-3 mb-10">
                </div><!--/mr-3 mb-10-->
                <div class="mb-10 align-items-center">
                    <a href="#addproduct" data-toggle="modal" class="pull-right btn add">
                        Add Product
                    </a>
                </div><!--/mb-10 align-items-center-->
            </header>
            <div class="row">
				<?php
					$where = "";
					if(isset($_GET['category']))
					{
						$catid=$_GET['category'];
						$where = " WHERE product.categoryid = $catid";
					}
					$sql="select * from product left join category on category.categoryid=product.categoryid $where order by product.categoryid asc, productname asc";
					$query=$conn->query($sql);
					while($row=$query->fetch_array()){
						?>
							<!-- product-->
							<div class="col-xl-3 col-sm-4 col-6 product_item">
								<div class="product aos-init aos-animate" data-aos="zoom-in" data-aos-delay="0" style="margin-bottom:2px;">
									<div class="mb-md-3">
										<div class="product_image" style="background-image: url(<?php if(empty($row['photo'])){echo "upload/noimage.jpg";} else{echo $row['photo'];} ?>);">
                                        </div>
										<div class="product-hover-overlay">
											<span class="product_price">&#8369; <?php echo number_format($row['price'], 2); ?></span>
											<div>
												<span class="product_des">Category: <?php echo $row['catname']; ?></span>
											</div>
										</div>
									</div>
								</div>
								<div class="position-relative product-label">
                                    <h3>
                                        <span class="product_name"><?php echo $row['productname']; ?></span>
                                    </h3>
                                    <div class="buttons">
                                        <a href="#editproduct<?php echo $row['productid']; ?>" data-toggle="modal" class="btn edit"><i class="fas fa-edit"></i></a>
                                        <a href="#deleteproduct<?php echo $row['productid']; ?>" data-toggle="modal" class="btn del"><i class="fas fa-trash-alt"></i></a>
                                        <?php include('product_modal.php'); ?>
                                    </div>
								</div>
							</div>
							<!--/product-->
						<?php
					}
				?>
            </div><!-- /row -->
        </div>
        <!--/EDIT-->
    </div>
<?php include('modal.php'); ?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#catList").on('change', function(){
			if($(this).val() == 0)
			{
				window.location = 'product.php';
			}
			else
			{
				window.location = 'product.php?category='+$(this).val();
			}
		});
	});
</script>
</body>

</html>