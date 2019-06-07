<?php
session_start();
session_unset();
?>

<html>
    <head>
        <title> 
            Please Login
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
            include 'header.php';
        ?>
        <div class='well' style='text-align:center'>
        <form method="post" action="movie1.php">
            <p>
                Username : 
                <input type="text" name="name"/>
            </p>
            <p>
                Password : 
                <input type="Password" name="pass"/>
            </p>
            <p> 
                <input type="submit" name="submit" value="Submit"/>
            </p>
        </form>
        <a href="signup.php">SignUp</a> 

        </div>
        <a href="index.html" class="button"><h4>Home Page</h4></a> 
            
             
    </body>
    
</html >   