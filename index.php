<!DOCTYPE html>
<html>

<head>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
  <script src="build/heatmap.js"></script>
  <script src="plugins/gmaps-heatmap/gmaps-heatmap.js"></script>

  <style>
      html,body{
          margin:0;
          height:100%;
      }
      img{
        display:block;
        width:100%; height:100%;
        object-fit: cover;
      }
    </style>

</head>
<title>
  
</title>
<body>

<h2>BTS Distribution in IRAN</h2>
  
<button onclick="update_points()">update</button>

<select id="hours">
  <option value="0">00:00 am</option>
  <option value="1">01:00 am</option>
  <option value="2">02:00 am</option>
  <option value="3">03:00 am</option>
  <option value="4">04:00 am</option>
  <option value="5">05:00 am</option>
  <option value="6">06:00 am</option>
  <option value="7">07:00 am</option>
  <option value="8">08:00 am</option>
  <option value="9">09:00 am</option>
  <option value="10">10:00 am</option>
  <option value="11">11:00 am</option>
  <option value="12">12:00 pm</option>
  <option value="13">13:00 pm</option>
  <option value="14">14:00 pm</option>
  <option value="15">15:00 pm</option>
  <option value="16">16:00 pm</option>
  <option value="17">17:00 pm</option>
  <option value="18">18:00 pm</option>
  <option value="19">19:00 pm</option>
  <option value="20">20:00 pm</option>
  <option value="21">21:00 pm</option>
  <option value="22">22:00 pm</option>
  <option value="23">23:00 pm</option>
</select>

<div class="heatmap">
<img  src="Iran_Map.svg" >
</div>
<script>




var heatmapInstance = h337.create({
  container: document.querySelector('.heatmap')
});


function get_points ()
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
      var points = [];
      var max = 10000000;
      var width = window.innerWidth;
      var height = window.innerHeight;
      console.log(width)
      console.log(height)
        var data = {
            max: max,
            data: JSON.parse(this.response)
          };
          heatmapInstance.setData(data);
      }
    };
    var d = new Date();
    var hour = d.getHours();
    document.getElementById("hours").value = hour
    xmlhttp.open("GET", "load_data.php?hour=" + hour+"&width="+window.innerWidth+"&height=" + window.innerHeight, true);
    xmlhttp.send();
}

function update_points ()
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
      var points = [];
      var max = 10000000;
      var width = window.innerWidth;
      var height = window.innerHeight;
      console.log(width)
      console.log(height)
        var data = {
            max: max,
            data: JSON.parse(this.response)
          };
          heatmapInstance.setData(data);
      }
    };
    var hour = document.getElementById("hours").value
    xmlhttp.open("GET", "load_data.php?hour=" + hour+"&width="+window.innerWidth+"&height=" + window.innerHeight, true);
    xmlhttp.send();
}

get_points();
setInterval(get_points, 100000);
</script>
<style>
  .heatmap-canvas{
  opacity:0.5;
}

</style>
</body>
</html> 
