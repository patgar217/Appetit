<!-- HOME PAGE -->
<?php include('header.php'); ?>
<body>
    <header class="header-area">
        <nav class="navbar navbar-expand-sm navbar-dark fixed-top">
            <div class="social">
                <a href="https://www.facebook.com/"><i class='fab fa-facebook-f'></i></a>
                <a href="https://www.twitter.com/"><i class='fab fa-twitter'></i></a>
                <a href="https://www.instagram.com/"><i class='fab fa-instagram'></i></a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="nav navbar-nav ml-auto navbar-right">
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>  
        </nav>
    </header>
    <section class="slider-area">
        <div class="single-slide" style="background-image: url(images/index-header.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 text-center">
                        <div class="slide-content">
                            <h2 class="preheading"><span class="text-primary">BAR </span> / RESTAURANT</h2>
                            <h1>Appétit</h1>
                            <p>The Appétit Bar and Restaurant serve everything from traditional Asian & International cuisine to full English breakfasts and exquisite cocktails. The options are many and the flavors are fabulous.</p>
                            <form method="POST" action="createPID.php">
                                <button type="submit" class="btn btn-primary text-white searchMenu">
                                    Search Menu
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 text-center admin">
                        <h5>Are you an Admin? 
                            <a href="signin.php"> Sign-in here. </a>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

