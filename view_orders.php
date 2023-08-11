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
    if (isset($_GET['user_id'])) {
        $selectedUserId = $_GET['user_id'];
        
        // You can use the $selectedUserId variable in your queries or logic
        // For example:
        
        if($selectedUserId==NULL)
        {
            $sql="SELECT * FROM user";
           
           
            $result = mysqli_query($con, $sql);
            if ($result) {
                
                while ($row=mysqli_fetch_assoc($result)) {
                    // Display the user details or perform other operations
               $psql = "SELECT * FROM product WHERE product_id IN (SELECT product_id FROM _order WHERE user_id= ".$row['id'].")";
               $presult=mysqli_query($con, $psql);
    
               // $presult=mysqli_query($con,$psql);
               
               
                    echo '<div class="user-details">';
                    echo '<p><strong>User Name:</strong> ' . $row['name'] . '</p>';
                    if($presult)
               {  $flag=true;
                  while ($rowp= mysqli_fetch_assoc($presult)) {
                   // Display the user details or perform other operations
                  //  echo '<div class="user-details">';
                   echo "<p>Orders :  " . $rowp['product_name'] . "  Price $". $rowp['price']." </p>";
                  //  echo '</div>';
                  $flag=false;
               } 
               if($flag)
               {
                 echo 'No orders found !!';                  
               }
               }
                    echo '</div>';
                    echo '<br> <br> <br> <br>';                 
                } 
            }
        }
        else
        {$sql = "SELECT * FROM user WHERE id = '$selectedUserId'";
        $result = mysqli_query($con, $sql);
        // $psql="SELECT * FROM product where product_id = (SELECT product_id from _order where user_id=".$selectedUserId.")";
        $psql = "SELECT * FROM product WHERE product_id IN (SELECT product_id FROM _order WHERE user_id = $selectedUserId)";
        $presult=mysqli_query($con, $psql);
        // $presult=mysqli_query($con,$psql);
        $flag=true;
       
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            if ($row) {
                // Display the user details or perform other operations
                echo '<br>';
                echo "Name: " . $row['name'] . "<br>";
                echo '<br>';
            } else {
                echo "No user found for the selected ID.";
            }
        }
        if($presult)
        {   
           while ($row= mysqli_fetch_assoc($presult)) {
            echo '<br>';
            // Display the user details or perform other operations
            echo "Orders :  " . $row['product_name'] . "  Price $". $row['price']." <br>";
            $flag=false;
        } 
        }
        if($flag)
               {
                 echo 'No orders found !!';                  
               }
    }
    }
} else {
    echo 'DB connection failed!!';
}
// Close the database connection
mysqli_close($con);
?>