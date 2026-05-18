<?php

$username = $_COOKIE['username'] ?? 'guest';

?>

<!DOCTYPE html>
<html>
<body>

<h1>Current User: <?php echo $username; ?></h1>

<form method="POST" action="login.php">

    <input type="text" name="username" placeholder="name">

    <button type="submit">
        login
    </button>

</form>

</body>
</html>


<!--
http://localhost:8000/?name=park <- query string
//$request->query('name'); <- laravel
-->