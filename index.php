<?php require __DIR__.'/views/header.php';

if (!isset($_SESSION['user'])):
?>
<div class="login-container">
  <div class="login-wrap">
    <div class="photoify">
      <h1>Photoify</h1>
    </div>

    <!-- LONGIN FORM -->
    <form action="app/users/login.php" method="post">
        <div class="login-html">
          <input a href="#"id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
          <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
          <div class="login-form">
            <div class="sign-in-htm">
              <div class="group">
                <label for="email" class="label">Email address</label>
                <input class="input" type="email" name="email" id="email" placeholder="your.email@email.com">
                <small class="form-text text-muted">Please provide the your email address.</small>
              </div>
              <div class="group">
                <label for="pass" class="label">Password</label>
                <input id="pass" name="password" type="password" class="input">
                 <small class="form-text text-muted">Please provide the your password.</small>
              </div>
              <div class="group">
                <input type="submit" name="signin-submit" class="button" value="Sign In">
              </div>
              <div class="hr"></div>
              <div class="foot-lnk">
                <label>Don't have an account?<br>
                <label class="login" style="color: #fff;" for="tab-2">Sign up</a>
              </div>
            </div>
        </form>

        <!-- SIGN UP FORM -->
        <form action="app/users/login.php" method="post">
          <div class="sign-up-htm">
            <div class="group">
              <label for="pass" class="label">Email Address</label>
              <input class="input" type="email" name="email-reg" id="email-r" placeholder="your.email@email.com" require>
              <small class="form-text text-muted">Please provide the your email address.</small>
            </div>
            <div class="group">
              <label for="pass" class="label">Full Name</label>
              <input id="Full Name" name="full-name" type="text" class="input" required>
              <small class="form-text text-muted">Please provide the your full name.</small>
            </div>
            <div class="group">
              <label for="pass" class="label">UserName</label>
              <input id="user-r" name="username" type="text" class="input" required>
              <small class="form-text text-muted">Please provide the your username.</small>
            </div>
          <div class="group">
            <label for="pass" class="label">Password</label>
            <input id="pass-r" name="password-reg" type="password" class="input" data-type="password" required>
            <small class="form-text text-muted">Please provide the your password.</small>
          </div>
          <div class="group">
            <input type="submit" name="signup-submit" class="button" value="Sign Up">
          </div>
          <div class="hr"></div>
          <div class="foot-lnk">
            <label for="tab-1">Have an account?<br>
            <label class="login" style="color: #fff;" for="tab-1">Login</a>
          </div>
        </div>
      </form>
     </div>
   </div>
  </div>
</div><!--/ container -->

<?php else:
    $posts = getPostInfo($pdo);
    $posts = array_reverse($posts);
    $id = $_SESSION['user']['id'];
?>

<!-- POST CONTAINER -->
<div class="container">
    <div class="new-post">
        <a href="/views/add-post.php" class="badge badge-light"><i class="fa fa-plus"></i> Share a new post</a>
    </div>

        <!-- FEED -->
    <?php foreach ($posts as $post):?>
     <div class="row">
      <div class="col-lg-6 offset-lg-3">
       <div class="post shadow-lg bg-white">
        <div class="post-heading">
         <div class="media m-0">
          <div class="d-flex mr-3">
          <!-- EDIT POST -->
          <?php if (isOwnerOfPost($post['user_id'], $id)): ?>
            <a href="/views/edit-post.php"><i class="far fa-edit"></i></a>
          <?php endif; ?>
           <!-- EDIT POST END-->
          <a href=""><img class="img-fluid rounded-circle" src="/app/img/profile_img/<?= $post['profile_img']?>" alt="User"></a>
          </div>
          <div class="media-body">
           <p class="m-0"><?= $post['username']?></p>
           <small><span><i class="icon ion-md-time"></i> <?= $post['created_at']?></span></small>
          </div>
         </div><!--/ media -->
        </div><!--/ post-heading -->
        <div class="post-item">
         <img class="img-fluid" src="/app/img/post_img/<?= $post['post_img']; ?>" alt="Image">
         <label><?= $post['description']; ?></label>
         <!-- FEED END-->
         <div class="likes">
             <form class="like" method="post" action="/app/posts/likes.php">
                 <input type="hidden" name="post_id" value="<?= $post["post_id"] ?>">
                 <button class="btn btn-primary" type="submit" name="likes">Like <i class="far fa-thumbs-up"></i></button>
                 <?php if (countLikes($post['post_id'], $pdo) > 0): ?>
                     <p><?= countLikes($post['post_id'], $pdo) ?> likes</p>
                 <?php endif; ?>
             </form>
         </div>
        </div><!--/ post-item -->
       </div><!--/ post -->
      </div>
     </div><!--/ col-lg-6 -->
    <?php endforeach; ?>
    </div><!--/ row -->

<?php endif;

require __DIR__.'/views/footer.php'; ?>
