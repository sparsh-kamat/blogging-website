<?php
$page_title = 'Change Password | SparshBlogs';
$errors = array();
$success = array();
include("../../path.php");
include(ROOT_PATH . "/app/authentication/email/emailhelper.php");
include(ROOT_PATH . "/app/helpers/validateUser.php");
include(ROOT_PATH . "/app/controllers/users.php");
include(ROOT_PATH . "/assets/include/head.php");
?>



<body>
    <?php include(ROOT_PATH . "/assets/include/navbar.php"); ?>

    <div class="py-5">
        <div class="container">
            <div class="row  justify-content-center pt-5">
                <div class="col-md-4">
                    <div class="card shadow">
                        <div class="card-header">
                            <?php include(ROOT_PATH . "/assets/include/messages.php"); ?>
                            <h4 class="text-center">Change Password</h4>
                        </div>

                        <div class="card-body">
                            <form class="form-floating" action="" method="POST">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" name="email" placeholder="Email" disabled
                                        readonly>
                                    <label for="floatingInput" class="text-center">
                                        <?php echo $_GET['email']; ?>
                                    </label>
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
                                    <button type="submit" name="changepass" class="btn btn-primary">Change
                                        Password</button>
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