<?php
$pro_id = substr($_SERVER['REQUEST_URI'], strlen(BASE_PATH . 'delete_product/'));
?>
<form method="post">
    <p>Are you sure to delete <?php echo $pro_id ?>?</p>
    <input type="submit" value="Delete">
</form>