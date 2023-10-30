<?php
include_once('../../path.php');
include(ROOT_PATH . "/app/helpers/validatePosts.php");

$errors = array();
$success = array();
$page_title = "Admin Section - Manage Posts";

//include the database connection file and the helper functions
include(ROOT_PATH . "/app/helpers/dbaccess.php");

$topics = selectAll('topics');
$posts = selectAll('posts');
$title = '';
$body = '';
$topic_id = '';
$published = '';


//include post.php file
include(ROOT_PATH . "/app/controllers/posts.php");
include(ROOT_PATH . "/assets/include/head.php"); 
?>


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

    <div class="container">
        <h1 class="text-center mt-5" style="font-family: Arial, sans-serif; font-weight: bold;">Add Post</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group mb-3 mt-3">
                <label style="font-family: Arial, sans-serif; font-weight: bold;" for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" >
            </div>

            <div class="form-group mb-3 mt-3">
                <label style="font-family: Arial, sans-serif; font-weight: bold;" for="body">Body:</label>
                <textarea class="form-control" rows=6 id="body" name="body" ><?php echo $body; ?></textarea>
            </div>

            <div class="form-group mb-3 mt-4">
                <label style="font-family: Arial, sans-serif; font-weight: bold;" for="image">Image:</label>
                <input type="file" style="font-family: Arial, sans-serif; font-weight: bold;" class="form-control-file"
                    id="image" name="image"  >
            </div>

            <div class="form-group mb-3 mt-3">
                <label style="font-family: Arial, sans-serif; font-weight: bold;" for="topic">Topic:</label>
                <select class="form-control mt-1" id="topic" name="topic" required>
                    <?php foreach ($topics as $key => $topic): ?>
                        <option value="<?php echo $topic['id']; ?>"><?php echo $topic['name']; ?></option>
                    <?php endforeach; ?>

                    <!-- Add more options as needed -->
                </select>
            </div>

            <button type="submit" class="btn btn-primary" name="create-post">Create Post</button>
            <button type="submit" class="btn btn-success" name="publish-post">Publish Post</button>
        </form>
    </div>

    <?php include(ROOT_PATH . "/assets/include/foot.php"); ?>

     
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/12.2.0/classic/ckeditor.js"></script>
    <script src="../../assets/scripts.js"></script>

</body>

</html>