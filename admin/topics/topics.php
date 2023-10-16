<?php
//include the database connection file and the helper functions
include('../../path.php');
//includes the header file

include(ROOT_PATH . "/app/helpers/dbaccess.php");

//select all topics from the database
$topics = selectAll('topics');

?>

<?php include(ROOT_PATH . "/assets/include/head.php"); ?>

<body>
   
    <?php include(ROOT_PATH . "/assets/include/navbar.php"); ?>

    
        <div class="container-fluid  ">
            <div class="row">
                <div class="col-md-9 mx-auto">
                    <h3 class="text-center  mt-2">Manage Topics</h3>
                    <table class="table table-hover" id="post-table">
                        <thead>
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
                                    <td class="col-md-1 text-center"><?php echo $key + 1; ?></td>
                                    <td class="col-md-5 text-center"><?php echo $topic['name']; ?></td>
                                    <td id="topicbuttonholder" class="d-flex justify-content-center ">
                                        <a href="#" class="btn btn-success">Edit</a>
                                        <a href="#" class="btn btn-danger">Delete</a>
                                        <a href="#" class="btn btn-primary">View</a>

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


