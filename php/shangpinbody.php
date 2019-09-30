

    <div class="main content" style="left: auto;">
        <!-- 导航栏 -->
            <?php include 'php/daohang.php';?>


      <div id="jieshao_top">
        <div id="jieshao_top_left">
          <div id="jieshao_top_left_top">
            <span class="gameName" style=" color: white;font-size: 18pt;"></span>
          </div>
          <div id="jieshao_top_left_mid">
            <div style="z-index: 100;" class="videobig"><video class="videov" src="" controls preload="metadata"></video></div>
            <div class="videobig"><img src=""></div>
            <div class="videobig"><img src=""></div>
            <div class="videobig"><img src=""></div>
            <div class="videobig"><img src=""></div>
          </div>
          <div id="jieshao_top_left_bottom">
            <div class="video5">
              <div class="bofang"><img style="height: 100%;width: 100%;" src=""></div>
              <img src="">
            </div>
            <div class="video5">
              <img src="">
            </div>
            <div class="video5">
              <img src="">
            </div>
            <div class="video5">
              <img src="">
            </div>
            <div class="video5">
              <img src="">
            </div>
          </div>
        </div>
        <div id="jieshao_top_left_fenge"></div>
        <div id="jieshao_top_right">
          <div id="jieshao_top_right_left_top">
            <div style="width: 75%;height: 100%;float: left;"></div>
            <a href="https://tieba.baidu.com/f?fr=wwwt&kw=%E5%8F%AA%E7%8B%BC">
            <div id="shequ">社区中心</div>
            </a>
          </div>
          <div id="jieshao_top_right_left_mid">
            <div id="jieshao_top_right_left_mid_tu">
              <img id="changimg" style="height: 100%;width: 100%;" src="">
            </div>
            <div id="jieshao_top_right_left_mid_wen">
              <br>
              <span id="jianj"></span>
              <p>&nbsp</p>
              <p><span class="jieshao_span1">评测:</span><span class="jieshao_span2 pingjia"></span><span class="jieshao_span1 pjshuliang"></span></p><p>&nbsp;</p>
              <p><span class="jieshao_span1">发行日期:</span><span style="color: rgb(112, 152, 160);" class="data"></span></p><p>&nbsp;</p>
              <p><span class="jieshao_span1">开发商:</span><span class="jieshao_span2"><a style="color: #66C0F4;" href="" class="kaifashang"></a></span></p>
              <p><span class="jieshao_span1">发行商:</span><span class="jieshao_span2"> <a style="color: #66C0F4;" href="" class="faxingshang"></a></span></p>
            </div>
          </div>
          <div id="jieshao_top_right_left_bottom">
          </div>
        </div>
      </div>

      <div id="jieshao_bottom">
            <div id="jieshao_bottom_left">
              <div id="jieshao_bottom_left_top">
                <div style="height: 20%;width: 100%"></div>
                <div style="height: 40%;width: 100%;background-image:url(images/bg.png);background-repeat:y;line-height: 450%;position:relative;">
                  <span id="goumai_span">购买 </span><span id="goumai_span" class="gameName"></span><img style="position: absolute;right:10px;top: 40%;bottom: 40%;" src="images\\win.png">
                  <div style="width: 30%;height: 45%;background-color: red;position: absolute;left: 65%;
                  top: 80%;background-color:rgb(0, 0, 0);line-height: 230%">
                    <span style="color: rgb(198, 212, 223);" class="price"></span>

                    <?php
                    include "msql.php";
                    //使用一个会话变量检查登录状态
                    if(isset($_SESSION['name'])){
                        $id = $_SESSION['id'];
                        $proid=$_SESSION['proid'];
                        $data=mysqli_query($mysqli,"SELECT qid,id,product_id FROM qingdan where id = $id and product_id=$proid");
                        if(mysqli_num_rows($data)!=0)
                        {
                          echo '<a href="http://localhost/steam-master/qingdan.html"><button id="tjgwc_button">已在愿望单中点击查看</button></a>';
                        }
                        else{
                          echo '
                          <form action="php/qingdan.php" method="POST" id="qingdan_form"; style="margin: -27px;">
                          <button id="tjgwc_button" name="submit" type = "submit">添加到愿望单</button>
                          </form>
                          ';
                        }
                    }
                    else{
                        echo '<script>function qingdan(){alert("请先登录！")};</script>';
                        echo '<button id="tjgwc_button" onclick="qingdan()">添加到愿望单</button>';
                    }
                    ?>

                  </div>
                </div>
                <div style="height: 30%;width: 100%;"></div>
              </div>
              <div id="jieshao_bottom_left_mid">
                <p class="jianj_xiaobiaoti">关于这款游戏</p>
                <img style="width: 100%;height: 1px;" src="images/fenge.png">
                <span class="changwen message"></span>
              </div>
              <div id="jieshao_bottom_left_bottom">
                <div style="height: 15%;width: 100%">
                  <p class="jianj_xiaobiaoti">系统需求</p>
                  <img style="width: 100%;height: 1px;" src="images/fenge.png">
                </div>
                <div id="jieshao_bottom_left_bottom_left">
                  <ul>
                    <li class="jianj_xiaolan">最低配置:</li>
                    <li><span class="jianj_xiaohui">操作系统: </span><span class="changwen low"></span></li>
                    <li><span class="jianj_xiaohui">处理器: </span><span class="changwen low"></span></li>
                    <li><span class="jianj_xiaohui">内存: </span><span class="changwen low"></li>
                    <li><span class="jianj_xiaohui">图形: </span><span class="changwen low"></span></li>
                    <li><span class="jianj_xiaohui">DirectX 版本: </span><span class="changwen low"></span></li>
                    <li><span class="jianj_xiaohui">网络: </span><span class="changwen low"></span></li>
                    <li><span class="jianj_xiaohui">存储空间: </span><span class="changwen low"></span></li>
                    <li><span class="jianj_xiaohui">声卡: </span><span class="changwen low"></span></li>
                  </ul>
                </div>
                <div id="jieshao_bottom_left_right">
                  <ul>
                    <li class="jianj_xiaolan">推荐配置</li>
                    <li><span class="jianj_xiaohui">操作系统: </span><span class="changwen high"></span></li>
                    <li><span class="jianj_xiaohui">处理器: </span><span class="changwen high"></span></li>
                    <li><span class="jianj_xiaohui">内存: </span><span class="changwen high"></span></li>
                    <li><span class="jianj_xiaohui">图形: </span><span class="changwen high"></span></li>
                    <li><span class="jianj_xiaohui">DirectX 版本: </span><span class="changwen high"></span></li>
                    <li><span class="jianj_xiaohui">网络: </span><span class="changwen high"></span></li>
                    <li><span class="jianj_xiaohui">存储空间: </span><span class="changwen high"></span></li>
                    <li><span class="jianj_xiaohui">声卡: </span><span class="changwen high"></span></li>
                  </ul>
                </div>
              </div>
            </div>
            <div id="jieshao_bottom_fenge"></div>
            <div id="jieshao_bottom_right">
              <div id="jieshao_bottom_right_1">
                <div style="height: 13%;width: 100% ;"></div>
                <div style="height: 87%;width: 100%;background-color: rgb(15, 22, 31);">
                <div style="height: 100%;width: 5%; float: left;"></div>
                <div style="height: 100%;width: 90%;float: left;">
                  <div style="height: 50%;width:100%;">
                  <p style="margin-top: 10px;"><span class="jianj_xiaobiaoti">您对这款游戏感兴趣吗</p>
                  <span class="changwen">基于您的游戏、好友以及您关注的鉴赏家，登录以查看您是否有可能喜欢这个内容的原因。</span>
                  </div>
                  <div style="height: 45%;width:100%;line-height:500%;">
                    <a href="">登录</a><span class="changwen">或</span><a href="">客户端</a>
                  </div>
                </div>
                </div>
              </div>
              <div class="jieshao_bottom_right_fenge"></div>
              <div id="jieshao_bottom_right_2">
                <div style="height: 100%;width: 5%; float: left;"></div>
                <div style="height: 95%;width: 90%;float: left;margin-top: 10px;">
                  <p><span class="changwen">语言:</p>
                  <table id="table_language">
                    <th>
                      <td class="table_language_span1">界面</td>
                      <td class="table_language_span1">完全音频</td>
                      <td class="table_language_span1">字幕</td>
                    </th>
                    <tr class="lg">
                      <td class="table_language_span2">简体中文</td>
                      <td class="td1"></td>
                      <td class="td1"></td>
                      <td class="td1"></td>
                    </tr>
                    <tr class="lg">
                      <td class="table_language_span2">法语</td>
                      <td class="td1"></td>
                      <td class="td1"></td>
                      <td class="td1"></td>
                    </tr>
                    <tr class="lg">
                      <td class="table_language_span2">英语</td>
                      <td class="td1"></td>
                      <td class="td1"></td>
                      <td class="td1"></td>
                    </tr>
                    <tr class="lg">
                      <td class="table_language_span2">意大利语</td>
                      <td class="td1"></td>
                      <td class="td1"></td>
                      <td class="td1"></td>
                    </tr>
                    <tr class="lg">
                      <td class="table_language_span2">德语</td>
                      <td class="td1"></td>
                      <td class="td1"></td>
                      <td class="td1"></td>
                    </tr>
                    <tr>
                      <td colspan="4"><a href="" class="lgnum"></a>></td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="jieshao_bottom_right_fenge"></div>
              <div id="jieshao_bottom_right_3">
                 <div style="height: 100%;width: 5%; float: left;"></div>
                 <div style="height: 95%;width: 90%;float: left;margin-top: 5px;position:relative;">
                  <p><span class="changwen cjnum1">包括 x 项 Steam 成就</p>
                    <img src="" title="" class="chengjiu">
                    <img src="" title="" class="chengjiu">
                    <img src="" title="" class="chengjiu">
                    <div id="cj" class="cjnum2">查看所有x项</div>
                 </div>
              </div>
              <div class="jieshao_bottom_right_fenge"></div>
              <div id="jieshao_bottom_right_4">
                  <div style="height: 100%;width: 5%; float: left;"></div>
                  <div style="height: 95%;width: 90%;float: left;margin-top: 10px;">
                      <li><span class="jianj_xiaohui">名称: </span><span class="changwen gameName"></span></li>
                      <li><span class="jianj_xiaohui">类型: </span><span class="changwen leixing"></span></li>
                      <li><span class="jianj_xiaohui">开发商: </span><span class="changwen kaifashang"></span></li>
                      <li><span class="jianj_xiaohui">发行商: </span><span class="changwen faxingshang"></span></li>
                      <li><span class="jianj_xiaohui">发行日期: </span><span class="changwen data"></span></li>
                  </div>
              </div>
              <div class="jieshao_bottom_right_fenge"></div>
            </div>
      </div>


   </div>


    </div>

