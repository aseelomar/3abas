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
<style>
    #toast-container>.toast-error {
        background-color: #BD362F;
    }
</style>
<style>
    #toast-container>.toast-success {
        background-color: #2dc45a;
    }
</style>
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-8">
                <p style="margin-right: 25px;"> {{ __('admin.supplier') }} / <small>{{ __('admin.edit_supplier') }} </small>
                </p>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-12 ">
                <div class="card">

                    <div class="card-body">
                        <form class="form form-horizontal" method="POST" id="myForm"
                            action="{{ route('product.supplier.updatePost') }}">
                            @csrf

                            <input type="hidden" value="" id="latitude" name="latitude">
                            <input type="hidden" value="" id="longitude" name="longitude">
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="mb-1">
                                        <label class="form-label">{{ __('admin.supplier_name') }}</label>
                                        <input type="text" class="form-control" value="{{ $supplier->supplier_name }}"
                                            name="supplier_name" required>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-1">
                                        <label class="form-label">{{ __('admin.trade_name') }}</label>
                                        <input type="text" class="form-control" name="trade_name"
                                            value="{{ $supplier->trade_name }}">
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-1">
                                        <label class="form-label">{{ __('admin.representative_name') }}</label>
                                        <input type="text" class="form-control" name="representative_name"
                                            value="{{ $supplier->representative_name }}">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="mb-1">
                                        <label class="form-label">{{ __('admin.representative_phone') }}</label>
                                        <input type="tel" id="representative_phone" class="form-control"
                                            value="{{ $supplier->representative_phone }}" name="representative_phone">
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-1">
                                        <label class="form-label">{{ __('admin.company_phone') }}</label>
                                        <input type="tel" class="form-control" name="company_phone"
                                            value="{{ $supplier->company_phone }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-1">
                                        <label class="form-label">{{ __('admin.description') }}</label>
                                        <input type="tel" class="form-control" name="description"
                                            value="{{ $supplier->description }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-1">
                                        <label class="form-label">{{ __('admin.pay_method') }}</label>
                                        <select class="form-control select2" name="pay_method"
                                            placeholder="{{ __('admin.pay_method') }}">
                                            @foreach ($paymentMethode as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == $supplier->pay_method ? 'selected' : '' }}>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div id="map" style="height:500px;"></div>
                            <div class="col-12" style="margin-top: 25px">
                                <button type="button"
                                    class="ins_but btn btn-primary  me-1 waves-effect waves-float waves-light save">
                                    {{ __('admin.submit') }}</button>
                                <button id="reset-coupon" type="reset" class="btn btn-outline-secondary waves-effect ">
                                    {{ __('admin.reset') }}</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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

        var latX = '{{ $supplier->latitude?? '34.09624440695029' }}'
        var lngX = '{{ $supplier->longitude?? '34.452212625718715' }}'


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
        $('body').on("click", '.ins_but', function() {
            var formData = $('#myForm').serializeArray();
            var postUrl = '{{ route('product.supplier.updatePost') }}';

            var fail = false;
            var fail_log = '';
            var name;

            $('#myForm').find('select, textarea, input').each(function() {
                if (!$(this).prop('required')) {

                } else {
                    if (!$(this).val()) {
                        fail = true;
                        name = $(this).attr('name');
                        fail_log += name + " is required \n";
                    }
                }
            });
            if (!fail) {
                $.ajax({
                    type: "POST",
                    data: {
                        'formData': formData,
                        '_token': "{{ csrf_token() }}",
                        'id': "{{ $supplier->id }}"
                    },
                    datatype: 'json',
                    url: postUrl,
                    success: function(html) {
                        toastr.options = {
                            "closeButton": true,
                            "progressBar": true,
                            "positionClass": "toast-bottom-left",
                        }
                        toastr.success("تم التحديث بنجاح");
                    },
                });
            } else {
                $('#myForm').addClass("was-validated");
                'use strict';
                $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();

            }
        });
    </script>
@endsection
