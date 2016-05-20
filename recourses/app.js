

$(function () {

    $(document).on('click', '.button', function () {

        if (!is_weixn()) {
            $.alert("请先关注江森微信公众号");
        } else {
            var val = $(this).parent().find(".val").html();
            $.ajax({
                type: 'post',
                url: 'vote.php',
                data: {
                    vote: val
                },
                success: function (data, status) {
                    if (status == "success") {
                        if(data == "overtime"){
                            $.toast("投票已结束,页面跳转中...");
                            setTimeout(function () {
                                location.href = "result.php";
                            },2000)
                        }else{
                            $.alert(data, function () {
                                location.href = "result.php";
                            });
                        }

                    } else {
                        $.alert("系统繁忙，请重试");
                    }
                }
            });
        }
    });


    $(document).on('click','.open-about', function () {
        var img = $(this).attr("src");
        $(".bigimg").attr("src",img);
        $.popup('.popup-about');
    });

    $(".bigimg").click(function () {
        $.closeModal(".popup-about");
    });

    

});


/**
 * 是否通过微信浏览器访问
 */

function is_weixn(){
    var ua = navigator.userAgent.toLowerCase();
    var isok = false;
    if(ua.match(/MicroMessenger/i) == "micromessenger") {
        isok = true;
    }

    return isok;
}

function closeLoading(){
    $(".loader").css("display","none");
    $(".container").css("display","block !important");
}
