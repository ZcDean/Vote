/**
 * Created by Administrator on 2016/5/14.
 */


    $(function () {


        $(".smallimg").click(function () {


            var img  = $(this).attr("src");

            $("#modal-body").html("<img src='"+img+"' width='100%'> ");

            $('#myModal').modal('toggle');
        });

        $(".delvote").click(function () {
            var id = $(this).siblings().eq(0).val();

            $.post("delvote.php",{vid:id},function(result,status){
                if(result == "success"){

                    $("#modal-body").html("删除成功");
                    $('#myModal').on('hide.bs.modal', function () {
                        location.reload();
                    });

                }else{
                    $("#modal-body").html("删除失败，请重试");

                }
                $('#myModal').modal('show');
            });

        });
    });


!function ($) {


    $(document).on("click","ul.nav li.parent > a > span.icon", function(){
        $(this).find('em:first').toggleClass("glyphicon-minus");
    });
    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
}(window.jQuery);

$(window).on('resize', function () {
    if ($(window).width() > 768) $('#sidebar-collapse').collapse('show');
});
$(window).on('resize', function () {
    if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide');
});