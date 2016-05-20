<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>江森自控-后台管理</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/bootstrap-table.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<?php include "check.php"; ?>
<?php include "header.php"; ?>

<?php include "menu.php"; ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="alert alert-warning">
        <a href="#" class="close" data-dismiss="alert">
            &times;
        </a>
        <strong>敬告！</strong>数据删除后不可恢复，请谨慎操作
    </div>
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><span class="glyphicon glyphicon-list"></span></a></li>
            <li class="active">投票内容列表</li>
        </ol>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-responsive" data-toggle="table"   data-show-refresh="true" data-show-toggle="true" data-show-columns="true"  data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" >
                        <thead>
                        <tr>
                            <th data-field="img" data-sortable="true">图片</th>
                            <th data-field="name"  data-sortable="true">投票名称</th>
                            <th data-field="num" data-sortable="true">票数</th>
                            <th data-field="cancle" data-sortable="true">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php include_once "../function.php";

                        $db = new Mysql("ok");

                        $arr = $db->getVoteContent();

                        foreach($arr as $row){

                        ?>

                        <tr>

                            <td><img src="../images/<?php echo $row['img'] ?>" width="100" class="smallimg"></td>
                            <td><?php echo $row["vname"] ?></td>
                            <td><?php echo $row["counts"] ?></td>
                            <td><button class="btn btn-info delvote"><span class="glyphicon glyphicon-trash color-orange"></span>删除</button>
                                <input type="hidden" value="<?php echo $row['id'] ?>" class="voteid"></td>
                        </tr>
                        <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!--/.row-->

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        系统通知
                    </h4>
                </div>
                <div class="modal-body" id="modal-body" style="text-align: center" >
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary"
                            data-dismiss="modal">关闭
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->

</div><!--/.main-->

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/chart.min.js"></script>
<script src="js/chart-data.js"></script>
<script src="js/easypiechart.js"></script>
<script src="js/easypiechart-data.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/bootstrap-table.js"></script>
<script src="js/app.js"></script>
</body>

</html>
