<!--SIGN-IN PAGE-->
<?php 
include('header.php'); 
session_start();
if (!isset($_SESSION['signin'])){
    $_SESSION['signin'] = 1;
}

?>
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
    <div class="container">
        <!-- Hero Content-->
        <div class="hero-content pb-5 text-center" style="background-image: url(images/signin-header.jpg);">
            <div class="container">
                <h2 class="preheading"><span class="text-primary">Appétit </span> / Sign-in</h2>
                <h1 class="hero-heading">Sign-in</h1>
                <div class="row">   
                    <div class="col-xl-8 offset-xl-2">
                        <p class="lead">Hey there Appétit admin! Sign-in and let's get going.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class= "col-3">
            </div>
            <div class="col-6">
                <div class="block-body">
                    <?php
                        if ($_SESSION['signin'] == 0){
                            ?>
                            <p class="text-primary">
                                <i class= "fas fa-exclamation-circle"></i> Username or Password Incorrect
                            </p>
                            <?php
                        }
                    ?>
                    <form action="login.php" method="GET">
                        <label class="form-label user" for="username">Username</label>
                        <input class="form-control form-control-underlined" type="text" name="username" placeholder="" required>
                            
                        <label class="form-label" for="password">Password</label>
                        <input class="form-control form-control-underlined" type="password" name="password" required>
                        <br>
                        <button class="btn btn-block place" type="submit">
                            SIGN IN
                        </button>
                        <a class="btn btn-block cancel" href="index.php">
                            CANCEL
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>