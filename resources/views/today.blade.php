@extends('layouts.app')
@section('content')
    <style>
        /* Set the size of the div element that contains the map */
        #map {
            height: 600px; /* The height is 400 pixels */
            width: 1200px; /* The width is the width of the web page */
        }
    </style>

    <br/>
    <div class="row" id="map">
        <div class="col-xs-12" style="width: 1em; height: 20em; background-position: center">
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        function initMap() {
            var numMarkers = {!! json_encode($amount)!!};
            var latlngs = {!! json_encode($latlngs) !!};

            var kansas = {lat: 39.50, lng: -98.35};
            var map = new google.maps.Map(
                document.getElementById('map'), {zoom: 4, center: kansas});

            var markers = [];
            var contents = [];
            var infowindows = [];
            var openInfo = null;

            for (i = 0; i < numMarkers; i++) {

                markers[i] = new google.maps.Marker({
                    position: new google.maps.LatLng(latlngs[i].latitude, latlngs[i].longitude),
                    map: map,
                    filename: latlngs[i].filename
                });
                markers[i].index = i;
                contents[i] = "<div>+ <img src=storage/" + markers[i].filename + "></div>";

                infowindows[i] = new google.maps.InfoWindow({
                    content: contents[i],
                    maxWidth: 400,
                    maxHeight: 220
                });

                google.maps.event.addListener(markers[i], 'click', function () {
                    if (openInfo)
                        openInfo.close();
                    infowindows[this.index].open(map, markers[this.index]);
                    openInfo = infowindows[this.index];
                    map.panTo(markers[this.index].getPosition());
                });
            }
        }
    </script>

    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtqWsq5Ai3GYv6dSa6311tZiYKlbYT4mw&callback=initMap">
    </script>

@endsection