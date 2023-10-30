<?php

//delete topic button 
if (isset($_POST['delete-topic'])) {
    $id = $_POST['id'];
    $query = " DELETE FROM topics WHERE id=$id";
    $stmt = $conn->prepare($query);
    $delete = $stmt->execute();

    if ($delete) {
        array_push($success, "Topic deleted successfully");
        header("Refresh:1");
    } else {
        array_push($errors, "Failed to delete topic");
    }
}


//create topic button

if (isset($_POST['create-topic'])) {
    $errors = validateTopics($_POST);
    if (count($errors) === 0) {
        unset($_POST['create-topic']);
        $topic_name = $_POST['topic_name'];
        $topic_description = $_POST['topic_description'];

        $query = "INSERT INTO topics (name, description) VALUES ('$topic_name', '$topic_description')";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            array_push($success, 'Topic created successfully');
            
        } else {
            array_push($errors, 'Failed to create topic');
        }
    }
}