<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student crud application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
        
        <div class="card" style="max-width: 1500px;">
  
        <div class="card-header">
            <h1>cus_pay</h1>
        </div>

        <div class="card-body">
            <button class="btn btn-success"><a href="add.php" class="text-light">add new </a>  </button> 
            <button class="btn btn-success"><a href="find_details.php" class="text-light">get details </a>  </button> 
            <br/>
            <br/>

            <table class="table">
            <thead>	
                <tr>
                <th scope="col">#</th>
                <th scope="col">customer_id</th>
                <th scope="col">payment_date</th>
                <th scope="col">amount</th>
                <th scope="col">payment_method</th>
                <th scope="col">transaction_id</th>
                <th scope="col">notes</th>
                
                </tr>
            </thead>
            <tbody>
                <?php
                $connection = mysqli_connect("localhost:4306","root","","cus_pay");
                $sql ="select * from customer_payment_details";
                $run =mysqli_query($connection,$sql);
                $id= 1;
                while($row=mysqli_fetch_array($run)){
                    $uid = $row['id'];
                    $customer_id= $row['customer_id'];
                    $payment_date = $row['payment_date'];
                    $amount = $row['amount'];
                    $payment_method = $row['payment_method'];
                    $transaction_id = $row['transaction_id'];
                    $notes = $row['notes'];
                
                
                ?>
                <tr>
                
                <td><?php echo $uid ?></td>
                    <td> <?php echo  $customer_id ?></td>
                    <td><?php echo $payment_date ?></td>
                    <td><?php echo $amount ?></td>
                    <td><?php echo  $payment_method ?></td>
                    <td><?php echo $transaction_id ?></td>
                    <td><?php echo $notes?></td>
                     
                    <td><button class="btn btn-success"> <a href='edit.php?edit=<?php echo $uid ?>' class="text-light"> Edit </a> </button></td> &nbsp;
                    <td><button class="btn btn-danger"><a href='delete.php?del=<?php echo $uid ?>' class="text-light"> Delete </a> </button></td>
                </tr>
                    <?php } ?>
                    

            </tbody>
        </table>
            
        </div>
        
        </div>

            </div>

        

    </div>
</body>
</html>