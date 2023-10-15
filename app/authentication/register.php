<?php
$page_title = 'Register | SparshBlogs';
$username = '';
$email = '';
$password = '';
$confirmpassword = '';
$errors = array();
$success = array();

// includes the path to the root folder and the database connection
include("../../path.php");

// includes the email sending function
include(ROOT_PATH . "/app/authentication/email/emailhelper.php");

// includes the functions for validating the user form
include(ROOT_PATH . "/app/helpers/validateUser.php");

//includes the functions for the register button
include(ROOT_PATH . "/app/controllers/users.php");

//includes the header file
include(ROOT_PATH . "/assets/include/head.php");
?>


<body>
    <!-- includes the navbar -->
    <?php include(ROOT_PATH . "/assets/include/navbar.php"); ?>
    <div class="py-5">
        <div class="container">
            <div class="row  justify-content-center pt-5">
                <div class="col-md-4">
                    <div class="card shadow">
                        <div class="card-header">
                            <!-- include the messages.php file -->
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