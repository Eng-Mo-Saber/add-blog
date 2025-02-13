<?php

if(!empty($_GET['id']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
        $_SESSION['error'] = [];
    $new_title = htmlspecialchars(trim($_POST['title']));
    $new_content = htmlspecialchars(trim($_POST['content']));
    $id = $_GET['id'];
    $sql = "SELECT * FROM `posts` WHERE id = $id";
    $res = mysqli_query($con, $sql);
    $blogUpdate = mysqli_fetch_assoc($res);


    // title : max ,min , empty
    if (empty($new_title)) {
        $_SESSION['error'][] = "يجب ادخل العنوان";
    } else if (strlen($new_title) > 100) {
        $_SESSION['error'][] = "العنوان تجاوز الحد الاقصي";
    } else if (strlen($new_title) < 10) {
        $_SESSION['error'][] = "العنوان اقل من الحد الاني";
    }
    // content : max , min , empty
    if (empty($new_content)) {
        $_SESSION['error'][] = "يجب ادخل المحتوى";
    } else if (strlen($new_content) > 500) {
        $_SESSION['error'][] = "المحتوي تجاوز الحد الاقصي";
    } else if (strlen($new_content) < 15) {
        $_SESSION['error'][] = "المحتوي اقل من الحد الاني";
    }

    if (isset($_GET['id']) && isset($_FILES['image'])) {
        if (isset($blogUpdate['image'])) {
            $image = $blogUpdate['image'];
            if (file_exists($image)) {
                unlink($image);
            }
        }
        $pathName = './assets/upload/' . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $pathName);
    }

    if (!empty($_SESSION['error'])) {
        header("location:" . $_SERVER['HTTP_REFERER']);
        exit;
    } else {
        try {
            
            $sql = "UPDATE `posts` SET `title`='$new_title' ,`content`='$new_content' , `image` = '$pathName'  WHERE `id` = '$id'";
            mysqli_query($con, $sql);
            $_SESSION['success']= "update Blog success" ;
            header("location:./index.php?page=add_blog");
            exit;
        } catch (\Exception $ex) {
            header("location:../view/maintenance.php");
            exit;
        }
    }

}else if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['error'] = [];
    $title = htmlspecialchars(trim($_POST['title']));
    $content = htmlspecialchars(trim($_POST['content']));
   
    // title : max , min , empty
    if (empty($title)) {
        $_SESSION['error'][] = "يجب ادخل العنوان";
    } else if (strlen($title) > 100) {
        $_SESSION['error'][] = "العنوان تجاوز الحد الاقصي";
    } else if (strlen($title) < 10) {
        $_SESSION['error'][] = "العنوان اقل من الحد الاني";
    }
    // content : max , min , empty
    if (empty($content)) {
        $_SESSION['error'][] = "يجب ادخل المحتوى";
    } else if (strlen($content) > 500) {
        $_SESSION['error'][] = "المحتوي تجاوز الحد الاقصي";
    } else if (strlen($content) < 15) {
        $_SESSION['error'][] = "المحتوي اقل من الحد الاني";
    }

    if(isset($_FILES['image'])){
        $pathName = './assets/upload/' . $_FILES['image']['name'];
        var_dump($pathName) ;
        move_uploaded_file($_FILES['image']['tmp_name'], $pathName);
    }
    if (!empty($_SESSION['error'])) {
        header("location:" . $_SERVER['HTTP_REFERER']);
        exit;
        
    } else {
        try {
            $sql = "INSERT INTO `posts`(`title` , `content` ,`image` ,`created_at`) VALUES ('$title','$content','$pathName' , NOW())";
            mysqli_query($con, $sql);
            $_SESSION['success']= "Add Blog success" ;
            header("location:./index.php?page=add_blog");
            exit;
        } catch (\Exception $ex) {
            header("location:../view/maintenance.php");
            exit;
        }
    }
}
?>