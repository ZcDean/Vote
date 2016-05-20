<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/14
 * Time: 11:04
 */
header("Content-type: text/html; charset=utf-8");
include "../function.php";

$db = new Mysql("ok");

$vname = $_POST["vname"];


$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/jpg")
        || ($_FILES["file"]["type"] == "image/pjpeg")
        || ($_FILES["file"]["type"] == "image/x-png")
        || ($_FILES["file"]["type"] == "image/png"))
    && ($_FILES["file"]["size"] < 5000000)
    && in_array($extension, $allowedExts))
{
    if ($_FILES["file"]["error"] > 0)
    {
        echo "文件上传错误!错误码: " . $_FILES["file"]["error"] . "<br>";
    }
    else
    {

        $newname = date("Ymdhis").rand(1000,9999).".".$extension;

        $m=move_uploaded_file($_FILES["file"]["tmp_name"],"../images/" . $newname);

        if($m){
            $res = $db->addVote($vname,$newname);
            if($res){
                echo "<script>alert('上传成功'),location.href='index.php'</script>";
            }else{
                unlink("../images/".$newname);
                echo "<script>alert('上传失败，请重试'),location.href='addvote.php'</script>";
            }
        }else{
            echo "<script>alert('上传失败，请重试'),location.href='addvote.php'</script>";
        }
    }
}
else
{
    echo "Invalid file";
}