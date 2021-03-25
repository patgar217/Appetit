<!-- SALES PAGE -->
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
<body data-aos-easing="ease" data-aos-doration="400" data-aos-delay="150">
  <?php include('navbarA.php'); ?>
  <div class="container">
      <!--Hero Content-->
      <div class="hero-content pb-5 text-center" style="background-image: url(images/sales-header.jpg);">
        <div class="container">
          <h2 class="preheading"><span class="text-primary">Appétit </span> / Sales</h2>
          <h1 class="hero-heading">Sales</h1>
            <div class="row">   
              <div class="col-xl-8 offset-xl-2">
                <p class="lead">This is Appétit's overall sales. Check them to ensure correctness of our transcripts.</p>
              </div>
            </div>
          </div>
      </div>
      <section class="pb-6">
        <div class="container">
          <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10 col-xl-10">
              <table class="table table-hover table-responsive-md">
                <thead class="bg-light cart-header">
                  <tr>
                      <th class="py-4 pl-3 border-0 text-center">Order No.</th>
                      <th class="py-4 border-0 text-center">Date</th>
                      <th class="py-4 border-0 text-center">Name</th>
                      <th class="py-4 border-0 text-center">Total</th>
                      <th class="py-4 border-0 text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                      <?php 
                          $sql="select * from purchase order by purchaseid desc";
                          $query=$conn->query($sql);
                          while($row=$query->fetch_array()){
                              ?>
                              <tr>
                                  <th class="pl-3 py-4 align-middle text-center" id = "pid"><?php echo $row['purchaseid']; ?></td>
                                  <td class="py-4 align-middle text-center"><?php echo date('M d, Y h:i A', strtotime($row['date_purchase'])) ?></td>
                                  <td class="py-4 align-middle text-center"><?php echo $row['customer']; ?></td>
                                  <td class="py-4 align-middle text-center">&#8369; <?php echo number_format($row['total'], 2); ?></td>
                                  <td class="py-4 align-middle text-center">
                                      <a href="#details<?php echo $row['purchaseid']; ?>" data-toggle="modal" class="btn view">View </a>
                                      <?php include('sales_modal.php'); ?>
                                  </td>
                              </tr>
                              <?php
                          }
                      ?>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </section>
  </div>
</body>