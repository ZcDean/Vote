<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>江森自控无锡传奇江湖行-投票结果</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="recourses/app.css">
    <script src="recourses/jquery-1.11.0.min.js"></script>
    <script src="recourses/highcharts.js"></script>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.min.css">
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm-extend.min.css">

</head>
<body class="body">
<?php

require_once "function.php";

$db = new Mysql("ok");

$voteType_arr=$db->getVoteContent();

$n = ceil(count($voteType_arr)/5);

$str = "[";

foreach($voteType_arr as $row){
    if($row["counts"] != ""){
        $str .= "[" ;
        $str .= "\"".$row["vname"]."\",".$row["counts"];
        $str .= "]";
        $str .= ",";
    }
}
$str = substr($str,0,-1);

$str .= "]";


?>
<div class="page-group">
    <!--    <header class="bar bar-nav">-->
    <!--        <h1 class="title">投票结果</h1>-->
    <!--    </header>-->
    <div class="content native-scroll" >
        <div id="chart" style="width: 100%;height:450px;margin: 0 auto">
        </div>
        <div class="content-block-title">投票详情</div>
        <div class="list-block media-list">
            <ul>
                <?php
                foreach($voteType_arr as $data) {

                    ?>
                    <li>
                        <a href="#" class="item-link item-content">
                            <div class="item-media">
                                <img src="images/<?php echo $data['img'] ?>" width="80">
                            </div>
                            <div class="item-inner">
                                <div class="item-title-row">
                                    <?php echo $data['vname'] ?>
                                </div>
                                <div class="item-text">
                                    投票总数：<?php echo $data['counts']==""?0:$data['counts']?>
                                </div>
                            </div>
                        </a>
                    </li>
                    <?php

                }
                ?>
            </ul>
        </div>

    </div>
</div>


</body>

<script>
    $(function () {


        var chart = {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        };
        var title = {
            text: '徒步20里团队投票饼状图'
        };
        var tooltip = {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        };
        var plotOptions = {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        };
        var series= [{
            type: 'pie',
            name: '比重',
            data: <?php echo $str?>
        }];

        var json = {};
        json.chart = chart;
        json.title = title;
        json.tooltip = tooltip;
        json.series = series;
        json.plotOptions = plotOptions;
        $('#chart').highcharts(json);

    });

</script>
<script type='text/javascript' src='//g.alicdn.com/sj/lib/zepto/zepto.min.js' charset='utf-8'></script>
<script type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm.min.js' charset='utf-8'></script>
<script type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm-extend.min.js' charset='utf-8'></script>
<script src="recourses/app.js"></script>
</html>
