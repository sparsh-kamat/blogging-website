<?php
//include the database connection file and the helper functions
include('../../path.php');
//includes the header file

include(ROOT_PATH . "/app/helpers/dbaccess.php");

$page_title = "Admin Section - Manage Topics";
//select all topics from the database
$topics = selectAll('topics');
$success = array();
$errors = array();

//include topic.php file
include(ROOT_PATH . "/app/controllers/topics.php");
?>

<?php include(ROOT_PATH . "/assets/include/head.php"); ?>

<body>

    <?php include(ROOT_PATH . "/assets/include/navbar.php"); ?>
    <div class="container-fluid  ">
        <div class="row">
            <div class="col-md-9 mx-auto">
                <h2 class="text-center bold mt-2 fw-bold">Add Topic</h2>
                <div class="text-center">
                    <a href="<?php echo BASE_URL . '/admin/topics/create.php'; ?>" class="btn btn-primary mt-3">Add
                        Topic</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-3 ">
        <div class="row">
            <div class="col-md-9 mx-auto">
                <?php if (count($errors) > 0 || count($success) > 0) { ?>
                    <div class="row mt-5">
                        <div class="col-md-12">
                            <?php include(ROOT_PATH . "/assets/include/messages.php"); ?>
                        </div>
                    </div>
                <?php } ?>
                <h2 class="text-center  mt-2 fw-bold">Manage Topics</h2>
                <table class="table table-hover table-striped table-bordered" id="post-table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" class="col-md-1 text-center">Sr No.</th>
                            <th scope="col" class="col-md-5 text-center">Topic</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- php for loop for each topic -->
                        <?php foreach ($topics as $key => $topic) { ?>
                            <tr>
                                <td class="col-md-1 text-center font-monospace">
                                    <?php echo $key + 1; ?>
                                </td>
                                <td class="col-md-5 text-center font-monospace">
                                    <?php echo $topic['name']; ?>
                                </td>
                                <td id="topicbuttonholder" class="d-flex justify-content-center ">
                                    <form action="" method="post">
                                        <input type="hidden" name="id" value="<?php echo $topic['id']; ?>">
                                        <button type="submit" name="delete-topic"
                                            class="btn btn-danger btn-sm mx-1">Delete</button>
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