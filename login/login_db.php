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
session_start();   //세션 시작




    if($uname != ""){  // uid값이 있으면





    $myusername=$uname; 

    $mypassword=$psw; 

 

    $sql="SELECT * FROM member WHERE m_name = '".$myusername."' AND m_goeul = '".$mypassword."'"; //아뒤랑 비번값 대조

    $result=mysqli_query($link,$sql);

    $count=mysqli_fetch_row($result);
        
    print_r($count);

    print_r($count[0],$myusername);
     if($myusername==$count[0])

    {

        //session_register("uname");

        $_SESSION['login_user']=$myusername;

    
          if(!isset($_SESSION['login_user'])){header("location: ../index.php");}
            

    }

    else 

    {

        $error="Your Login Name or Password is invalid";

    }



}

?>



 