<?php
require("conn.php");

$pNO=$_POST["pNO"];

if($_FILES['photo']['name']){
    $ppart=pathinfo($_FILES['photo']['name']);
    $extpname=$ppart['extension'];
    echo $extpname.'</br>';
}
else
{
    echo "alert('請選擇圖片');";
    echo "<meta http-equiv='Refresh' content='0; url=photoupdate.php?pNO=".$_POST["pNO"]."'>";
}

$finalphoto="Photo_".time().".".$extpname;
$now=time();

$SQL="UPDATE photo SET ppath='$finalphoto', pdate='$now' WHERE pNO='$pNO'";

if(copy($_FILES['photo']['tmp_name'],$finalphoto)){
    if(mysqli_query($link, $SQL)){
       echo "alert('圖片更新成功');";
       echo "<meta http-equiv='Refresh' content='0; url=photolist.php'>";
    }
    else{
       echo "alert('圖片更新失敗');";
       echo "<meta http-equiv='Refresh' content='0; url=photo.php'>";
    }
}
else{
    echo "alert('圖片更新失敗');";
    echo "<meta http-equiv='Refresh' content='0; url=photo.php'>";
}

?>