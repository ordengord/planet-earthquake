@extends('layouts.app')
<style>
    /* Set the size of the div element that contains the map */
    #map {
        height: 400px; /* The height is 400 pixels */
        width: 800px; /* The width is the width of the web page */
    }
</style>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class=form-check>
                    <div>
                        <legend>Select date for</legend>
                        <form method="POST" class=form-check name="order" action="">
                            {{csrf_field()}}
                            <label for="startDate">Start</label> <br/>
                            <div><input type="date" name="start_date" class=form-check/></div>
                            <label for="end">End</label><br/>
                            <div><input type="date" name="end_date" class=form-check/></div>
                            <div>
                                <label for="lat"> Select or type latitude</label> <br/>
                                <input type="text" name="latitude" id="lat" class=form-check/> <br/>
                                <label for="longitude"> Select or type longitude </label><br/>
                                <input type="text" class=form-check name="longitude" id="lng"/> <br/>
                            </div>
                            <input type="submit" class="btn-success" name="submit" value="Make an order">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <h3>My Google Maps Demo</h3>
                <div id="map"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>


        @if($prevOrders)
            <div class="row">
                <div class="col-xs-12">
                    <a href="{{route('my-orders')}}">To my orders</a>
                </div>
            </div>
        @endif
    </div>
@endsection


<script>
    // Initialize and add the map
    function initMap() {
        // The location of Uluru
        var uluru = {lat: -25.344, lng: 131.036};
        // The map, centered at Uluru
        var map = new google.maps.Map(
            document.getElementById('map'), {zoom: 1, center: uluru});
        var numMarkers = 0;
        var marker;

        google.maps.event.addListener(map, 'click', function (event) {
            placeMarker(event.latLng);
        });

        google.maps.event.addDomListener(window, 'change', relocate);
        google.maps.event.addDomListener(window, 'change', relocate);


        function placeMarker(location) {
            if (numMarkers++ > 0) {
                marker.setPosition(location);
            } else {
                marker = new google.maps.Marker({
                    draggable: false,
                    position: location,
                    map: map
                });
            }
            document.getElementById('lat').value = marker.position.lat();
            document.getElementById('lng').value = marker.position.lng();
        }

        function relocate() {
            var location = new google.maps.LatLng(document.getElementById('lat').value, document.getElementById('lng').value);
            placeMarker(location);

        }

    }


    //google.maps.event.addDomListener(document.getElementById())
</script>
<!--Load the API from the specified URL
* The async attribute allows the browser to render the page while the API loads
* The key parameter will contain your own API key (which is not needed for this tutorial)
* The callback parameter executes the initMap() function
-->
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtqWsq5Ai3GYv6dSa6311tZiYKlbYT4mw&callback=initMap">
</script>
