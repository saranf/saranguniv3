<?php
if(!isset($_POST['uname']) || !isset($_POST['psw'])) exit;

$mysql_hostname = "localhost";

$mysql_user = "root";

$mysql_password = "123456";

$mysql_database = "saranguniv3";

 

$link = mysqli_connect("127.0.0.1", "root", "123456", "saranguniv3");

$uname=$_POST['uname'];
$psw =$_POST['psw'];

echo $uname;
echo $psw;
echo "---------    \t\t\t";
session_start();   //세션 시작




    if($uname != null){  // uid값이 있으면


//$myusername=$uname; 

//$mypassword=$psw; 

//echo "$myusername.test";

    $sql="SELECT * FROM member WHERE m_name = '".$uname."' AND m_goeul = '".$psw."'"; //아뒤랑 비번값 대조

    $result=mysqli_query($link,$sql);

    $count=mysqli_fetch_row($result);
        
    print_r($count);
echo "---------    \t\t\t";

    print_r($count[0],$uname);
        
     if($uname==$count[0]){

        //session_register("uname");

        $_SESSION['login_user']=$uname;
    
        if(isset($_SESSION['login_user'])){header("location: ../index.php");}
     }
    

    else{
        $error="Your Login Name or Password is invalid";
    }


}

?>



 