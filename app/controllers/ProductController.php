<?php
require_once __DIR__ . '/../models/product.php';

class ProductController
{
    private $connect;
    public function __construct($connect)
    {
        $this->connect = $connect;
    }

    public function index()
    {
        $select = "SELECT * FROM products";
        $result = mysqli_query($this->connect, $select);
        $products = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $product = new Product();
            $product->set_id($row['product_id']);
            $product->set_name($row['product_name']);
            $product->set_price($row['price']);
            $products[] = $product;
        }
        require_once __DIR__ . '/../../views/product/productView.php';
    }

    public function create_product()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $product = new Product();
            $product->set_name($_POST['name']);
            $product->set_price($_POST['price']);
            $product_name = $product->get_name();
            $product_price = $product->get_price();
            $insert = "INSERT INTO products (product_name,price) values('$product_name ','$product_price')";
            $query = mysqli_query($this->connect, $insert);
            header("Location:/PHPCOURSE/Darrebeni/MVC/");
            exit();
        } else {
            require 'views/product/create_product.php';
        }
    }

    public function delete_product($pro_id)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $select = "DELETE FROM products where product_id='$pro_id'";
            $query = mysqli_query($this->connect, $select);
            header("Location:/PHPCOURSE/Darrebeni/MVC/");
        } else {
            require_once __DIR__ .  "/../../../MVC/views/product/delete_product.php";
        }
    }

    public function edit_product($pro_id)
    {
        $select = "SELECT * FROM products where product_id = '$pro_id'";
        $query = mysqli_query($this->connect, $select);
        $product = new Product();
        $result = mysqli_fetch_assoc($query);
        $product->set_name($result['product_name']);
        $product->set_price($result['price']);
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $product->set_name($_POST['name']);
            $product->set_price($_POST['price']);
            $product_name = $product->get_name();
            $product_price = $product->get_price();
            $update = "UPDATE products 
            SET product_name = $product_name,
            price = $product_price
            where product_id='$pro_id'";
            $query = mysqli_query($this->connect, $update);
            header("Location:/PHPCOURSE/Darrebeni/MVC/");
        } else {
            require_once __DIR__ .  "/../../../MVC/views/product/edit_product.php";
        }
    }
}