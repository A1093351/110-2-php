<?php
require("conn.php");

$SQL="SELECT * FROM photo";

echo "<h1>我的相簿</h1>";
$count=1;

if($result=mysqli_query($link,$SQL)){
    echo "<table border='1' width=600>";

    while($row=mysqli_fetch_assoc($result)){
        if(($count%3)==1){
            echo "<tr>";
            echo "<td>"."<a href='\04".$row['ppath']."'>"."<img src='\04".$row['ppath']."' width=200>"."</a>";
            echo "</br>";
            echo "<a href='photoupdate.php?pNO=".$row["pNO"]."'>"."更新圖片"."</a>"."</td>";
            $count+=1;
        }
        elseif(($count%3)==0)
        {
            
            echo "<td>"."<a href='\04".$row['ppath']."'>"."<img src='\04".$row['ppath']."' width=200>"."</a>";
            echo "</br>";
            echo "<a href='photoupdate.php?pNO=".$row["pNO"]."'>"."更新圖片"."</a>"."</td>";
            echo "</tr>";
            
            $count+=1;
        }
        else{
            
            echo "<td>"."<a href='\04".$row['ppath']."'>"."<img src='\04".$row['ppath']."' width=200>"."</a>";
            echo "</br>";
            echo "<a href='photoupdate.php?pNO=".$row["pNO"]."'>"."更新圖片"."</a>"."</td>";
            
            $count+=1;
        }
        
        
        
        
        
    }
    echo "<table>";
}

?>