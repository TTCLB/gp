<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="referrer" content="no-referrer"/>
<meta name="referrer" content="never"/>
<meta name="referrer" content="same-origin"/>
<meta http-equiv="Access-Control-Allow-Origin" content="*">
    <meta charset="utf-8">
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
                            <span style="color:#000000">偏离值计算</span>
                        </div>
                         <div class="card">

                                                                        <div class="card-body">
                                    <div class="input-sizes">
                                        <form class="form-horizontal fc-view" >

                                                    
                                   <div class="form-group">
                                            <div class="row">
                                              <div class="col-lg-2"></div>
                                                <div class="col-lg-8">
                                                    <input id="daima" type="text" placeholder="股票代码" class="form-control"  name="example-input-small" lay-key="1" onblur="lsgc()">
                                                    
                                                </div>
                                            </div>
                                            <div class="row">
                                              <div class="col-lg-2"></div>
                                                <div class="col-lg-8">
                                                    <input id="pianli" type="text" placeholder="偏离值"  class="form-control" >
                                                    
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
   <script>
   document.onkeydown = keyListener;
function keyListener(e) {
// 当按下回车键，执行我们的代码
    if (e.keyCode == 13) {
SubInfo();
    }
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





function lsgc(){
 var sj =$("#EndTime").val();
 var sj1=$("#StartTime").val();
 var daima="cn_"+$("#daima").val();
 var zs="zs_000001";
 
 if(daima.slice(3,5)=="00"){
   
     zs="zs_399001";
 }
 var dzh=0;
 var zzh=0;
 var js=0;
 var stime=0;
 var etime=sj;
 if(sj==sj1){
     for(var i=1;i<10;i++){
         console.log(i)
         var curTime = new Date().getTime();
         var startDate = curTime - (i * 3600 * 24 * 1000);
         var time = new Date(startDate);
          if(time.getDay() != 0 && time.getDay() != 6){
              js=js+1;
              stime=time.format('Ymd');
              console.log(stime)
          }
          if (js==2){
              break;
          }
     }
 }
 else{stime=sj1;}

 
            $.ajax({
                type:"get",//请求服务器载入数据
                //async:true,//异步属性
                url:"https://q.stock.sohu.com/hisHq?code="+daima+"&start="+stime+"&end="+etime+"&callback = callback&rt=jsonp",
                             dataType:'jsonp',//服务器返回json格式数据
                             jsonpCallback:'callback',
                             jsonp: 'callback',
                             crossDomain: true,
                             data:"{}",
                success:function(result){
                    
                    for(var a=0;a<result[0].hq.length;a++){
                        var zhi=result[0].hq[a][4].replace("%","");
                        if(Number(zhi)>0){dzh=dzh+Number(zhi);}
                        
                    }
               $.ajax({
                type:"get",//请求服务器载入数据
                //async:true,//异步属性
                url:"https://q.stock.sohu.com/hisHq?code="+zs+"&start="+stime+"&end="+etime+"&callback = callback&rt=jsonp",
                             dataType:'jsonp',//服务器返回json格式数据
                             jsonpCallback:'callback',
                             jsonp: 'callback',
                             crossDomain: true,
                             data:"{}",                         
                success:function(res){
                    for(var b=0;b<res[0].hq.length;b++){
                        var zhi=res[0].hq[b][4].replace("%","");
                        console.log(zhi)
                        zzh=zzh+Number(zhi);
                    }
                    console.log(dzh)
                    console.log(zzh)
                    document.getElementById('pianli').value=dzh-zzh;
                   
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
   
    
}







   </script>
</body>

</html>