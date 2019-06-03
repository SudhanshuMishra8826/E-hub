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
                echo "Hello ".$_SESSION['user']."!!!!! <br>";
                echo "My Favorite movie is ";
                echo $_GET['favmovie']."<br>";
                echo "Rating = 5/5";
                echo "Good Movie";
            }
            else{
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
                echo "</ol>";
            }
        ?>
    </body>
</html >   