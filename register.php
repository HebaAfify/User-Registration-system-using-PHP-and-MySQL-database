<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>User Registration system using PHP and MySQL database</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="header">
        <h2>Register</h2>
    </div>

    <form method="POST" action="register.php">
        <!-- Display validation errors here -->
        <?php include('errors.php'); ?>
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $username; ?>">
        </div>

        <div class="input-group">
            <label>Email</label>
            <input type="text" name="email" value="<?php echo $email; ?>">
        </div>

        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password1">
        </div>

        <div class="input-group">
            <label>Confirm password</label>
            <input type="password" name="password2">
        </div>

        <div class="input-group">
            <button type="submit" name="register" class="btn">Register</button>
        </div>

        <p>
            Already a member? <a href="login.php">sign in</a>
        </p>

    </form>

</body>

</html>