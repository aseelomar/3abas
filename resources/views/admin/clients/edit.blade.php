@extends('layouts.app')

<style>
    .dataTables_filter {
        float: right !important;
        padding: 10px;
    }

    .form-control-sm {
        margin-right: 10px;
    }

    .sticky+.content {
        padding-top: 99px;
    }



    .buttons-excel {
        border-radius: 0px !important;

    }
</style>
<style> #toast-container > .toast-error { background-color: #BD362F; } </style>
<style> #toast-container > .toast-success { background-color: #2dc45a; } </style>

@section('title')
Create Page
@endsection

@section('content')



    <div class="row">
        <div class="col-8">
            <p style="margin-right: 25px;"> {{__('admin.edit_client_data')}} </small> </p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 ">
            <div class="card">
                <div class="card-content">
                    <br>

                    <div class="row">
                        <div class="col-9">
                            <h3 style="margin-right:60px;"> {{__('admin.edit_client_data')}}</h3>
                        </div>
                        <div class="col-md-2  col-sm-1">
                            <button  type="button" onclick="window.location='{{route('clients')}}'" class=" btn btn-outline-danger" style="float: left;">{{__('admin.back')}}</button>
                        </div>
                    </div>
                    <br>
                    {{-- <p style="margin-right: 25px;">@lang('Add A New Page')</p> --}}
                    <form class="form container" method="POST" id="myFormStore" action="{{ route('client.store') }}" enctype="multipart/form-data">

                        @csrf

                        <input type="hidden" name="id" value="{{ isset($client) ? $client->id : '' }}">

                   <div class="row">

                    <div class="col-md-6 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-column">{{__('admin.name')}}</label>
                            <input type="text" id="" value="{{$client->name}}" class="form-control"  placeholder="{{__('admin.name')}}" name="name" >
                        </div>
                    </div>


                    <div class="col-md-6 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-column">{{__('admin.email')}}</label>
                            <input type="text" id="" value="{{$client->email}}" class="form-control"  placeholder="{{__('admin.eamil')}}" name="email" >
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-column">{{__('admin.mobile')}}</label>
                            <input type="text" id="" value="{{$client->mobile}}" class="form-control"  placeholder="{{__('admin.mobile')}}" name="mobile" >
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-column">{{__('admin.extra_mobile')}}</label>
                            <input type="text" id="" value="{{$client->extra_mobile}}" class="form-control"  placeholder="{{__('admin.extra_mobile')}}" name="extra_mobile" >
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-column">{{__('admin.location')}}</label>
                            <input type="text" id="" value="{{$client->location}}" class="form-control"  placeholder="{{__('admin.location')}}" name="location" >
                        </div>
                    </div>

                    <div class="col-md-6 mb-1">
                        <label class="form-label" >{{__('admin.country_id')}}</label>
                        <div class="position-relative">
                            <select class="select2 form-select select2-hidden-accessible" name="country_id"   tabindex="-1" aria-hidden="true">


                                <optgroup label="All country">
                                    {{-- <option value="0" {{ $country ?'selected':''}}></option> --}}
                                </optgroup>

                                    @foreach ($country as $c)
                                        <option  value="{{ $c->id }}" {{ $c->id == $client->country_id ?'selected':''}}>{{ $c->country_name }}</option>
                                    @endforeach

                            </select>
                        </div>
                    </div>

                    <input type="hidden" value="" id="latitude" name="latitude">
                    <input type="hidden" value="" id="longitude" name="longitude">
                    <div class="col-md-6 col-12">
                        <div class="mb-1">
                            <div id="map" style="height:500px;"></div>
                            </div>

                    </div>

                    </div>
                     <br>
                                <div class="col-12">
                                    <button class="btn btn-primary mr-1 mb-1"  id="store_btn">{{__('admin.submit')}}</button>
                                    <button type="reset" class="btn btn-outline-warning mr-1 mb-1">{{__('admin.reset')}}</button>
                                </div>
                            </div>
                        </div>
                    </form>


                </div>
            </div>



@endsection

