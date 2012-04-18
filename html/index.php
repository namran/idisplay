<html>
<head><title>Data Display </title> </head>


<style>

body { background-image: url("i/bg.jpg");
  background-repeat: no-repeat;
  background-position: 0px 0px;
} 

.clock {
  position:absolute;
  top:12px;
  left:400px;
  color:#00FF00;
  white-space:nowrap; 
  font-size:small;
 font-family: arial;
}

.winddir-label{
  position:absolute;
  top:60px;
  left:40px;
  color:#FFFFFF;
  white-space:nowrap; 
}
.data-wd {
  position:absolute;
  top:60px;
  left:180px;
  color:#00FF00;
  white-space:nowrap; 
  font-weight: bold;
}
.winddir-unit{
  position:absolute;
  top:60px;
  left:230px;
  color:#FFFFFF;
  white-space:nowrap; 
}
.wind-label{
  position:absolute;
  top:80px;
  left:40px;
  color:#FFFFFF;
  white-space:nowrap; 
}
.data-ws {
  position:absolute;
  top:80px;
  left:180px;
  color:#00FF00;
  white-space:nowrap; 
 font-weight: bold;
}
.wind-unit{
  position:absolute;
  top:80px;
  left:230px;
  color:#FFFFFF;
  white-space:nowrap; 
}
.time-label {
  position:absolute;
  top:10px;
  left:300px;
  color:#FFFFFF;
  white-space:nowrap;   


}

.data-last-update {
  position:absolute;
  top:520px;
  left:40px;
  color:#663366;
  white-space:nowrap; 
 font-weight: small;
}

</style>

 <script src="js/jquery.min.js"></script>

<script type="text/javascript">
/** hook up to the link click event for refresh **/
$(document).ready(function(){
         $("a").click(function(event){
      
         alert("Force Update data.. ");
         updateData();
         event.preventDefault();
       });
     });
/** this for the clock and timestamp from the server itself 
   it shall update every 1-sec  to show that it is connected to server **/
function updateClock(){

    $.get('e/myclock.php', function(ts){
        // clock fetched.. refresh the clock
         $('.clock').html(ts);
       });
}

/** update interval is 1000 ms = 1sec **/
setInterval( "updateClock()", 1000 );


function updateData(){
   $.get('e/mydata.php?ts='+ Math.random() * 500, function(d){

        $(d).find('data').each(function(){

            var $data = $(this); 
            var ts = $data.attr("timestamp");
            var wd = $data.find('winddirection').text();
            var ws = $data.find('windspeed').text();

            $(".data-wd").hide("slow");
            $(".data-wd").html(wd);
            $(".data-wd").show("slow");

            $(".data-ws").hide("slow");
            $(".data-ws").html(ws);
            $(".data-ws").show("slow");

            $(".data-last-update").hide("slow");
            $(".data-last-update").html('Data Last Updated : '  + ts + '<a href="javascript:updateData();"> Update NOW</a>');
            $(".data-last-update").show("slow");
        }); // find

    }); // this for getting.. data
}
/** update interval is 30000 ms = 30sec **/
setInterval( "updateData()", 30000 );
 </script>


<body>
 <div class='time-label'>
 Timestamp:
 </div>
 <div class='clock'>
  2012-04-11 14:22:00 +0800
 </div> 
 <div class='winddir-label'>
 Wind Direction :
 </div>
 <div class='data-wd'>
  200
 </div>
 <div class='winddir-unit'>
 deg
 </div>
 <div class='wind-label'>
 Wind Speed :
 </div>
 <div class='data-ws'>
  20.0 
 </div>
 <div class='wind-unit'>
 m/s
 </div>
 <div class='data-last-update'
 </div>
  <a href="http://wwww.namran.net">reload ..</a>
</body>
</html>

