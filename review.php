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
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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

            $sql="SELECT * from moviedetails where name=?";
            $stmt=$pdo->prepare($sql);
            $stmt->execute([$_POST["num"]]);
            #echo "<br>";
            echo "<h2 style='text-align: center'> Movie's Details </h4><br>";
            echo"<table class='table' border='3' cellpadding='10' align='center'>";
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                echo "<tr>";
                echo "<td><b>Movie name  </b></td> <td>".ucfirst($row['name']).'</td>';
                echo "<td><b>Movie type  </b></td><td>".ucfirst($row['type']).'</td>';
                echo "</tr><tr>";
                echo "<td><b>Actor's name  </b></td><td>".ucfirst($row['actor']).'</td>            ';
                echo "<td><b>Director's name  </b></td><td>".ucfirst($row['director']).'</td>';
                echo "</tr>";
            }
            echo "</table><br>";

            echo "<h2 style='text-align: center'> Reviews </h4><br>";
            $sql2="SELECT * from review where moviename=?";
            $stmt2=$pdo->prepare($sql2);
            $stmt2->execute([$_POST["num"]]);
            echo"<table class='table' border='3' cellpadding='10' align='center'>";
            echo"<th>ID</th>";
            echo"<th>Review</th>";
            echo"<th>Rating</th>";
            while($rows2=$stmt2->fetchAll(PDO::FETCH_ASSOC)){
                foreach ($rows2 as $row2){
                    echo"<tr>";
                    echo"<td>";
                    echo ucfirst($row2['reviewId']);
                    echo"</td>";
                    echo"<td>";
                    echo ucfirst($row2['review']);
                    echo"</td>";
                    echo"<td>";
                    echo ucfirst($row2['rating']);
                    echo"</td>";
                    echo"</tr>";
                }
            }
            echo"</table>";

            echo"<br>";
            echo"<a href=\"writeReview.php\" class=\"button\">Add Movie & Write Review</a>"; 
            
            
            echo"<br>";
            echo"<a href='movie1.php' class='button'>Go To Home</a>";

            echo"<br>";
            echo"<a href=\"login.php\" class=\"button\">Logout</a>"; 

?> 