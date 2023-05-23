<?php
echo "<form method='POST'>";
echo "<label>Name:</label><br>";
echo "<input type='text' name='name' value='{$user->getName()}'><br>";
echo "<label>Email:</label><br>";
echo "<input type='email' name='email' value='{$user->getEmail()}'><br>";
echo "<button type='submit'>Save</button>";
echo "</form>";