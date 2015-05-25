//
//$('.form_date').datetimepicker({
//    language:  'fr',
//    weekStart: 1,
//    todayBtn:  1,
//    autoclose: 1,
//    todayHighlight: 1,
//    startView: 2,
//    minView: 2,
//    forceParse: 0
//});
$(".main section").css("min-height",($(window).height()-275)+"px");

(function(){

    function music(obj,data){
        var tr = $("<tr>",{

        }).appendTo(obj);

        $("<th>",{
            "text":data.musicName
        }).appendTo(tr);

        $("<th>",{
            "text":data.singer
        }).appendTo(tr);

        $("<th>",{
            "text":data.you
        }).appendTo(tr);

        $("<th>",{
            "text":data.contain,
        }).appendTo(tr);

        $("<th>",{
            "text":data.me
        }).appendTo(tr);

        $("<th>",{
            "html":data.time
        }).appendTo(tr);

        $("<th>",{
            "text":data.excellent
        }).appendTo(tr);

        if(data.operation == 1){
            $("<th>",{
                "html":"<span class='played' title='该歌曲已经播放'>已采纳</span>"
            }).appendTo(tr);
        }else{
            var th = $("<th>",{

            }).appendTo(tr);
            var play = $("<span>",{
                "class":"play",
                "title":"播放歌曲，并将消息推送给该用户",
                "html":"采纳"
            }).appendTo(th);
            $("<span>",{
                "html":"/"
            }).appendTo(th);
            var cancel = $("<span>",{
                "class":"cancel",
                "title":"将该条歌曲消息删除",
                "html":"忽略"
            }).appendTo(th);
        }

    }
    function notice(obj,data){

        var notice = $("<div>",{
            "class":"notice"
        }).appendTo(obj);

        $("<p>",{
            "class":"notice-title",
            "text":data.title
        }).appendTo(notice);

        $("<p>",{
            "class":"notice-content",
            "text":data.content
        }).appendTo(notice);

        $("<p>",{
            "class":"notice-time",
            "text":data.time
        }).appendTo(notice);

    }


    function statistics(obj,data){

        var tr = $("<tr>",{

        }).appendTo(obj);

        $("<th>",{
            "text":data.num
        }).appendTo(tr);

        $("<th>",{
            "text":data.music
        }).appendTo(tr);

        $("<th>",{
            "text":data.musicTime
        }).appendTo(tr);

        $("<th>",{
            "text":data.excellentNum
        }).appendTo(tr);

        $("<th>",{
            "text":data.comprehensive
        }).appendTo(tr);

    }

    function illegal(obj,data){

        var button = $("<button>",{
            "type":"submit",
            "text":data.data,
            "class":"btn btn-default",
            "title":"点击删除当前违规字"
        }).appendTo(obj);

        $("<i>",{
            "class":"iconfont",
            "html":"&#xe60a;"
        }).appendTo(button);
    }

    var section = $(".main section");
    var menu = $(".menu tr");
    var i = "0";
    menu.on("click",function(){
        if($(this).attr("num") != i){
            i = $(this).attr("num");
            console.log(i);
            menu.removeClass("onclick");
            $(menu[i]).addClass("onclick");
            section.css("display","none");
            $(section[i]).css("display","block");
        }
    });
    var musicobj = $(".music tbody");
    var statisticsobj = $(".statistics tbody");
    var presentobj = $(".notice .present");
    var historyobj = $(".notice .history");
    var illegalobj = $(".illegal .illegal-word");
//begin ajax;


    var formBool = 1;
    $(".notice .btn").on("click",function(){
        var title = $("#title").val();
        var control = $("#control").val();
        var data = {};
        var bool = 1;
        if(title == ""){
            $(".notice .formTitle").addClass("has-error");
            bool = 0;
        }else{
            $(".notice .formTitle").removeClass("has-error");
        }
        if(control == ""){
            $(".notice .formControl").addClass("has-error");
            bool = 0;
        }else{
            $(".notice .formControl").removeClass("has-error");
        }
        if(formBool && bool){
            formBool = 0;
           data.title = title;
           data.control = control;
          // var data={title:title,control:control};
            $.ajax({
                //地址
                url: "http://localhost/Music/public/announcement/create",
                type: 'post',
                // data: {title:title},
                data:{title:title,control:control},
            success: function () {
                    $("#title").val("");
                    $("#control").val("");
                    alert("发表新公告成功！");
                    formBool = 1;
                },
                error: function(){
                    alert("服务器连接失败！");
                    formBool = 1;
                }
            });
        }
    });

    $(".notice .top span").on("click",function(){
        var title = $(".present .notice-title").html();
        var content = $(".present .notice-content").html();
        $("#title").val(title);
        $("#control").val(content);
    });

    var illegalBool = 1;
    $(".illegal .btn").on("click",function(){
        var illegal = $("#illegal").val();
        var data = {};
        if(illegal == ""){
            $(".illegal .formTitle").addClass("has-error");
        }else{
            illegalBool = 0;
            $(".illegal .formTitle").removeClass("has-error");
            data.illegal = illegal;
            $.ajax({
                //地址
                url: "http://localhost/Music/public/word/create",
                type: 'POST',

                    data: {illegal:illegal},

                success: function () {
                    $("#illegal").val("");
                    alert("添加违规字成功！");
                    illegalBool = 1;
                },
                error: function(){
                    alert("服务器连接失败！");
                    illegalBool = 1;
                }
            });
        }
    });

    $(document).ready(function(){
        //ajax返回公告数据

            $.ajax({
                url: "http://localhost/Music/public/announcement/index",
                type: "get",
                dataType: "json",
                contentType: "application/json;charset=utf-8",
                success: function(msg) {
                    notice(presentobj,{"content": msg[0].content,"time":msg[0].time});

                    for(var i=0;i<msg.length;i++)
                    notice(historyobj,{"content": msg[i].content,"time":msg[i].time});

                },
                error: function(xhr) {
                    alert("there is something wrong");
                }
            });

   // ajax 违规字管理
        $("#word").click(function(){
            $.ajax({
                url: "http://localhost/Music/public/word/index",
                type: "get",
                dataType: "json",
                contentType: "application/json;charset=utf-8",
                success: function(msg) {
                    for(var p=0;p<msg.length;p++) {
                        illegal(illegalobj,{"data":msg[p].word});//违规字设置

                    }

                },
                error: function(xhr) {
                    alert("连接服务器失败");
                }
            });});

    });


//歌曲管理
    $(document).ready(function() {

        $("#music").click(function () {
            $.ajax({
                url: "http://localhost/Music/public/music/show",
                type: "get",
                dataType: "json",
                contentType: "application/json;charset=utf-8",
                success: function (msg) {
                    for (var j = 0; j < msg.length; j++) {
                        music(musicobj, {
                            //"musicName": msg[j].music.split("|")[0],
                            "musicName": msg[j].music.split("|")[0],
                            "singer": msg[j].music.split("|")[1],
                            "you": msg[j].recieve_name,
                            "contain": msg[j].content,
                            "me": msg[j].send_name,
                            "time": msg[j].time,
                            "excellent": msg[j].goods,
                            "operation": 0
                        });
                    }

                },
                error: function (xhr) {
                    alert("连接服务器失败");
                }
            });
        });
    });

//数据统计
    $(document).ready(function() {

        $("#totle").click(function () {
            $.ajax({
                url: "http://localhost/Music/public/music/orderbyname",
                type: "get",
                dataType: "json",
                contentType: "application/json;charset=utf-8",
                success: function (msg) {
                    for (var j = 0; j < msg.length; j++) {
                        music(musicobj, {
                            //"musicName": msg[j].music.split("|")[0],
                            "musicName": msg[j].music.split("|")[0],
                            "singer": msg[j].music.split("|")[1],
                            "you": msg[j].recieve_name,
                            "contain": msg[j].content,
                            "me": msg[j].send_name,
                            "time": msg[j].time,
                            "excellent": msg[j].goods,
                            "operation": 0
                        });
                    }

                },
                error: function (xhr) {
                    alert("连接服务器失败");
                }
            });
        });
    });




















    //illegal(illegalobj,{"data":"暴力"});//违规字设置
    statistics(statisticsobj,{"num":"1","music":"山丘","musicTime":"100","excellentNum":"100","comprehensive":100});
    statistics(statisticsobj,{"num":"1","music":"山丘","musicTime":"100","excellentNum":"100","comprehensive":100});
    statistics(statisticsobj,{"num":"1","music":"山丘","musicTime":"100","excellentNum":"100","comprehensive":100});
    statistics(statisticsobj,{"num":"1","music":"山丘","musicTime":"100","excellentNum":"100","comprehensive":100});
    statistics(statisticsobj,{"num":"1","music":"山丘","musicTime":"100","excellentNum":"100","comprehensive":100});
    //notice(presentobj,{"content":"今天是个好日子阿，~咱们老百姓阿~今个儿真高兴阿~好运来祝你好运来，好运来带来喜和爱，祝福大家兴旺发达红 四海今天是个好日子阿~好高兴呀 好高兴呀","time":"2015-05-19  12：00"});
  ///  notice(historyobj,{"content":"今天是个好日子阿，~咱们老百姓阿~今个儿真高兴阿~好运来祝你好运来，好运来带来喜和爱，祝福大家兴旺发达红 四海今天是个好日子阿~好高兴呀 好高兴呀","time":"2015-05-19  12：00"});
  //  notice(historyobj,{"content":"今天是个好日子阿，~咱们老百姓阿~今个儿真高兴阿~好运来祝你好运来，好运来带来喜和爱，祝福大家兴旺发达红 四海今天是个好日子阿~好高兴呀 好高兴呀","time":"2015-05-19  12：00"});
  //  notice(historyobj,{"content":"今天是个好日子阿，~咱们老百姓阿~今个儿真高兴阿~好运来祝你好运来，好运来带来喜和爱，祝福大家兴旺发达红 四海今天是个好日子阿~好高兴呀 好高兴呀","time":"2015-05-19  12：00"});
  //  notice(historyobj,{"content":"今天是个好日子阿，~咱们老百姓阿~今个儿真高兴阿~好运来祝你好运来，好运来带来喜和爱，祝福大家兴旺发达红 四海今天是个好日子阿~好高兴呀 好高兴呀","time":"2015-05-19  12：00"});
  //  music(musicobj,{"musicName":"山丘","singer":"李宗盛","you":"王尼玛","contain":"王尼玛王尼玛王尼玛王尼玛王尼玛","me":"王尼玛","time":"2015-5-20</br>09:12","excellent":"205赞","operation":1});
  //  music(musicobj,{"musicName":"山丘山丘山丘山丘山丘山丘山丘山丘","singer":"李宗盛","you":"王尼玛","contain":"王尼玛王尼玛王尼玛王尼玛王尼玛王尼玛王尼玛王尼玛王尼玛王尼玛","me":"王尼玛王尼玛","time":"2015-5-12</br>16:54","excellent":"234赞","operation":0});
  //  music(musicobj,{"musicName":"山丘","singer":"李宗盛","you":"王尼玛","contain":"王尼玛王尼玛王尼玛王尼玛","me":"唐马儒","time":"2015-5-01</br>11:31","excellent":"2赞","operation":1});
  //  music(musicobj,{"musicName":"山丘","singer":"李宗盛","you":"王尼玛","contain":"王尼玛","me":"巴拉巴拉小魔仙","time":"2015-4-29</br>02:45","excellent":"15赞","operation":0});
  //  music(musicobj,{"musicName":"山丘","singer":"李宗盛","you":"王尼玛","contain":"嘎嘎嘎","me":"奥特曼","time":"2015-6-01</br>20:00","excellent":"999赞","operation":1});

})();






















