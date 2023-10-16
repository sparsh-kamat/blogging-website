<div class="row">
    <nav id="topbar" class="navbar navbar-expand-lg navbar-dark bg-dark col-md-12">
        <div class="container-fluid ">
            <a class="navbar-brand " href="<?php echo BASE_URL . '/index.php' ?>">SparshBlogs</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                            href="<?php echo BASE_URL . '/index.php' ?>">Home</a>
                    </li>

                    <!-- add manage posts users and topics-->
                    <?php if (isset($_SESSION['admin'])) { ?>
                        <?php if ($_SESSION['admin'] == 1) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo BASE_URL . '/admin/posts/posts.php' ?>">Posts</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo BASE_URL . '/admin/users/users.php' ?>">Users</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo BASE_URL . '/admin/topics/topics.php' ?>">Topics</a>
                            </li>
                        <?php } ?>
                    <?php } ?>
                    <?php if (!isset($_SESSION['id'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="<?php echo BASE_URL . '/app/authentication/register.php' ?>">Register</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL . '/app/authentication/login.php' ?>">Login</a>
                        </li>
                    <?php } ?>

                    <?php if (isset($_SESSION['id'])) { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <!-- add user avatar -->
                                <!-- <span class="fa-solid fa-user"></span> -->
                                <i class="nav-icon bi bi-person-fill"></i>
                                <?php echo $_SESSION['username']; ?>
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <!-- if admin, show dashboard -->
                                <?php if (isset($_SESSION['admin'])) { ?>
                                    <?php if ($_SESSION['admin'] == 1) { ?>
                                        <li><a class="dropdown-item"
                                                href="<?php echo BASE_URL . '/admin/dashboard.php' ?>">Dashboard</a>
                                        </li>
                                    <?php } ?>
                                <?php } ?>
                                <li><a class="dropdown-item"
                                        href="<?php echo BASE_URL . '/app/authentication/logout.php' ?>">Logout</a>
                                </li>
                            </ul>
                        </li>
                    <?php } ?>

                </ul>
            </div>
        </div>
    </nav>



</div>