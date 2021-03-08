<!DOCTYPE html>
<html>
<body>

<h1>LILO Car Wash Location</h1>

<div id="googleMap" style="width:100%;height:400px;"></div>

<script>
function myMap() {
var mapProp= {
  center:new google.maps.LatLng(48.4274066,-89.252256),
  zoom:5,
};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzBHM1r94CajXfWm5eKReF0lJ8Ki1WUEw&callback=myMap"></script>
<script>
var marker = new google.maps.Marker({
  position:myCenter,
  animation:google.maps.Animation.BOUNCE
});

marker.setMap(map);
</script>
</body>
</html>