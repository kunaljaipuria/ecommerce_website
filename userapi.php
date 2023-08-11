<!DOCTYPE html>
<html>
<head>
  <title>EShop</title>
  <h1 style="color:purple;text-align:center;">Welcome To Eshop !!</h1>
</head>
<body>
<a href="addProduct.php" class="button">Add Products</a>
<a href="product.php" class="button">Show Products</a>
<a href="order.php" class="button">Make an order</a>
<a href="registration.php" class="button">Register New User </a>
 
<?php
$con = mysqli_connect("localhost", "root", "root", "USER_API");
if ($con) {
    // Retrieve user data from the database
    $sql = "SELECT id FROM user";
    $result = mysqli_query($con, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        echo '<h1>User Selection</h1>';
        echo '<form action="user.php" method="get">';
        echo '<label>Select User ID:</label>';
        echo '<select name="user_id" id="user_id">';
        echo '<option value="">Select an ID</option>';
        while ($row = mysqli_fetch_assoc($result)) {
            $userId = $row['id'];
            echo "<option value='$userId'>User ID $userId</option>";
        }
        echo '</select>';
        echo '<button type="submit">Go</button>';
        echo '</form>';
    } else {
        echo "No users found!";
    }
} else {
    echo 'DB connection failed!!';
}
// Close the database connection
mysqli_close($con);
?>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: lightcoral;
    }
    
    form {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color: #ffffff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    
    label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
    }
    
    select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      background-color: #fff;
      font-size: 14px;
      color: #333;
    }
    
    .button {
    display : inline-block;
     align-items: center;
     justify-content: center;
      margin: 20px 650px;
      padding: 10px 20px;
      background-color: #4CAF50;
      color: white;
      text-decoration: none;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
  
    button[type="submit"] {
      display: block;
      margin-top: 10px;
      padding: 10px 20px;
      background-color: #4caf50;
      color: #fff;
      border: none;
      border-radius: 4px;
      font-size: 14px;
      cursor: pointer;
    }
    
   
 
    body {
      font-family: Arial, sans-serif;
    }
    
    h1 {
      color: #333;
      text-align: center;
    }

    pre {
      background-color: #f5f5f5;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
      overflow: auto;
    }
  </style>
</head>
</html>