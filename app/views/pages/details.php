<?php
// session_start();
// include("conn/conn.php");
// $uid = $_SESSION['uid'];


// if (isset($_GET['applicantid']))  $applicantid = $_GET['applicantid'];

// $getlocation =  $con->query("SELECT * FROM LOCATION where APPLICANTID = '$applicantid' ");
// $loc = $getlocation->fetch(PDO::FETCH_ASSOC);
// $latitude = $loc['LATITUDE'];
// $longitude = $loc['LONGITUDE'];
// $city = $loc['CITY'];
// $street = $loc['STREET'];


// $getdata = $con->query("Select * from basicinformation where applicantid = '$applicantid' ");
// $ba = $getdata->fetch(PDO::FETCH_ASSOC);

// $getcontact = $con->query("Select * from contactinformation where applicantid = '$applicantid' ");
// $ca = $getcontact->fetch(PDO::FETCH_ASSOC);

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
    <link rel="icon" href="../../favicon.ico">

    <title>UBA Agency Banking</title>

   <!-- Bootstrap core CSS -->
   <link href=<?php echo URLROOT ?>vendor1/bootstrap/css/bootstrap.min.css rel="stylesheet" />
    <link href=<?php echo URLROOT ?>vendor1/font-awesome/css/font-awesome.min.css rel="stylesheet" />
    <link href=<?php echo URLROOT ?>vendor1/dataTables/media/css/jquery.dataTables.min.css rel="stylesheet" />
    <link href=<?php echo URLROOT ?>custom-theme/jquery-ui-1.10.0.custom.min.css rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href=<?php echo URLROOT ?>pcss/themes/flick/theme.css">
    <link rel="stylesheet" href=<?php echo URLROOT ?>uploadify/uploadifive.css rel="stylesheet">
  
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




<script src=<?php echo URLROOT ?>vendor1/js/jquery-ui-1.10.0.custom.min.js> </script>
<script type="text/javascript" src=<?php echo URLROOT ?>vendor1/js/jquery.dataTables.min.js"> </script> 
<script type="text/javascript" src=<?php echo URLROOT ?>vendor1/js/bootstrap.min.js"> </script> 
<script src=<?php echo URLROOT ?>js/notify.min.js>
</script> <script src=<?php echo URLROOT ?>js/jquery.blockUI.js> </script> 
<script src=<?php echo URLROOT ?>vendor1/js/autoNumeric.js> </script>
<script src=<?php echo URLROOT ?>uploadify/jquery.uploadifive.min.js> </script>

<script type="text/javascript">
    $(document).ready(function() {

        $("#comptxt").autocomplete({
            source: "ajaxscripts/llterm.php",
            minLength: 1
        });



        $('.addemp').click(function() {



            $.ajax({
                type: "POST",
                url: "ajaxscripts/adduser.php",
                data: {},
                dataType: "html",
                beforeSend: function() {
                    $.blockUI();
                },
                success: function(text) {
                    $("#reportforms").html(text);
                },
                complete: function() {
                    $.unblockUI();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + " " + thrownError);
                }
            });
        })

    })
</script>


<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1nEal4lqDWdBz9mf79KUd0zGZdgArVfY&callback=initMap">
</script>
<script type="text/javascript">
    var map, infoWindow, marker, myLatLng;

    function initMap() {

        myLatLng = {
            lat: <?php echo $latitude  ?>,
            lng: <?php echo $longitude  ?>
        };

        map = new google.maps.Map(document.getElementById('map'), {
            center: myLatLng,
            zoom: 17,
            mapTypeId: 'hybrid'
        });

        marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'Hello World!'
        });



    }

    marker.setMap(map);
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
                <ul class="nav navbar-nav" style='color:#fff'>
                    <li class="active"><a href="#">Home</a></li>

                    <li style='color:#fff'><a style='color:#000' href="businessreg.php">My Account</a></li>
                    <li style='color:#fff'><a style='color:#000' href="businessreg.php">Logout</a></li>

                </ul>
            </div>


    </div>
    </nav>

    </div>

    <div style='width:100%;height:730px; margin:0 auto; margin-top:60px;'>

        <div class='row'>
            <div class='col-md-12'>
                <button class='btn btn-warning pull-right'>Create Account</button>
                <button class='btn btn-default pull-right'>Verify ID</button>
                <button class='btn btn-primary pull-right'>Create Account</button>
                <button class='btn btn-success pull-right'>Show Direction</button>

            </div>

        </div>

        <br />

        <div id='pc' class='row'>
            <div class='col-md-3'>
                <div class="list-group border-bottom" style="padding:5px">

                    <a href="#" class="list-group-item active" id='primarybtn' style='color:#fff'><span class="fa fa-user"></span>
                        Location Information</a>



                    <div class="list-group-item addemp">
                        <table class='table' width="100%" border="0" cellpadding="2" cellspacing="0" style="font-size:13px; font-family:Verdana, Geneva, sans-serif">

                            <tr>

                            <tr>
                                <td><span class='alabel'>Latitude</span></td>
                                <td class="afteritem"><input type="text" id="latitude" value="" style="width:90%" /></td>
                            </tr>

                            <tr>

                            <tr>
                                <td><span class='alabel'>Longitude</span></td>
                                <td class="afteritem"><input type="text" id="longitude" value="" style="width:90%" /></td>
                            </tr>

                            <tr>

                            <tr>
                                <td><span class='alabel'>Popular Name</span></td>
                                <td class="afteritem"><input type="text" id="popularname" value="" style="width:90%" /></td>
                            </tr>

                            <tr>
                                <td><span class='alabel'>Building No:</span></td>
                                <td class="afteritem">
                                    <input type="text" id="areacode" value="" style="width:90%" />
                                </td>
                            </tr>
                            <tr>
                                <td><span class='alabel'>Street Address</span></td>
                                <td class="afteritem"> <input type="text" id="street" value="" style="width:90%" />
                                </td>
                            </tr>

                            <tr>
                                <td><span class='alabel'>City</span></td>
                                <td class="afteritem">
                                    <input type="text" id="city" value="" style="width:90%" />
                                </td>
                            </tr>

                            <tr>
                                <td><span class='alabel'>Assembly</span></td>
                                <td class="afteritem">

                                    <input type="text" id="assembly" value="" style="width:90%" />
                                </td>
                            </tr>

                            <tr>
                                <td><span class='alabel'>Region</span></td>
                                <td class="afteritem">

                                    <input type="text" id="region" value="" style="width:90%" />
                                </td>
                            </tr>


                            <tr>
                                <td></td>
                                <td class="afteritem">
                                    <button class="btn btn-primary btn-sm pull-left">Continue</button>
                                </td>
                            </tr>

                        </table>



                    </div>


                </div>
            </div>



            <div class="col-md-9 form-container" id="map" style="padding-left: 10px; padding-right: 10px; height: 580px">

            </div>


        </div>

    </div>



</body>

</html>