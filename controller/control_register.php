<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['error'] = [];
    $name = htmlspecialchars(trim($_POST['username']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));

    // name : max , min , empty
    if (empty($name)) {
        $_SESSION['error'][] = "الاسم غير موجود";
    } else if (strlen($name) > 50) {
        $_SESSION['error'][] = "الاسم تجاوز الحد الاقصي";
    } else if (strlen($name) < 5) {
        $_SESSION['error'][] = "الأسم اقل من الحد الاني";
    }

    // email :, empty , is email
    if (empty($email)) {
        $_SESSION['error'][] = "الايميل غير موجود";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'][] = "ادخل الايميل بشكل صحيح";
    }

    // password : max , min , empty
    if (empty($password)) {
        $_SESSION['error'][] = "كلمه المرور مطلوبه";
    } else if (strlen($password) > 20) {
        $_SESSION['error'][] = "كلمه المرور تجاوزت الحد الاقصي";
    } else if (strlen($password) < 5) {
        $_SESSION['error'][] = "كلمه المرور اقل من الحد الاني";
    }
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    if (!empty($_SESSION['error'])) {
        header("location:" . $_SERVER['HTTP_REFERER']);
        exit;
    } else {


        try {
            $sql = "INSERT INTO `users` ( `name` , `email` ,`password`) values ('$name' , '$email' , '$password_hash')";
            mysqli_query($con, $sql);
            $_SESSION['success']= "(اذهب لتسجيل الدخول)تم تسجيل البيانات بنجاح" ;
            // $_SESSION['username']= $name ;
            header("location:./index.php?page=register");
            exit;
        } catch (\Exception $ex) {
            header("location:../view/maintenance.php");
            exit;
        }
        // exit;

    }
}
