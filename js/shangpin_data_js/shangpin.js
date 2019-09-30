function shangpin(data){

  $(".price").html("￥"+data[0].price);
  $(".gameName").html(data[0].name);
  $(".message").html(data[0].message);
  $(".videov").attr("src",data[0].videoUrl);
  $("#changimg").attr("src",data[0].changimg);
  $("#jianj").html(data[0].jianj);
  $(".kaifashang").html(data[0].kaifashang);
  $(".faxingshang").html(data[0].faxingshang);
  $(".data").html(data[0].date.replace('-','年').replace('-','月') + '日');
    // 口碑；1为“好评如潮”；2为"特别好评"；3为"多半好评"；4为"褒贬不一"；5为"多半差评"；6为"差评如潮"；7为"无评论
  if(data[0].evaluate == 1){
      $(".pingjia").html("好评如潮");
  }
  if(data[0].evaluate == 2){
      $(".pingjia").html("特别好评");
  }
  if(data[0].evaluate == 3){
     $(".pingjia").html("多半好评");
  }
  if(data[0].evaluate == 4){
      $(".pingjia").html("褒贬不一");
  }
  if(data[0].evaluate == 5){
      $(".pingjia").html("多半差评");
  }
  if(data[0].evaluate == 6){
      $(".pingjia").html("差评如潮");
  }
  // 评价数量
  $(".pjshuliang").html("("+data[0].evaluatingCount+")");
  // 用户标签
  for(var k = 0;k < data[0].label.length;k++){
    if(k==data[0].label.length-1)
      $(".leixing").append(data[0].label[k]);
    else
      $(".leixing").append(data[0].label[k]+",");
  }

  //成就
  $(".cjnum1").html("包括"+data[0].chengjiunum+"项Steam成就");
  $(".cjnum2").html("查看所有"+data[0].chengjiunum+"项成就");
  for(var i=0; i<$(".chengjiu").length;i++)
  {
    $(".chengjiu").eq(i).attr("src",data[0].chengjiu_img[i]);
    $(".chengjiu").eq(i).attr("title",data[0].chengjiu_title[i]);
  }
  var videobig = $(".videobig").find("img");
  var video5 = $(".video5").find("img");
  for (var i = 0; i < videobig.length; i++) {
    videobig.eq(i).attr("src",data[0].imgUrl[i]);
  }
  for (var i = 0; i < video5.length; i++) {
    video5.eq(i).attr("src",data[0].video5_imgUrl[i]);
  }
  //语言
  $(".lgnum").html("查看所有 "+data[0].languagenum+" 种已支持语言")
  for(var j = 0;j<data[0].language.length;j++)
  {

    if(data[0].language[j]==0)
    $(".td1").eq(j).html("");
    if(data[0].language[j]==1)
    $(".td1").eq(j).html("✔");

  }
  //配置
  for(var j = 0;j<data[0].low.length;j++)
  {
    $(".low").eq(j).html(data[0].low[j]);
    $(".high").eq(j).html(data[0].high[j]);
  }
  $(".videobig").eq(1).hide();
  $(".videobig").eq(2).hide();
  $(".videobig").eq(3).hide();
  $(".videobig").eq(4).hide();
};

$(function(){
  $(".video5").each(function(index,obj){
    $(obj).click(function(){
      $(".videobig").each(function(index_big,obj_big){
        if(index==index_big)
        {$(obj_big).fadeIn(100)}
        else
        {$(obj_big).fadeOut(100)}
      });
    });
  });
});


