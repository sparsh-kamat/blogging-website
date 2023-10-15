<?php
if (isset($_POST['registerbtn'])) {
    $errors = validateUser($_POST);

    if (count($errors) === 0) {
        unset($_POST['registerbtn'], $_POST['confirmpassword']);
        $token = md5(rand());
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $query = "INSERT INTO users (username,admin,  email, password, token) VALUES ('$username', '0', '$email', '$password', '$token')";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            sendemailverify($username, $email, $token);
            array_push($success, 'Email has been sent to your email address');
        } else {
            array_push($errors, 'Failed to register');
        }
    }
}

if (isset($_POST['loginbtn'])) {

    $errors = validateLogin($_POST);

    if (count($errors) === 0) {
        unset($_POST['loginbtn']);
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = selectOne('users', ['email' => $email]);
        if (password_verify($password, $user['password'])) {
            if ($user['verified'] == '1') {
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['admin'] = $user['admin'];
                $_SESSION['message'] = 'You are now logged in';
                $_SESSION['type'] = 'success';
                array_push($success, 'You are now logged in');
                header('location: ' . BASE_URL . '/index.php');
                exit();
            } else {
                array_push($errors, 'Please verify your email address');
            }
        } else {
            array_push($errors, 'Wrong credentials');
        }
    }
}


if(isset($_POST['resetpassbtn'])){
    $email = $_POST['email'];
    $token =md5(rand());

    $user = selectOne('users', ['email' => $email]);

    if($user){
        $update_query = "UPDATE users SET token='$token' WHERE email='$email'";
        $update_query_run = mysqli_query($conn, $update_query);
        if($update_query_run){
            sendpasswordreset($email, $token);
            array_push($success, "Password reset link sent to your email");
        }
        else{
            array_push($errors, "Something went wrong. Please try again.");
        }
    }
    else{
        array_push($errors, "Email doesn't exists");
    }
}

if (isset($_POST['changepass'])) {
    $errors = validatechangepass($_POST);
    $email = $_GET['email'];
    $password = $_POST['password']; 

    if (count($errors) === 0) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $query = "UPDATE users SET password='$password' WHERE email='$email'";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            array_push($success, 'Password changed successfully');
        }
        else{
            array_push($errors, 'Failed to change password');
        }
    }
}

