<?php

    $host="localhost";
    $user="root";
    $pass="";
    $db_name="products";
    $connect= @mysql_connect($host,$user,$pass);

    if ($connect) {
        echo"connect";
       mysql_select_db("products");
    }
    else{
        echo "notconnected";
    }

$product_name= $_POST['productname'];
$product_price= $_POST['productprice'];
$product_model= $_POST['productmodel'];
$phone= $_POST['phone'];
$product_status= $_POST['productstatus'];
$product_country=$_POST['productcountry'];
$img_name = "none.png";
$submit= $_POST['add_product'];
if ($submit) {
    if ($product_name=="" or $product_price== "" or $product_model== "" or $product_country== "" or $phone=="" or $product_status=="") {
            echo " this  is not allowed ";
            require '../html/product.html';
                                                                                                                                 }
    else{
    $query="INSERT INTO products VALUES ('','$product_name','$product_price','$product_model','$phone','$product_status','$product_country','$img_name')";

    if (mysql_query($query)){
        echo "data entered";
        require '../html/products.php';

                            }
    else{

        echo "nothing entered";

        }   

    }
}

    


?>