<?php
include("../../path.php");
$page_title = 'Register | SparshBlogs';
include(ROOT_PATH . "/app/authentication/email/emailhelper.php");

if (isset($_SESSION['id'])) {
    header('location: ' . BASE_URL . '/index.php');
    exit();
}

$username = '';
$email = '';
$password = '';
$confirmpassword = '';
$errors = array();
$success = array();


include(ROOT_PATH . "/app/helpers/validateUser.php");


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

include(ROOT_PATH . "/assets/include/head.php");
include(ROOT_PATH . "/assets/include/navbar.php");
?>


<body>
    <div class="py-5">
        <div class="container">
            <div class="row  justify-content-center pt-5">
                <div class="col-md-4">
                    <div class="card shadow">
                        <div class="card-header">
                            <?php include(ROOT_PATH . "/assets/include/messages.php"); ?>
                            <h4 class="text-center mt-1 ">Registration Form</h4>
                        </div>

                        <div class="card-body">

                            <form class="form-floating" action="register.php" method="POST">
                                <div class="form-floating mb-3 ">
                                    <input type="text" name="username" class="form-control" placeholder="Enter Username"
                                        required>
                                    <label for="floatingInput">Username</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                                    <label for="floatingInput" class="text-center">Email Address</label>
                                </div>

                                <div class="form-floating mb-3 ">
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Enter your password" required>
                                    <label for="floatingInput">Password</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="password" name="confirmpassword" class="form-control"
                                        placeholder="Enter your password again." required>
                                    <label for="floatingInput">Confirm Password</label>
                                </div>
                                <div class="d-grid col-6 mx-auto">
                                    <button type="submit" name="registerbtn" class="btn btn-primary">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include(ROOT_PATH . "/assets/include/foot.php"); ?>

    </html>