<?php
$page_title = 'Login | SparshBlogs';
$email = '';
$password = '';
$errors = array();
$success = array();
include("../../path.php");
include(ROOT_PATH . "/app/helpers/validateUser.php");
include(ROOT_PATH . "/assets/include/head.php");
include(ROOT_PATH . "/assets/include/navbar.php");
include(ROOT_PATH . "/app/controllers/users.php");
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
                                    <a href="<?php echo BASE_URL . '/app/authentication/resetpass.php' ?>"
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
</body>


</html>