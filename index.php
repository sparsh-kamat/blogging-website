<?php
include('path.php');
$page_title = 'Home | SparshBlogs';

include(ROOT_PATH . '/app/helpers/dbaccess.php');

$topics = selectAll('topics');
$posts = selectAll('posts', ['published' => 1]);
?>

<?php include_once('assets/include/head.php'); ?>

<body>
  <?php include_once('assets/include/navbar.php'); ?>
<!-- 
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center mt-5">Welcome to SparshBlogs <?php if (isset($_SESSION['username'])) {
                                                                echo  $_SESSION['username'];
                                                              } ?></h1>

      </div>
    </div>
  </div> -->

  <?php include_once('assets/include/foot.php'); ?>
</body>

</html>

