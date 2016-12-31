/*
* @Author: hakim
* @Date:   2016-12-30 17:03:57
* @Last Modified by:   hakim
* @Last Modified time: 2016-12-31 20:11:43
*/

var infowindow = new google.maps.InfoWindow();
  
function initialize() {
	var marker_location = locations[0].centerlocation;
	
	map = new google.maps.Map(document.getElementById('map'), { 
		zoom: 14, 
		center: locations[0].latlng, 
		mapTypeId: google.maps.MapTypeId.ROADMAP 
	});
	var marker = new google.maps.Marker({
		position: locations[0].latlng,
		map: map,
		title: locations[0].info
	});
	google.maps.event.addListener(marker, 'click', (function(marker, i) {
		return function() {
		    infowindow.setContent(locations[0].info);
		    infowindow.open(map, marker);
		}
	})(marker, 0));
}