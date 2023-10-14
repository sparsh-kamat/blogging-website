<div class="bg-dark">
    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <!-- make brandingto -->
                <div class="container-fluid ">
                    <a class="navbar-brand" href="<?php echo BASE_URL . '/index.php' ?>">SparshBlogs</a>


                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto ">


                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page"
                                    href="<?php echo BASE_URL . '/index.php' ?>">Home</a>
                            </li>



                            <?php if (isset($_SESSION['admin'])) { ?>
                                <?php if ($_SESSION['admin'] == 1) { ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo BASE_URL . '/admin/dashboard.php' ?>">Dashboard</a>
                                    </li>
                                <?php } ?>
                            <?php } ?>

                            <?php if (!isset($_SESSION['id'])) { ?>
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="<?php echo BASE_URL . '/app/authentication/register.php' ?>">Register</a>
                                </li>
                            <?php } ?>

                            <?php if (!isset($_SESSION['id'])) { ?>
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="<?php echo BASE_URL . '/app/authentication/login.php' ?>">Login</a>
                                </li>
                            <?php } ?>

                            <?php if (isset($_SESSION['id'])) { ?>
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="<?php echo BASE_URL . '/app/authentication/logout.php' ?>">Logout</a>
                                </li>
                            <?php } ?>

                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>

</div>