<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['error'] = [];
    $email = htmlspecialchars(trim($_POST['email']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));

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

    if (!empty($_SESSION['error'])) {
        header("location:" . $_SERVER['HTTP_REFERER']);
        exit;
    } else {

        try {
            $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
            $res = mysqli_query($con, $sql);
            $user = mysqli_fetch_assoc($res);
            $_SESSION['name'] = $user['name'];
            // check email && password
            if ($user['email'] == trim($email)) {
                if (password_verify(trim($password), $user['password'])) {
                    header("location:./index.php?page=home");
                    exit;
                } else {
                    $_SESSION['error'][] = "كلمة المرور غير صحيحه";
                    header("location:./index.php?page=login");
                    exit;
                }
            } else {
                $_SESSION['error'][] = "تاكد من صحه الايميل";
                header("location:./index.php?page=login");
                exit;
            }
        } catch (\Exception $ex) {
            header("location:../view/maintenance.php");
            exit;
        }
    }
}
