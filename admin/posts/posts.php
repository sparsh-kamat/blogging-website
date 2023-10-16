<?php
$errors = array();
$success = array();
$page_title = "Admin Section - Manage Posts";

//include the database connection file and the helper functions
include('../../path.php');
include(ROOT_PATH . "/app/helpers/dbaccess.php");

$posts = selectAll('posts');

//sort the posts by most recent first
usort($posts, function ($b, $a) {
    return $a['created_at'] <=> $b['created_at'];
});

//select all users from the database
$users = selectAll('users');

//include post.php file
include(ROOT_PATH . "/app/controllers/posts.php");
?>

<?php include(ROOT_PATH . "/assets/include/head.php"); ?>

<body>

    <?php include(ROOT_PATH . "/assets/include/navbar.php"); ?>


    <div class="container-fluid  ">
        <div class="row">
            <div class="col-md-9 mx-auto">
                <!-- include the messages.php file -->
                <?php if (count($errors) > 0 || count($success) > 0) { ?>
                    <div class="row mt-5">
                        <div class="col-md-12">
                            <?php include(ROOT_PATH . "/assets/include/messages.php"); ?>
                        </div>
                    </div>
                <?php } ?>

                <h2 class="text-center bold mt-2 fw-bold">Manage Posts</h2>
                <table class="table table-hover table-light table-striped table-bordered" id="post-table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" class="col-md-6 text-center text-wrap">Title</th>
                            <th scope="col" class="col-md-2 text-center">Author</th>
                            <th scope="col" class="col-md-2 text-center">Date</th>
                            <th scope="col" class="text-center ">Action</th>
                        </tr>
                    </thead>
                    <tbody>


                        <?php foreach ($posts as $key => $post) { ?>
                            <tr>
                                <td class="col-md-5 text-center align-middle font-monospace">
                                    <?php echo $post['title']; ?>
                                </td>
                                <td class="col-md-1 text-center align-middle font-monospace">
                                    <?php
                                    $user = selectOne('users', ['id' => $post['user_id']]);
                                    echo $user['username'];
                                    ?>
                                </td>
                                <td class="col-md-1 text-center align-middle font-monospace">
                                    <?php echo $post['created_at']; ?>
                                </td>
                                <td id="buttonholder" class="row d-flex justify-content-center ">
                                    <!-- make a hidden form which holds all data -->
                                    <form action="" method="post">
                                        <input type="hidden" name="id" value="<?php echo $post['id']; ?>">


                                        <!-- if the post is published -->
                                        <div class="row">
                                            <?php if ($post['published']) { ?>
                                                <!-- show the unpublish button -->
                                                <button type="submit" name="unpublish"
                                                    class="btn btn-warning">Unpublish</button>
                                            <?php } else { ?>
                                                <!-- show the publish button -->
                                                <button type="submit" name="publish" class="btn btn-success">Publish</button>
                                            <?php } ?>

                                            <!-- show the edit button -->
                                            <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                                            <!-- show the delete button -->
                                            <button type="submit" name="delete" class="btn btn-danger">Delete</button>

                                        </div>

                                    </form>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>





        <?php include(ROOT_PATH . "/assets/include/foot.php"); ?>

</body>


</html>