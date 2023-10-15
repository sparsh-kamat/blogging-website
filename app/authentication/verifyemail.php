<?php
$errors = array();
$success = array();
$email = '';
include("../../path.php"); 
include(ROOT_PATH . "/app/helpers/dbaccess.php");
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $verify_query = "SELECT * FROM users WHERE token='$token' LIMIT 1";
    $result = mysqli_query($conn, $verify_query);

    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_array($result);
        $email = $row['email'];
        if($row['verified'] == '0')
        {
            $clicked_token = $row['token'];
            $update_query = "UPDATE users SET verified='1' WHERE token='$clicked_token'";
            $update_query_run = mysqli_query($conn, $update_query);
            if($update_query_run)
            {
                array_push($success, "Email verified. Please login");                
            }
            else
            {
                array_push($errors, "Something went wrong. Please try again.");       
            }
        }
        else 
        {
            array_push($errors, "Email already verified");
        }
    }
    else
    {
        array_push($errors, "Token not found");       
    }
   
}
else
{
    die("Something went wrong");
}

$page_title = 'Verify Email | SparshBlogs';
include(ROOT_PATH . "/assets/include/head.php");

?>


<body>
    <?php include(ROOT_PATH . "/assets/include/navbar.php"); ?>

    <div class="py-5">
        <div class="container">
            <div class="row  justify-content-center pt-5">
                <div class="col-md-4">
                    <div class="card shadow">
                        <div class="card-header">
                            <?php include(ROOT_PATH . "/assets/include/messages.php"); ?>
                            <h4 class="text-center mt-1 ">Verification</h4>
                        </div>

                        <div class="card-body">
                            <form class="form-floating" action="" method="">

                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" name="email" placeholder="Email" disabled readonly>
                                    <label for="floatingInput" class="text-center"><?php echo $email; ?></label>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include(ROOT_PATH . "/assets/include/foot.php"); ?>
</body>

</html>