<div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
</div>
<form method="post" action="<?= PATH ?>controllers/login_controller.php">
    <h3>Login Here</h3>

    <label for="username">Username</label>
    <input class="login-input" name="email" type="text" placeholder="Email" id="username">

    <label for="password">Password</label>
    <input class="login-input" name="password" type="password" placeholder="Password" id="password">

    <div class="social">
        <button name="login">Login</button>
    </div>
    <div class="social items-center flex-col">
        <p class="text-sm mb-4">Or</p>
        <a href="<?= PATH ?>index.php?page=register">
            <div class="cursor-pointer">Sign Up</div>
        </a>
    </div>
</form>
