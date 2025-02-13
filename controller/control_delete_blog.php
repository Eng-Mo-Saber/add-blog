<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM `posts` WHERE id = $id";
    $res = mysqli_query($con, $sql);
    $blogDelete = mysqli_fetch_assoc($res);


    if ($blogDelete && isset($blogDelete['image']) && file_exists($blogDelete['image'])) {
        unlink($blogDelete['image']);
    }

    $sql = "DELETE FROM `posts` WHERE id = $id";
    mysqli_query($con, $sql);
    $_SESSION['success'] = "Blog Deleted";
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
}
