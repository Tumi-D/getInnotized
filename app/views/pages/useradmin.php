<?php
// session_start();
// include("conn/msconn.php");
// include("conn/conn.php");
// $uid = $_SESSION['uid'];

// $getbusinfo = $con->query("Select * from BUSINESSINFORMATION  where UNIQUEUID = '$uid' ");
// $bus = $getbusinfo->fetch(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="icon" href="../../favicon.ico"> -->

    <title>Universal Money</title>

    <!-- Bootstrap core CSS -->
    <link href=<?php echo URLROOT ?>css/bootstrap.css rel="stylesheet">
    <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css" />
    <link rel="stylesheet" type="text/css" href=<?php echo URLROOT ?>custom-theme/jquery-ui-1.10.0.custom.css> <link rel="stylesheet" type="text/css" href=<?php echo URLROOT ?>pcss/themes/flick/theme.css> <link href="css/fontawesome/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href=<?php echo URLROOT ?>uploadify/uploadifive.css rel="stylesheet">
    <link rel="stylesheet" type="text/css" href=<?php echo URLROOT ?>pcss/themes/flick/theme.css>
    <link href=<?php echo URLROOT ?>vendor1/css/font-awesome/css/font-awesome.min.css rel="stylesheet">
</head>


<style>
    body {
        min-height: 100%;
        background: #fff background-size:cover;
        font-size: 14px;
    }

    .form-container {
        margin: 0 auto;
        height: auto;
        background-color: rgba(40, 50, 56, 0.6);
        padding: 20px;

    }

    .form-control {
        color: #000;
        border: 1px solid #000;
        border-radius: 0px;
        font-size: 14px;
        background: rgba(0, 0, 0, 0) !important;
    }

    label {
        color: #fff;
    }
</style>



<script type="text/javascript" src=<?php echo URLROOT ?>vendor1/js/jquery.min.js></script>
<script src=<?php echo URLROOT ?>vendor1/js/jquery-ui-1.10.0.custom.min.js></script>
<script type="text/javascript" src=<?php echo URLROOT ?>vendor1/js/jquery.dataTables.min.js></script>
<script type="text/javascript" src=<?php echo URLROOT ?>vendor1/js/bootstrap.min.js></script>
<script src=<?php echo URLROOT ?>js/notify.min.js></script>
<script src=<?php echo URLROOT ?>js/jquery.blockUI.js></script>
<script src=<?php echo URLROOT ?>vendor1/js/autoNumeric.js></script>
<script src=<?php echo URLROOT ?>uploadify/jquery.uploadifive.min.js></script>
<script type="text/javascript">
    $(document).ready(function() {

        // $('#searchbtn').click(function() {

        //     var searchtxt = $('#searchtxt').val();

        //     $.ajax({
        //         type: "POST",
        //         url: "ajaxscripts/service.php",
        //         data: {
        //             searchtxt: searchtxt
        //         },
        //         dataType: "xml",
        //         beforeSend: function() {
        //             $.blockUI();
        //         },
        //         success: function(xml) {
        //             $(xml).find('records').each(function() {
        //                 $('#businessname').val($(this).find('businessname').text());
        //                 $('#telephone').val($(this).find('telephone').text());
        //                 $('#tin').val($(this).find('tin').text());


        //             });

        //         },

        //         complete: function() {
        //             $.unblockUI();
        //         },
        //         error: function(xhr, ajaxOptions, thrownError) {
        //             alert(xhr.status + " " + thrownError);
        //         }
        //     });
        // })



        ////////////////////////////////

        // $('#accounttype').change(function() {

        //     var x = $(this).val();
            // if (x == '1') {
            //     $.ajax({
            //         type: "POST",
            //         url: 'ajaxscripts/business.php',
            //         data: {},
            //         beforeSend: function() {
            //             $.blockUI();
            //         },
            //         success: function(text) {
            //             $("#placeholder").html(text)
            //         },
            //         complete: function() {
            //             $.unblockUI();
            //         },
            //         error: function(xhr, ajaxOptions, thrownError) {
            //             alert(xhr.status + " " + thrownError);
            //         }
            //     });

            // }

            // if (x == '2') {
            //     $.ajax({
            //         type: "POST",
            //         url: 'ajaxscripts/individual.php',
            //         data: {},
            //         beforeSend: function() {
            //             $.blockUI();
            //         },
            //         success: function(text) {
            //             $("#placeholder").html(text)
            //         },
            //         complete: function() {
            //             $.unblockUI();
            //         },
            //         error: function(xhr, ajaxOptions, thrownError) {
            //             alert(xhr.status + " " + thrownError);
            //         }
            //     });


            // }
        // })


        // function bform() {

        //     $.ajax({
        //         type: "POST",
        //         url: 'ajaxscripts/business.php',
        //         data: {},
        //         beforeSend: function() {
        //             $.blockUI();
        //         },
        //         success: function(text) {
        //             $("#placeholder").html(text)
        //         },
        //         complete: function() {
        //             $.unblockUI();
        //         },
        //         error: function(xhr, ajaxOptions, thrownError) {
        //             alert(xhr.status + " " + thrownError);
        //         }
        //     });

        // }
        // bform();


        // function usertable() {
        //     $.ajax({
        //         type: "POST",
        //         url: "ajaxscripts/adminusers.php",
        //         data: {},
        //         dataType: "html",
        //         beforeSend: function() {
        //             $.blockUI();
        //         },
        //         success: function(text) {
        //             $('.itemarea').html(text);
        //         },
        //         complete: function() {
        //             $.unblockUI();
        //         },
        //         error: function(xhr, ajaxOptions, thrownError) {
        //             alert(xhr.status + " " + thrownError);
        //         }
        //     });
        // }

        // usertable();


    })
