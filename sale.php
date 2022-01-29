<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <link rel="icon" href="./images/logo.jpg">
    <title>Sales</title>
</head>
<body>
    <h1>Sales Enter</h1>
</body>
</html>
<?php
    include('connection.php'); 
    echo"<div class='salesform'><form action='./salessubmit.php' method='POST'>";
    $query = "SELECT * FROM typetable";
    if ($result = $con->query($query)) {
        echo'<p class="para"><b>Types available in database are </b>';
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["nametype"];
            echo $field1name.', ';
        }echo'</p>';
        $result->free();
    }
    echo"<input type='text' name='pro' required>";
    $query = "SELECT * FROM sizetable";
    if ($result = $con->query($query)) {
        echo'<p class="para"><b>Sizes available in database are </b>';
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["namesize"];
            echo $field1name.', ';
        }echo'</p>';
        $result->free();
    }
    echo"<input type='text' name='size' required>";
    $query = "SELECT * FROM nametable";
    echo'<p class="para"><b>Sizes available in database are </b>';
    if ($result = $con->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["namename"];
            echo $field1name.', ';
        }echo'</p>';
        $result->free();
    }
    echo"<input type='text' name='name' required>";
    $query = "SELECT * FROM vitri";
    if ($result = $con->query($query)) {
        echo'<p class="para"><b>Batch (Only for tiles): </b>';
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["batch"];
            echo $field1name.', ';
        }echo'</p>';
        $result->free();
    }
    echo"<input type='text' name='batch' required>";
    $query = "SELECT * FROM tap";
    if ($result = $con->query($query)) {
        echo'<p class="para"><b>Material (Only for taps): </b>';
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["material"];
            echo $field1name.', ';
        }echo'</p>';
        $result->free();
    }
    echo"<input type='text' name='material' required>";
    $query = "SELECT size FROM sani where size is not null";
    if ($result = $con->query($query)) {
        echo'<p class="para"><b>Shape (Only sanitary ware): </b>';
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["size"];
            echo $field1name.', ';
        }echo'</p>';
        $result->free();
    }
    echo"<input type='text' name='shape' required>";
    $query = "SELECT color from sani group by color";
    if ($result = $con->query($query)) {
        echo'<p class="para"><b>Color (Only for sanitary ware): </b>';
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["color"];
            echo $field1name.', ';
        }echo'</p>';
        $result->free();
    }
    echo"<input type='text' name='color' required>";
    $query = "SELECT weight from adhe group by weight";
    if ($result = $con->query($query)) {
        echo'<p class="sales"><b>Weight (Only for adhesive): </b>';
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["weight"];
            echo $field1name.', ';
        }echo'</p>';
        $result->free();
    }
    echo"<input type='text' name='weight' required>";
    echo'<p class="sales"><b>Number of boxes: <br></b>';
    echo"<input type='number' name='box' required>";
    echo'<p class="sales"><b>Number of pieces: <br></b>';
    echo"<input type='number' name='piece' required>";
    echo'<p class="sales"><b>Rate per box: <br></b>';
    echo"<input type='number' name='rate' required>";
    echo '<br><input type="submit"></form></div>';
    echo'<a href="./home.php" class="back">Back</a>';
?>