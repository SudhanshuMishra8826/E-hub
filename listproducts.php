<?php
    #setcookie("name",$_POST['name'],time()+60);
    session_start();

    if($_SESSION['authuser']!=1){
        echo " Access not granted ";
        exit();
    }

?>
<html>
    <head>
        <title> 
            Dashboard
        </title>
        <style>
            .button {
                    text-decoration: none;
                    display: block;
                    
                    background: #4E9CAF;
                    padding: 10px;
                    text-align: center;
                    border-radius: 5px;
                    color: white;
                    font-weight: bold;
                    }
        </style>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script>  
            function validateform(){  
            var name=document.myform.name.value;  
            var type=document.myform.type.value; 
            var dir=document.myform.dir.value;  
            var act=document.myform.act.value; 
            var review=document.myform.review.value;  
            var rating=document.myform.rating.value;  

            if (name==null || name==""||type==null || type==""||dir==null || dir==""||act==null || act==""||review==null || review==""||rating==null || rating==""){  
            alert("Any feild can't be blank");  
            return false;  
            }
            }  
        </script>  
    </head>
    <body>
        <?php
            
            include 'header.php';
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "moviesdb";
            #echo "Movie Review of ".ucfirst($_POST['num'])."<br><br>";
                
            $dsn="mysql:host=".$servername.";dbname=".$dbname;
            $pdo=new PDO($dsn,$username,$password);

            echo "<h2 style='text-align: center'> Product Details </h4><br>";
            $sql2="SELECT * from product";
            $stmt2=$pdo->prepare($sql2);
            $stmt2->execute();
            echo"<table class='table' border='3' cellpadding='10' align='center'>";
            echo"<th>Product Name</th>";
            echo"<th>Details</th>";
            echo"<th>Price (INR)</th>";
            echo"<th>Image</th>";
            echo"<th>Buy</th>";
            while($rows2=$stmt2->fetchAll(PDO::FETCH_ASSOC)){
                foreach ($rows2 as $row2){
                    echo"<tr>";
                    echo"<td>";
                    echo ucfirst($row2['pname']);
                    echo"</td>";
                    echo"<td>";
                    echo ucfirst($row2['pdetail']);
                    echo"</td>";
                    echo"<td>";
                    echo ucfirst($row2['pprice']);
                    echo"</td>";
                    echo"<td>";
                    echo "<a target='_blank' href=".$row2['pimage']."> View</a>";
                    echo"</td>";
                    echo"<td>";
                    echo "<a target='_blank' href=addtocart.php?pid=".$row2['pid']."&pname=".$row2['pname']."> Add To  Cart</a>";
                    echo"</td>";
                    echo"</tr>";
                }
            }
            echo"</table>";
        ?> 
        <br>

        <br>
        <a href="movie1.php" class="button">Go To Home</a>
        <br>
        <a href="writeReview.php" class="button">Add Movie & Write Review</a>
        <br>
        <a href="login.php" class="button">Logout</a> 

        
    </body>
</html>