<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <link rel="icon" href="./images/logo.jpg">
    <title>Home page</title>
</head>
<body>
    <div class="main">
        <h1 class=title>Welcome To Stock Page</h1>
        <ul>
            <li><a target="_blank" href="./sale.php">Sales</a></li>
            <li><a href="./purchase.php" target="_blank">Purchase</a></li>
            <li><a href="./graphs.php" target="_blank">Graphs</a></li>
            <li><button class="addsize">Add size</button></li>
            <li><button class="addname">Add name</button></li>
            <li><a href="#toda">Today's sales</a></li>
            <li><a href="#todap">Today's purchases</a></li>
            <li><a href="#outt">Out of stock</a></li>
            <li><a href="#total">Total stock</a></li>
        </ul>
    </div>
    <form class="addsiz block" action="./sizesubmit.php" method="POST">
        <h3>Add Size</h3>
        <div>Size: <input type="text" name="size" required></div>
        <div>Number of pieces per box: <input type="number" name="box" required></div>
        <input type="submit">
    </form>
    <form class="addnam block" action="./namesubmit.php" method="POST">
        <h3>Add Name</h3>
        <div>Name: <input type="text" name="name" required></div>
        <input type="submit">
    </form>
    <button class="up">Up</button>
    <a href="./index.html" class="back">Back</a>
