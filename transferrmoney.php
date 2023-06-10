<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Indian Banking System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="index.css">
  <style>
  .btn:hover{
background-color: white;
font-weight:bolder;

     }
     .btn{
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100%;
     }

     
      </style>
</head>
<body>
  <nav class="navbar bg-dark border-bottom border-bottom-dark fixed-top" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="images/image5.jpg" alt="" class="navbar-logo">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item ms-auto">
            <span class="navbar-text mr-10 text-end" style="font-size:20px;color:rgba(40, 70, 237, 0.692)">Indian Bank</span>
          </li>
        </ul>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="index.html" style="font-size:20px;">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="createUser.html" style="font-size:20px;">Create A User</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="transferrmoney.php" style="font-size:20px;">Transfer Money</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="transactionhistory.php"  style="font-size:20px;">Transaction History</a>
          </li>


        
      </div>
    </div>
  </nav>


    <div class="container" style="margin-top:80px;">
        <h2 class="text-center pt-4" style="color:black;background-color:rgb(195, 226, 252); border-radius:5px; margin-bottom:20px;">Transfer Money</h2>


        <table class="table" style="background-color:rgb(173,216,230); border-radius:5px; margin-bottom:20px;">
            <thead>
              <tr>
                <th scope="col" class="text-center py-2">Id</th>
                <th scope="col" class="text-center py-2">Name</th>
                <th scope="col" class="text-center py-2">E-mail</th>
                <th scope="col" class="text-center py-2">Balance</th>
                <th scope="col" class="text-center py-2">Operation</th>

              </tr>
            </thead>
            <tbody>
              <?php
                  include 'config.php';
              $sql="SELECT * FROM users";
              $result=mysqli_query($con,$sql);
?>
<?php
          
              // include 'createauser.php';

              while($rows=mysqli_fetch_assoc($result)){

              
              ?>
              <tr style="color:black;">
                <td class="py-2 text-center"><?php echo $rows['id']?></td>
                <td class="py-2 text-center"><?php echo $rows['name']?></td>
                <td class="py-2 text-center"><?php echo $rows['email']?></td>
                <td class="py-2 text-center"><?php echo $rows['balance']?></td>
                <td class="py-2 text-center" style="vertical-align:middle"><a href="selectuserdetail.php?id= <?php echo $rows['id'];?>">
                  <button type="button" class=" btn btn-warning " style="border:1px solid black;border-radius:10px; color:black;align-items:center;margin-auto;display: block;" >Transact</button></a>
                </td>
              </tr>
              <?php
            }
            ?>

            </tbody>
          </table>
    </div>
    
    <footer class="footer">
        <div class="container text-center ">
        <p  class="text-dark" style="align-items: center">Copy © 2023 Indian Banking System .Made By <b>Ritika Sharma</b></a>.</p>
      </div>
      </footer>
          <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      
            
        
      
      </body>
    </html>

    