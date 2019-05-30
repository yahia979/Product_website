<?php

	$host="localhost";
    $user="root";
    $pass="";
    $db_name="users";
    $connect= @mysql_connect($host,$user,$pass);

    if ($connect) {
       mysql_select_db("users");
                  }
       
    $user_name = $_POST['username'];
    $password = $_POST['pass'];
    $submit= $_POST['login'];
    
    if($submit){
        
        
        $sql = "SELECT * FROM user_info WHERE user_name = '$user_name' AND password = '$password'";
        $result = mysql_query($sql);
        
        
        if(mysql_num_rows($result)!=0){
            require("../html/products.php");
            
        }
        else{
            
            require("../html/login.html");
            // incomplete
            
        }}

?>