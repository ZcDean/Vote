<?php
/**
 * Created by PhpStorm.
 * User: zhangchao
 * Date: 2016/5/9
 * Time: 19:22
 */
ini_set('date.timezone','Asia/Shanghai');

if(strtotime(date("Y-m-d H:i:s")) > strtotime("2016-05-20 14:00:00") ){
    echo "overtime";
}else{

    require_once "function.php";

    $db = new Mysql("ok");

    $ip = get_client_ip();


    if(isset($_POST["vote"])){
        $vo = $_POST["vote"];

        if(!$db->checkVote($ip)){

            $sql = "insert into db_pollresult(ip,vname,addtime) VALUES (\"".$ip."\",\"".$vo."\",\"".date('Y-m-d')."\")";

            if($db->vote($sql)){
                echo "感谢您宝贵的一票！";
            }else{
                echo "系统繁忙，请重试！";
            }
        }else{

            echo "您已投票，无需重复投票！";
        }

    }

}


/**
 * 获取客户端IP地址
 * @return string
 */
function get_client_ip() {
    if(getenv('HTTP_CLIENT_IP')){
        $client_ip = getenv('HTTP_CLIENT_IP');
    } elseif(getenv('HTTP_X_FORWARDED_FOR')) {
        $client_ip = getenv('HTTP_X_FORWARDED_FOR');
    } elseif(getenv('REMOTE_ADDR')) {
        $client_ip = getenv('REMOTE_ADDR');
    } else {
        $client_ip = $_SERVER['REMOTE_ADDR'];
    }
    return $client_ip;
}