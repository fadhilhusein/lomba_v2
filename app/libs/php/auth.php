<?php
require __DIR__ . "/../../config/db.php";

function loginState() {
    global $auth;

    if (!$auth->check()) {
        header('Location: form_login.php');
        exit;
    }
}