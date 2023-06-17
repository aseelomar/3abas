<?php $__env->startSection('title', __('site.category')); ?>
<?php $__env->startSection('subTitle', __('site.category')); ?>
<?php $__env->startSection('sub_Title', __('site.category')); ?>
<?php $__env->startSection('content'); ?>


    <main>
        <?php if(Auth::user()): ?>
            <div class="profile-page">
                <div class="container-content">
                    <div class="profile-layout">
                        <aside>
                            <div class="user-menu-side">
                                <div id="user_image_div" class="img-box">
                                    <img src="<?php echo e($user->image); ?>" alt="img" />
                                </div>
                                <div class="info">
                                    <h2> <?php echo e($user->name); ?> </h2>
                                    <p><?php echo e($user->mobile); ?></p>
                                </div>
                            </div>
                            <ul class="links-aside">
                                <li>
                                    <a target="_self" href="<?php echo e(route('profile')); ?>" class="active">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="33.16" height="25.791"
                                            viewBox="0 0 33.16 25.791">
                                            <path id="Icon_awesome-id-card" data-name="Icon awesome-id-card"
                                                d="M30.4,2.25H2.763A2.764,2.764,0,0,0,0,5.013v.921H33.16V5.013A2.764,2.764,0,0,0,30.4,2.25ZM0,25.278a2.764,2.764,0,0,0,2.763,2.763H30.4a2.764,2.764,0,0,0,2.763-2.763V7.777H0ZM20.265,11.922a.462.462,0,0,1,.461-.461h8.29a.462.462,0,0,1,.461.461v.921a.462.462,0,0,1-.461.461h-8.29a.462.462,0,0,1-.461-.461Zm0,3.684a.462.462,0,0,1,.461-.461h8.29a.462.462,0,0,1,.461.461v.921a.462.462,0,0,1-.461.461h-8.29a.462.462,0,0,1-.461-.461Zm0,3.684a.462.462,0,0,1,.461-.461h8.29a.462.462,0,0,1,.461.461v.921a.462.462,0,0,1-.461.461h-8.29a.462.462,0,0,1-.461-.461ZM10.132,11.461a3.684,3.684,0,1,1-3.684,3.684A3.688,3.688,0,0,1,10.132,11.461ZM3.863,23.217a3.69,3.69,0,0,1,3.506-2.545h.472a5.93,5.93,0,0,0,4.583,0H12.9A3.69,3.69,0,0,1,16.4,23.217a.907.907,0,0,1-.9,1.14H4.761A.909.909,0,0,1,3.863,23.217Z"
                                                transform="translate(0 -2.25)" fill="#000" />
                                        </svg>
                                        <span>المعلومات الشخصية</span>
                                    </a>
                                </li>
                                <li>
                                    <a  target="_self" href="<?php echo e(route('site.order.orderHistory')); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28.958" height="38.102"
                                            viewBox="0 0 28.958 38.102">
                                            <g id="Icon_ionic-ios-document" data-name="Icon ionic-ios-document"
                                                transform="translate(-7.313 -3.938)">
                                                <path id="Path_19" data-name="Path 19"
                                                    d="M22.411,13.365H31.08a.472.472,0,0,0,.476-.476h0a2.819,2.819,0,0,0-1.019-2.181L23.269,4.649a3.059,3.059,0,0,0-1.962-.7h0a.7.7,0,0,0-.7.7v6.906A1.809,1.809,0,0,0,22.411,13.365Z"
                                                    transform="translate(4.714 0.002)" />
                                                <path id="Path_20" data-name="Path 20"
                                                    d="M22.839,11.558V3.938H10.361A3.057,3.057,0,0,0,7.313,6.986V38.991a3.057,3.057,0,0,0,3.048,3.048H33.222a3.057,3.057,0,0,0,3.048-3.048V15.844H27.126A4.293,4.293,0,0,1,22.839,11.558Z" />
                                            </g>
                                        </svg>
                                        <span>سجل الطلبات</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('profile.notification')); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="27.485" height="34.402"
                                            viewBox="0 0 27.485 34.402">
                                            <g id="Icon_ionic-ios-notifications-outline"
                                                data-name="Icon ionic-ios-notifications-outline"
                                                transform="translate(-6.775 -3.93)">
                                                <path id="Path_21" data-name="Path 21"
                                                    d="M21.633,28.336a1.114,1.114,0,0,0-1.092.877,2.155,2.155,0,0,1-.43.937,1.625,1.625,0,0,1-1.384.507,1.652,1.652,0,0,1-1.384-.507,2.155,2.155,0,0,1-.43-.937,1.114,1.114,0,0,0-1.092-.877h0A1.121,1.121,0,0,0,14.728,29.7a3.842,3.842,0,0,0,4,3.19,3.835,3.835,0,0,0,4-3.19,1.125,1.125,0,0,0-1.092-1.367Z"
                                                    transform="translate(1.767 5.439)" />
                                                <path id="Path_22" data-name="Path 22"
                                                    d="M33.915,29.407c-1.324-1.745-3.929-2.769-3.929-10.584,0-8.022-3.542-11.247-6.844-12.02-.31-.077-.533-.181-.533-.507V6.046A2.109,2.109,0,0,0,20.545,3.93h-.052A2.109,2.109,0,0,0,18.43,6.046v.249c0,.318-.224.43-.533.507-3.31.782-6.844,4-6.844,12.02,0,7.816-2.605,8.83-3.929,10.584A1.707,1.707,0,0,0,8.49,32.141H32.574A1.708,1.708,0,0,0,33.915,29.407Zm-3.353.5H10.511a.377.377,0,0,1-.284-.628,10.417,10.417,0,0,0,1.806-2.872,19.485,19.485,0,0,0,1.23-7.584c0-3.207.6-5.718,1.8-7.463a5.517,5.517,0,0,1,3.328-2.373,3.013,3.013,0,0,0,1.6-.9.68.68,0,0,1,1.023-.017,3.115,3.115,0,0,0,1.616.92,5.517,5.517,0,0,1,3.328,2.373c1.2,1.745,1.8,4.256,1.8,7.463a19.485,19.485,0,0,0,1.23,7.584,10.535,10.535,0,0,0,1.849,2.915A.355.355,0,0,1,30.562,29.906Z"
                                                    transform="translate(0 0)" />
                                            </g>
                                        </svg>
                                        <div>
                                            <span>التنبيهات</span>
                                            <span class="count"><?php echo e(@$countNotSeen); ?></span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a target="_self"  href="<?php echo e(route('site.product.favProduct')); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32.5" height="31.25"
                                            viewBox="0 0 32.5 31.25">
                                            <path id="Icon_ionic-ios-heart-empty" data-name="Icon ionic-ios-heart-empty"
                                                d="M27.5,4.375h-.078A8.889,8.889,0,0,0,20,8.438a8.889,8.889,0,0,0-7.422-4.062H12.5A8.833,8.833,0,0,0,3.75,13.2,19.017,19.017,0,0,0,7.484,23.57C12.188,30,20,35.625,20,35.625S27.813,30,32.516,23.57A19.017,19.017,0,0,0,36.25,13.2,8.833,8.833,0,0,0,27.5,4.375Zm3.25,17.906A59.921,59.921,0,0,1,20,32.875a60.011,60.011,0,0,1-10.75-10.6A16.854,16.854,0,0,1,5.938,13.2,6.629,6.629,0,0,1,12.516,6.57h.07a6.55,6.55,0,0,1,3.211.844,6.827,6.827,0,0,1,2.375,2.227,2.195,2.195,0,0,0,3.672,0,6.9,6.9,0,0,1,2.375-2.227A6.55,6.55,0,0,1,27.43,6.57h.07A6.629,6.629,0,0,1,34.078,13.2,17.067,17.067,0,0,1,30.75,22.281Z"
                                                transform="translate(-3.75 -4.375)" />
                                        </svg>
                                        <span>المفضلة</span>
                                    </a>
                                </li>
                            </ul>
                        </aside>
                        <div class="main-wrapper">
                            <div class="title-profile">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="33.16" height="25.791"
                                        viewBox="0 0 33.16 25.791">
                                        <path id="Icon_awesome-id-card" data-name="Icon awesome-id-card"
                                            d="M30.4,2.25H2.763A2.764,2.764,0,0,0,0,5.013v.921H33.16V5.013A2.764,2.764,0,0,0,30.4,2.25ZM0,25.278a2.764,2.764,0,0,0,2.763,2.763H30.4a2.764,2.764,0,0,0,2.763-2.763V7.777H0ZM20.265,11.922a.462.462,0,0,1,.461-.461h8.29a.462.462,0,0,1,.461.461v.921a.462.462,0,0,1-.461.461h-8.29a.462.462,0,0,1-.461-.461Zm0,3.684a.462.462,0,0,1,.461-.461h8.29a.462.462,0,0,1,.461.461v.921a.462.462,0,0,1-.461.461h-8.29a.462.462,0,0,1-.461-.461Zm0,3.684a.462.462,0,0,1,.461-.461h8.29a.462.462,0,0,1,.461.461v.921a.462.462,0,0,1-.461.461h-8.29a.462.462,0,0,1-.461-.461ZM10.132,11.461a3.684,3.684,0,1,1-3.684,3.684A3.688,3.688,0,0,1,10.132,11.461ZM3.863,23.217a3.69,3.69,0,0,1,3.506-2.545h.472a5.93,5.93,0,0,0,4.583,0H12.9A3.69,3.69,0,0,1,16.4,23.217a.907.907,0,0,1-.9,1.14H4.761A.909.909,0,0,1,3.863,23.217Z"
                                            transform="translate(0 -2.25)" />
                                    </svg>
                                </div>
                                <h3>المعلومات الشخصية</h3>
                            </div>


                            
                            <form method="POST" id="myFormStore" action="<?php echo e(route('profile.edit')); ?>"
                                enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>

                                <div class="user-image-content">
                                    <div class="img-box">
                                        <img src="<?php echo e($user->image); ?>" id="user_image" alt="img" />
                                    </div>
                                    <label for="input_file_img" class="change-user-img">
                                        تغيير الصورة الشخصية
                                    </label>
                                    <input type="file" accept="*image" id="input_file_img" name="image" class="input_file_img" />
                                </div>
                                <input type="hidden" name="id" value="<?php echo e(isset($user) ? $user->id : ''); ?>">

                                <div class="flex-form">
                                    <div class="form-group-profile">
                                        <label for="full_name">الاسم كامل</label>
                                        <input type="text" value="<?php echo e(@$user->name); ?>" name="name" id="name"
                                            placeholder="الاسم كامل">
                                        <!-- <span class="error-message">خطأ خطأ</span> -->
                                    </div>
                                    <div class="form-group-profile">
                                        <label for="mobile_number">رقم الجوال</label>
                                        <input type="number" value="<?php echo e(@$user->mobile); ?>" name="mobile" id="mobile"
                                            placeholder="رقم الجوال">
                                    </div>
                                    <div class="form-group-profile">
                                        <label for="email">البريد الالكتروني</label>
                                        <input type="email" value="<?php echo e(@$user->email); ?>" name="email" id="email"
                                            placeholder=" البريد الالكتروني">
                                    </div>
                                     <div class="form-group-profile">
                                        <label for="password"> كلمة المرور</label>
                                        <input type="password" value="<?php echo e(@$user->password); ?>" name="password" id="password"
                                            placeholder="  كلمة المرور">
                                    </div>

                            <input type="hidden" value="" id="latitude" name="latitude">
                            <input type="hidden" value="" id="longitude" name="longitude">
                                     <div class="form-group-profile">
                                        <div class="mb-1">
                                            <div id="map" style="height:500px;"></div>
                                            </div>
                                    </div>
                                    <div class="form-group-profile flex-end-items">

                                        <button type="submit" id="store_btn" style="cursor: pointer"
                                            class="btn submit-btn">حفظ التغييرات</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </main>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script type="text/javascript">
    $("#pac-input").focusin(function() {
        $(this).val('');
    });
    $('#latitude').val('');
    $('#longitude').val('');

    var latX = '<?php echo e(@$user->latitude?? '34.09624440695029'); ?>'
    var lngX = '<?php echo e(@$user->longitude?? '34.452212625718715'); ?>'


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
        $("#pac-input").val("<?php echo e(__('admin.بحث')); ?> ");
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
                e.preventDefault();
                console.log($('#myFormStore'));
                // alert($('#myFormStore'));
                var formData = new FormData($("#myFormStore")[0]);

                func($('#myFormStore'), formData);
            });


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
                    console.log(resp);
                    display_error_messages('success', resp.message)
                    $("#user_image_div").load(location.href + " #user_image_div");
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
            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom-left',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,

                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });

            Toast.options = {
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
                Toast.fire({
                    icon: 'error',
                    title: msg
                })

                Toast.error(msg);
            } else {
                Toast.fire({
                    icon: 'success',
                    title: msg
                });
            }

        }
    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.layout.site', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/Users/jit/Desktop/addass/3abas/resources/views/site/pages/profile/profile.blade.php ENDPATH**/ ?>