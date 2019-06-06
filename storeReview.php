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
    </head>
    <body>
        <?php
            
            include 'header.php';
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "moviesdb";
            #echo "Movie Review of ".ucfirst($_POST['name'])."<br><br>";
                
            $dsn="mysql:host=".$servername.";dbname=".$dbname;
            $pdo=new PDO($dsn,$username,$password);

            $name = $_POST["name"];
            $type=$_POST["type"];
            $dir=$_POST["dir"];
            $act=$_POST["act"];


            $sql="Insert into moviedetails(name,type,actor,director) values (:name,:type,:dir,:act)";
            $stmt=$pdo->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':dir',$dir);
            $stmt->bindParam(':act', $act);

            $stmt->execute();

            $sql="Insert into review(moviename,review,rating) values (:name,:review,:rating)";
            $stmt=$pdo->prepare($sql);
            $stmt->bindParam(':name',$_POST["name"]);
            $stmt->bindParam(':review',$_POST["review"]);
            $stmt->bindParam(':rating',$_POST["rating"]);
            $stmt->execute();
            
            echo "Review Stored : You will be redirected<br>";
            header('Refresh: 1 ; movie1.php');


?> 