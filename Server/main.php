<?php

session_start();

print_r($_SESSION)

?>

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="GET">
    <input type="text" name="name">
    <input type="submit" value="Hello World">
</form>