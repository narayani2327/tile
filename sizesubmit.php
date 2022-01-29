<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <link rel="icon" href="./images/logo.jpg">
    <title>Size Submitted</title>
</head>
<?php
    include('connection.php'); 
    $size=$_POST['size'];
    $size = stripcslashes($size);  
    $size = mysqli_real_escape_string($con, $size); 
    $box=$_POST['box'];
    $box = stripcslashes($box);  
    $box = mysqli_real_escape_string($con, $box); 
    $sql="insert into sizetable (namesize,piecesbox) values('$size',$box)";
    if(mysqli_query($con, $sql)){
        echo "<h2>Records added successfully</h2>";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }
    echo'<a href="./home.php" class="back">Back</a>';
?>