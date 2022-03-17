<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="referrer" content="no-referrer"/>
<meta name="referrer" content="never"/>
<meta name="referrer" content="same-origin"/>
<meta http-equiv="Access-Control-Allow-Origin" content="*">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">





    <!-- ================= Favicon ================== -->
    <!-- Standard -->
		<link rel="shortcut icon" href="/favicon.ico">
    <!-- Styles -->
           <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
           <link href="assets/css/style.css" rel="stylesheet">
           <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
           <title>偏离值计算</title>
    <script>
    </script>
</head>

<body class="bg-primary">

    <div class="unix-login">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-content">
                        <div class="login-logo">
                            <span style="color:#000000"onclick="shuaxin()">偏离值计算</span>
                               <p onclick="shuaxin()" >(深证4次异动+关注函=停牌)</p>
                            <p onclick="shuaxin()" style="color:green">→【盘中偏离值实时更新，点我刷新】←</p>
                        </div>
                         <div class="card">
                             <div class="card-title" id="tou" style="margin-bottom:-5%">
                                 </div>

                                <div class="card-body">
                                    <div class="input-sizes">
                                        <form class="form-horizontal fc-view" >
                                                  
                                   <div class="form-group" style="top">
                                            <div class="row">
                                              <div class="col-lg-2"></div>
                                                <div class="col-lg-8">
                                                    <input id="daima" type="text" placeholder="点这输码支持中文全称，点空白处出数据" class="form-control"  name="example-input-small" lay-key="1" onblur="lsgc()" onclick="qingkong()">
                                                    
                                                </div>
               
                                            </div>
                                            <div class="row">
                                              <div class="col-lg-2"></div>
                                                <div class="col-lg-8">
                                                    <input id="wei" type="text" placeholder="盘中偏离值(盘中看这,盘后5点左右失效)"  class="form-control" >
                                                    
                                                </div>
                                            </div>  
                                            <div class="row">
                                              <div class="col-lg-2"></div>
                                                <div class="col-lg-8">
                                                    <input id="pianli" type="text" placeholder="盘后偏离值(盘后看这，盘后5点左右生效)"  class="form-control" >
                                                    
                                                </div>
                                            </div>                                               
                                           <div class="row">
                                              <div class="col-lg-2"></div>
                                                <div class="col-lg-8">
                                                    <select class="form-control" id="yidong"  >
																<option value="全部店铺">异动/停牌展示</option>
													</select>
                                                    
                                                </div>
                                            </div>  
                                           <div class="row">
                                              <div class="col-lg-2"></div>
                                                <div class="col-lg-8">
                                                    <select class="form-control" id="zt"  style="margin-bottom:-3%">
																<option value="">3点后当日收盘连板价</option>
													</select>
                                                    
                                                </div>
                                            </div>                                              
                                   </div>

                                   
                                     <div class="form-group" >
                                            <div class="row">
                                              <div class="col-lg-2"></div>
                                                <div class="col-lg-8">
                                                      <input id="StartTime" type="text"  class="form-control" style="margin-bottom:-3%">
                                                    </div>
                                            </div>
                                            </div>
                                                    
                                            <div class="form-group">
                                            <div class="row">
                                              <div class="col-lg-2"></div>
                                                <div class="col-lg-8">
                                                    <input id="EndTime" lay-key="8" type="text" class="form-control" style="margin-bottom:-3%">
                                                </div>
                                            </div>
                                            
                                            </div>
                                            <div class="row"align="right">
                                              
                                          <p align="center" style="margin-bottom:-10%;margin-left:32%">@感恩KEN哥、感恩佛系群</p>
                                    </div>
                                        
                                        </form>
                                    </div>
                                </div>
                         </div>           
                    </div>
                </div>
            </div>
        </div>
    </div>
       <script src="assets/js/lib/jquery.min.js"></script>
    <script src="assets/laydate/laydate.js"></script>
    <script src="assets/layer_mobile/layer.js"></script>
    <script src="js/date.format.js"></script>
    <script src="js/gbk.js"></script>
   <script>
   document.onkeydown = keyListener;
