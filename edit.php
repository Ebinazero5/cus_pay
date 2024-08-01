<?php

$connection = mysqli_connect("localhost:4306","root","","cus_pay");

$edit = $_GET['edit'];

$sql = "select * from customer_payment_details where id = '$edit'";

$run = mysqli_query($connection,$sql);


while($row=mysqli_fetch_array($run))
{
    $uid = $row['id'];
    $name = $row['name'];
    $address = $row['address'];
    $mobile = $row['mobile'];

}

?>

<?php
   $connection = mysqli_connect("localhost:4306","root","","cus_pay");

    


    if(isset($_POST['submit']))
        {
          $edit = $_GET['edit'];  

          $customer_id = $_POST['customer_id'];
          $payment_date = $_POST['payment_date'];
          $amount = $_POST['amount'];
          $payment_method = $_POST['payment_method'];
          $transaction_id = $_POST['transaction_id'];
          $notes = $_POST['notes'];

          $sql= "UPDATE customer_payment_details 
          SET customer_id ='$customer_id'
              payment_date = '$payment_date', 
              amount = '$amount', 
              payment_method = '$payment_method', 
              transaction_id = '$transaction_id', 
              notes = '$notes' 
          WHERE 

              id = '$edit'";
              
          

           if(mysqli_query($connection,$sql))

           {

            echo '<script> location.replace("index.php")</script>';  
           }
           else
           {
           echo "Some thing Error" . $connection->error;

           }

        }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Crud Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>

        <div class="container">
            <div class="row">
                 <div class="col-md-9">
                    <div class="card">
                    <div class="card-header">
                        <h1> cus_pay </h1>
                    </div>
                    <div class="card-body">

                    <form action="add.php" method="post">
                    <div class="form-group">
                <label for="customer_id">Customer ID</label>
                <input type="number" id="customer_id" name="customer_id" class="form-control" placeholder="Enter customer ID" required>
            </div>

            <div class="form-group">
                <label for="payment_date">Payment Date</label>
                <input type="date" id="payment_date" name="payment_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="text" id="amount" name="amount" class="form-control" placeholder="Enter amount" required>
            </div>

            <div class="form-group">
                <label for="payment_method">Payment Method</label>
                <input type="text" id="payment_method" name="payment_method" class="form-control" placeholder="Enter payment method" required>
            </div>

            <div class="form-group">
                <label for="transaction_id">Transaction ID</label>
                <input type="text" id="transaction_id" name="transaction_id" class="form-control" placeholder="Enter transaction ID" required>
            </div>

            <div class="form-group">
                <label for="notes">Notes</label>
                <textarea id="notes" name="notes" class="form-control" placeholder="Enter any additional notes"></textarea>
            </div>
                        <br/>
                        <input type="submit" class="btn btn-primary" name="submit" value="Edit">
                        </form>
                    </div>
                    </div>

                </div>
            
            </div>
        </div>

</body>
</html>