<!-- PROFILE PAGE -->
<?php 
include ('header.php');
session_start();
?>
<body>
  <?php include ('navbarA.php')?>
  <div class="container">
    <!--Hero Content-->
    <div class="hero-content pb-5 text-center" style="background-image: url(images/profile-header.jpg);">
      <div class="container">
        <h2 class="preheading"><span class="text-primary">Appétit </span> / Profile</h2>
        <h1 class="hero-heading">Profile</h1>
        <div class="row">   
          <div class="col-xl-8 offset-xl-2">
            <p class="lead">Hi <strong><?php echo $_SESSION['adminid']?></strong>! Do you have anything to change in your Appétit profile?</p>
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
            <h6>Change Password</h6>
          </div><!--/block-header-->
          <div class="block-body">
            <form action="change_pass.php" method="GET">
              <?php
                if (!isset($_SESSION['changepass'])){
                  $_SESSION['changepass'] = 0;
                }
                if ($_SESSION['changepass'] == 1){
                  ?>
                  <p class="text-primary">
                    <i class= "fas fa-exclamation-circle"></i> Password has been changed!
                  </p>
                <?php
                }elseif($_SESSION['changepass']==2){
                  ?>
                  <p class="text-primary">
                    <i class= "fas fa-exclamation-circle"></i> New password does not match the retyped password!
                  </p>
                <?php
                }elseif($_SESSION['changepass']==3){
                  ?>
                  <p class="text-primary">
                    <i class= "fas fa-exclamation-circle"></i> Incorrect password!
                  </p>
                <?php
                }
                $_SESSION['changepass'] = 0;
              ?>
              <div class="row">
                <div class="col-sm-6">
                  <label class="form-label" for="password_old">Old password</label>
                  <input class="form-control" name="password_old" type="password">
                </div>
              </div><!--/row-->
              <div class="row">
                <div class="col-sm-6">
                  <label class="form-label" for="password_1">New password</label>
                  <input class="form-control" name="password_1" type="password">
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="password_2">Retype new password</label>
                    <input class="form-control" name="password_2" type="password">
                </div>
              </div><!--/row-->
              <div class="text-center mt-4">
                <button class="btn btn-block place" type="submit">
                    <input class="form-control" name="username" type="hidden" value="<?php echo $_SESSION['adminid']?>">
                    Change password
                </button>
              </div><!--/text-center mt-4-->
            </form><!--/form-->
          </div><!--/block-body-->
        </div><!--/block-->
      </div><!--/col-8-->
      <div class="col-2">
      </div>
    </div><!--/row-->
    <div class="row">
      <div class="col-2">
      </div>
      <div class="col-8">
        <div class="block mb-5">
          <div class="block-header">
            <h6>Personal Details</h6>
          </div><!--/block-header-->
          <div class="block-body">
            <form action="change_info.php" method="GET">
              <?php
                  if (!isset($_SESSION['changeinfo'])){
                      $_SESSION['changeinfo'] = 0;
                  }
                  if ($_SESSION['changeinfo']==1){
                      ?>
                      <p class="text-primary">
                          <i class= "fas fa-exclamation-circle"></i> Profile has been changed!
                      </p>
                      <?php
                  }
                  $_SESSION['changeinfo'] = 0;
              ?>
              <?php 
                  $sql = "select * from admin where adminid = '$_SESSION[adminid]'";
                  $result = $conn -> query($sql)->fetch_assoc();
              ?>
              <div class="row">
                  <div class="col-sm-6">
                      <label class="form-label" for="fname">First Name</label>
                      <input class="form-control" name="fname" type="text" value="<?php echo $result['fname'];?>">
                  </div>
                  <div class="col-sm-6">
                      <label class="form-label" for="lname">Last Name</label>
                      <input class="form-control" name="lname" type="text" value="<?php echo $result['lname'];?>">
                  </div>
              </div><!-- /.row-->
              <div class="row">
                  <div class="col-sm-6">
                      <label class="form-label" for="age">Age</label>
                      <input class="form-control" name="age" type="text" value="<?php echo $result['age'];?>">
                  </div>
                  <div class="col-sm-6">
                      <label class="form-label" for="contact">Contact</label>
                      <input class="form-control" name="contact" type="text" value="<?php echo $result['contact'];?>">
                  </div>
              </div><!-- /.row-->
              <div class="text-center mt-4">
                <input class="form-control" name="username" type="hidden" value="<?php echo $_SESSION['adminid']?>">
                <button class="btn btn-block place" type="submit">
                    Save changes
                </button>
              </div><!--/text-center mt-4-->
            </form><!--/form-->
          </div><!--/block-body-->
        </div><!--/block-->
      </div><!--/col-8-->
      <div class="col-2">
      </div>
    </div><!--/row-->
    
  </div><!--/container-->
</body>
