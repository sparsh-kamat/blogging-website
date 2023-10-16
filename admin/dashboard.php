<?php
//include the database connection file and the helper functions
include('../path.php');

$email = $_SESSION['email'];
$username = $_SESSION['username'];
$created_at = $_SESSION['created_at'];


//includes the header file

?>

<?php include(ROOT_PATH . "/assets/include/head.php"); ?>

<body>
   
    <?php include(ROOT_PATH . "/assets/include/navbar.php"); ?>
    
<!-- make user dashboard where the user can see his email. username account creation date. -->
<div class="card text-center bg-dark text-white col-md-6 mx-auto mt-5">
  <div class="card-header">
    User Dashboard
  </div>
  <div class="card-body bg-dark text-white mx-auto ">
    <h5 class="card-title my-2">Welcome <?php echo $_SESSION['username']; ?></h5>
    <p class="card-text my-2">Your email is <?php echo $_SESSION['email']; ?></p>
    <p class="card-text">Your account was created on <?php echo $_SESSION['created_at']; ?></p>
    <a href="<?php echo BASE_URL . '/app/authentication/logout.php' ?>" class="btn btn-primary">Logout</a>
  </div>
  <div class="card-footer text-muted">
    <?php echo date("Y/m/d"); ?>
  </div>
</div>

<?php include(ROOT_PATH . "/assets/include/foot.php"); ?>






</body>



</html>

