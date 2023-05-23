<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Product</h1>
    <a href="<?php echo BASE_PATH . 'create_product' ?>">Create Product</a><br>
    <!-- <?php echo BASE_PATH . 'create<br>'; ?> -->
    <?php
    foreach ($products as $product) {

        echo "id : " .  $product->get_id() . "<br>";
        echo "name : " .  $product->get_name() . "<br>";
        echo "price : " . $product->get_price() . "$<br>";
    ?>
    <a href="<?php echo BASE_PATH . 'delete_product/' . $product->get_id() ?>">Delete</a>
    <a href="<?php echo BASE_PATH . 'edit_product/' . $product->get_id() ?>">Edit</a>
    <hr>
    <?php
    }
    ?>

</body>

</html>