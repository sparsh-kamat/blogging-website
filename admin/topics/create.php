<?php
include_once('../../path.php');
include(ROOT_PATH . "/app/helpers/validateTopics.php");

$errors = array();
$success = array();
$page_title = "Admin Section - Manage Topics";

// Include the database connection file and the helper functions
include(ROOT_PATH . "/app/helpers/dbaccess.php");

$topics = selectAll('topics');
$posts = selectAll('posts');
$topic_name = '';
$topic_description = '';

// Include the topics.php file
include(ROOT_PATH . "/app/controllers/topics.php");
include(ROOT_PATH . "/assets/include/head.php");
?>

<body>
    <?php include(ROOT_PATH . "/assets/include/navbar.php"); ?>
    
    <!-- Form errors -->
    <?php if (count($errors) > 0  || count($success) > 0) { ?>
    <div class="row mt-5">
            <div class="col-md-12">
                <?php include(ROOT_PATH . "/assets/include/messages.php"); ?>
            </div>
        </div>
    <?php } ?>

    <div class="container">
        <h1 class="text-center mt-5" style="font-family: Arial, sans-serif; font-weight: bold;">Add Topic</h1>
        <form action="" method="post">
            <div class="form-group mb-3 mt-3">
                <label style="font-family: Arial, sans-serif; font-weight: bold;" for="topic_name">Topic Name:</label>
                <input type="text" class="form-control" id="topic_name" name="topic_name" value="<?php echo $topic_name; ?>">
            </div>

            <div class="form-group mb-3 mt-3">
                <label style="font-family: Arial, sans-serif; font-weight: bold;" for="topic_description">Topic Description:</label>
                <textarea class="form-control" rows="6" id="topic_description" name="topic_description"><?php echo $topic_description; ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary" name="create-topic">Create Topic</button>
        </form>
    </div>

    <?php include(ROOT_PATH . "/assets/include/foot.php"); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../../assets/scripts.js"></script>
</body>

</html>
