<?php
$errors = array();
$success = array();

//include the database connection file and the helper functions
include('../../path.php');

include(ROOT_PATH . "/app/helpers/dbaccess.php");

//select all posts from the database
$posts = selectAll('posts');

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
                
                <h3 class="text-center  mt-2">Manage Posts</h3>
                <table class="table table-hover" id="post-table">
                    <thead>
                        <tr>

                            <th scope="col" class="col-md-6 text-center">Title</th>
                            <th scope="col" class="col-md-2 text-center">Author</th>
                            <th scope="col" class="col-md-2 text-center">Date</th>
                            <th scope="col" class="text-center ">Action</th>
                        </tr>
                    </thead>
                    <tbody>


                        <?php foreach ($posts as $key => $post) { ?>
                            <tr>
                                <td class="col-md-5 text-center align-middle">
                                    <?php echo $post['title']; ?>
                                </td>
                                <td class="col-md-1 text-center align-middle">
                                    <?php
                                    $user = selectOne('users', ['id' => $post['user_id']]);
                                    echo $user['username'];
                                    ?>
                                </td>
                                <td class="col-md-1 text-center align-middle">
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
                                            <a href="<?php echo BASE_URL . '/admin/posts/edit.php?id=' . $post['id']; ?>"
                                                class="btn btn-primary">Edit</a>
                                            <!-- show the delete button -->
                                            <a href="<?php echo BASE_URL . '/admin/posts/delete.php?id=' . $post['id']; ?>"
                                                class="btn btn-danger">Delete</a>
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