<?php
// Include the database connection file
$con = mysqli_connect("localhost", "root", "root", "USER_API");
if (!$con) {
    echo 'DB connection failed!!';
    exit;
}
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Text to send if user hits Cancel button';
    exit;
} else {
    echo "<p>Hello {$_SERVER['PHP_AUTH_USER']}.</p>";
    echo "<p>You entered {$_SERVER['PHP_AUTH_PW']} as your password.</p>";
    $uname=$_SERVER['PHP_AUTH_USER'];
    $upas=$_SERVER['PHP_AUTH_PW'];
    $qry= "SELECT * from user";
}
?>