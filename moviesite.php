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
        #define("name","Sudhanshu");
            include 'header.php';
            $favmovies=array('FightClub',
                        'Life of Brian',
                        'Stripes',
                        'Office Space',
                        'The Holy Grail',
                        'Matrix',
                        'Terminator 2',
                        'Star trek 4',
                        'Caddyshake',
                        'Avengers Endgame');
            if(isset($_GET['favmovie'])){
                echo "<h2><b>Hello ".$_SESSION['user']."!!!!!</h2><br>";
                echo"<div class='well' style='text-align:center'>"; 
                echo "My Favorite movie is ";
                echo $_GET['favmovie']."<br>";
                echo "Rating = 5/5<br>";
                echo "Good Movie<br><br></b>";
                echo "</div>";
            }
            else{
                echo"<div class='well' style='text-align:center'>"; 
                echo "My top ".$_POST['num']." Favorite movies are ";
                if(isset($_POST['sorted'])){
                    sort($favmovies);
                    echo "(Sorted Alphabatically) ";
                }
                echo ":<br>";
                $numlist=0;
                echo "<ol>";
                while($numlist<$_POST['num']){
                    echo "<li>";
                    echo $favmovies[$numlist];
                    echo "</li>";
                    $numlist=$numlist+1;
                }
                echo"</div>";
                echo "</ol>";
            }
            echo"<br>";
            echo"<a href=\"writeReview.php\" class=\"button\">Add Movie & Write Review</a>"; 
    
            echo"<br>";
            echo"<a href=\"login.php\" class=\"button\">Logout</a>"; 
        ?>
    </body>
</html >   