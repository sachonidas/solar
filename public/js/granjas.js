$(document).ready(function (){
	$('.granjaTab').addClass('active');
	$('.inicioTab').removeClass('active');
});

 
function addMarkersToMap(map) {
    //var icon = new H.map.Icon("{{asset('images/panel-solar.png'}}");
    var pamplonaMarker = new H.map.Marker({lat:42.8184538, lng:-1.6442556});
    map.addObject(pamplonaMarker);

    var madridMarker = new H.map.Marker({lat:40.4, lng: -3.6833});
    map.addObject(madridMarker);

    var barcelonaMarker = new H.map.Marker({lat:41.3828939, lng: 2.1774322});
    map.addObject(barcelonaMarker);
    
	var alicanteMarker = new H.map.Marker({lat:38.353738, lng: -0.4901846});
    map.addObject(alicanteMarker);
	
	var extremaduraMarker = new H.map.Marker({lat:39.1748426, lng: -6.1529891});
    map.addObject(extremaduraMarker);

}

var platform = new H.service.Platform({
  'apikey': '7ZzCbyhqcb7zYXNdkdXLIBxsxmWXdv7pRneEnX3xaWE'
});
var defaultLayers = platform.createDefaultLayers();

var map = new H.Map(document.getElementById('map'),
  defaultLayers.vector.normal.map,{
  center: {lat:39.3262345, lng:-4.8380649},
  zoom: 6,
  pixelRatio: window.devicePixelRatio || 1
});

window.addEventListener('resize', () => map.getViewPort().resize());

var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

var ui = H.ui.UI.createDefault(map, defaultLayers);

window.onload = function () {
  addMarkersToMap(map);
} 

