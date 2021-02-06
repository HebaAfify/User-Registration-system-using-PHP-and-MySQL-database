<?php
    session_start();
    $username = "";
    $email = "";
    $errors = array();
    //connect to the database
    $db = mysqli_connect('localhost', 'root', '', 'registration');

    //if tHe register button is clicked

    if(isset($_POST['register'])) {
        $username = mysqli_real_escape_string($db,$_POST['username']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password1 = mysqli_real_escape_string($db, $_POST['password1']);
        $password2 = mysqli_real_escape_string($db, $_POST['password2']);
    

        //Ensure that form fields are filled properly

        if(empty($username)){
            array_push($errors, "Username is required"); //Add error to errors array
        }

        if(empty($email)){
            array_push($errors, "Email is required"); //Add error to errors array
        }

        if(empty($password1)){
            array_push($errors, "Password is required"); //Add error to errors array
        }

        if($password1 != $password2){
            array_push($errors, "The two passwords don't match");
        }

        //if there are no errors, save user to dataBase
        if(count($errors) == 0){
            $password = md5($password1); //Encrypt password before storing in database for security
            $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
            mysqli_query($db, $sql);
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You ara now logged in";
            header('location: index.php');  //redirect to home pAge
        }

    }

    //log user in from login pageA
    if(isset($_POST['login'])) {
        $username = mysqli_real_escape_string($db,$_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
    

        //ensure that form fields are filled properly

        if(empty($username)){
            array_push($errors, "Username is required"); //Add error to errors array
        }

        if(empty($password)){
            array_push($errors, "Password is required"); //Add error to errors array
        }

        if(count($errors) == 0){
            $password = md5($password); //Encrypt password before compare it with database
            $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
            $result = mysqli_query($db, $query);
            if(mysqli_num_rows($result)){
                //log user in
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "You ara now logged in";
                header('location: index.php');  //redirect to home pAge
            }else{
                array_push($errors, "Wrong username or password");
            }
        }
    }

    //logoutS
    if(isset($_GET['logout'])) {
        session_unset();
        session_destroy();
        header('location : login.php');
    }