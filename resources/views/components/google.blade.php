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

    function addInfoWindow(marker, message) {

        var infoWindow = new google.maps.InfoWindow({
            content: message
        });

        google.maps.event.addListener(marker, 'click', function () {
            infoWindow.open(map{{$mapId}}, marker);
        });
    }

        @foreach($markers as $marker)
            var marker{{ $loop->iteration }} = new google.maps.Marker({
                position: {
                    lat: {{$marker['lat'] ?? $marker[0]}},
                    lng: {{$marker['long'] ?? $marker[1]}}
                },
                map: map{{$mapId}},
                @if(isset($marker['title']))
                title: "{{ $marker['title'] }}",
                @endif
                icon: @if(isset($marker['icon']))"{{ $marker['icon']}}" @else null @endif
            });

            @if(isset($marker['info']))
                addInfoWindow(marker{{ $loop->iteration }}, @json($marker['info']));
            @endif

        @endforeach
    }
</script>
