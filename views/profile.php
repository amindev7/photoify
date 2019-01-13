<?php

require __DIR__.'/../views/header.php';

if (isset($_SESSION['user'])):
?>
    <h1 class="profile-user-name"></h1>
    <div class="container">
    <h1>Edit Profile <?php echo $_SESSION['user']['name'];?></h1>
  	<hr>

    	<div class="row">
          <!-- left column -->
          <div class="col-md-3">
            <div class="text-center">
              <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
              <input type="file" class="form-control">
            </div>
          </div>
          <!-- edit form column -->
          <div class="col-md-9 personal-info">
            <h3>Update Personal info</h3>
            <!-- PROFILE UPDATE FORM -->
            <form class="form-horizontal" action="/app/users/settings.php" method="post">
            <!-- <input type="hidden" name="id" value=""> -->
              <div class="form-group">
                <label class="col-lg-3 control-label">Full Name:</label>
                <div class="col-lg-8">
                  <input class="form-control" name="name" type="text" value="">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">Email:</label>
                <div class="col-lg-8">
                  <input class="form-control" name="email" type="text" value="">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-8">
                  <input type="submit" name="save" class="btn btn-primary" value="Save Changes">
                </div>
              </div>
          </form>

          <!-- CHANGE PASSWORD FORM  -->
            <form class="form-horizontal" action="/app/users/settings.php" method="post" role="form">
              <div class="form-group">
                  <h3>Change Password</h3>
                    <label class="col-md-3 control-label">New Password:</label>
                    <div class="col-md-8">
                      <input class="form-control" name="new-password" type="password" value="">
                    </div>
              </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">Confirm password:</label>
                    <div class="col-md-8">
                      <input class="form-control" name="password-confirm" type="password" value="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                      <input type="submit" name="change-password" class="btn btn-primary" value="Change Password">
                      <span></span>
                    </div>
                  </div>
              </div>
            </form>
          </div>
      </div>
     <hr>
     <!-- <a class="panel-close close" data-dismiss="alert">×</a>
     <i class="fa fa-coffee"></i>
     This is an <strong>.alert</strong>. Use this to show important messages to the user. -->
<?php endif; ?>

<?php require __DIR__.'/../views/footer.php'; ?>
