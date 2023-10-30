<?php

$page_title = "Admin Section - Manage Users";
//include the database connection file and the helper functions
include('../../path.php');
include(ROOT_PATH . "/app/helpers/dbaccess.php");
//select all users from the database
$users = selectAll('users');
$success = array();
$errors = array();



//sort the users by admin
usort($users, function ($a, $b) {
    return $a['admin'] <=> $b['admin'];
});

//make currentr user display first
foreach ($users as $key => $user) {
    if ($user['id'] == $_SESSION['id']) {
        $temp = $users[0];
        $users[0] = $user;
        $users[$key] = $temp;
    }
}


//include user.php file
include(ROOT_PATH . "/app/controllers/users.php");
?>

<?php include(ROOT_PATH . "/assets/include/head.php"); ?>

<body>
    <?php include(ROOT_PATH . "/assets/include/navbar.php"); ?>
    <!-- form errors -->
    <?php if (count($errors) > 0) { ?>
        <div class="row mt-5">
            <div class="col-md-12">
                <?php include(ROOT_PATH . "/assets/include/messages.php"); ?>
            </div>
        </div>
    <?php } ?>
    <div class="container-fluid  ">
        <div class="row">
            <div class="col-md-9 mx-auto">
                <h2 class="text-center  mt-2 fw-bold">Manage Users</h2>
                <table class="table table-hover table-striped table-bordered" id="post-table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" class="col-md-1 text-center">ID</th>
                            <th scope="col" class="col-md-1 text-center">Admin</th>
                            <th scope="col" class="col-md-3 text-center">Username</th>
                            <th scope="col" class="col-md-3 text-center">Email</th>
                            <th scope="col" class="text-center ">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $key => $user) { ?>
                            <tr>
                                <td class="col-md-1 text-center align-middle font-monospace">
                                    <?php echo $user['id']; ?>
                                </td>
                                <td class="col-md-1 text-center align-middle font-monospace">
                                    <?php echo $user['admin']; ?>
                                </td>
                                <td class="col-md-3 text-center align-middle font-monospace">
                                    <?php echo $user['username']; ?>
                                </td>
                                <td class="col-md-3 text-center align-middle font-monospace">
                                    <?php echo $user['email']; ?>
                                </td>
                                <td id="buttonholder" class=" d-flex justify-content-center ">
                                    <form action="" method="post">
                                        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                                        
                                        <!-- display  buttons only if not current user -->
                                        <?php if ($user['id'] != $_SESSION['id']) { ?>
                                            <?php if ($user['admin'] == 0) { ?>
                                                <button type="submit" name="make-admin" class="btn btn-primary font-monospace">Make Admin</button>
                                            <?php } else { ?>
                                                <button type="submit" name="remove-admin" class="btn btn-primary font-monospace">Remove Admin</button>
                                            <?php } ?>
                                            <button type="submit" name="delete-user" class="btn btn-danger font-monospace">Delete</button>
                                        <?php } ?>

                                        <!-- else display blank button that says you -->
                                        <?php if ($user['id'] == $_SESSION['id']) { ?>
                                            <button type="submit" name="you" class="btn btn-success font-monospace">You</button>
                                        <?php } ?>



                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <?php include(ROOT_PATH . "/assets/include/foot.php"); ?>

</body>


</html>