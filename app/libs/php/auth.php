<?php
require __DIR__ . "/../../config/db.php";

function loginState($Main = false) {
    global $auth;

    if ($Main) {
        if ($auth->check()) {
            header('Location: index.php');
            exit;
        }
    } elseif (!$Main) {
        if (!$auth->check()) {
            header('Location: form_login.php');
            exit;
        }
    }
}