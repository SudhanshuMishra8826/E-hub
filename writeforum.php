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
        <script>  
            function validateform(){  
            var name=document.myform.name.value;  
            var type=document.myform.type.value; 
            var dir=document.myform.dir.value;  
            var act=document.myform.act.value; 
            var review=document.myform.review.value;  
            var rating=document.myform.rating.value;  

            if (name==null || name==""||type==null || type==""||dir==null || dir==""||act==null || act==""||review==null || review==""||rating==null || rating==""){  
            alert("Any feild can't be blank");  
            return false;  
            }
            }

        </script>
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
        ?> 
        <div class="well" style="text-align:center">
        <form name="myform" method="post" action="storeforumposts.php" onsubmit="return validateform()">
            <p>
                Enter Title: 
                <input type="text" name="title"/>
            </p>

            <p>
                Chose one Forum:                 
                <input type="radio" name="forum" value="comic" checked> Commics<br>
                <input type="radio" name="forum" value="movies"> Movies<br>
            </p>
            <p>
                Enter Content : 
                <input type="text" name="content"/>
            </p>
            
            <p> 
                <input type="submit" name="submit" value="Submit"/>
            </p>
        </form>
        </div>

        <br>
        <a href="movie1.php" class="button">Go To Home</a>
    </body>
</html>