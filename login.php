<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>onePager</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
  </head>
  <body>
    <div class="login-container">
      <div class="login-wrap">
        <div class="photoify">
          <h1>Photoify</h1>
        </div>
        <form action="index.php" method="post">
            <div class="login-html">
              <input a href="#"id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
              <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
              <div class="login-form">
                <div class="sign-in-htm">
                  <div class="group">
                    <label for="user" class="label">Username</label>
                    <input id="user" name="username" type="text" class="input">
                  </div>
                  <div class="group">
                    <label for="pass" class="label">Password</label>
                    <input id="pass" name="password" type="password" class="input" data-type="password">
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
        <form action="index.php" method="post">
            <div class="sign-up-htm">
              <div class="group">
                <label for="pass" class="label">Email Address</label>
                <input id="email-r" name="email" type="text" class="input">
              </div>
              <div class="group">
                <label for="pass" class="label">Password</label>
                <input id="pass-r" name="password" type="password" class="input" data-type="password">
              </div>
              <div class="group">
                <label for="pass" class="label">Repeat Password</label>
                <input id="pass-r-2" name="password" type="password" class="input" data-type="password">
              </div>
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

     <!-- <script type="text/javascript" src="script.js"></script> -->
  </body>
</html>
