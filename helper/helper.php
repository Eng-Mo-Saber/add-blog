<?php

function errorMas()
{
    if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
        foreach ($_SESSION['error'] as $error) {
            echo "<div class='alert alert-danger text-center' role='alert'>{$error}</div>";
        }
        unset($_SESSION['error']);
    }
}
function successMas()
{
    if (isset($_SESSION['success']) && !empty($_SESSION['success'])) {
        echo "<div class='alert alert-success text-center' role='alert'>{$_SESSION['success']}</div>";
        unset($_SESSION['success']);
    }
}
