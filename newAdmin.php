<!--ADD NEW ADMIN PAGE-->
<?php 
include ('header.php');
session_start();
?>
<body>
    <?php include ('navbarA.php')?>
    <div class="container">
        <div class="hero-content pb-5 text-center" style="background-image: url(images/register-header.jpg);">
            <div class="container">
                <h2 class="preheading"><span class="text-primary">Appétit </span> / New Admin</h2>
                <h1 class="hero-heading">New Admin</h1>
                <div class="row">   
                    <div class="col-xl-8 offset-xl-2">
                        <p class="lead">Hi <strong><?php echo $_SESSION['adminid']?></strong>! Please guide our new Appétit admin well!</p>
                    </div>
                </div>
            </div>
        </div><!--/Hero Content-->
        <div class="row">
            <div class="col-2">
            </div>
            <div class="col-8">
                <div class="block mb-5">
                    <div class="block-header">
                        <h6>Register</h6>
                    </div><!--/block-header-->
                    <div class="block-body">
                        <form action="add_admin.php" method="GET">
                            <?php
                                if (!isset($_SESSION['newadmin'])){
                                    $_SESSION['newadmin'] = 0;
                                }
                                if ($_SESSION['newadmin']==1){
                                    ?>
                                    <p class="text-primary">
                                        <i class= "fas fa-exclamation-circle"></i> Admin has been added!
                                    </p>
                                    <?php
                                }elseif($_SESSION['newadmin']==2){
                                    ?>
                                    <p class="text-primary">
                                        <i class= "fas fa-exclamation-circle"></i> Password does not match the retyped password!
                                    </p>
                                    <?php
                                }elseif($_SESSION['newadmin']==3){
                                    ?>
                                    <p class="text-primary">
                                        <i class= "fas fa-exclamation-circle"></i> Username is not available!
                                    </p>
                                    <?php
                                }
                                $_SESSION['newadmin'] = 0;
                            ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <label class="form-label" for="uname">Username</label>
                                    <input class="form-control" name="uname" type="text" required>
                                </div>
                            </div><!--/row-->
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="form-label" for="password">New password</label>
                                    <input class="form-control" name="password" type="password" required>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="password_1">Retype new password</label>
                                    <input class="form-control" name="password_1" type="password" required>
                                </div>
                            </div><!--/row-->
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="form-label" for="fname">First Name</label>
                                    <input class="form-control" name="fname" type="text" required>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="lname">Last Name</label>
                                    <input class="form-control" name="lname" type="text" required>
                                </div>
                            </div><!-- /.row-->
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="form-label" for="age">Age</label>
                                    <input class="form-control" name="age" type="text" required>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="contact">Contact</label>
                                    <input class="form-control" name="contact" type="text" required>
                                </div>
                            </div><!-- /.row-->
                            <div class="text-center mt-4">
                                <button class="btn btn-block place" type="submit">
                                    Add New Admin
                                </button>
                            </div><!--/text-center mt-4-->
                        </form><!--/form-->
                    </div><!--/block-body-->
                </div><!--/block-->
            </div><!--/col-8-->
            <div class="col-2">
            </div>
        </div>
        
    </div><!--/container-->
</body>
