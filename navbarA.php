<!--Navigation Bar for Admin-side -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/style2.css">
  <link rel="stylesheet" type="text/css" href="css/style3.css">
</head>
<body>
    <header class="header-area">
        <nav class="navbar navbar-expand-sm navbar-dark fixed-top" id = "nav">
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
                    <li class="nav-item active">
                        <a class="nav-link" href="sales.php">Sales</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Maintenance
                        </a>
                        <div class="dropdown-menu" id="nav">
                            <a class="dropdown-item" href="product.php">Product</a>
                            <a class="dropdown-item" href="category.php">Category</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Settings
                        </a>
                        <div class="dropdown-menu" id="nav">
                            <a class="dropdown-item" href="profile.php">Profile</a>
                            <a class="dropdown-item" href="newAdmin.php">Add New Admin</a>
                            <a class="dropdown-item" href="index.php">Log out</a>
                        </div>
                    </li>  
                </ul>
            </div>  
        </nav>
    </header>
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $(window).scroll(function(){
                var scroll = $(window).scrollTop();
                if (scroll>50){
                    $("#nav").css("background","black");
                    $(".dropdown-menu").css("background","black");
                }else{
                    $("#nav").css("background","transparent");
                    $(".dropdown-menu").css("background","transparent");
                }
            })
        })
    </script>
</body>