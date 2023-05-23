<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Users</h1>
    <?php
    echo "name : " .  $user->get_name() . "<br>";
    echo "email : " . $user->get_email() . "<br>";
    ?>
    <hr>
</body>

</html>