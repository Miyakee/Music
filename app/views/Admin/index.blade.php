<html>
<head>
    <title></title>
    <script type="text/javascript" src="{{__PUBLIC__.'/js/jquery-2.1.3.min.js'}}"></script>
    <link href="{{__PUBLIC__.'/css/bootstrap.min.css'}}" rel="stylesheet" type="text/css">
    <link href="{{__PUBLIC__.'/css/bootstrap-theme.min.css'}}" rel="stylesheet" type="text/css">
    <link href="{{__PUBLIC__.'/css/bootstrap-datetimepicker.min.css'}}" rel="stylesheet" type="text/css">
    <link href="{{__PUBLIC__.'/css/index.css' }}"rel="stylesheet" type="text/css">
</head>
<body>
<header class="title">
    <div>
        <p>电台点歌-后台管理</p>
        <div class="searchdiv input-group">
            <input type="text" name="search" class="search form-control" placeholder="请输入歌名"/>
            <div class="input-group-addon">搜索</div>
        </div>
    </div>
</header>
<section class="main">
    <div class="menu">
        <table class="table">
            <tbody>
                <tr num="0" class="onclick" id="music">
                    <td><i class="iconfont">&#xe673;</i>歌曲管理</td>
                </tr>
                <tr num="1" id="ccc">
                    <td><i class="iconfont" >&#xe6a7;</i>公告管理</td>
                </tr>
                <tr num="2">
                    <td><i class="iconfont" id="totle">&#xf0074;</i>数据统计</td>
                </tr>
                <tr num="3" id="word">
                    <td><i class="iconfont">&#xe610;</i>违规字设置</td>
                </tr>
            </tbody>
        </table>
    </div>
    <section class="music" style="display: none">
        <header class="choose">
            <select class="form-control select-left">
                <option>时间筛选</option>
                <option>最近一天</option>
                <option>最近三天</option>
                <option>最近七天</option>
                <option>最近十五天</option>
                <option>最近三十天</option>
            </select>


            <!--<div class="form-group">-->
                <!--<div class="input-group date form_date col-md-5" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">-->
                    <!--<input class="form-control" size="16" type="text" value="" readonly>-->
                    <!--<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>-->
                    <!--<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>-->
                <!--</div>-->
                <!--<input type="hidden" id="dtp_input2" value="" /><br/>-->
            <!--</div>-->
            <select class="form-control">
                <option>排序筛选</option>
                <option>最新</option>
                <option>热门</option>
            </select>
            <select class="form-control select-right">
                <option>类型筛选</option>
                <option>未播出</option>
                <option>已播出</option>
            </select>
        </header>
        <!--<div class="hint">-->
            <!--<p>友情提示：选中歌曲播放后，会立即给该点歌用户推送重邮小帮手消息！</p>-->
        <!--</div>-->
        <table class="table table-hover">
            <thead>
                <tr>
                    <td class="musicName">歌名</td>
                    <td class="singer">歌手</td>
                    <td class="you">对方姓名</td>
                    <td class="contain">内容</td>
                    <td class="me">点歌人</td>
                    <td class="time">时间</td>
                    <td class="excellent">点赞数</td>
                    <td class="operation">操作</td>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </section>
    <section class="notice" style="display: none">
        <div class="section section-form">
                <div class="top">
                    发表新公告
                </div>
                <div class="form">
                    <div class="form-group formTitle">
                        <label class="control-label" for="title">标题</label>
                        <input class="form-title form-control" id="title" type="text" placeholder="24个字符以内" size="35"/>
                    </div>
                    <div class="form-group formControl">
                        <label class="control-label" for="control">正文</label>
                        <textarea class="form-control" id="control" rows="5" maxlength="200" placeholder="200个字符以内"></textarea>
                    </div>
                    <button type="button" class="btn btn-default">发表</button>
                </div>
            </div>
        <div class="section present">
            <div class="top">
                置顶公告 <span>点击修改</span>
            </div>
        </div>
        <div class="section history">
            <div class="top">
                历史公告
            </div>
        </div>
    </section>
    <section class="statistics" style="display: block">

        <header class="choose">
            <select class="form-control select-left">
                <option>时间筛选</option>
                <option>最近一天</option>
                <option>最近三天</option>
                <option>最近七天</option>
                <option>最近十五天</option>
                <option>最近三十天</option>
            </select>
            <select class="form-control select-right">
                <option>排序筛选</option>
                <option>点歌次数</option>
                <option>累积点赞数</option>
                <option>综合热门度</option>
            </select>
        </header>
        <table class="table table-hover">
            <thead>
                <tr>
                    <td class="num">序号</td>
                    <td class="music">歌名</td>
                    <td class="musicTime">点歌次数</td>
                    <td class="excellentNum">累积点赞数</td>
                    <td class="comprehensive">综合热门度</td>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </section>
    <section class="illegal" style="display: none">
        <div class="section section-form">
            <div class="top">
                违规字设置
            </div>
            <div class="form">
               <div class="form-group formTitle">
                                   <p class="control-label">添加违规字</p>
                                   <input class="form-title form-control" id="illegal" type="text" placeholder="12个字以内" size="35" maxlength="12"/>
                               </div>
    <button type="button" class="btn btn-default">添加</button>
                <p class="clear">已设置的违规字：</p>
                <div class="illegal-word">

                </div>
            </div>
        </div>
    </section>
</section>
<footer>
    <p>
        <a href="http://hongyan.cqupt.edu.cn/aboutus/" title="关于红岩网校">关于红岩网校</a> |
        <a href="##" title="网站地图">网站地图</a> |
        <a href="##" title="指出错误">指出错误</a> |
        <a href="##" title="管理入口">管理入口</a>
    </p>
    <p>本网站由红岩网校工作站负责开发，管理，不经红岩网校委员会书面同意，不得进行转载</p>
    <p>地址：重庆市南岸区崇文路2号（重庆邮电大学内） 400065 E-mail:redrock@cqupt.edu.cn (023-62461084)</p>
</footer>
</body>
<script type="text/javascript" src="{{__PUBLIC__.'/js/bootstrap.min.js'}}"></script>
<script type="text/javascript" src="{{__PUBLIC__.'/js/bootstrap-datetimepicker.min.js'}}"></script>
<script type="text/javascript" src="{{__PUBLIC__.'/js/index.js'}}"></script>
<script>
//    $(document).ready(function(){
//
//  $("#news").click(function(){
//                var title=$("#title").val();
//                var content=$("#content").val();
//             var   json_data=[{"title":title,"content":content}];
//                $.ajax({
                    {{--url: "{{action('AnnouncementController@postCreate')}}",--}}
//                   data:{title:title},
//                    type: "post",
//                    dataType: "json",
//                    contentType: "application/json;charset=utf-8",
//                    success: function(data,status) {
//
//                     alert("ok");
//                    },
//                    error: function(xhr) {
//                        alert(title);
//                    }
//                });
//
//});});
</script>
</html>