<html>
    <head>
        <title> 
            Dashboard
        </title>
    </head>
    <body>
        <?php
            
            #include 'header.php';
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "moviesdb";
            echo "Movie Review of ".ucfirst($_POST['name'])."<br><br>";
                
            $dsn="mysql:host=".$servername.";dbname=".$dbname;
            $pdo=new PDO($dsn,$username,$password);

            $name = $_POST["name"];
            $pass=$_POST["pass"];
            
            $sql="Insert into users(name,pass) values (:name,:pass)";
            $stmt=$pdo->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':pass', $pass);
            $stmt->execute();
            header('location: login.php');


?> 