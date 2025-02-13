<?php

session_start();
require_once "confg/db_connection.php";
include "inc/header.php";
include "inc/nav.php";
include "helper/helper.php";



$page = isset($_GET['page']) ? $_GET['page'] : 'register';

switch ($page) {
    case "home":
        include "view/home.php";
        break;
    case "about":
        include "view/about.php";
        break;
    case "contact":
        include "view/contact.php";
        break;
    case "post":
        include "view/post.php";
        break;
    case "add_blog":
        include "view/add_blog.php";
        break;
    case "register":
        include "view/register.php";
        break;
    case "control_register":
        include "./controller/control_register.php";
        break;
    case "login":
        include "view/login.php";
        break;
    case "control_login":
        include "controller/control_login.php";
        break;
    case "logout":
        include "controller/logout.php";
        break;
    case "control_add_blog":
        include "controller/control_add_blog.php";
        break;
    case "control_delete_blog":
        include "controller/control_delete_blog.php";
        break;
    case "single_blog":
        include "view/single_blog.php";
        break;
    default:
        include "view/maintenance.php";
        break;
}

include "./inc/footer.php";