function keyListener(e) {
// 当按下回车键，执行我们的代码
    if (e.keyCode == 13) {
SubInfo();
    }
}
function charu(soure, start, newStr){   
   return soure.slice(0, start) + newStr + soure.slice(start);
}
$(function(){
    laydate.render({
  elem: '#EndTime'
  ,type: 'datetime'
  ,value: new Date() 
  ,zIndex: 99999999
  ,format: 'yyyyMMdd'
});

 laydate.render({
  elem: '#StartTime'
  ,type: 'datetime'
  ,value: new Date() 
  ,zIndex: 99999999
  ,format: 'yyyyMMdd'
});

});
function shuaxin(){
     if(pianli!=""){
     var tou = document.getElementById("tou");
    remove_md = tou.lastElementChild;
    if(remove_md!=null){
    tou.removeChild(remove_md);  
    }
 }
    var daima=$("#daima").val();
    daima=daima.slice(0,6);
    console.log(daima)
    document.getElementById('daima').value=daima;
    lsgc();
}

function qingkong(){

    document.getElementById('daima').value="";
    
}
function encodeToGb2312(str){
    var strOut="";
    for(var i = 0; i < str.length; i++){
        var c = str.charAt(i); 
        var code = str.charCodeAt(i);
        if(c==" ") strOut +="+";
        else if(code >= 19968 && code <= 40869){
            index = code - 19968;
            strOut += "%" + z.substr(index*4,2) + "%" + z.substr(index*4+2,2);
        }
        else{
            strOut += "%" + str.charCodeAt(i).toString(16);
        }
    }
    return strOut;
}

