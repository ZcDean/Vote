<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/14
 * Time: 10:15
 */
session_start();
if(isset($_SESSION["uid"])){
    if(isset($_POST["vid"])){


        $vid = $_POST["vid"];
        include "../function.php";

        $db = new Mysql("ok");

        $imgname = $db->getVoteImg($vid);
        $res = $db->delVote($vid);
        unlink("../images/".$imgname);

        if($res){
            echo "success";
        }else{
            echo "error";
        }
    }
}else{
    exit("请重新登录");
}