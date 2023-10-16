<?php
//include the database connection file and the helper functions
include('../../path.php');
include(ROOT_PATH . "/app/helpers/dbaccess.php");
//select all users from the database
$users = selectAll('users');

//sort the users by admin
usort($users, function ($a, $b) {
    return $a['admin'] <=> $b['admin'];
});
?>

<?php include(ROOT_PATH . "/assets/include/head.php"); ?>

<body>
    <?php include(ROOT_PATH . "/assets/include/navbar.php"); ?>
    <div class="container-fluid  ">
        <div class="row">
            <div class="col-md-9 mx-auto">
                <h3 class="text-center  mt-2">Manage Posts</h3>
                <table class="table table-hover" id="post-table">
                    <thead>
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
                                <td class="col-md-1 text-center align-middle">
                                    <?php echo $user['id']; ?>
                                </td>
                                <td class="col-md-1 text-center align-middle">
                                    <?php echo $user['admin']; ?>
                                </td>
                                <td class="col-md-3 text-center align-middle">
                                    <?php echo $user['username']; ?>
                                </td>
                                <td class="col-md-3 text-center align-middle">
                                    <?php echo $user['email']; ?>
                                </td>
                                <td id="buttonholder" class=" d-flex justify-content-center ">
                                    <a href="#" class="btn btn-success">Edit</a>
                                    <a href="#" class="btn btn-danger">Delete</a>
                                    <a href="#" class="btn btn-primary">View</a>
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