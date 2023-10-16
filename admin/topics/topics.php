<?php
//include the database connection file and the helper functions
include('../../path.php');
//includes the header file

include(ROOT_PATH . "/app/helpers/dbaccess.php");

$page_title = "Admin Section - Manage Topics";
//select all topics from the database
$topics = selectAll('topics');

?>

<?php include(ROOT_PATH . "/assets/include/head.php"); ?>

<body>
   
    <?php include(ROOT_PATH . "/assets/include/navbar.php"); ?>

    
        <div class="container-fluid  ">
            <div class="row">
                <div class="col-md-9 mx-auto">
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
                                    <td class="col-md-1 text-center font-monospace"><?php echo $key + 1; ?></td>
                                    <td class="col-md-5 text-center font-monospace"><?php echo $topic['name']; ?></td>
                                    <td id="topicbuttonholder" class="d-flex justify-content-center ">
                                        <a href="#" class="btn btn-success font-monospace">Edit</a>
                                        <a href="#" class="btn btn-danger font-monospace">Delete</a>
                                        <a href="#" class="btn btn-primary font-monospace">View</a>

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


