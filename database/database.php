<?php

const SERVER_NAME = "localhost";
const USER_NAME = "root";
const PASSWORD = "";
const DATABASE_NAME = "blogs";

$con = mysqli_connect(SERVER_NAME, USER_NAME, PASSWORD);

if (!$con) {
    return "Connection failed:" . mysqli_connect_error();
}

$sql = "CREATE DATABASE IF NOT EXISTS `blogs`";

if (!mysqli_query($con, $sql)) {
    return "Connection failed:" . mysqli_error($con);
}

mysqli_select_db($con, DATABASE_NAME);

$table_sql_user = "CREATE TABLE IF NOT EXISTS `users` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255), 
    `email` VARCHAR(255), 
    `password` VARCHAR(255)
)";

if (!mysqli_query($con, $table_sql_user)) {
    return "Connection failed:" . mysqli_error($con);
}

$table_sql_post = "CREATE TABLE IF NOT EXISTS `posts` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(255), 
    `content` TEXT, 
    `created_at` TIMESTAMP, 
    `user_id` INT
)";

if (!mysqli_query($con, $table_sql_post)) {
    return "Connection failed:" . mysqli_error($con);
}

$table_sql_comment = "CREATE TABLE IF NOT EXISTS `comment` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `content` TEXT, 
    `created_at` TIMESTAMP, 
    `post_id` INT, 
    `user_id` INT
)";

if (!mysqli_query($con, $table_sql_comment)) {
    return "Connection failed:" . mysqli_error($con);
}