<?php
// Establish the database connection
$con = mysqli_connect("localhost", "root", "root", "USER_API");
if (!$con) {
    echo 'DB connection failed!!';
    exit;
}
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $name = $_POST["product_name"];
    $price = $_POST["price"];
    // Perform validation and data sanitization as needed
    // Create the SQL query to insert the data
    $sql = "INSERT INTO product (product_name, price) VALUES ('$name', '$price')";
    // Execute the query
    if (mysqli_query($con, $sql)) {
        echo "Added Product successfully!";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
// Close the database connection
mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
       <h1>Please Add your products : </h1> <br>
        <form action="addProduct.php" method="post">
            <div class="form-group">
                <input type="text" required class="form-control" name="product_name" placeholder="Name" >
            </div>
            <div class="form-group">
                <input type="value" required class="form-control" name="price" placeholder="Price">
            </div>
           
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Add" name="submit">
            </div>
        </form>
    </div>
</body>
</html>