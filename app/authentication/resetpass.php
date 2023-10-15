<?php
$page_title = 'Reset Password | SparshBlogs';
$errors = array();
$success = array();
$email = '';
include("../../path.php");
include(ROOT_PATH . "/app/helpers/dbaccess.php");
include(ROOT_PATH . "/app/authentication/email/emailhelper.php");
include(ROOT_PATH . "/app/controllers/users.php");
include(ROOT_PATH . "/assets/include/head.php");
?>



<body>

    <?php include(ROOT_PATH . "/assets/include/navbar.php"); ?>
    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center pt-5">
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-header text-center">
                            <?php
                            include(ROOT_PATH . "/assets/include/messages.php");
                            ?>
                            <h4>Reset Password</h4>
                        </div>
                        <div class="card-body">
                            <form class="form-floating" action="" method="POST">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                                    <label for="floatingInput" class="text-center">Email Address</label>
                                </div>
                                <div class="d-grid col-6 mx-auto">
                                    <button type="submit" name="resetpassbtn" class="btn btn-primary">
                                        Send Password Reset Link
                                    </button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include(ROOT_PATH . "/assets/include/foot.php"); ?>

</body>

</html>