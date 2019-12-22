<div class="login-page">
    <div class="form">
        <h3>Login</h3>
        <form class="login-form" action="" method="post">
            <input type="text" name="username" placeholder="username" />
            <input type="password" name="password" placeholder="password" />
            <button type="submit">Login</button>
            <p class="message">Not registered? <a href="<?= base_url() ?>login/register">Create an account</a></p>
        </form>
    </div>
</div>