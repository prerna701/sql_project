<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <div class="allcontent">
            <div class="leftcontent">
                <h1>Welcome to library</h1>
            </div>
            <div class="form-container">
                <div class="form-wrapper sign-in">
                    <form action="adminlogindb.php" method="POST" autocomplete="off" >
                        <h2>Log In</h2>
                        <div class="input-group">
                            <input type="text" name="adminname">
                            <label>Admin name</label>
                        </div>
                        <div class="input-group">
                            <input type="password" name="password" required>
                            <label>Password</label>
                        </div>
                        <div class="remember">
                            <input type="checkbox">
                            <label for="">Remember</label>
                        </div>
                        <button type="submit">Log in</button>
                        <div class="signUp-link">
                           <p>Don't have an account? Sign up <a href="signup.php" class="SignUpBtn-link">here</a>.</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