@section('js')
<script type="text/javascript">
    $("#pac-input").focusin(function() {
        $(this).val('');
    });
    $('#latitude').val('');
    $('#longitude').val('');

    var latX = '{{ $client->latitude?? '34.09624440695029' }}'
    var lngX = '{{ $client->longitude?? '34.452212625718715' }}'


    function initAutocomplete() {
        var myLatLng = new google.maps.LatLng(latX, lngX);


        var map = new google.maps.Map(document.getElementById('map'), {
            center: myLatLng,
            zoom: 13,
            mapTypeId: 'roadmap'
        });

        // var marker = new google.maps.Marker({
        //             position: new google.maps.LatLng(myLatLng),
        //             map: map,
        //             title: 'موقع المورد'
        //         });
        // markers.push(marker);

        // move pin and current location
        infoWindow = new google.maps.InfoWindow;
        geocoder = new google.maps.Geocoder();
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                    lat: latX,
                    lng: lngX
                };
                map.setCenter(pos);
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(myLatLng),
                            map: map,
                            title: 'موقع المورد'
                        });
                markers.push(marker);
                marker.addListener('click', function() {
                    geocodeLatLng(geocoder, map, infoWindow, marker);
                });
                // to get current position address on load
                google.maps.event.trigger(marker, 'click');
            }, function() {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }
        var geocoder = new google.maps.Geocoder();
        google.maps.event.addListener(map, 'click', function(event) {
            SelectedLatLng = event.latLng;
            geocoder.geocode({
                'latLng': event.latLng
            }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        deleteMarkers();
                        addMarkerRunTime(event.latLng);
                        SelectedLocation = results[0].formatted_address;
                        console.log(results[0].formatted_address);
                        splitLatLng(String(event.latLng));
                        $("#pac-input").val(results[0].formatted_address);
                    }
                }
            });
        });

        function geocodeLatLng(geocoder, map, infowindow, markerCurrent) {
            var latlng = {
                lat: markerCurrent.position.lat(),
                lng: markerCurrent.position.lng()
            };
            console.log(latlng);
            /* $('#branch-latLng').val("("+markerCurrent.position.lat() +","+markerCurrent.position.lng()+")");*/
            $('#latitude').val(markerCurrent.position.lat());
            $('#longitude').val(markerCurrent.position.lng());
            geocoder.geocode({
                'location': latlng
            }, function(results, status) {
                if (status === 'OK') {
                    if (results[0]) {
                        map.setZoom(11);
                        var marker = new google.maps.Marker({
                            position: latlng,
                            map: map
                        });
                        markers.push(marker);
                        infowindow.setContent(results[0].formatted_address);
                        SelectedLocation = results[0].formatted_address;
                        $("#pac-input").val(results[0].formatted_address);
                        infowindow.open(map, marker);
                    } else {
                        window.alert('No results found');
                    }
                } else {
                    window.alert('Geocoder failed due to: ' + status);
                }
            });
            SelectedLatLng = (markerCurrent.position.lat(), markerCurrent.position.lng());
        }

        function addMarkerRunTime(location) {
            var marker = new google.maps.Marker({
                position: location,
                map: map
            });
            markers.push(marker);
        }

        function setMapOnAll(map) {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(map);
            }
        }

        function clearMarkers() {
            setMapOnAll(null);
        }

        function deleteMarkers() {
            clearMarkers();
            markers = [];
        }
        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        $("#pac-input").val("{{ __('admin.بحث') }} ");
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(input);
        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
            searchBox.setBounds(map.getBounds());
        });
        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
            var places = searchBox.getPlaces();
            if (places.length == 0) {
                return;
            }
            // Clear out the old markers.
            markers.forEach(function(marker) {
                marker.setMap(null);
            });
            markers = [];
            // For each place, get the icon, name and location.
            var bounds = new google.maps.LatLngBounds();
            places.forEach(function(place) {
                if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
                }
                var icon = {
                    url: place.icon,
                    size: new google.maps.Size(100, 100),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25)
                };
                // Create a marker for each place.
                markers.push(new google.maps.Marker({
                    map: map,
                    icon: icon,
                    title: place.name,
                    position: place.geometry.location
                }));
                $('#latitude').val(place.geometry.location.lat());
                $('#longitude').val(place.geometry.location.lng());

                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            map.fitBounds(bounds);
        });
    }

    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
            'Error: The Geolocation service failed.' :
            'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
    }

    function splitLatLng(latLng) {
        var newString = latLng.substring(0, latLng.length - 1);
        var newString2 = newString.substring(1);
        var trainindIdArray = newString2.split(',');
        var lat = trainindIdArray[0];
        var Lng = trainindIdArray[1];

        $("#latitude").val(lat);
        $("#longitude").val(Lng);
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAiLfF1aA0gZBSYPn2NyT_1eBQLG4_kkK0&libraries=places&callback=initAutocomplete&language=ar&region=EG
async defer"></script>

<script>

    let name;
    let object;
    $(document).ready(function() {

        $('#store_btn').on('click', function(e) {
                var myBookId = $(this).data('id');
                $(".modal-body #bookId").val(myBookId);
            });

            $('#store_btn').on('click', function(e) {
                e.preventDefault();
                console.log($('#myFormStore'));
                // alert($('#myFormStore'));
                var formData = new FormData($("#myFormStore")[0]);

                func($('#myFormStore'), formData);
            });


        window.addEventListener("click", function(event) {

            if (event.target.nodeName !== 'TD' && $('#myFormStore').attr('hidden') == 'hidden' && event
                .target.nodeName !== 'BUTTON' && event
                .target.nodeName !== 'INPUT' && event
                .target.nodeName !== 'A' && event
                .target.nodeName !== 'SELECT') {
                console.log('window');

                $('#myFormStore').attr('hidden', false)
                $('#myFormUpdate').attr('hidden', true)
                var s = document.querySelector('tr.selected');
                s && s.classList.remove('selected');
            }

        });
        $('#dataTableClients').DataTable();


    });

    function func(form, formData) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: form.attr('action'),
                dataType: 'json',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(resp) {

                    display_error_messages('success', resp.message)

                },
                error: function(resp) {

                    $.each(resp.responseJSON.errors, function(i, error) {
                        display_error_messages("error", error[0]);

                    });


                },
                'complete': function() {}
            });

        }

        function display_error_messages(type, msg) {

toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-bottom-left",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};
if (type == 'error') {
    toastr.error(msg);
} else {
    toastr.success(msg);
}

}



</script>


@endsection
