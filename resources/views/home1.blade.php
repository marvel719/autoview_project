<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
</head>
<body>
    



<body>
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>
    <div class="content">
    <div id="wrapper">
        <div id="left">
            <div id="sigin">
                <div class="logo">
                    <img src="{{asset('/images/shl1.jpg')}}" style="width:150px;">
                </div>
                <h1 id="title">AVERAGE PERFORMANCE OF MOCK_AI DASHBOARD</h1>
                <form>
                    <div> 
                        <label> Platform Name:</label>
                        <select class="plt">
                            
                            <option href="#" class="autoview">AutoView</option>
                            
                            
                        </select>
                    </div>  
                    <br> <br>
                   

    


<div id='module'>
 
 <label>MODULE ID :</label>    
<select id='Modules' class="mod"><option>ModuleID</option></select>
  
  <h1 id="id">ModuleId</h1>
  
<div class="can" style="text-align:left;width:400px;margin-left:20px;font-size:20px;">
<h6>&nbsp;TOTAL NUMBER OF CANDIDATES:</h6></div>
<h6><div class="demo1" style="margin-top:-52px;width:60px;margin-left:300px;">
<div id="demo" style="font-size:20px;">count</div></div></h6>





  <canvas id="myChart" style="width:100%;max-width:1100px;"></canvas>
</div>
</div>
<!-- jquery cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- custom js file link  -->
<script src={{url('js/chart.js')}}></script>

<style>
    html {
  height:100%;
}

body {
  margin:0;
}
.rwd{
    text-align:left;
    font-size:17px;
    left:30%;
.can{
    text-align:left;
    font-size:17px;
}

}
.mod{
    width:250px;
    background:pink;
    height:35px;

}
img{
    width:50px;
    border-radius:8px;
    padding:3px;
    border:1px solid #ddd;
    height:auto;
    opacity:1;
    
}
.plt{
    width:250px;
    background:pink;
    height:35px;
}
.bg {
  animation:slide 3s ease-in-out infinite alternate;
  background-image: linear-gradient(-60deg, #6c3 50%, #09f 50%);
  bottom:0;
  left:-50%;
  opacity:.5;
  position:fixed;
  right:-50%;
  top:0;
  z-index:-1;
}

.bg2 {
  animation-direction:alternate-reverse;
  animation-duration:4s;
}

.bg3 {
  animation-duration:5s;
}

.content {
  
  border-radius:.25em;
  box-shadow:0 0 .25em rgba(0,0,0,.25);
  box-sizing:border-box;
  left:50%;
  
  
  text-align:center;
  top:50%;
  
}

h1 {
  font-family:monospace;
}

@keyframes slide {
  0% {
    transform:translateX(-25%);
  }
  100% {
    transform:translateX(25%);
  }
}
</style>   
</body>
</html>