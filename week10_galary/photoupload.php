<?php
require("conn.php");

// 取得副檔名

if($_FILES['photo']['name']){
    $pathpart=pathinfo($_FILES['photo']['name']);
    $extpname=$pathpart['extension'];
}
else
{
echo "<script type='text/javascript'>";    
echo "alert('請選擇圖片');";
echo "</script>";
echo "<meta http-equiv='Refresh' content='0; url=photo.php'>";
}


//產生新檔案名稱
$finalphoto="Photo_".time().".".$extpname;

$time = time();
// 圖片路徑加入資料庫
$SQL = "INSERT INTO photo (ppath, pdate) VALUES ('$finalphoto','$time')";

// 上傳成功與否
if(copy($_FILES['photo']['tmp_name'],$finalphoto)){
    if(mysqli_query($link, $SQL)){
        echo "<script type='text/javascript'>";
        echo "alert('圖片上傳成功');";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=photolist.php'>";
    }
    else{
        echo "<script type='text/javascript'>";
        echo "alert('圖片上傳失敗');";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=photo.php'>";
    }
}
else{
    echo "<script type='text/javascript'>";
    echo "alert('圖片上傳失敗');";
    echo "</script>";
    echo "<meta http-equiv='Refresh' content='0; url=photo.php'>";
}

?>