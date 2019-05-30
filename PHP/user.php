<?php

    $host="localhost";
    $user="root";
    $pass="";
    $db_name="users";
    $connect= @mysql_connect($host,$user,$pass);

    if ($connect) {
       mysql_select_db("users");
    }

$user_name= $_POST['Username'];
$password= $_POST['pass'];
$comfirm_pass=$_POST['pass_confirm'];
$email= $_POST['Email'];
$address=$_POST['address'];
$phone= $_POST['phone'];
$gender= $_POST['Gender'];
$country= $_POST['country'];
$submit= $_POST['SignUP'];
if ($submit) {
    if ($user_name=="" or $password=="" or $email=="" or $country=="" or $gender =="" or $comfirm_pass != $_POST['pass'] or $phone=="" or $address =="") {

                        echo "pls, enter data correctly";
            require("../html/signup.html");
        }
    else{
    $query="insert into user_info values('','$user_name','$password','$email','$gender','$country','$address','$phone')";

    if (mysql_query($query)){

echo "you Signed UP";
require("../html/login.html");
    }
    else{

        echo "nothing entered";

    }   

}
}

    


?>