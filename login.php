<?php require __DIR__.'/views/header.php'; ?>

    <div class="login-container">
      <div class="login-wrap">
        <div class="photoify">
          <h1>Photoify</h1>
        </div>

        <form action="app/users/login.php" method="post">
            <div class="login-html">
              <input a href="#"id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
              <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
              <div class="login-form">
                <div class="sign-in-htm">
                  <div class="group">
                    <label for="email" class="label">Email address</label>
                    <input class="input" type="email" name="email" id="email" placeholder="your-email@email.com" required>
                    <small class="form-text text-muted">Please provide the your email address.</small>
                  </div>
                  <div class="group">
                    <label for="pass" class="label">Password</label>
                    <input id="pass" name="password" type="password" class="input" required>
                     <small class="form-text text-muted">Please provide the your password.</small>
                  </div>
                  <div class="group">
                    <input id="check" type="checkbox" class="check" checked>
                    <label for="check"><span class="icon"></span> Keep me Signed in</label>
                  </div>
                  <div class="group">
                    <input type="submit" name="signin-submit" class="button" value="Sign In">
                  </div>
                  <div class="hr"></div>
                  <div class="foot-lnk">
                    <label>Don't have an account?<br>
                    <label style="color: #fff;" for="tab-2">Sign up</a>
                  </div>
                </div>
        </form>

        <form action="app/users/sign-up.php" method="post">
            <div class="sign-up-htm">
                <div class="group">
                  <label for="pass" class="label">User name</label>
                  <input id="user-r" name="user-name" type="text" class="input" required>
                  <small class="form-text text-muted">Please provide the your username.</small>
                </div>
              <div class="group">
                <label for="pass" class="label">Email Address</label>
                <input class="input" type="email" name="email-r" id="email-r" placeholder="your-email@email.com" required>
                <small class="form-text text-muted">Please provide the your email address.</small>
              </div>
              <div class="group">
                <label for="pass" class="label">Password</label>
                <input id="pass-r" name="password-r" type="password" class="input" data-type="password" required>
                <small class="form-text text-muted">Please provide the your password.</small>
              </div>
              <!-- <div class="group">
                <label for="pass" class="label">Repeat Password</label>
                <input id="pass-r-2" name="password-r-2" type="password" class="input" data-type="password" required>
              </div> -->
              <div class="group">
                <input type="submit" name="signup-submit" class="button" value="Sign Up">
              </div>
              <div class="hr"></div>
              <div class="foot-lnk">
                <label for="tab-1">Have an account?<br>
                <label style="color: #fff;" for="tab-1" >Log in</a>
              </div>
            </div>
        </form>

          </div>
        </div>
      </div>
    </div>

<?php require __DIR__.'/views/footer.php'; ?>