</body>
</html>
<?php
    include('connection.php'); 

    $query = "SELECT * FROM typetable";
    echo '<div class="allbutton"><ul><li class="material">Types</li><div class ="box">';
    if ($result = $con->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $field2name = $row["nametype"];
            echo '<p>'.$field2name.'</p>';
        }
        $result->free();
    }  
    $query = "SELECT * FROM sizetable";
    echo '</div><li class="material">Size</li><div class ="box block">';
    if ($result = $con->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $field2name = $row["namesize"];
            echo '<p>'.$field2name.'</p>';
        }
        $result->free();
    } 
    $query = "SELECT * FROM nametable";
    echo '</div><li class="material">Name</li><div class ="box block namee">';
    if ($result = $con->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $field2name = $row["namename"];
            echo '<p>'.$field2name.'</p>';
        }
        $result->free();
    } 
    $query = "SELECT * FROM vitri group by batch";
    echo '</div><li class="material">Batches</li><div class ="box block">';
    if ($result = $con->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $field2name = $row["batch"];
            echo '<p>'.$field2name.'</p>';
        }
        $result->free();
    } 
    $query = "SELECT * FROM sani group by size";
    echo '</div><li class="material">Shape</li><div class ="box block">';
    if ($result = $con->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $field2name = $row["size"];
            if($field2name!=null)
            echo '<p>'.$field2name.'</p>';
        }
        $result->free();
    }
    $query = "SELECT * FROM tap group by material";
    echo '</div><li class="material">Material</li><div class ="box block">';
    if ($result = $con->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $field2name = $row["material"];
            echo '<p>'.$field2name.'</p>';
        }
        $result->free();
    }
    echo'</ul></div>';
    echo'<div class="main"><form action="./list.php" method="POST">
        <h3>Sales and purchase list from and to </h3>
        From: <input type="date" name="from" required><br>
        To: <input type="date" name="to" required><br>
        <input type="submit">
    </form></div><div id="toda"><h3>Today&#39;s Sales</h3><table>
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
    </tr>';
    $query = "SELECT * FROM sales where date=curdate()";
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
            echo '<td>'.$field1name.'</td></tr>';
        }
        $result->free();
    }
    echo'</table></div><div id="todap"><h3>Today&#39;s Purchases</h3><table>
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
    </tr>';
    $query = "SELECT * FROM purchase where date=curdate()";
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
            echo '<td>'.$field1name.'</td></tr>';
        }
        $result->free();
    }
    echo'</table></div><div id="outt"><h3>Out Of Stock</h3><div class="all"><div><h3>Vitrified</h3><table>
    <tr>
    <th>Type</th>
    <th>Size</th>
    <th>Name</th>
    <th>Batch</th>
    <th>Boxes</th>
    <th>Pieces</th>
    </tr>';
    $query = "select * from vitrified where box<10";
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
            $field1name = $row["box"];
            echo '<td>'.$field1name.'</td>';
            $field1name = $row["piece"];
            echo '<td>'.$field1name.'</td></tr>';
        }
        $result->free();
    }
    echo'</table></div><div><h3>Sanitary</h3><table>
    <tr>
    <th>Size</th>
    <th>Name</th>
    <th>Color</th>
    <th>Pieces</th>
    </tr>';
    $query = "SELECT * FROM sanitary where piece<10";
    if ($result = $con->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["size"];
            echo '<tr><td>'.$field1name.'</td>';
            $field1name = $row["name"];
            echo '<td>'.$field1name.'</td>';
            $field1name = $row["color"];
            echo '<td>'.$field1name.'</td>';
            $field1name = $row["piece"];
            echo '<td>'.$field1name.'</td></tr>';
        }
        $result->free();
    }
    echo'</table></div><div><h3>Borders</h3><table>
    <tr>
    <th>Size</th>
    <th>Name</th>
    <th>Pieces</th>
    </tr>';
    $query = "SELECT * FROM borderr where piece<10";
    if ($result = $con->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["size"];
            echo '<tr><td>'.$field1name.'</td>';
            $field1name = $row["name"];
            echo '<td>'.$field1name.'</td>';
            $field1name = $row["piece"];
            echo '<td>'.$field1name.'</td></tr>';
        }
        $result->free();
    }
    echo'</table></div><div><h3>Adhesive</h3><table>
    <tr>
    <th>Name</th>
    <th>Weight</th>
    <th>Pieces</th>
    </tr>';
    $query = "SELECT * FROM adhesive where piece<10";
    if ($result = $con->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["name"];
            echo '<td>'.$field1name.'</td>';
            $field1name = $row["weight"];
            echo '<td>'.$field1name.'</td>';
            $field1name = $row["piece"];
            echo '<td>'.$field1name.'</td></tr>';
        }
        $result->free();
    }
    echo'</table></div><div><h3>Tap</h3><table>
    <tr>
    <th>Name</th>
    <th>Material</th>
    <th>Pieces</th>
    </tr>';
    $query = "SELECT * FROM tapp where piece<10";
    if ($result = $con->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["name"];
            echo '<td>'.$field1name.'</td>';
            $field1name = $row["material"];
            echo '<td>'.$field1name.'</td>';
            $field1name = $row["piece"];
            echo '<td>'.$field1name.'</td></tr>';
        }
        $result->free();
    }
    echo'</table></div></div></div>';
    echo'<div id="total">
    <h3>Total Stock</h3><div class="all"><div><h3>Vitrified, Parking and Cera Floor</h3><table>
    <tr>
    <th>Type</th>
    <th>Size</th>
    <th>Name</th>
    <th>Batch</th>
    <th>Boxes</th>
    <th>Pieces</th>
    <th>Rate</th>
    <th>Amount</th>
    </tr>';
    $query = "SELECT *,(box*rate+(piece*(rate/piecesperbox))) as amount from vitrified";
    $sum=0;
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
        echo '<th colspan="7">Total Rs:</th><td>'.$sum.'</td>';
        $result->free();
    }
    echo'</table></div><div><h3>Sanitary</h3><table>
    <tr>
    <th>Size</th>
    <th>Name</th>
    <th>Color</th>
    <th>Pieces</th>
    <th>Rate</th>
    <th>Amount</th>
    </tr>';
    $query = "SELECT *,(piece*rate) as amount from sanitary;";
    $sum=0;
    if ($result = $con->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["size"];
            echo '<td>'.$field1name.'</td>';
            $field1name = $row["name"];
            echo '<td>'.$field1name.'</td>';
            $field1name = $row["color"];
            echo '<td>'.$field1name.'</td>';
            $field1name = $row["piece"];
            echo '<td>'.$field1name.'</td>';
            $field1name = $row["rate"];
            echo '<td>'.$field1name.'</td>';
            $field1name = $row["amount"];
            echo '<td>'.$field1name.'</td></tr>';
            $sum=$sum+$field1name;
        }
        echo '<th colspan="5">Total Rs:</th><td>'.$sum.'</td>';
        $result->free();
    }
    echo'</table></div><div><h3>Adhesive</h3><table>
    <tr>
    <th>Name</th>
    <th>Weight</th>
    <th>Pieces</th>
    <th>Rate</th>
    <th>Amount</th>
    </tr>';
    $query = "SELECT *,(piece*rate) as amount from adhesive;";
    $sum=0;
    if ($result = $con->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["name"];
            echo '<td>'.$field1name.'</td>';
            $field1name = $row["weight"];
            echo '<td>'.$field1name.'</td>';
            $field1name = $row["piece"];
            echo '<td>'.$field1name.'</td>';
            $field1name = $row["rate"];
            echo '<td>'.$field1name.'</td>';
            $field1name = $row["amount"];
            echo '<td>'.$field1name.'</td></tr>';
            $sum=$sum+$field1name;
        }
        echo '<th colspan="4">Total Rs:</th><td>'.$sum.'</td>';
        $result->free();
    }
    echo'</table></div><div><h3>Tap</h3><table>
    <tr>
    <th>Name</th>
    <th>Material</th>
    <th>Pieces</th>
    <th>Rate</th>
    <th>Amount</th>
    </tr>';
    $query = "SELECT *,(piece*rate) as amount from tapp;";
    $sum=0;
    if ($result = $con->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["name"];
            echo '<td>'.$field1name.'</td>';
            $field1name = $row["material"];
            echo '<td>'.$field1name.'</td>';
            $field1name = $row["piece"];
            echo '<td>'.$field1name.'</td>';
            $field1name = $row["rate"];
            echo '<td>'.$field1name.'</td>';
            $field1name = $row["amount"];
            echo '<td>'.$field1name.'</td></tr>';
            $sum=$sum+$field1name;
        }
        echo '<th colspan="4">Total Rs:</th><td>'.$sum.'</td>';
        $result->free();
    }
    echo'</table></div><div><h3>Border</h3><table>
    <tr>
    <th>Size</th>
    <th>Name</th>
    <th>Pieces</th>
    <th>Rate</th>
    <th>Amount</th>
    </tr>';
    $query = "SELECT *,(piece*rate) as amount from borderr;";
    $sum=0;
    if ($result = $con->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["size"];
            echo '<td>'.$field1name.'</td>';
            $field1name = $row["name"];
            echo '<td>'.$field1name.'</td>';
            $field1name = $row["piece"];
            echo '<td>'.$field1name.'</td>';
            $field1name = $row["rate"];
            echo '<td>'.$field1name.'</td>';
            $field1name = $row["amount"];
            echo '<td>'.$field1name.'</td></tr>';
            $sum=$sum+$field1name;
        }
        echo '<th colspan="4">Total Rs:</th><td>'.$sum.'</td>';
        $result->free();
    }
    echo'</table></div></div></div>';
    // $query = "SELECT * FROM typetable";
    // if ($result = $con->query($query)) {
    //     echo'<div class="allbutton">';
    //     while ($row = $result->fetch_assoc()) {
    //         $field2name = $row["nametype"];
    //         echo '<button class="typename">Types</button>';
    //     }
    //     $result->free();
    // }  
    // $query = "SELECT namesize FROM sizetable";
    // if ($result = $con->query($query)) {
    //     echo'<div id="vitri" class="block"><h2>Vitrified</h2><div class="buttons">';
    //     while ($row = $result->fetch_assoc()) {
    //         $field2name = $row["namesize"];
    //         echo '<button class="btn">'.$field2name.'</button>';
    //     }echo'</div>';
    //     $result->free();
    // }  
    // $use="2/2";
    // $query = "select namename from (select * from (select * from nametable inner join vitri where idname =name)as car inner join sizetable where size=idsize)as car where namesize='$use' group by namename;";
    // if ($result = $con->query($query)) {
    //     echo'<div class="buttons">';
    //     while ($row = $result->fetch_assoc()) {
    //         $field2name = $row["namename"];
    //         echo '<button class="btn">'.$field2name.'</button>';
    //     }echo'</div></div>';
    //     $result->free();
    // } 

    // $query = "SELECT * FROM nametable,sani where idname=name group by name";
    // if ($result = $con->query($query)) {
    //     echo'<div id="sani" class="block"><h2>Sanitary</h2><div class="buttons">';
    //     while ($row = $result->fetch_assoc()) {
    //         $field2name = $row["namename"];
    //         echo '<button class="btn">'.$field2name.'</button>';
    //     }echo'</div></div>';
    //     $result->free();
    // }  
    // $query = "SELECT * FROM nametable,adhe where idname=name group by name";
    // if ($result = $con->query($query)) {
    //     echo'<div id="adhe" class="block"><h2>Adhesive</h2><div class="buttons">';
    //     while ($row = $result->fetch_assoc()) {
    //         $field2name = $row["namename"];
    //         echo '<button class="btn">'.$field2name.'</button>';
    //     }echo'</div></div>';
    //     $result->free();
    // }  
    // $query = "SELECT * FROM nametable,border where idname=name group by name";
    // if ($result = $con->query($query)) {
    //     echo'<div id="bor" class="block"><h2>Border</h2><div class="buttons">';
    //     while ($row = $result->fetch_assoc()) {
    //         $field2name = $row["namename"];
    //         echo '<button class="btn">'.$field2name.'</button>';
    //     }echo'</div></div>';
    //     $result->free();
    // }  
    // $query = "SELECT * FROM nametable,tap where idname=name group by name";
    // if ($result = $con->query($query)) {
    //     echo'<div id="tap" class="block"><h2>Tap</h2><div class="buttons">';
    //     while ($row = $result->fetch_assoc()) {
    //         $field2name = $row["namename"];
    //         echo '<button class="btn">'.$field2name.'</button>';
    //     }echo'</div></div>';
    //     $result->free();
    // }  
?>
<script src="home.js"></script>

<!-- var car=document.querySelectorAll(".typename")
car.forEach(ele=> {
    ele.addEventListener("click",()=>{
        if(ele.innerHTML=="Vitrified"){
            document.getElementById("vitri").classList.toggle("block");
        }
        else if(ele.innerHTML=="Sanitary"){
            document.getElementById("sani").classList.toggle("block");
        }
        else if(ele.innerHTML=="Adhesive"){
            document.getElementById("adhe").classList.toggle("block");
        }
        else if(ele.innerHTML=="Border"){
            document.getElementById("bor").classList.toggle("block");
        }
        else if(ele.innerHTML=="Tap"){
            document.getElementById("tap").classList.toggle("block");
        }
        console.log(ele.innerHTML);
    })
}) -->