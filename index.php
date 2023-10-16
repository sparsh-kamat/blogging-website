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
  

  
  <?php include_once('assets/include/foot.php'); ?>
</body>

</html>

