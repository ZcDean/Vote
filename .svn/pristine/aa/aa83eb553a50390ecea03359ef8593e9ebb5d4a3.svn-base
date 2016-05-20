<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>江森自控无锡传奇江湖行</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="recourses/app.css">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.min.css">
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm-extend.min.css">
    <!--<script src="recourses/jquery.min.js"></script>-->

</head>
<body class="body" onload="closeLoading()">
<div class="loader">
    <div class="loader-inner line-scale">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<div class="page-group container">
    <?php
    include_once "function.php";

    ?>
    <div class="content topbox">
        <img src="images/topbg.png">
        <div class="content-box">
            <?php
            $db = new Mysql("ok");
            $vote_arr = $db->getVoteContent();

            foreach($vote_arr as $row){

                ?>
                <div class="box">
                    <img src="images/<?php echo $row["img"] ?>" class="open-about">
                <span class="votetitle">
                    <?php echo $row["vname"] ?><span class="votenum"><?php if($row["counts"] == "") echo 0 ;else echo $row["counts"] ?>票</span>
                </span>
                    <button class="alert-text-callback button">立即投票</button>
                    <div class="val"><?php echo $row["vname"] ?></div>
                </div>
            <?php } ?>
        </div>
        <p>投票方式</p>
        <ul>
            <li>关注公众号，为喜欢的团队投票吧！</li>
            <li>每人一票，投票时间截止为2016年6月X日</li>
        </ul>
    </div>

</div>

<div class="popup popup-about mypopub">
    <div class="content-block">
        <p><a href="#" class="close-popup">关闭</a></p>
        <img src="" class="bigimg">
    </div>
</div>

</body>

<script type='text/javascript' src='//g.alicdn.com/sj/lib/zepto/zepto.min.js' charset='utf-8'></script>
<script type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm.min.js' charset='utf-8'></script>
<script type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm-extend.min.js' charset='utf-8'></script>
<script src="recourses/app.js"></script>

</html>
