<?php
    #setcookie("name",$_POST['name'],time()+60);
    session_start();

    if($_SESSION['authuser']!=1){
        echo " Access not granted ";
        exit();
    }

?>
<?php
            
            #include 'header.php';
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "moviesdb";
            #echo "Movie Review of ".ucfirst($_POST['name'])."<br><br>";
                
            $dsn="mysql:host=".$servername.";dbname=".$dbname;
            $pdo=new PDO($dsn,$username,$password);

            $uid=$_SESSION['user'];
            $pname=isset($_GET['pname'])?$_GET['pname']:'';
            $pid=isset($_GET['pid'])?$_GET['pid']:'';

            $sql="Insert into cart values(:uid,:pid,:pname)";
            $stmt=$pdo->prepare($sql);
            $stmt->bindParam(':uid',$uid);
            $stmt->bindParam(':pid',$pid);
            $stmt->bindParam(':pname',$pname);
            #$stmt->bindParam(':pprice',$pprice);

            $stmt->execute();
            #echo $pprice;
            
            echo "Product Added to Cart";


?> 