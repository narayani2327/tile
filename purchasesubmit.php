<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <link rel="icon" href="./images/logo.jpg">
    <title>Purchase Submit</title>
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
    $rate=$_POST['rate'];
    $rate = stripcslashes($rate); 
    echo'<div class="purchases">';
    $rate = mysqli_real_escape_string($con, $rate); 
    if($pro=="Vitrified"||$pro=="Parking"||$pro=="Flooring"){
        $query="select * from vitrified where size='$size' and name='$name' and type='$pro' and batch='$batch'";
        if ($result = $con->query($query)) {
            if($row = $result->fetch_assoc()){
                $field1name = $row["box"];
                $field2name = $row["piece"];
                $field3name = $row["piecesperbox"];
                if((int)$piece % (int)$field3name!=0){
                    $r=$piece;
                    $r=$r-((int)$piece%(int)$field3name);
                    $box=$box+($r/$field3name);
                    $piece=(int)$piece%(int)$field3name;
                }
            }
        }
        $sql="insert into purchase (date,type,size,name,batch,material,shape,color,weight,box,piece,rate) values (curdate(),'$pro','$size','$name','$batch','$material','$shape','$color',$weight,$box,$piece,$rate)";
        if(mysqli_query($con, $sql)){
            $que="select * from vitrified where type='$pro' and size='$size' and name='$name' and batch='$batch'"; 
            $result = mysqli_query($con, $que);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result);  
            if($count == 0){
                echo'hello world';
                $quer="select * from typetable,sizetable,nametable where nametype='$pro' and namename='$name' and namesize='$size'";
                if ($result = $con->query($quer)) {
                    $row = $result->fetch_assoc();
                        $field1name = $row["idtype"];
                        $field2name = $row["idsize"];
                        $field3name = $row["idname"];
                        $sq="insert into vitri (type,size,name,batch,box,piece,rate) values($field1name,$field2name,$field3name,'$batch',$box,$piece,$rate)";
                        if(mysqli_query($con, $sq)){
                            echo "<h2>Records added successfully</h2>";
                        } else{
                            echo "ERROR: Could not able to execute $sq. " . mysqli_error($con);
                        }
                }
            }
            else
                echo "<h2>Records added successfully</h2>";
            $result->free();
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
    else{
        if($pro=="Sanitary"){
            $sql="insert into purchase (date,type,size,name,batch,material,shape,color,weight,box,piece,rate) values (curdate(),'$pro','$size','$name','$batch','$material','$shape','$color',$weight,$box,$piece,$rate)";
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
        if($pro=="Adhesive"){
            $sql="insert into purchase (date,type,size,name,batch,material,shape,color,weight,box,piece,rate) values (curdate(),'$pro','$size','$name','$batch','$material','$shape','$color',$weight,$box,$piece,$rate)";
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
        if($pro=="Tap"){
            $sql="insert into purchase (date,type,size,name,batch,material,shape,color,weight,box,piece,rate) values (curdate(),'$pro','$size','$name','$batch','$material','$shape','$color',$weight,$box,$piece,$rate)";
            if(mysqli_query($con, $sql)){
                echo "<h2>Records added successfully</h2>";
                $quer="select * from tapp";
                echo'<table><tr><th>Name</th><th>Material</th><th>Pieces</th></tr>'; 
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
        if($pro=="Border"){
            $sql="insert into purchase (date,type,size,name,batch,material,shape,color,weight,box,piece,rate) values (curdate(),'$pro','$size','$name','$batch','$material','$shape','$color',$weight,$box,$piece,$rate)";
            if(mysqli_query($con, $sql)){
                echo "<h2>Records added successfully</h2>";
                $quer="select * from borderr";
                echo'<table><tr><th>Size</th><th>Name</th><th>Pieces</th></tr>'; 
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
    echo'</div>';
    // $sql="insert into purchase (date,type,size,name,batch,material,shape,color,weight,box,piece) values (curdate(),'$pro','$size','$name','$batch','$material','$shape','$color',$weight,$box,$piece)";
    // if(mysqli_query($con, $sql)){
    //     echo "<h2>Records added successfully</h2>";
    // } else{
    //     echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    // }
    echo'<a href="./purchase.php" class="back">Back</a>';
?>