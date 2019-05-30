<!DOCTYPE html>
<html>
    <?php
        
        function seek($query){
            
            mysql_data_seek($query,0);
            echo"<table>";
            echo"<tr>";
            while( $row = mysql_fetch_array( $query ) ){
               
                echo "
                    <td><img class='pro_img' src='../Imgs/products/{$row['img_name']}'></td> 
                ";

            }
            echo"</tr>";
            mysql_data_seek($query,0);
            echo"<tr>";
            while( $row = mysql_fetch_array( $query ) ){
                
                echo "
                    <td><a class='product_name'>{$row['product_name']}<br>phone:<br> {$row['phone']}<br>price: <br>{$row['product_price']}</a></td>
                    

                ";                        
                

            }

            echo"</tr>";
            echo"</table>";
        }
    
    ?>    
<head>
	<title>Products</title>

    <link rel="stylesheet" type="text/css" href="../CSS/home_CSS.css">
    <link rel="stylesheet" type="text/css" href="../CSS/Products_CSS.css">
</head>




    <body>


        <?php

            $host="localhost";
            $user="root";
            $pass="";
            $db_name="products";
            $connect= @mysql_connect($host,$user,$pass);

            if ($connect) {
                mysql_select_db("products");
            }


            $result = mysql_query("SELECT * FROM products");

        ?>

        <div class="navbar">
            <img class="logo" src="../Imgs/logo.png">
            <ul>
                <li><a class="active" href="../home.html">Home</a></li>
                <div class="MainMenu">
                    <li><a href="">Products</a></li>
                    <li><a href="../html/about.html">About</a></li>
                </div>
            </ul>
        </div>

        <div class="header">

            <div class="title">Products</div>

        </div>

        <div class="search">
                
            <form style="float: left; margin-left: 50px;" action='../html/product.html'><input class='add_new' type='submit' name='login' value='sell'></form>
               
            <form action="../home.html"><input style="float: right;background-color: red;border-radius: 20px;border: none;font-size: 18px;" class="logout" type="submit" name="login" value="Logout"></form>

        </div>



        <tbody>
            <?php
                
                $selectSQL = 'SELECT * FROM `products`';
                if( !( $query = mysql_query( $selectSQL ) ) ){
                    echo 'Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error();
                }else{

                    if( mysql_num_rows( $query )==0 ){
                        echo "No Data";
                    }else{

                        seek($query,0);

                    }
                }         
            ?>
        </tbody>

        <?php mysql_close($connect); ?>

    </body>
</html>