function lsgc(){
var daima="";
var mama="";
if(isNaN($("#daima").val())==true){
    bianma=$URL.encode($("#daima").val());
    console.log(bianma)
                   $.ajax({
                type:"get",//请求服务器载入数据
                //async: false,
                url:"https://q.stock.sohu.com/app1/stockSearch?method=search&type=all&keyword="+bianma+"&rt=jsonp",
                             dataType:'jsonp',//服务器返回json格式数据
                             jsonpCallback:'callback',
                             jsonp: 'callback',
                             crossDomain: true,
                             //data:"{}",
                             ContentType:'application/javascript',
                success:function(co){
                    console.log(co.result.length)
                    if(co.result.length==0){alert("输入有误，重新输入")}
                    daima=co.result[0][0];
                    mama=co.result[0][1];
                   
 var sj =$("#EndTime").val();
 var sj1=$("#StartTime").val();
console.log(daima)
 var pianli=$("#pianli").val();
 var zs="zs_000001";
 var zs1="sh000001";
 var nali="上证";
 if(pianli!=""){
     var tou = document.getElementById("tou");
    remove_md = tou.lastElementChild;
    if(remove_md!=null){
    tou.removeChild(remove_md);  
    }
 }

 if(daima.slice(3,5)=="00"){
   
     zs="zs_399001";
     zs1="sz399001";
     nali="深证"
 }
 var dzh=0;
 var zzh=0;
 var js=0;
 var stime=0;
 var etime=sj;
 var bd=0;
 var jsbd=0;
 if(sj==sj1){
     for(var i=1;i<10;i++){
         var curTime = new Date().getTime();
         var startDate = curTime - (i * 3600 * 24 * 1000);
         var time = new Date(startDate);
          if(time.getDay() != 0 && time.getDay() != 6){
              js=js+1;
              stime=time.format('Ymd');
          }
          if (js==2){
              break;
          }
     }
 }
 else{stime=sj1;}
 $("#yidong").empty();
  $("#zt").empty();
var obj=document.getElementById('yidong');
var obj1=document.getElementById('zt');
obj.add(new Option("异动/停牌展示",0));
obj1.add(new Option("3点后当日收盘连板价",0));


 
            $.ajax({
                type:"get",//请求服务器载入数据
                //async: false,
                url:"https://q.stock.sohu.com/hisHq?code="+daima+"&start="+stime+"&end="+etime+"&callback = callback&rt=jsonp",
                             dataType:'jsonp',//服务器返回json格式数据
                             jsonpCallback:'callback',
                             jsonp: 'callback',
                             crossDomain: true,
                             //data:"{}",
                             ContentType:'application/javascript',
                success:function(result){
                    console.log(daima)
                    if(result.length!=undefined){
                    var zzt=Number(result[0].hq[0][2]);
                    for(var aa=1;aa<11;aa++){
                             zzt=(zzt*1.1).toFixed(2);
                             nr=aa+"板:"+zzt;
                             obj1.add(new Option(nr,aa));                        
                    }
                    for(var a=0;a<result[0].hq.length;a++){
                        var zhi=result[0].hq[a][4].replace("%","");
                        console.log("前"+(a+1)+"天涨幅:"+zhi)
                        if(Number(zhi)>0){dzh=dzh+Number(zhi);}
                        
                    }
               $.ajax({
                type:"get",//请求服务器载入数据
                //async: false,
                url:"https://q.stock.sohu.com/hisHq?code="+zs+"&start="+stime+"&end="+etime+"&callback = callback&rt=jsonp",
                             dataType:'jsonp',//服务器返回json格式数据
                             jsonpCallback:'callback',
                             jsonp: 'callback',
                             crossDomain: true,
                             data:"{}",                         
                success:function(res){
                    for(var b=0;b<res[0].hq.length;b++){
                        var zhi=res[0].hq[b][4].replace("%","");
                        console.log("前"+(b+1)+"天指数涨幅:"+zhi)
                        zzh=zzh+Number(zhi);
                    }
                    console.log("个股涨幅合:"+dzh)
                    console.log("指数涨幅合:"+zzh)
                    document.getElementById('pianli').value="盘后偏离值:"+(dzh-zzh).toFixed(2);;
                   $.ajax({
                    type:"get",//请求服务器载入数据
                    //async: false,
                    url:"https://qt.gtimg.cn/q=s_"+zs1+",s_"+zs1.slice(0,2)+mama,
                                 dataType:'html',//服务器返回json格式数据
                                 crossDomain: true,
                                 data:"{}",                         
                    success:function(zhishu){
                        cf = zhishu.split("~");
                          console.log("实时指数涨幅:"+cf[5])
                          console.log("实时个股涨幅:"+cf[15])
                          document.getElementById('wei').value="盘中偏离值:"+((dzh+Number(cf[15]))-(zzh+Number(cf[5]))).toFixed(2);
               $.ajax({
                type:"get",//请求服务器载入数据
               // async: false,
                url:"https://np-anotice-stock.eastmoney.com/api/security/ann?page_size=50&page_index=1&ann_type=A&client_source=web&stock_list="+mama+"&f_node=0&s_node=0&rt=jsonp",
                             dataType:'jsonp',//服务器返回json格式数据
                             jsonpCallback:'cb',
                             jsonp: 'cb',
                             crossDomain: true,
                             
                             //data:"{}",                         
                success:function(xin){
                    yd=0;
                    document.getElementById('daima').value=mama+"【"+xin.data.list[0].codes[0].short_name+"】"
                    for(var c=0;c<xin.data.list.length;c++){
                         code=xin.data.list[c].art_code;
                         shijian=xin.data.list[c].notice_date.split(" ");
                         shijian=shijian[0];
                         console.log(Date.parse(new Date(shijian)))
                         neirong=xin.data.list[c].title;
                         if(neirong.indexOf("波动")!=-1 || neirong.indexOf("停牌")!=-1 || neirong.indexOf("关注函")!=-1){
                             yd=yd+1;
                             zzsj=charu(etime,4,"-");
                             zzsj=charu(zzsj,7,"-");
                             jjs=0;
                             for(var qwe=1;qwe<20;qwe++){//找出10天前是哪一个日期
                                 
                                  curTime1 = new Date(Date.parse(zzsj)).getTime();
                                  startDate1 = curTime1 - (qwe * 3600 * 24 * 1000);
                                  time1 = new Date(startDate1);
                                  if(time1.getDay() != 0 && time1.getDay() != 6){
                                      jjs=jjs+1;
                                  }
                                  if (jjs==9){
                                      
                                      break;
                                  }
                             }                             
                             
                             
                             zzsj=startDate1;
                             console.log(zzsj)
                             if(new Date(Date.parse(shijian))==zzsj&&neirong.indexOf("波动")!=-1&&neirong.indexOf("回")==-1){
                                 jsbd=jsbd+1;
                             }
                             ggsj=(Date.parse(shijian));
                             if(neirong.indexOf("波动")!=-1 && ggsj>=zzsj && neirong.indexOf("回")==-1){
                                 bd=bd+1;
                             }
                             nr=xin.data.list[c].columns[0].column_name+"【"+shijian+"】";
                             obj.add(new Option(nr,yd));
                         }
                         
                         if (yd==10){
                              
                               break;
                           }
                     
                    }
                      var tou = document.getElementById("tou");
                      var h55 =document.createElement("h4");
                      if(jsbd!=0){
                          h55.innerHTML="10日内异动:【"+bd+"次】明天减少【"+jsbd+"次异动】"+"《"+nali+"》";
                      }
                      else{
                          h55.innerHTML="10日内异动:【"+bd+"次】"+"《"+nali+"》";
                      }
                      h55.style.color="red";
                      tou.appendChild(h55);
                },
               })                     
                       
                    },
                                error:function(xhr,type,errorThrown){
                                      console.log(xhr.statusText);
                                      console.log(xhr.responseText);
                                      console.log(xhr.status);
                                      console.log(type);
                                      console.log(errorThrown);
                                      }
                   })                    
                   
                },
                            error:function(xhr,type,errorThrown){
                                  console.log(xhr.statusText);
                                  console.log(xhr.responseText);
                                  console.log(xhr.status);
                                  console.log(type);
                                  console.log(errorThrown);
                                  }
               })
                }else{alert("输入错误重新输入")}},
                            error:function(xhr,type,errorThrown){
                                  console.log(xhr.statusText);
                                  console.log(xhr.responseText);
                                  console.log(xhr.status);
                                  console.log(type);
                                  console.log(errorThrown);

                             }
                             
            })                   
                },
                            error:function(xhr,type,errorThrown){
                                  console.log(xhr.statusText);
                                  console.log(xhr.responseText);
                                  console.log(xhr.status);
                                  console.log(type);
                                  console.log(errorThrown);
                                  }                
               })

}    
else{ 
     daima="cn_"+$("#daima").val();
     mama=$("#daima").val();


 var sj =$("#EndTime").val();
 var sj1=$("#StartTime").val();
console.log(daima)
 var pianli=$("#pianli").val();
 var zs="zs_000001";
 var zs1="sh000001";
 var nali="上证";
 if(pianli!=""){
     var tou = document.getElementById("tou");
    remove_md = tou.lastElementChild;
    if(remove_md!=null){
    tou.removeChild(remove_md);  
    }
 }

 if(daima.slice(3,5)=="00"){
   
     zs="zs_399001";
     zs1="sz399001";
     nali="深证"
 }
 var dzh=0;
 var zzh=0;
 var js=0;
 var stime=0;
 var etime=sj;
 var bd=0;
 var jsbd=0;
 if(sj==sj1){
     for(var i=1;i<10;i++){
         var curTime = new Date().getTime();
         var startDate = curTime - (i * 3600 * 24 * 1000);
         var time = new Date(startDate);
          if(time.getDay() != 0 && time.getDay() != 6){
              js=js+1;
              stime=time.format('Ymd');
          }
          if (js==2){
              break;
          }
     }
 }
 else{stime=sj1;}
 $("#yidong").empty();
  $("#zt").empty();
var obj=document.getElementById('yidong');
var obj1=document.getElementById('zt');
obj.add(new Option("异动/停牌展示",0));
obj1.add(new Option("3点后当日收盘连板价",0));


 
            $.ajax({
                type:"get",//请求服务器载入数据
                //async: false,
                url:"https://q.stock.sohu.com/hisHq?code="+daima+"&start="+stime+"&end="+etime+"&callback = callback&rt=jsonp",
                             dataType:'jsonp',//服务器返回json格式数据
                             jsonpCallback:'callback',
                             jsonp: 'callback',
                             crossDomain: true,
                             //data:"{}",
                             ContentType:'application/javascript',
                success:function(result){
                    console.log(daima)
                    if(result.length!=undefined){
                    var zzt=Number(result[0].hq[0][2]);
                    for(var aa=1;aa<11;aa++){
                             zzt=(zzt*1.1).toFixed(2);
                             nr=aa+"板:"+zzt;
                             obj1.add(new Option(nr,aa));                        
                    }
                    for(var a=0;a<result[0].hq.length;a++){
                        var zhi=result[0].hq[a][4].replace("%","");
                        console.log("前"+(a+1)+"天涨幅:"+zhi)
                        if(Number(zhi)>0){dzh=dzh+Number(zhi);}
                        
                    }
               $.ajax({
                type:"get",//请求服务器载入数据
                //async: false,
                url:"https://q.stock.sohu.com/hisHq?code="+zs+"&start="+stime+"&end="+etime+"&callback = callback&rt=jsonp",
                             dataType:'jsonp',//服务器返回json格式数据
                             jsonpCallback:'callback',
                             jsonp: 'callback',
                             crossDomain: true,
                             data:"{}",                         
                success:function(res){
                    for(var b=0;b<res[0].hq.length;b++){
                        var zhi=res[0].hq[b][4].replace("%","");
                        console.log("前"+(b+1)+"天指数涨幅:"+zhi)
                        zzh=zzh+Number(zhi);
                    }
                    console.log("个股涨幅合:"+dzh)
                    console.log("指数涨幅合:"+zzh)
                    document.getElementById('pianli').value="盘后偏离值:"+(dzh-zzh).toFixed(2);
                   $.ajax({
                    type:"get",//请求服务器载入数据
                    //async: false,
                    url:"https://qt.gtimg.cn/q=s_"+zs1+",s_"+zs1.slice(0,2)+mama,
                                 dataType:'html',//服务器返回json格式数据
                                 crossDomain: true,
                                 data:"{}",                         
                    success:function(zhishu){
                        cf = zhishu.split("~");
                          console.log("实时指数涨幅:"+cf[5])
                          console.log("实时个股涨幅:"+cf[15])
                          document.getElementById('wei').value="盘中偏离值:"+((dzh+Number(cf[15]))-(zzh+Number(cf[5]))).toFixed(2);
               $.ajax({
                type:"get",//请求服务器载入数据
               // async: false,
                url:"https://np-anotice-stock.eastmoney.com/api/security/ann?page_size=50&page_index=1&ann_type=A&client_source=web&stock_list="+mama+"&f_node=0&s_node=0&rt=jsonp",
                             dataType:'jsonp',//服务器返回json格式数据
                             jsonpCallback:'cb',
                             jsonp: 'cb',
                             crossDomain: true,
                             
                             //data:"{}",                         
                success:function(xin){
                    yd=0;
                    document.getElementById('daima').value=mama+"【"+xin.data.list[0].codes[0].short_name+"】"
                    for(var c=0;c<xin.data.list.length;c++){
                         code=xin.data.list[c].art_code;
                         shijian=xin.data.list[c].notice_date.split(" ");
                         shijian=shijian[0];
                         console.log(Date.parse(new Date(shijian)))
                         neirong=xin.data.list[c].title;
                         if(neirong.indexOf("波动")!=-1 || neirong.indexOf("停牌")!=-1 || neirong.indexOf("关注函")!=-1){
                             yd=yd+1;
                             zzsj=charu(etime,4,"-");
                             zzsj=charu(zzsj,7,"-");
                             jjs=0;
                             for(var qwe=1;qwe<20;qwe++){//找出10天前是哪一个日期
                                 
                                  curTime1 = new Date(Date.parse(zzsj)).getTime();
                                  startDate1 = curTime1 - (qwe * 3600 * 24 * 1000);
                                  time1 = new Date(startDate1);
                                  if(time1.getDay() != 0 && time1.getDay() != 6){
                                      jjs=jjs+1;
                                  }
                                  if (jjs==9){
                                      
                                      break;
                                  }
                             }                             
                             
                             
                             zzsj=startDate1;
                             console.log(zzsj)
                             if(new Date(Date.parse(shijian))==zzsj&&neirong.indexOf("波动")!=-1&&neirong.indexOf("回")==-1){
                                 jsbd=jsbd+1;
                             }
                             ggsj=(Date.parse(shijian));
                             if(neirong.indexOf("波动")!=-1 && ggsj>=zzsj && neirong.indexOf("回")==-1){
                                 bd=bd+1;
                             }
                             nr=xin.data.list[c].columns[0].column_name+"【"+shijian+"】";
                             obj.add(new Option(nr,yd));
                         }
                         
                         if (yd==10){
                              
                               break;
                           }
                     
                    }
                      var tou = document.getElementById("tou");
                      var h55 =document.createElement("h4");
                      if(jsbd!=0){
                          h55.innerHTML="10日内异动:【"+bd+"次】明天减少【"+jsbd+"次异动】"+"《"+nali+"》";
                      }
                      else{
                          h55.innerHTML="10日内异动:【"+bd+"次】"+"《"+nali+"》";
                      }
                      h55.style.color="red";
                      tou.appendChild(h55);
                },
               })                     
                       
                    },
                                error:function(xhr,type,errorThrown){
                                      console.log(xhr.statusText);
                                      console.log(xhr.responseText);
                                      console.log(xhr.status);
                                      console.log(type);
                                      console.log(errorThrown);
                                      }
                   })                    
                   
                },
                            error:function(xhr,type,errorThrown){
                                  console.log(xhr.statusText);
                                  console.log(xhr.responseText);
                                  console.log(xhr.status);
                                  console.log(type);
                                  console.log(errorThrown);
                                  }
               })
                }else{alert("输入错误重新输入")}},
                            error:function(xhr,type,errorThrown){
                                  console.log(xhr.statusText);
                                  console.log(xhr.responseText);
                                  console.log(xhr.status);
                                  console.log(type);
                                  console.log(errorThrown);

                             }
                             
            })   
   
} 
}







   </script>
</body>

</html>