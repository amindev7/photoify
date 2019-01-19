<?php

require __DIR__.'/../views/header.php';

if (isset($_SESSION['user'])):

    $id = $_SESSION['user']['id'];

    $query = 'SELECT * FROM users WHERE id = :id';

    $statement = $pdo->prepare($query);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    if (!$statement)
    {
        die(var_dump($pdo->errorInfo()));
    }
    $profileInfo = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($profileInfo as $info)
?>

<h1 class="profile-user-name"></h1>
<div class="container">
<h1>Edit Profile <?php echo $info['username'];?></h1>
	<hr>
	<div class="row">
      <!-- left column -->
      <form class="col-md-3" action="/app/users/settings.php" method="post" enctype="multipart/form-data">
              <div class="text-center">
                  <img src="/app/img/profile_img/<?php echo $info['profile_img']?>" width="150px" height="150px"  style=" margin-bottom: 10px;" alt="avatar">
                  <input type="file" name="profile-img" class="form-control">
                  <input type="submit" name="upload-img" class="btn btn-primary" value="Upload Profile picture" style=" margin-bottom: 30px;">
              </div>
      </form>
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
              <input class="form-control" type="email" name="email" type="text" value="">
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

<?php endif;

require __DIR__.'/../views/footer.php';
