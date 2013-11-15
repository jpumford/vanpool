<?php
$page = "map";

include('./header.php');
?>
<section id="map" style="height: 100%; width: 100%; margin: 0;">
    <div id="map-canvas" style="height: 100%; width: 100%;">
    </div>
</section>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
            <?php
            // grab all the data!
            $data = $mysql->query("select street1, street2, zip, city, leaveHouse, leaveWork, notes from People");
            $rows = array();
            while ($row = $data->fetch_assoc()) {
                $rows[] = $row;
            }
            ?>
            var data = <?php echo json_encode($rows) ?>;
            data.push({city: "Lehi", street1: "3900 Adobe Way", street2: null, zip: "84606"});
            var element = document.getElementById("map-canvas");

            var map = new google.maps.Map(element, {
                center: new google.maps.LatLng(40.435590, -111.890930),
                zoom: 11,
                mapTypeId: "OSM",
                mapTypeControl: false,
                streetViewControl: false
            });

            //Define OSM map type pointing at the OpenStreetMap tile server
            map.mapTypes.set("OSM", new google.maps.ImageMapType({
                getTileUrl: function(coord, zoom) {
                    return "http://tile.openstreetmap.org/" + zoom + "/" + coord.x + "/" + coord.y + ".png";
                },
                tileSize: new google.maps.Size(256, 256),
                name: "OpenStreetMap",
                maxZoom: 18
            }));

            var infoWindows = [];
            var currentInfoWindow = undefined;

            // grab geo information
            var geocoder = new google.maps.Geocoder();
            var addresses = [];
            function setupInfo(index, object) {
                var address = object.street1 + " " + (object.street2 ? object.street2 : "") + " " + object.city + " " + object.zip;
                infoWindows[index] = new google.maps.InfoWindow({
                    content: 'Address: ' + address + '<br>' +
                        'Leave House at: ' + (object.leaveHouse != null ? object.leaveHouse : "unspecified") + '<br>' +
                        'Leave Work at: ' + (object.leaveWork != null ? object.leaveWork : "unspecified") + '<br>' +
                        'Notes: ' + (object.notes != null ? object.notes : "none")
                });
                geocoder.geocode({address: address}, function(results, status) {
                    plotPoint(results, status, index);
                });
            }
            for (var i = 0; i < data.length; i++) {
                setupInfo(i, data[i]);
            }

            function plotPoint(results, status, infoWindowIndex) {
                if (status == google.maps.GeocoderStatus.OK) {
                    var marker = new google.maps.Marker({
                        map: map,
                        position: results[0].geometry.location,
                        animation: google.maps.Animation.DROP,
                        title: results[0]['formatted_address']
                    });
                    google.maps.event.addListener(marker, 'click', function() {
                        // close current window
                        currentInfoWindow && currentInfoWindow.close();
                        infoWindows[infoWindowIndex].open(map, marker);
                        currentInfoWindow = infoWindows[infoWindowIndex];
                    });
                }
            }
</script>

<?php
include('./footer.php');
?>
