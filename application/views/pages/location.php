<div id="map" style="width:100%;height:500px;"></div>

<script>
function myMap() {
var location= {lat:32.730420,lng:-97.110755};
var map=new google.maps.Map(document.getElementById("map"),{
	zoom:17,
		center:location
});
var marker = new google.maps.Marker({
	position: location,
	map:map
	});
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhTmU-Gx0X3uJ2t0T3QUbgKHYaM4K0JOo&callback=myMap"></script>

</body>
</html>

