<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>江森自控-管理员登录</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading"><span class="color-teal">江森自控</span>-管理员登录</div>
            <div class="panel-body">
                <form role="form" method="post" action="login.php">
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="用户名" name="uid" type="text" autofocus="" required="">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="密码" name="pwd" type="password"  required="">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input name="remember" type="checkbox" value="Remember Me">记住密码
                            </label>
                        </div>
                        <input class="form-control btn btn-primary" type="submit" value="登录">
                    </fieldset>
                </form>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->


<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/chart.min.js"></script>
<script src="js/chart-data.js"></script>
<script src="js/easypiechart.js"></script>
<script src="js/easypiechart-data.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script>
    !function ($) {
        $(document).on("click","ul.nav li.parent > a > span.icon", function(){
            $(this).find('em:first').toggleClass("glyphicon-minus");
        });
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    $(window).on('resize', function () {
        if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
    });
    $(window).on('resize', function () {
        if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
    })
</script>
</body>

</html>


<?php

if(isset($_POST["uid"]) && isset($_POST["pwd"])){
    include_once "../function.php";


    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $db = new Mysql("login");

    $isok = $db->checkUser($uid,$pwd);

    if($isok){
        $_SESSION["uid"] = $uid;
        header("Location: index.php");
        exit;
    }else{

        ?>
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert">
                    &times;
                </a>
                <strong>登录失败!</strong>
            </div>
        </div>
    <?php }

}else{
    @session_destroy();
}
?>



