<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>添加投票</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<?php include "header.php"; ?>

<?php include "menu.php"; ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><span class="glyphicon glyphicon-plus"></span></a></li>
            <li class="active">添加一个投票</li>
        </ol>
    </div><!--/.row-->



    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><span class="glyphicon glyphicon-info-sign"></span> 详细</div>
                <div class="panel-body">
                    <form class="form-horizontal" action="addvote_cl.php" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <!-- Name input-->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">投票名称</label>
                                <div class="col-md-9">
                                    <input id="name" name="vname" type="text" placeholder="团队名称" class="form-control">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-3 control-label" for="file"> 投票图片</label>
                                <div class="col-md-9">
                                    <input type="file" id="file" class="form-control" name="file">
                                    <div class="alert alert-info">
                                        <a href="#" class="close" data-dismiss="alert">
                                            &times;
                                        </a>
                                       图片大小不得超过5M 大小：269pz*228px
                                    </div>
                                </div>
                            </div>

                            <!-- Form actions -->
                            <div class="form-group">
                                <div class="col-md-12 widget-right">
                                    <button type="submit" class="btn btn-primary btn-md pull-right">提交</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>


        </div><!--/.col-->

        <div class="col-md-4">

            <div class="panel panel-primary">
                <div class="panel-heading dark-overlay"><span class="glyphicon glyphicon-calendar"></span>日历</div>
                <div class="panel-body">
                    <div id="calendar"></div>
                </div>
            </div>


        </div><!--/.col-->
    </div><!--/.row-->
</div>	<!--/.main-->


<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/chart.min.js"></script>
<script src="js/chart-data.js"></script>
<script src="js/easypiechart.js"></script>
<script src="js/easypiechart-data.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script>
    $('#calendar').datepicker({
    });

    !function ($) {
        $(document).on("click","ul.nav li.parent > a > span.icon", function(){
            $(this).find('em:first').toggleClass("glyphicon-minus");
        });
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    $(window).on('resize', function () {
        if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function () {
        if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
    })
</script>
</body>

</html>
