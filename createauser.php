
<?php

   $servername="localhost";
   $username="root";
   $password="";
   $dbname="indian_bank";
   
   $con=mysqli_connect($servername,$username,$password,$dbname);

   
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $balance = $_POST['balance'];

    if ($con->connect_error) {
      
      die("Connection failed: " .mysqli_connect_error());

    }
    
    $sql = "INSERT INTO users VALUES ('$id','$name','$email','$balance')";  
     
    $result = mysqli_query($con,$sql);
  
    if ($result) {
      echo "<script> alert('User created');
      window.location='transferrmoney.php';
      </script>";
    } else {
      echo "Error: " .mysqli_error($con);
    }

    ?>