<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/9
 * Time: 11:23
 */

class Mysql{

    private static $_PDO ;

    function __construct($mod = ""){
   $dsn = "mysql:host=localhost;dbname=db_vote";
        if($mod != ""){
            if(!isset(self::$_PDO)){

                

                 self::$_PDO = new PDO($dsn,"root","");
                self::$_PDO->exec("SET NAMES 'utf8'");
            }

        }else{
            if(!isset($_SESSION["uid"])){

                header("location:login.php");
                exit ;
            }else{
                if(!isset(self::$_PDO)){

                   

                     self::$_PDO = new PDO($dsn,"root","");
                    self::$_PDO->exec("SET NAMES 'utf8'");
                }
            }

        }



    }


    function __destruct(){

        if(isset(self::$_PDO)){

            self::$_PDO = null;
        }

    }

    /**
     * 投票
     * @param $sql
     * @return mixed
     */
    function vote($sql){

        return  self::$_PDO->exec($sql);

    }

    /**
     * 检查是否已投票
     * @param $ip
     * @return bool
     */
    function checkVote($ip){

        $sql = "SELECT * FROM db_pollresult WHERE ip=\"".$ip."\"";

        $res = self::$_PDO->query($sql)->fetchAll();

        if(count($res) == 1){

            return true;
        }

        return false;

    }


    /**
     * 获取投票数量
     * @param $res
     * @return int
     */
    function getVoteNum($res){

        $sql = "SELECT COUNT(vname) counts from db_pollresult where vname=\"".$res."\"";
        $res=self::$_PDO->query($sql)->fetch();
        if($res){

            return $res["counts"];
        }

        return 0;
    }


    /**
     * 获取所有投票结果
     * @param $sql
     * @return array
     */
    function getVote(){

        $sql = "select vname from db_pollresult";

        $res = self::$_PDO->query($sql)->fetchAll();

        return $res;
    }


    /**
     * 获取所有投票的票数
     * @return array
     */
    function getVoteTypeNum(){
        $sql = "SELECT vname, count(*) counts from db_pollresult group by vname";

        $res = self::$_PDO->query($sql)->fetchAll();

        return $res;
    }


    /**
     * 获取投票内容及票数
     * @return array
     */
    function getVoteContent(){
        $sql = "select b.id, b.vname , a.counts, b.img from (select vname,count(vname) counts from db_pollresult GROUP by vname) a right join db_vote b on a.vname = b.vname ";
        $res=self::$_PDO->query($sql)->fetchAll();

        return $res;
    }


    /**
     * 删除一条投票记录
     * @param $vid
     * @return bool
     */
    function delVote($vid){
        $sql = "DELETE FROM db_vote WHERE id =".$vid;

        $res = self::$_PDO->exec($sql);

        if($res){
            return true;
        }

        return false;
    }


    /**
     * 添加投票
     * @param $arr
     * @return bool
     */
    function addVote($name1,$name2){
        $sql = "INSERT INTO db_vote(vname,img) VALUES (\"".$name1."\",\"".$name2."\")";
        $res = self::$_PDO->exec($sql);

        if($res){
            return true;
        }

        return false;
    }
    /**
     * 判断是否成功登录
     * @param $uid
     * @param $pwd
     * @return bool
     */
    function checkUser($uid,$pwd){
        $sql = "SELECT * FROM db_user WHERE uid=\"".$uid."\" and pwd = \"".$pwd."\"";
        $res = self::$_PDO->query($sql)->fetch();

        if($res && $res["uid"] == $uid && $res["pwd"] == $pwd){
            return true;
        }

        return false;
    }

    /**
     * 获取一张图片
     * @param $VID
     * @return mixed
     */
    function getVoteImg($vid){
        $sql = "SELECT img FROM db_vote WHERE id =".$vid;
        $res = self::$_PDO->query($sql)->fetch();

        return $res["img"];
    }
}


