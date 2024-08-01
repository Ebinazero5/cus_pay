<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">

                <table class="table">

                <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer ID</th>
                            <th>Payment Date</th>
                            <th>Amount</th>
                            
                        </tr>
                    </thead>
                    <tbody>


                        <?php
                        require 'db.php';

                        $search_term = isset($_POST['search']) ? $_POST['search'] : '';

                        $query = "SELECT 
                                        id,
                                        customer_id,
                                        payment_date,
                                        amount,
                                        payment_method,
                                        transaction_id,
                                        notes
                                    FROM 
                                        customer_payment_details
                                    WHERE 
                                        customer_id LIKE ? OR
                                        amount LIKE ?";




                        // $result = $mysqli->query($query);

                        if ($stmt = $mysqli->prepare($query)) {
                            $search_term_param = "%$search_term%";
                            $stmt->bind_param("ss", $search_term_param, $search_term_param);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            $total_amount = 0;

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $total_amount += $row['amount'];
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['customer_id']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['payment_date']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['amount']) . "</td>";
                                    
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='7'>No results found.</td></tr>";
                            }

                            echo "</tbody>";
                            echo "<tfoot>";
                            echo "<tr>";
                            echo "<td colspan='3'><strong>Total Amount</strong></td>";
                            echo "<td><strong>" . htmlspecialchars(number_format($total_amount, 2)) . "</strong></td>";
                            echo "<td colspan='3'></td>";
                            echo "</tr>";
                            echo "</tfoot>";
                            echo "</table>";
                        
                            $stmt->close();
                            

                        } else {
                            echo "Error preparing statement: " . $mysqli->error;
                        }

                        

                        $mysqli->close();
                        ?>



                        <form method="post" action="find_details.php">
                            <input type="text" name="search" placeholder="Enter customer id" class="form-control">
                            <br>
                            <input type="submit" value="Search" class="btn btn-success">
                        </form>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>   
</body>
</html>