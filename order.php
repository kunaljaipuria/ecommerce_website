<?php
$con = mysqli_connect("localhost", "root", "root", "USER_API");
if ($con) {
    // Retrieve user data from the database
    $sql = "SELECT id FROM user";
    $result = mysqli_query($con, $sql);
    $query = "SELECT product_id, product_name FROM product";
    $resultp = mysqli_query($con, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        echo '<h1>Place Order</h1>';
        echo '<form action="order_details.php" method="POST">';
        echo '<label>Select User ID:</label>';
        echo '<select name="user_id" required id="user_id">';
        echo '<option value="">Select an ID</option>';
        while ($row = mysqli_fetch_assoc($result) ) {
            $userId = $row['id']; 
            
            echo "<option value='$userId'>User ID $userId</option>";
        }
        echo '</select>';
        echo '<br><br>';
        echo '<label>Select Product</label>';
        echo '<select name="product_id" required id="product_id">';
        echo '<option value="">Select Product</option>';
        while ($row = mysqli_fetch_assoc($resultp)) {
            $productId = $row['product_id'];
            $productName=$row['product_name'];
            echo "<option value='$productId'>Product ID $productId - $productName</option>";
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
      background-color: #f2f2f2;
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
      margin: 30px 650px;
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
  </style>
<head>
  <title>User List</title>
  <style>
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
<?php
$con = mysqli_connect("localhost", "root", "root", "USER_API");
if ($con) {
    // Retrieve user data from the database
    $sql = "SELECT id FROM user";
    $result = mysqli_query($con, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        echo '<h1>View Orders</h1>';
        echo '<form action="view_orders.php" method="GET">';
        echo '<label>Select User ID:</label>';
        echo '<select name="user_id" id="user_id">';
        echo '<option value="">Select an ID</option>';
        while ($row = mysqli_fetch_assoc($result)) {
            $userId = $row['id'];
            $userName=$row['name'];
            echo "<option value='$userId'>User ID $userId - $userName</option>";
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