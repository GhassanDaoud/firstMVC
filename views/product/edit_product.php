<?php
echo "<form method='POST'>";
echo "<label>Name:</label><br>";
echo "<input type='text' name='name' value='{$product->get_name()}'><br>";
echo "<label>Price:</label><br>";
echo "<input type='text' name='price' value='{$product->get_price()}'><br>";
echo "<button type='submit'>Save</button>";
echo "</form>";