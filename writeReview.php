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
        <form name="myform" method="post" action="storeReview.php" onsubmit="return validateform()">
            <p>
                Enter Movie Name: 
                <input type="text" name="name"/>
            </p>
            <p>
                Enter Movie type : 
                <input type="text" name="type"/>
            </p>
            <p>
                Enter Director Name  : 
                <input type="text" name="dir"/>
            </p>

            <p>
                Enter Actor Name: 
                <input type="text" name="act"/>
            </p>


            <p>
                Write your Review: 
                <textarea name="review"></textarea>
            </p>

            <p>
                Enter your Rating (Out of 10): 
                <input type="text" name="rating" maxlength="2" size="2"/>

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