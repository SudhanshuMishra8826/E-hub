<?php
session_unset();
?>

<html>
    <head>
        <title> 
            Please Login
        </title>
    </head>
    <body>
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
            
             
    </body>
    
</html >   