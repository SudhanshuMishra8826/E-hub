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
            
            include 'header.php';
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "moviesdb";
            #echo "Movie Review of ".ucfirst($_POST['num'])."<br><br>";
                
            $dsn="mysql:host=".$servername.";dbname=".$dbname;
            $pdo=new PDO($dsn,$username,$password);

            echo "<h2 style='text-align: center'> Your Cart </h4><br>";
            $sql2="SELECT pid from cart where uid=?";
            $stmt2=$pdo->prepare($sql2);
            $stmt2->execute([$_SESSION['user']]);
            echo"<table class='table' border='3' cellpadding='10' align='center'>";
            echo"<th>Product Name</th>";
            echo"<th>Details</th>";
            echo"<th>Price (INR)</th>";
            echo"<th>Image</th>";
            echo"<th>Buy</th>";
            while($rows2=$stmt2->fetchAll(PDO::FETCH_ASSOC)){
                foreach($rows2 as $row){
                    $sql3="SELECT * from product where pid= ?";
                    $stmt3=$pdo->prepare($sql3);
                    $stmt3->execute([$row['pid']]);
                    while($row3=$stmt3->fetch(PDO::FETCH_ASSOC)){
                            #var_dump($row3);
                            echo"<tr>";
                            echo"<td>";
                            echo ucfirst($row3['pname']);
                            echo"</td>";
                            echo"<td>";
                            echo ucfirst($row3['pdetail']);
                            echo"</td>";
                            echo"<td>";
                            echo ucfirst($row3['pprice']);
                            echo"</td>";
                            echo"<td>";
                            echo "<a target='_blank' href=".$row3['pimage']."> View</a>";
                            echo"</td>";
                            echo"<td>";
                            echo "<div class='board'>
                                    <form method='POST'>
                                    <script src='https://checkout.razorpay.com/v1/checkout.js'
                                        data-key='rzp_test_OeMS2mGVcm5mDl'
                                        data-amount='500'
                                        data-buttontext='Pay Now'
                                        data-name='Merchant Name'
                                        data-description='Purchase Description'
                                        data-image='https://your-awesome-site.com/your_logo.jpg'
                                        data-prefill.name='Sudhanshu Mishra'
                                        data-theme.color='#F37254'
                                    ></script>
                                    <input type='hidden' value='Hidden Element' name='hidden' >
                                    </form>      
                                </div>";
                            echo"</td>";
                            echo"</tr>";
                        }

                    }
                }
                echo"</table>";
                echo "<div class='board' align=center>
                                    <form method='POST'>
                                    <script src='https://checkout.razorpay.com/v1/checkout.js'
                                        data-key='rzp_test_OeMS2mGVcm5mDl'
                                        data-amount='500'
                                        data-buttontext='Pay for all'
                                        data-name='Merchant Name'
                                        data-description='Purchase Description'
                                        data-image='https://your-awesome-site.com/your_logo.jpg'
                                        data-prefill.name='Sudhanshu Mishra'
                                        data-theme.color='#F37254'
                                    ></script>
                                    <input type='hidden' value='Hidden Element' name='hidden' >
                                    </form>      
                                </div>";

        ?> 
        <br>
        <br>
        <a href="movie1.php" class="button">Go To Home</a>
        <br>
        <a href="writeReview.php" class="button">Add Movie & Write Review</a>
        <br>
        <a href="login.php" class="button">Logout</a> 

        
    </body>
</html>