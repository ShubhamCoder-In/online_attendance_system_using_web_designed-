<div class="login-panel">
    <div class="contain-form">
        <div class="heading-form">
            <h1>log in</h1>
            <p>Your Gateway to the Platform</p>
        </div>
        <div class="close-bar" onclick="logout()">
            x
        </div>
        <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
            <label for="login_email1">email*</label>
            <input type="email" name="login_email" id="login_email1" autocomplete="username" required>
            <label for="login_password">password* </label>
            <input type="password" name="login_password" id="login_password" autocomplete="current-password" required>
            <div class="bot-section">
                <input type="checkbox" name="verified" id="verified" required>
                <label for="verified">remember me</label>
            </div>
            <div class="alert">
                <p class="captions">
                    please checkbox click after complete from.
                </p>
            </div>
            <div class="group-btn">
                <input type="submit" name="login" value="submit">
            </div>
            <div class="captain-form">
                <span> Are your forget password </span> <span><a href="">forget now</a></span>
            </div>

            <div class="captain-form">
                <span>If your not have any account? </span> <span onclick="signu()"><a href="#">register now</a></span>
            </div>

        </form>
    </div>
</div>