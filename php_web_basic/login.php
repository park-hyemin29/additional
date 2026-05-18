<?php

$username = $_POST['username'] ?? 'guest';

setcookie(
    'username',
    $username,
    time() + 3600,
    '/'
);

echo "cookie saved";

echo "<br>";

echo "<a href='index.php'>go index</a>";

/*
<?php

$username = $_POST['username'] ?? '';

setcookie('username', $username, time() + 3600);

echo "cookie saved";
*/
/*
1. create post request
2. run login.php
3. read post data

$request->input('username'); <- laravel

setcookie{name, value, time}
Application → Cookies
*/

/*
<?php

$username = $_POST['username'] ?? '';

echo "login user: {$username}";
*/