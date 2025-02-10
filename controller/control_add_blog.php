<?php
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $_SESSION['error'] = [];
//     $title = htmlspecialchars(trim($_POST['title']));
//     $content = htmlspecialchars(trim($_POST['content']));
//     $image = $_FILES['content'];


//     // title : max , min , empty
//     if (empty($title)) {
//         $_SESSION['error'][] = "يجب ادخل العنوان";
//     } else if (strlen($title) > 100) {
//         $_SESSION['error'][] = "العنوان تجاوز الحد الاقصي";
//     } else if (strlen($title) < 20) {
//         $_SESSION['error'][] = "العنوان اقل من الحد الاني";
//     }
//     // content : max , min , empty
//     if (empty($content)) {
//         $_SESSION['error'][] = "يجب ادخل المحتوى";
//     } else if (strlen($content) > 500) {
//         $_SESSION['error'][] = "المحتوي تجاوز الحد الاقصي";
//     } else if (strlen($content) < 25) {
//         $_SESSION['error'][] = "المحتوي اقل من الحد الاني";
//     }
//     if (isset($_SESSION['error'])) {
//         header("location:" . $_SERVER['HTTP_REFERER']);
//         exit;
//     } else {
//         try {
//             $sql = "INSERT INTO `posts`(`title` , `content` ,`image`, `create_at`) VALUES ('$title','$content','$image',NOW())";
//             mysqli_query($con, $sql);
//             $_SESSION['success']= "Add Blog success" ;
//             header("location:./index.php?page=add_blog");
//             exit;
//         } catch (\Exception $ex) {
//             header("location:../view/maintenance.php");
//             exit;
//         }
//     }
// }
?>