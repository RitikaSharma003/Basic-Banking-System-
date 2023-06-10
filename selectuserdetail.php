<?php
include 'config.php';
if(isset($_POST['submit']))
{
    $from=$_GET['id'];
    $to=$_POST['to'];
    $amount=$_POST['amount'];

    $sql="SELECT * from users where id=$from";
    $query=mysqli_query($con,$sql);
    $sql1=mysqli_fetch_array($query);

    $sql="SELECT * from users where id=$to";
    $query=mysqli_query($con,$sql);
    $sql2=mysqli_fetch_array($query);
    if(($amount)<0)
    {
        echo '<script type="text/javascript">';
        echo 'alert("Oops ! Negative values cannot be transferred" )';
        echo '</script>';

    }

    else if($amount>$sql1['balance'])
    {
        echo '<script type="text/javascript">';
        echo 'alert("Bad Luck! Insufficient Balance" )';
        echo '</script>';


    }
  
    else if($amount==0)
    {
        echo "<script type='text/javascript'>";
        echo 'alert("Oops ! Zero value cannot be transferred" )';
       
        echo "</script>";


    }


else {
    
    $newbalance=$sql1['balance']-$amount;
    $sql="UPDATE users set balance=$newbalance  where id =$from";
    mysqli_query($con,$sql);

    $newbalance=$sql2['balance']+ $amount;
    $sql="UPDATE users set balance=$newbalance where id =$to";
    mysqli_query($con,$sql);

    $sender=$sql1['name'];
    $receiver=$sql2['name'];
    $sql="INSERT INTO transaction(sender,receiver,balance) VALUES ('$sender','$receiver','$amount')";
    $query=mysqli_query($con,$sql);

   if($query)
   {
echo "<script> alert('Transaction Successful');
window.location='transactionhistory.php';
</script>";


     }
    
$newbalance=0;
$amount=0;

}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Banking System</title>
    
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
   
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="learn more.css">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
        /* Custom CSS */
        .navbar-fixed-top {
          position: fixed;
          top: 0;
          width: 100%;
          z-index: 9999;
        }
     .btn:hover{
      background-color:white;
      font-weight:bolder;
      color:black;

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


  
    
   
    
<div class="container" style="background-color:#F0F8FF; margin-top:80px;">
    <h2 class="text-center pt-4" style="color:black;
    ">Transaction</h2>
    <?php
    include 'config.php';
    $sid=$_GET['id'];
    $sql="SELECT * from users where id=$sid";
    $result=mysqli_query($con,$sql);
   if (!$result){
        echo "Error :".$sql."<br>".mysqli_error($con);

    }
    $rows=mysqli_fetch_assoc($result);

    ?>

    <form method="post" name="tcredit" class="tabletext">
        <br>
        <div>
            <table class="table table-striped table-condensed table-bordered">
                <tr style="color:black;">
<th class="text-center">Id</th>
<th class="text-center">Name</th>
<th class="text-center">Email</th>
<th class="text-center">Balance</th>

                </tr>

                
                <tr style="color:black;">
<td class="py-2"><?php echo $rows['id']?></td>
<td class="py-2"><?php echo $rows['name']?></td>
<td class="py-2"><?php echo $rows['email']?></td>
<td class="py-2"><?php echo $rows['balance']?></td>

                </tr>
            </table>
        </div>

        <br><br><br>

        <label style="color:#00308F; border-radius:5px; margin-bottom:10px"><b>Transfer To:</b></label>
        <select name="to" class="form-control" required>
<option value="" disabled selected >Choose</option>

<?php
 include 'config.php';
$sid=$_GET['id'];
$sql="SELECT * FROM users where id!=$sid";
$result=mysqli_query($con,$sql);
if(!$result){
    echo "Error".$sql."<br>".mysqli_error($con);

}
while($rows=mysqli_fetch_assoc($result)){
    ?>


    <option value="<?php echo $rows['id'];?>" class="table">
        <?php echo $rows['name'];?>(Balance:<?php echo $rows['balance'];?>
        )
        </option>

  <?Php
  }
  ?>

    <div>

  

       </select>

       <br>
       <br>
       <label style="color:#00308F; border-radius:5px; margin-bottom:10px"><b>Amount:</b></label>
       <input type="number" class="form-control" name="amount" required>
       <br><br>
       <div class="text-center">
        <button class="btn mt-3 btn btn-primary" name="submit" id="myBtn" style=" margin-top:7px; margin-right:5px ;margin-bottom:10px; border-radius:8px;font-size:17px;"> Transfer </button>
       </div>
    </form>




    
      <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
        
    
  
  </body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>