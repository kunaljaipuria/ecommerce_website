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
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpas=$_POST["repeat_password"];
    if ($password !== $cpas) {
        echo "Error: Passwords do not match.";
        exit;
    }
    // Perform validation and data sanitization as needed
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
echo $hashedPassword;
    // Create the SQL query to insert the data
    $sql = "INSERT INTO user (name, email, password) VALUES ('$name', '$email', '$hashedPassword')";
    // Execute the query
    if (mysqli_query($con, $sql)) {
        echo "User registration successful!";
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
       <h1>Please register to continue shopping with EShopp </h1> <br>
        <form action="registration.php" method="post">
            <div class="form-group">
                <input type="text" required class="form-control" name="name" placeholder="Full Name:" >
            </div>
            <div class="form-group">
                <input type="emamil" required class="form-control" name="email" placeholder="Email:">
            </div>
            <div class="form-group">
            <input type="tel" required class="form-control" name="phone" pattern="[0-9]{10}" placeholder="Phone No.">
            </div>
            <div class="form-group">
                <input type="password" required class="form-control" name="password" placeholder="Password:">
            </div>
            <div class="form-group">
                <input type="password" required class="form-control" name="repeat_password" placeholder="Confirm Password:">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
            </div>
        </form>
        <div>
        <!-- <div><p>Already Registered <a href="login.php">Login Here</a></p></div> -->
      </div>
    </div>
</body>
</html>