<div class="signup-panel">
    <div class="contain-form">
      <div class="heading-form">
        <h1>sign up</h1>
        <p>Unlock a World of Possibilities – Sign Up Today!</p>
      </div>
      <div class="close-bar" onclick="signout()">
        x
      </div>
      <form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="signup" onsubmit=" return submitvalid()">
        <label for="email">email* <b class="formerr"> error</b> </label>
        <input type="email" maxlength="35" name="email" id="email" autocomplete="username">
        <label for="password">new password* <b class="formerr">err</b> </label>
        <input type="password" maxlength="12" name="password" id="password" autocomplete="new-password" required>
        <label for="cpassword"> confirmed password* <b class="formerr">err</b> </label>
        <input type="password" maxlength="12" name="cpassword" id="cpassword" autocomplete="new-password" required>
        <div class="bot-section">
          <input type="checkbox" name="verif_id" id="verif_id" required>
          <label for="verif_id">remember me</label>
        </div>
        <div class="alert">
          <p class="captions"> <b>Note -</b>password should have uppercase (A-Z), number (0-9) and special character @!#$</p>
        </div>

        <div class="group-btn">
          <input class="btn" type="submit" name="signup" value="submit">
        </div>
        <div class="captain-form">
          <span>If your have already register? </span> <span onclick="log_in()"><a href="#">login</a></span>
        </div>

      </form>
    </div>
  </div>