</script>


<!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1nEal4lqDWdBz9mf79KUd0zGZdgArVfY&callback=initMap&v=3.exp&libraries=places"></script> -->
<script type="text/javascript">

    // var map, infoWindow;
    // var countryRestrict = {
    //     'country': 'gh'
    // };

    // function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: 5.6027928,
                lng: -0.218137
            },
            zoom: 17,
            mapTypeId: 'hybrid'
        });
        infoWindow = new google.maps.InfoWindow;
        var geocoder = new google.maps.Geocoder();

        document.getElementById('searchmap').addEventListener('click', function() {
            geocodeAddress(geocoder, map);

        });

        var marker = new google.maps.Marker({
            position: {
                lat: 5.6027928,
                lng: -0.218137
            },
            map: map
        });

        map.addListener('click', function(e) {
            placeMarker(e.latLng, map);
        });

        function placeMarker(location) {
            if (marker) {
                //if marker already was created change positon
                marker.setPosition(location);
            } else {
                //create a marker
                marker = new google.maps.Marker({
                    position: location,
                    map: map,
                    draggable: true
                });
            }
        }



        google.maps.event.addListener(map, 'click', function(event) {
            var lat = event.latLng.lat();
            var lon = event.latLng.lng();



            var goecoder = "http://maps.googleapis.com/maps/api/geocode/json?latlng=" + lat + "," + lon + "&sensor=false";

            $.ajax({


                type: "POST",
                url: "ajaxscripts/mapstatus.php",
                data: {
                    goecoder: goecoder
                },
                dataType: "xml",
                success: function(xml) {


                    $(xml).find('records').each(function() {
                        $('#city').val($(this).find('city').text());
                        $('#street').val($(this).find('street').text());
                        $('#assembly').val($(this).find('assembly').text());
                        $('#region').val($(this).find('region').text());
                        $('#country').val($(this).find('country').text());
                        $('#latitude').val($(this).find('latitude').text());
                        $('#longitude').val($(this).find('longitude').text());

                    });

                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + " " + thrownError);
                }
            });

        });





        //////////////////////////////////////////////////////////////////////////////////////

        // var autocomplete = new google.maps.places.Autocomplete(
        //     (document.getElementById('address')), {
        //         types: ['geocode'],
        //         componentRestrictions: countryRestrict
        //     })

        // Try HTML5 geolocation.
    //     if (navigator.geolocation) {
    //         navigator.geolocation.getCurrentPosition(function(position) {
    //             var pos = {
    //                 lat: position.coords.latitude,
    //                 lng: position.coords.longitude
    //             };
    //             map.setCenter(pos);
    //         }, function() {
    //             handleLocationError(true, infoWindow, map.getCenter());
    //         });
    //     } else {
    //         // Browser doesn't support Geolocation
    //         handleLocationError(false, infoWindow, map.getCenter());
    //     }



    // }

    // function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    //     infoWindow.setPosition(pos);
    //     infoWindow.setContent(browserHasGeolocation ?
    //         'Error: The Geolocation service failed.' :
    //         'Error: Your browser doesn\'t support geolocation.');
    //     infoWindow.open(map);
    // }

    // function geocodeAddress(geocoder, resultsMap) {
    //     var address = document.getElementById('address').value;
    //     geocoder.geocode({
    //         'address': address
    //     }, function(results, status) {
    //         if (status === 'OK') {
    //             resultsMap.setCenter(results[0].geometry.location);
    //             var marker = new google.maps.Marker({
    //                 map: resultsMap,
    //                 position: results[0].geometry.location
    //             });
    //         } else {
    //             alert('Geocode was not successful for the following reason: ' + status);
    //         }
    //     });
    // }
