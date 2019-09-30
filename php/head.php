    <?php
                    //使用会话内存储的变量值之前必须先开启会话
        session_start();
    ?>
    <div class="head">
        <div class="top content clearfix" style="left: auto;">
            <div class="logo fl">
                <a href="http://localhost/steam-master/index.html"><img src="images/globalheader_logo.png" alt=""></a>
            </div>
            <div class="h_nav fl">
                <ul class="clearfix">
                    <li>
                        <a href="">商店</a>
                        <div class="h_nav_open">
                            <ol>
                                <li><a href="">精选</a></li>
                                <li><a href="">探索</a></li>
                                <li><a href="">鉴赏家</a></li>
                                <li><a href="">愿望单</a></li>
                                <li><a href="">新闻</a></li>
                                <li><a href="">统计</a></li>
                            </ol>
                        </div>
                    </li>
                    <li>
                        <a href="http://localhost/steam-master/shequ.html">社区</a>
                        <div class="h_nav_open">
                            <ol>
                                <li><a href="http://localhost/steam-master/index.html">主页</a></li>
                                <li><a href="">讨论</a></li>
                                <li><a href="">创意工坊</a></li>
                                <li><a href="">市场</a></li>
                                <li><a href="">实况直播</a></li>
                            </ol>
                        </div>
                    </li>
                    <li><a href="">关于</a></li>
                    <li><a href="">客服</a></li>
                </ul>

            </div>
                <script>
                    var h_navUl = $('.h_nav ul>li>a');
                    h_navUl.mouseenter(function(){
                        $(this).closest('li').find('.h_nav_open').css({
                            opacity:1,
                            'pointer-events':'auto'
                        });
                    });
                    h_navUl.closest('li').mouseleave(function(){
                        $(this).closest('li').find('.h_nav_open').css({
                            opacity:0,
                            'pointer-events':'none'
                        });
                    });
                </script>
            <div class="h_aside">
                <a href="" class="setup"><i></i>安装Steam</a>

                <?php
                //使用一个会话变量检查登录状态
                if(isset($_SESSION['name'])){
                    // echo 'You are Logged as '.$_SESSION['name'].'<br/>';
                    // //点击“Log Out”,则转到logOut页面进行注销
                    // echo '<a href="logOut.php"> Log Out('.$_SESSION['name'].')</a>';

                        echo '<a href="http://localhost/steam-master/userhome.html" target="_blank" class="login">'.$_SESSION['nicheng'].' <img style="width:20px;height:20px;    position: relative;top: 4px;"; src="'.$_SESSION['imgurl'].'"></a><a href="http://localhost/steam-master/qingdan.html">&nbsp;&nbsp;购物清单</a>&nbsp;|&nbsp;<a href="php/logout.php" class="langage">Log Out('.$_SESSION['nicheng'].')</a>
                        ';

                }else{
                    echo '<a href="login.html" target="_blank" class="login">登录</a>&nbsp;|&nbsp;<a href="reg.html" class="langage">注册 </a>';
                }
                /**在已登录页面中，可以利用用户的session如$_SESSION['username']、
                 * $_SESSION['user_id']对数据库进行查询，可以做好多好多事情*/
                ?>

            </div>
        </div>
    </div>
