<?php

if (isset($_POST['create-post']) || isset($_POST['publish-post'])) {
   
    $errors = validatePost($_POST);

    if (!empty($_FILES['image']['name'])) {
        $image_name = time() . '_' . $_FILES['image']['name'];
        $destination = ROOT_PATH . "/assets/images/" . $image_name;

        $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

        if ($result) {
            $_POST['image'] = $image_name;
        } else {
            array_push($errors, "Failed to upload image");
        }
    } else {
        array_push($errors, "Post image required");
    }

    if (count($errors) == 0) {
        $user_id = $_SESSION['id'];
        $title = $_POST['title'];
        $body = htmlentities($_POST['body']);
        $topic_id = $_POST['topic'];
        $published = isset($_POST['publish-post']) ? 1 : 0;


        $query = "INSERT INTO posts (user_id, title, body, image, topic_id, published) VALUES ($user_id, '$title', '$body', '$image_name', $topic_id, $published)";
        $stmt = $conn->prepare($query);

        if ($stmt->execute()) {
            $_SESSION['message'] = "Post created successfully";
            $_SESSION['type'] = "success";
            header("location: " . BASE_URL . "/admin/posts/posts.php");
            exit();
        } else {
            array_push($errors, "Failed to create post");
        }
    }

}

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

if (isset($_POST['delete'])) {
    //get the id of the post
    $id = $_POST['id'];
    $query = "DELETE FROM posts WHERE id=$id";
    $stmt = $conn->prepare($query);
    $deleted = $stmt->execute();

    

    if ($deleted) {
        array_push($success, "Post deleted successfully");
        header("Refresh:1");
    } else {
        array_push($errors, "Failed to delete post");
    }
}