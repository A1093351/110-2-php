<?php
require("conn.php");
$pNO=$_GET["pNO"];

$SQL="SELECT * FROM photo WHERE pNO='$pNO'";

if($result=mysqli_query($link,$SQL)){
    while($row=mysqli_fetch_assoc($result)){
        $ppath=$row['ppath'];
        $pdate=$row['pdate'];
    }
}
?>

<h1>更新圖片</h1>
    <table>
        <form action="updatecheck.php" method="post" enctype="multipart/form-data">
            <tr>
                <td>圖片ID:</td>
                <td><?php echo $pNO;?><input type="hidden" name="pNO" value='<?php echo $pNO;?>'></td>
            </tr>
            <tr>
                <td>重新選擇圖片:</td>
                <td><input type="file" name="photo" accept="image/*"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="更新圖片"></td>
            </tr>
        </form>
    </table>