</script>

<body>
    <div>
        <nav class="navbar navbar-inverse navbar-fixed-top" style='background:#fff'>

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#" style='color:#000'>UNIVERSAL MONEY</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav" style='color:#000'>
                    <li class="active"><a href="/modules/paccount.php">Back</a></li>



                </ul>
            </div>
            <!--/.nav-collapse -->
    </div>
    </nav>

    </div>

    <div style='width:100%;height:730px; margin:0 auto; margin-top:80px;'>

        <div class='row'>
            <div class='col-md-12' align='center'>
                <h3><?php // echo $bus['BUSINESSNAME']  
                    ?></h3>
            </div>
        </div>

        <div class='row'>

            <div class='col-md-2' style='padding-left:15px '>
                <span style='font-size:12px; font-weight:700'>ADD NEW AGENTS</span>
            </div>
            <div class='col-md-1'>

            </div>

            <div class='col-md-4'>
                <div class="formarea"></div>
                <input type='text' class="form-control" id='address' />
            </div>


            <div class='col-md-1'>
                <button class='btn btn-warning pull-left' id='searchmap' placeholder='Search Location'>Search</button>
            </div>

            <div class='col-md-4' style='padding-left:15px '>
                <span style='font-size:12px; font-weight:700'>MANAGE AGENT REGISTRY</span>
            </div>

        </div>

        <br />

        <div id='pc' class='row'>
            <div class='col-md-3'>

                <div class="list-group border-bottom" style="padding:5px; height: 600px; overflow-y: scroll">

                    <table class='table table-condensed' width="100%" style="font-size:13px; font-family:Verdana, Geneva, sans-serif">
                        <tr>
                            <td colspan='2'>
                                <select style="width:100%" class="form-control" id='accounttype'>
                                    <option>Type of Account</option>
                                    <option value='1'>Super Agent</option>
                                    <option value='1'>Fixed Agent</option>
                                    <option value='1'>Mobile Agent</option>
                                </select>
                            </td>



                    </table>

                    <div id="placeholder"></div>







                </div>
            </div>



            <div class="col-md-5 form-container" id="map" style="padding-left: 10px; height: 600px">

            </div>

            <div class="col-md-4" style="padding-left: 10px; height: 600px">
                <div class='itemarea'></div>

            </div>


        </div>

    </div>



</body>

</html>