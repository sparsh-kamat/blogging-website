<?php


//if the user clicks the publish button
if (isset($_POST['publish'])) {
    //get the id of the post
    $id = $_POST['id'];
    $published = update('posts', $id, ['published' => 1]);
    if ($published) {
        array_push($success, "Post published successfully");
        //reload after 1 second
        header("Refresh:1");

    } else {
        array_push($errors, "Failed to publish post");

    }
}
//if the user clicks the unpublish button
if (isset($_POST['unpublish'])) {
    //get the id of the post
    $id = $_POST['id'];
    $published = update('posts', $id, ['published' => 0]);
    if ($published) {
        array_push($success, "Post unpublished successfully");
        header("Refresh:1");
    } else {
        array_push($errors, "Failed to unpublish post");
    }
}