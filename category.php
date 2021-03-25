<!-- CATEGORY PAGE -->
<?php include('header.php'); ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Custom font-->
    <link rel="stylesheet" href="fonts/stylesheet.e9dc714d.css">
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
    <!-- FontAwesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.0/css/all.css">
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>
<body>
    <?php include('navbarA.php'); ?>
    <div class="container">
        <!--Hero Content-->
        <div class="hero-content pb-5 text-center" style="background-image: url(images/product-header.jpg);">
            <div class="container">
            <h2 class="preheading"><span class="text-primary">Appétit </span> / Category</h2>
            <h1 class="hero-heading">Category</h1>
                <div class="row">   
                    <div class="col-xl-8 offset-xl-2">
                        <p class="lead">These are Appétit's categories. You may add or delete some of them to cater our customer's preferences.</p>
                    </div>
                </div>
            </div>
        </div> 
        <div class="products-grid">
            <header class="product-grid-header">
                <div class="mr-3 mb-10">
                </div>
                <div class="mr-3 mb-10">
                </div>
                <div class="mb-10 align-items-center">
                    <a href="#addcategory" data-toggle="modal" class="pull-right btn add">
                        Add Category
                    </a>
                </div>
            </header>
            <div class="row">
                <?php
                    $sql="select * from category order by categoryid asc";
                    $query=$conn->query($sql);
                    while($row=$query->fetch_array()){
                        ?>
                        <div class="col-sm-6 col-lg-4 mb-5">
                            <div class="card-scale aos-init aos-animate" data-aos="zoom-in">
                                <?php
                                    $sql_pic = "SELECT * FROM product WHERE categoryid = '$row[categoryid]' limit 1";
                                    $pic = $conn->query($sql_pic);
                                    $fpic= $pic->fetch_array();
                                ?>
                                <div class="img-scale-container mb-3 cat-img">
                                    <img class="img-fluid img-scale" src="<?php if(empty($fpic['photo'])){echo "upload/noimage.jpg";} else{echo $fpic['photo'];} ?>" alt="">
                                </div>
                                <h5> 
                                    <a class="stretched-link text-reset cat-name" href="#"><?php echo $row['catname']; ?>
                                        <span class="text-md text-muted ml-2">
                                            <?php
                                                $sql_row = "SELECT * FROM product WHERE categoryid = '$row[categoryid]'";
                                                $n_row = $conn->query($sql_row);
                                                echo mysqli_num_rows($n_row);
                                            ?>
                                        </span>
                                    </a>  
                                </h5>   
                            </div>
                                <div class="buttons">
                                    <a href="#editcategory<?php echo $row['categoryid']; ?>" data-toggle="modal" class="btn edit "><i class="fas fa-edit"></i></a>
                                    <a href="#deletecategory<?php echo $row['categoryid']; ?>" data-toggle="modal" class="btn del"><i class="fas fa-trash-alt"></i></a>
                                    <?php include('category_modal.php'); ?>    
                                </div>
                        </div>
                        <?php
                    }
                ?>
            </div>
        </div>
    </div>
<?php include('modal.php'); ?>
</body>
</html>