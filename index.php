<?php
require_once __DIR__ . '/app/controllers/UserController.php';
require_once __DIR__ . '/app/controllers/ProductController.php';

define("BASE_PATH", '/MVC/');

$config = require_once 'config/database.php';
$connect = mysqli_connect($config['host'], $config['user'], $config['password'], $config['db_name']);



if ($_SERVER['REQUEST_URI'] === BASE_PATH) {
    $products = new ProductController($connect);
    $products->index();
    $user = new UserController($connect);
    $user->index();
} elseif ($_SERVER['REQUEST_URI'] === BASE_PATH . "create_product") {
    $products = new ProductController($connect);
    $products->create_product();
} elseif (strpos($_SERVER['REQUEST_URI'], BASE_PATH . "delete_product/") === 0) {
    $pro_id = substr($_SERVER['REQUEST_URI'], strlen(BASE_PATH . 'delete_product/'));
    $products = new ProductController($connect);
    $products->delete_product($pro_id);
} elseif (strpos($_SERVER['REQUEST_URI'], BASE_PATH . "edit_product/") === 0) {
    $pro_id = substr($_SERVER['REQUEST_URI'], strlen(BASE_PATH . 'edit_product/'));
    $products = new ProductController($connect);
    $products->edit_product($pro_id);
} elseif ($_SERVER['REQUEST_URI'] === BASE_PATH . "create_user") {
    $user = new UserController($connect);
    $user->create();
} elseif (strpos($_SERVER['REQUEST_URI'], BASE_PATH . "delete_user/") === 0) {
    $user_id = substr($_SERVER['REQUEST_URI'], strlen(BASE_PATH . 'delete_user/'));
    $user = new UserController($connect);
    $user->delete_user($user_id);
} elseif (strpos($_SERVER['REQUEST_URI'], BASE_PATH . "edit_user/") === 0) {
    $user_id = substr($_SERVER['REQUEST_URI'], strlen(BASE_PATH . 'edit_user/'));
    $user = new UserController($connect);
    $user->edit($user_id);
} elseif ($_SERVER['REQUEST_URI'] === BASE_PATH . "login") {
    $user = new UserController($connect);
    $user->login();
 }