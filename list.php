<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <link rel="icon" href="./images/logo.jpg">
    <title>Sales List</title>
</head>
<body>
</body>
</html>
<?php
    include('connection.php'); 
    $from=$_POST['from'];
    $from = stripcslashes($from);  
    $from = mysqli_real_escape_string($con, $from); 
    $to=$_POST['to'];
    $to = stripcslashes($to); 
    $to = mysqli_real_escape_string($con, $to); 
    echo'<div class="sale"><h3>Sales from '.$from.' to '.$to.'</h3><table>
    <tr>
    <th>Type</th>
    <th>Size</th>
    <th>Name</th>
    <th>Batch</th>
    <th>Material</th>
    <th>Shape</th>
    <th>Color</th>
    <th>Weight</th>
    <th>Boxes</th>
    <th>Pieces</th>
    <th>Rate</th>
    <th>Amount</th>
    </tr>';
    $sum=0;
    $query = "SELECT *,(box*rate+(piece*(rate/piecesbox))) as amount from sales,sizetable where size=namesize and date between '$from' and '$to'";
    if ($result = $con->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["type"];
            echo '<tr><td>'.$field1name.'</td>';
            $field1name = $row["size"];
            echo '<td>'.$field1name.'</td>';
            $field1name = $row["name"];
            echo '<td>'.$field1name.'</td>';
            $field1name = $row["batch"];
            echo '<td>'.$field1name.'</td>';
            $field1name = $row["material"];
            echo '<td>'.$field1name.'</td>';
            $field1name = $row["shape"];
            echo '<td>'.$field1name.'</td>';
            $field1name = $row["color"];
            echo '<td>'.$field1name.'</td>';
            $field1name = $row["weight"];
            echo '<td>'.$field1name.'</td>';
            $field1name = $row["box"];
            echo '<td>'.$field1name.'</td>';
            $field1name = $row["piece"];
            echo '<td>'.$field1name.'</td>';
            $field1name = $row["rate"];
            echo '<td>'.$field1name.'</td>';
            $field1name = $row["amount"];
            echo '<td>'.$field1name.'</td></tr>';
            $sum=$sum+$field1name;
        }
        echo '<th colspan="11">Total Rs:</th><td>'.$sum.'</td>';
        $result->free();
    }
    echo'</table></div><a href="./home.php" class="back">Back</a>';
    echo'<div class="purch"><h3>Purchase from '.$from.' to '.$to.'</h3><table>
    <tr>
    <th>Type</th>
    <th>Size</th>
    <th>Name</th>
    <th>Batch</th>
    <th>Material</th>
    <th>Shape</th>
    <th>Color</th>
    <th>Weight</th>
    <th>Boxes</th>
    <th>Pieces</th>
    <th>Rate</th>
    <th>Amount</th>
    </tr>';
    $sum=0;
    $query = "SELECT *,(box*rate+(piece*(rate/piecesbox))) as amount from purchase,sizetable where size=namesize and date between '$from' and '$to'";
    if ($result = $con->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["type"];
            echo '<tr><td>'.$field1name.'</td>';
            $field1name = $row["size"];
            echo '<td>'.$field1name.'</td>';
            $field1name = $row["name"];
            echo '<td>'.$field1name.'</td>';
            $field1name = $row["batch"];
            echo '<td>'.$field1name.'</td>';
            $field1name = $row["material"];
            echo '<td>'.$field1name.'</td>';
            $field1name = $row["shape"];
            echo '<td>'.$field1name.'</td>';
            $field1name = $row["color"];
            echo '<td>'.$field1name.'</td>';
            $field1name = $row["weight"];
            echo '<td>'.$field1name.'</td>';
            $field1name = $row["box"];
            echo '<td>'.$field1name.'</td>';
            $field1name = $row["piece"];
            echo '<td>'.$field1name.'</td>';
            $field1name = $row["rate"];
            echo '<td>'.$field1name.'</td>';
            $field1name = $row["amount"];
            echo '<td>'.$field1name.'</td></tr>';
            $sum=$sum+$field1name;
        }
        echo '<th colspan="11">Total Rs:</th><td>'.$sum.'</td>';
        $result->free();
    }
    echo'</table>';
?>