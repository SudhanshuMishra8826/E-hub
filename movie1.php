<?php
    #setcookie("name",$_POST['name'],time()+60);
    session_start();
    $_SESSION["user"]=$_POST["name"];
    $_SESSION["password"]=$_POST["pass"];
    $_SESSION["authuser"]=0;

    if(($_SESSION['user']=='sudhanshu') and ($_SESSION["password"]=="1234")){
        $_SESSION["authuser"]=1;
    }
    else{
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
                    width: 115px;
                    height: 25px;
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
        #define("name","Sudhanshu");
        include 'header.php';
        $name=$_SESSION["user"];
        echo "<h4>Hello ".$name." <h4><br><br>";
        $myfavmovie=urlencode("FightClub");
        echo "<a href=\"moviesite.php?favmovie=$myfavmovie\">";
        echo "Clicke here to know details about my favorite movie !!!";
        echo "</a><br/>";
        ?>
        <!--<a href="moviesite.php?movienum=5">Click here to see my top 5 Movies</a><br/>
        <a href="moviesite.php?movienum=10">Click here to see my top 10 Movies</a><br/> -->
        Or chose how many movie you would like to see:<br>
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
        <br>
        <a href="login.php" class="button">Logout</a>
    </body>
</html >   