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

            $title= $_POST["title"];
            $content=$_POST["content"];
            $forum=$_POST["forum"];


            $sql="Insert into forumposts(uid,forumtype,title,content) values (:uid,:forum,:title,:content)";
            $stmt=$pdo->prepare($sql);
            $stmt->bindParam(':uid', $_SESSION['user']);
            $stmt->bindParam(':forum', $forum);
            $stmt->bindParam(':title',$title);
            $stmt->bindParam(':content', $content);

            $stmt->execute();
            
            echo "Post Published : You will be redirected to forum whrer you can see your post<br>";
            header('Refresh: 1 ; viewforum.php?forumtype='.$forum);


?> 