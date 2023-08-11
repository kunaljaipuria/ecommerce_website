<?php
// Establish the database connection
$con = mysqli_connect("localhost", "root", "root", "USER_API");
if (!$con) {
    echo 'DB connection failed!!';
    exit;
}
// Retrieve the selected user ID and product ID from the form submission
if ($_SERVER["REQUEST_METHOD"] === "POST")
 {
    $userId = $_POST['user_id'];
    $productId = $_POST['product_id'];
    // Insert the new order into the 'order' table
    $query = "INSERT INTO _order (user_id, product_id) VALUES ($userId, $productId)";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo '<h1>Order successfully placed.</h1>';
    } else {
        echo 'Error placing the order.';
    }
}
mysqli_close($con);
?>