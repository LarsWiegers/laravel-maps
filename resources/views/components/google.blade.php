<style>
    #{{$mapId}} {
        height: 100%;
    }
</style>
<style>
    #{{$mapId}} {
    @if(! isset($attributes['style']))
        height: 100vh;
    @else
        {{ $attributes['style'] }}
    @endif
    }
</style>

<div id="{{$mapId}}" @if(isset($attributes['class']))
class='{{ $attributes["class"] }}'
        @endif
></div>
<script
        src="https://maps.googleapis.com/maps/api/js?key={{config('maps.google_maps.access_token', null)}}&callback=initMap{{$mapId}}&libraries=&v=3"
        async
></script>

<script>
    let map{{$mapId}} = "";

    function initMap{{$mapId}}() {
        map{{$mapId}} = new google.maps.Map(document.getElementById("{{$mapId}}"), {
            center: { lat: {{$centerPoint['lat'] ?? $centerPoint[0]}}, lng: {{$centerPoint['long'] ?? $centerPoint[1]}} },
            zoom: {{$zoomLevel}},
        });

        @foreach($markers as $marker)
            new google.maps.Marker({
                position: {
                    lat: {{$marker['lat'] ?? $marker[0]}},
                    lng: {{$marker['long'] ?? $marker[1]}}
                },
                map: map{{$mapId}},
                title: "{{ $marker['title'] ?? 'Hello World!' }}",
            });
        @endforeach
    }
</script>
