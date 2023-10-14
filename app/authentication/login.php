<?php
include("../../path.php");
include(ROOT_PATH . "/app/helpers/validateUser.php");
$page_title = 'Login | SparshBlogs';
include(ROOT_PATH . "/assets/include/head.php");
include(ROOT_PATH . "/assets/include/navbar.php");

if (isset($_SESSION['id'])) {
    header('location: ' . BASE_URL . '/index.php');
    exit();
}

$email = '';
$password = '';
$errors = array();
$success = array();

if (isset($_POST['loginbtn'])) {

    validateLogin($_POST);

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
?>

<body>
    <div class="py-5">
        <div class="container">
            <div class="row  justify-content-center pt-5">
                <div class="col-md-4">
                    <div class="card shadow">
                        <div class="card-header">
                            <?php include(ROOT_PATH . "/assets/include/messages.php"); ?>
                            <h4 class="text-center mt-1 ">Login Form</h4>
                        </div>

                        <div class="card-body">

                            <form class="form-floating" action="login.php" method="POST">


                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                                    <label for="floatingInput" class="text-center">Email Address</label>
                                </div>

                                <div class="form-floating mb-3 ">
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Enter your password" required>
                                    <label for="floatingInput">Password</label>
                                </div>


                                <div class="d-grid col-6 mx-auto">
                                    <button type="submit" name="loginbtn" class="btn btn-primary">Register</button>
                                </div>

                                <!-- add forgot password link as a text -->
                                <div class="d-grid col-6 mx-auto">
                                    <a href="<?php echo BASE_URL . '/authentication/forgotpassword.php' ?>"
                                        class="text-center">Forgot Password?</a>
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