<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
      integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
      crossorigin=""/>

<style>
    #mapid {
        height: 100vh;
    }
</style>

<div id="mapid"></div>

<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
<script>

    var mymap = L.map('mapid').setView([{{implode(",", $centerPoint)}}], {{$zoomLevel}});
    @foreach($markers as $marker)

        @if(isset($marker['icon']))

            let icon = L.icon({
                iconUrl: '{{$marker['icon']}}',
                iconSize:     [38, 95], // size of the icon
                shadowSize:   [50, 64], // size of the shadow
                iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
                shadowAnchor: [4, 62],  // the same for the shadow
                popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
            });
            L.marker([{{$marker['lat'] ?? $marker[0]}}, {{$marker['long'] ?? $marker[1]}}], {icon: icon}).addTo(mymap);

        @else

            L.marker([{{implode(",", $marker)}}]).addTo(mymap);

    @endif

    @endforeach

    @if($tileHost === 'mapbox')
        let url = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={{config('maps.mapbox.access_token', null)}}';
    @elseif($tileHost === 'openstreetmap')
        let url = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
    @endif
    L.tileLayer(url, {
        maxZoom: {{$maxZoomLevel}},
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1
    }).addTo(mymap);
</script>
