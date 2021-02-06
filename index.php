<?php include('server.php');
    //If user is not logged in, They can not access this page
    if($_SESSION['username'] == null) {
        header('location: login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Registration system using PHP and MySQL database</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="header">
        <h2>Home page</h2>
    </div>

    <div class="content">
        <?php if(isset($_SESSION['success'])) : ?>
            <div class="error success">
                <h3>
                    <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']); 
                    ?>
                </h3>
            </div>
        <?php endif ?>
        
        <?php if(isset($_SESSION['username'])): ?>
            <p>Welcome <strong> <?php echo $_SESSION['username']; ?> </strong></p>
            <p><a href="login.php?logout='1'" style="color: red;">Logout</a></p>
        <?php endif ?>
    </div>

</body>

</html>