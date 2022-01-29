<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <link rel="icon" href="./images/logo.jpg">
    <title>Sales Submit</title>
</head>
<?php
    include('connection.php'); 
    $pro=$size=$name=$batch=$material=$shape=$color=$weight=$box=$piece=null;
    $pro=$_POST['pro'];
    $pro = stripcslashes($pro);  
    $pro = mysqli_real_escape_string($con, $pro); 
    $size=$_POST['size'];
    $size = stripcslashes($size);  
    $size = mysqli_real_escape_string($con, $size); 
    $name=$_POST['name'];
    $name = stripcslashes($name);  
    $name = mysqli_real_escape_string($con, $name); 
    $batch=$_POST['batch'];
    $batch = stripcslashes($batch);  
    $batch = mysqli_real_escape_string($con, $batch); 
    $material=$_POST['material'];
    $material = stripcslashes($material);  
    $material = mysqli_real_escape_string($con, $material); 
    $shape=$_POST['shape'];
    $shape = stripcslashes($shape);  
    $shape = mysqli_real_escape_string($con, $shape); 
    $color=$_POST['color'];
    $color = stripcslashes($color);  
    $color = mysqli_real_escape_string($con, $color); 
    $weight=$_POST['weight'];
    $weight = stripcslashes($weight); 
    $weight = mysqli_real_escape_string($con, $weight); 
    $box=$_POST['box'];
    $box = stripcslashes($box); 
    $box = mysqli_real_escape_string($con, $box); 
    $piece=$_POST['piece'];
    $piece = stripcslashes($piece); 
    $piece = mysqli_real_escape_string($con, $piece); 
    $out=1;
    echo'<div class="saless">';
    if($pro=="Vitrified"||$pro=="Parking"||$pro=="Flooring"){
        $query="select * from vitrified where size='$size' and name='$name' and type='$pro' and batch='$batch'";
        if ($result = $con->query($query)) {
            if($row = $result->fetch_assoc()){
                $field1name = $row["box"];
                $field2name = $row["piece"];
                $field3name = $row["piecesperbox"];
                if($field1name-$box<0){
                    $out=0;
                    echo"Out of stock";
                }
                else{
                    if((int)$piece % (int)$field3name!=0){
                        $r=$piece;
                        $r=$r-((int)$piece%(int)$field3name);
                        $box=$box+($r/$field3name);
                        $piece=(int)$piece%(int)$field3name;
                    }
                    if($field1name>=$box&&$field2name>=$piece)
                        $out=1;
                    else{
                        $out=0;
                        echo 'Out of stock';
                    }
                }
            }
            else
            {
                $out=0;
                echo"no such stock";
            }
            $result->free();
        }
        if($out!=0){
            $sql="insert into sales (date,type,size,name,batch,material,shape,color,weight,box,piece) values (curdate(),'$pro','$size','$name','$batch','$material','$shape','$color',$weight,$box,$piece)";
            if(mysqli_query($con, $sql)){
                echo "<h2>Records added successfully</h2>";
                $quer="select * from vitrified";
                echo'<table><tr><th>Type</th><th>Size</th><th>Name</th><th>Batch</th><th>Box</th><th>Pieces</th></tr>'; 
                if ($result = $con->query($quer)) {
                    while ($row = $result->fetch_assoc()) {
                        $field1name = $row["type"];
                        echo'<tr><td>'.$field1name.'</td>';
                        $field1name = $row["size"];
                        echo'<td>'.$field1name.'</td>';
                        $field1name = $row["name"];
                        echo'<td>'.$field1name.'</td>';
                        $field1name = $row["batch"];
                        echo'<td>'.$field1name.'</td>';
                        $field1name = $row["box"];
                        echo'<td>'.$field1name.'</td>';
                        $field1name = $row["piece"];
                        echo'<td>'.$field1name.'</td></tr>';
                    }
                    echo'</table>';
                    $result->free();
                }
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
            }
        }
    }
    else{
        if($pro=="Sanitary"){
            $query="select * from sani where size='$shape' and namename='$name' and color='$color'";
            if ($result = $con->query($query)) {
                while ($row = $result->fetch_assoc()) {
                    $field1name = $row["piece"];
                    if($field1name<$piece){
                        $out=0;
                        echo "Out of stock";
                    }
                    if($field1name-$piece<0){
                        $out=0;
                        echo "Out of stock";
                    }
                }
                $result->free();
            }
            if($out!=0){
                $sql="insert into sales (date,type,size,name,batch,material,shape,color,weight,box,piece) values (curdate(),'$pro','$size','$name','$batch','$material','$shape','$color',$weight,$box,$piece)";
                if(mysqli_query($con, $sql)){
                    echo "<h2>Records added successfully</h2>";
                    $quer="select * from sanitary";
                    echo'<table><tr><th>Size</th><th>Name</th><th>Color</th><th>Pieces</th></tr>'; 
                    if ($result = $con->query($quer)) {
                        while ($row = $result->fetch_assoc()) {
                            $field1name = $row["size"];
                            echo'<td>'.$field1name.'</td>';
                            $field1name = $row["name"];
                            echo'<td>'.$field1name.'</td>';
                            $field1name = $row["color"];
                            echo'<td>'.$field1name.'</td>';
                            $field1name = $row["piece"];
                            echo'<td>'.$field1name.'</td></tr>';
                        }
                        echo'</table>';
                        $result->free();
                    }
                } else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
                }
            }
        }
        else if($pro=="Adhesive"){
            $query="select * from adhesive where weight='$weight' and namename='$name'";
            if ($result = $con->query($query)) {
                while ($row = $result->fetch_assoc()) {
                    $field1name = $row["piece"];
                    if($field1name<$piece){
                        $out=0;
                        echo "Out of stock";
                    }
                    if($field1name-$piece<0){
                        $out=0;
                        echo "Out of stock";
                    }
                }
                $result->free();
            }
            if($out!=0){
                $sql="insert into sales (date,type,size,name,batch,material,shape,color,weight,box,piece) values (curdate(),'$pro','$size','$name','$batch','$material','$shape','$color',$weight,$box,$piece)";
                if(mysqli_query($con, $sql)){
                    echo "<h2>Records added successfully</h2>";
                    $quer="select * from adhesive";
                    echo'<table><tr><th>Name</th><th>Weight</th><th>Pieces</th></tr>'; 
                    if ($result = $con->query($quer)) {
                        while ($row = $result->fetch_assoc()) {
                            $field1name = $row["name"];
                            echo'<td>'.$field1name.'</td>';
                            $field1name = $row["weight"];
                            echo'<td>'.$field1name.'</td>';
                            $field1name = $row["piece"];
                            echo'<td>'.$field1name.'</td></tr>';
                        }
                        echo'</table>';
                        $result->free();
                    }
                } else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
                }
            }
        }
        else if($pro=="Tap"){
            $query="select * from tapp where material='$material' and namename='$name'";
            if ($result = $con->query($query)) {
                while ($row = $result->fetch_assoc()) {
                    $field1name = $row["piece"];
                    if($field1name<$piece){
                        $out=0;
                        echo "Out of stock";
                    }
                    if($field1name-$piece<0){
                        $out=0;
                        echo "Out of stock";
                    }
                }
                $result->free();
            }
            if($out!=0){
                $sql="insert into sales (date,type,size,name,batch,material,shape,color,weight,box,piece) values (curdate(),'$pro','$size','$name','$batch','$material','$shape','$color',$weight,$box,$piece)";
                if(mysqli_query($con, $sql)){
                    echo "<h2>Records added successfully</h2>";
                    $quer="select * from tapp";
                    echo'<table><tr><th>Name</th><th>Weight</th><th>Pieces</th></tr>'; 
                    if ($result = $con->query($quer)) {
                        while ($row = $result->fetch_assoc()) {
                            $field1name = $row["name"];
                            echo'<td>'.$field1name.'</td>';
                            $field1name = $row["material"];
                            echo'<td>'.$field1name.'</td>';
                            $field1name = $row["piece"];
                            echo'<td>'.$field1name.'</td></tr>';
                        }
                        echo'</table>';
                        $result->free();
                    }
                } else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
                }
            }
        }
        else if($pro=="Border"){
            $query="select * from borderr join nametable on idname=name where namename='$name'";
            if ($result = $con->query($query)) {
                while ($row = $result->fetch_assoc()) {
                    $field1name = $row["piece"];
                    if($field1name<$piece){
                        $out=0;
                        echo "Out of stock";
                    }
                    if($field1name-$piece<0){
                        $out=0;
                        echo "Out of stock";
                    }
                }
                $result->free();
            }
            if($out!=0){
                $sql="insert into sales (date,type,size,name,batch,material,shape,color,weight,box,piece) values (curdate(),'$pro','$size','$name','$batch','$material','$shape','$color',$weight,$box,$piece)";
                if(mysqli_query($con, $sql)){
                    echo "<h2>Records added successfully</h2>";
                    $quer="select * from borderr";
                    echo'<table><tr><th>Name</th><th>Weight</th><th>Pieces</th></tr>'; 
                    if ($result = $con->query($quer)) {
                        while ($row = $result->fetch_assoc()) {
                            $field1name = $row["size"];
                            echo'<td>'.$field1name.'</td>';
                            $field1name = $row["name"];
                            echo'<td>'.$field1name.'</td>';
                            $field1name = $row["piece"];
                            echo'<td>'.$field1name.'</td></tr>';
                        }
                        echo'</table>';
                        $result->free();
                    }
                } else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
                }
            }
        }
    }
    echo'</div>';
    // $sql="insert into sales (date,type,size,name,batch,material,shape,color,weight,box,piece) values (curdate(),'$pro','$size','$name','$batch','$material','$shape','$color',$weight,$box,$piece)";
    // if(mysqli_query($con, $sql)){
    //     echo "<h2>Records added successfully</h2>";
    // } else{
    //     echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    // }
    echo'<a href="./sale.php" class="back">Back</a>';
?>