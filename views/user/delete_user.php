<?php
$user_id = substr($_SERVER['REQUEST_URI'], strlen(BASE_PATH . 'delete_user/'));
?>
<form method="post">
    <p>Are you sure to delete <?php echo $user_id ?>?</p>
    <input type="submit" value="Delete">
</form>