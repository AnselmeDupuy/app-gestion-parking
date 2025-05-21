<!-- <link href="includes/componentsCss/login.css"  rel="stylesheet"> -->

<div id="errors"></div>
<form method="POST" id="login-form" class="login-form">
    <h1 class="text-center">Connexion</h1>
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control input" id="email" name="email">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control input" id="password" name="password">
    </div>
    <button type="submit" class="btn btn-primary" name="login_button" id="valid-login-btn">Submit</button>
</form>