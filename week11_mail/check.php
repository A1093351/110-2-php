<?php

require("conn.php");

if($_POST["email"]!=null){
    $email=$_POST["email"];

    $SQL="SELECT * FROM email WHERE eMail='$email'";
    $result=mysqli_query($link, $SQL);

    if(mysqli_num_rows($result)==1){
        echo "<h3>您早已訂閱</h3>";
        echo "<meta http-equiv='Refresh' content='5; url=mailWrite.php'>";
    }
    else{
        echo "<h3>訂閱成功</h3>";
        $iSQL="INSERT INTO email (eMail) VALUES('$email')";
        if(mysqli_query($link, $iSQL)){
            echo "<script type='text/javascript'>";
            echo "alert('訂閱成功');";
            echo "</script>";
            echo "<meta http-equiv='Refresh' content='5; url=mailWrite.php'>";
        }
        else{
            echo "<script type='text/javascript'>";
            echo "alert('訂閱失敗');";
            echo "</script>";
            echo "<meta http-equiv='Refresh' content='5; url=mail.php'>";
        }
    }
}
else{
    echo "<script type='text/javascript'>";
    echo "alert('請輸入email，在三秒後跳轉回上頁');";
    echo "</script>";
    echo "<meta http-equiv='Refresh' content='3; url=mail.php'>";
}


?>