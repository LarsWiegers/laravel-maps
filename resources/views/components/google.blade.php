<style>
    #{{$mapId}} {
        height: 100%;
    }

    /* Optional: Makes the sample page fill the window. */
    html,
    body {
        height: 100%;
        margin: 0;
        padding: 0;
    }

</style>

<div id="{{$mapId}}"></div>

<script
        src="https://maps.googleapis.com/maps/api/js?key={{config('maps.google_maps.access_token', null)}}&callback=initMap&libraries=&v=weekly"
        async
></script>
<script>
    if (typeof map !== 'undefined') {
        let map = "";
    }

    function initMap() {
        map = new google.maps.Map(document.getElementById("{{$mapId}}"), {
            center: { lat: {{$centerPoint['lat'] ?? $centerPoint[0]}}, lng: {{$centerPoint['long'] ?? $centerPoint[1]}} },
            zoom: {{$zoomLevel}},
        });

        @foreach($markers as $marker)
            new google.maps.Marker({
                position: {
                    lat: {{$marker['lat'] ?? $marker[0]}},
                    lng: {{$marker['long'] ?? $marker[1]}}
                },
                map,
                title: "Hello World!",
            });
        @endforeach
    }
</script>
