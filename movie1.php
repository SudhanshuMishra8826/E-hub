<?php
    #setcookie("name",$_POST['name'],time()+60);
    session_start();
    if(isset($_POST['name'])&&isset($_POST["pass"]))
    {
        $_SESSION["user"]=$_POST['name'];
        $_SESSION["password"]=$_POST['pass'];

        $_SESSION["authuser"]=0;

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "moviesdb";
        #echo "Movie Review of ".ucfirst($_POST['num'])."<br><br>";

        $dsn="mysql:host=".$servername.";dbname=".$dbname;
        $pdo=new PDO($dsn,$username,$password);

        $sql="SELECT pass from users where name=?";
        $stmt=$pdo->prepare($sql);
        $stmt->execute([$_SESSION["user"]]);
        $row=$stmt->fetch(PDO::FETCH_ASSOC);

        if(($_SESSION["password"]==$row['pass'])){
        $_SESSION["authuser"]=1;
        }
        else if($_SESSION["authuser"]==1){
        }
        else{
        echo " Access not granted ";
        exit();
        }
    }
    elseif($_SESSION["authuser"]==1){
    }
    else{
        header("Location:login.php");
    }
    #$_SESSION["user"]=isset($_POST["name"])?$_POST["name"]:$_SESSION["user"];
    #$_SESSION["password"]=isset($_POST["pass"])?$_POST["pass"]:$_SESSION['password'];
    

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
        #define("name","Sudhanshu");
        include 'header.php';
        $name=$_SESSION["user"];
        echo "<h2>Hello ".ucfirst($name)." !!!!!! </h2><br>";
        $myfavmovie=urlencode("FightClub");
       
        ?>
        <!--<a href="moviesite.php?movienum=5">Click here to see my top 5 Movies</a><br/>
        <a href="moviesite.php?movienum=10">Click here to see my top 10 Movies</a><br/> -->
        
        <div class='well' style="text-align:center">
        <form method="post" action="review.php">
            <p>
                <input style="width:400px;height:40px;margin:15px;" type='text' name='num' placeholder="Search for your favorite movie here"/>
                <br/>
            </p>
            <input type="submit" name="submit" value="Submit"/>
        </form>
        </div>
        <div class="well" style="text-align:center">
        <a href="bb.php">
        Checkout Our Forums for more Content
        </a>
        <br/>
        </div>
        <div class='well' style="text-align:center">
        How many movie you would like to see:
        <form method="post" action="moviesite.php">
            <p>
                Enter number of movies (upto 10):
                <input type='text' name='num' maxlength="2" size="2"/>
                <br/>
                Check to sort them alphabatically : 
                <input type='checkbox' name='sorted'/>
                <br/>
            </p>
            <input type="submit" name="submit" value="Submit"/>
        </form>
        </div>
        <div class="well" style="text-align:center">
        <a href="moviesite.php?favmovie=$myfavmovie">
        Clicke here to know details about my favorite movie !!!
        </a><br/>
        </div>
        
        <br> 
        <br>
        <a href="writeReview.php" class="button">Add Movie & Write Review</a> 
        <br>
        <a href="listproducts.php" class="button">Checkout Our products</a> 
        <br>
        <a href="viewcart.php" class="button">View My Cart</a>
        <br>
        <a href="login.php" class="button">Logout</a> 


    </body>
</html >   