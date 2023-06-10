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

     footer{
        
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        
              
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
            <a class="nav-link" href="transferrmoney.php" style="font-size:20px;">Transfer Money</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="transactionhistory.php"  style="font-size:20px;">Transaction History</a>
          </li>


         
        </ul>

   
      </div>
    </div>
  </nav>
    
<div class="container" style="margin-top:100px; margin-bottom:5px;">
  <h2 class="text-center pt-4" style="background-color:rgb(195, 226, 252); border-radius:5px; margin-bottom:20px;">Transaction History</h2>

<br>
<div class="table-responsive-sm " style=" border-radius:10px;">


  <table class="table table-hover table-striped table-condensed table-bordered">
      <thead style="color:black;background-color:#F0F8FF">
        <tr style="background-color:rgb(195, 226, 252)">
          <!-- <th class="text-center">S.No</th> -->
          <th class="text-centet">Sender</th>
          <th class="text-centet">Reciever</th>
          <th class="text-centet">Amount</th>
          <th class="text-centet">Date & Time</th>

        </tr>
      </thead>
      <tbody>
        <?php
        
        include 'config.php';
        $sql="SELECT * FROM  transaction";
        $query=mysqli_query($con,$sql);
        while($rows=mysqli_fetch_assoc($query))
        {
      ?>


      <tr style="color:black;">
      
        <td class="py-2"><?php echo $rows['sender'];?></td>
        <td class="py-2"><?php echo $rows['receiver'];?></td>
        <td class="py-2"><?php echo $rows['balance'];?></td>
        <td class="py-2"><?php echo $rows['datetime'];?></td>
        
        <?php
        }
        
        ?>

      </tr>
      </tbody>
    </table>
</div>

<div class="container" style="margin-top:10px; padding-top:2px;">
<footer class="footer">
        <div class="container text-center " style="margin-top:1px; padding-top:0px;>
        <p  class="text-dark" style="align-items: center">Copy © 2023 Indian Banking System .Made By <b>Ritika Sharma</b></a>.</p>
      </div>
      </footer>

      </div>

        <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
          
      
       

    </body>



</html>