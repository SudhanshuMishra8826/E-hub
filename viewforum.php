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
            $i=0;
            echo "<h2 style='text-align: center'>".ucfirst($_GET["forumtype"])." Forum </h4><br>";
            $sql2="SELECT * from forumposts where forumtype=?";
            $stmt2=$pdo->prepare($sql2);
            $stmt2->execute([$_GET['forumtype']]);
            echo"<table class='table' border='3' cellpadding='10' align='center'>";
            while($rows2=$stmt2->fetchAll(PDO::FETCH_ASSOC)){
                foreach($rows2 as $row){

                    echo"<table class='table' border='3' cellpadding='10' align='center'>";
                    echo"<tr>";
                    echo"<td style='text-align:center'>";
                    #echo $i."  "; 
                    echo ucfirst($row['title']);
                    echo"</td>";
                    echo"<tr>";
                    echo"<td colspan=2>";
                    echo ucfirst($row['content']);
                    echo"</td>";
                    echo"</tr><tr>";
                    echo"<td style='text-align:right'>";
                    echo "By :- ".ucfirst($row['uid']);
                    echo"</td>";
                    echo"</tr><tr>";
                    echo"<td style='text-align:right'>";
                    echo"</td></tr>";
                }
            }
        ?> 
        
        <br>
        <a href="movie1.php" class="button">Go To Home</a>
        <br>
    </body>
</html>