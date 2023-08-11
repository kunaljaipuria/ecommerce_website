<h1>Welcome to product list</h1><br><br>
<style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
    }
    h1 {
      color: #333;
      text-align: center;
    }
    .user-details {
      padding: 10px;
      background-color: #fff;
      border-radius: 4px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      margin-bottom: 10px;
    }
    .user-details p {
      margin: 5px 0;
    }
  </style>
<?php
$con = mysqli_connect("localhost", "root", "root", "USER_API");
if ($con) {
    
            $sql="SELECT * FROM product";
            $result = mysqli_query($con, $sql);
            if ($result) {
                echo "<p>All Products Details.</p>";
                while ($row=mysqli_fetch_assoc($result)) {
                    // Display the user details or perform other operations
                    echo '<div class="user-details">';
                    echo '<p><strong>ID:</strong> ' . $row['product_id'] . '</p>';
                    echo '<p><strong>Name:</strong> ' . $row['product_name'] . '</p>';
                    echo '<p><strong>Email:</strong> ' . $row['price'] . '</p>';
                    echo '</div>';
                    echo '<br> <br> <br> <br>';
                   
                } 
            }
        }
       
    
 else {
    echo 'DB connection failed!!';
}
// Close the database connection
mysqli_close($con);
?>