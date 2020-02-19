<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo COMPANYNAME ?></title>
    <link href="<?php echo URLROOT ?>vendor1/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo URLROOT ?>vendor1/bootstrap/css/bootstrap.css" rel="stylesheet">
</head>

<style>
    .form-control {
        width: 90%;
    }

    .accordion-toggle:hover {
        text-decoration: none;
    }

    .panel-default>.panel-heading {
        color: #333;
        /* background-color: #f5f5f5; */
        background-color: #ffff;
        border-color: #ddd;
    }

    .fixed-panel {
        min-height: 100;
        max-height: 100;
        overflow-y: scroll;
    }

    /* .panel-primary>.panel-heading {
    color: #fff;
    background-color: #337ab7;
    border-color: #337ab7;
} */
</style>
<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> <?php echo $data['data']->businessname ?> Business Profile </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo URLROOT . 'business' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <!-- <li><a href="#">Examples</a></li> -->
            <li class="active">Business Profile</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-md-4">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                    <span class="glyphicon glyphicon-plus"></span>
                                    Business information
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <!-- <th scope="col">Attributes</th>
      <th scope="col">Value</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Account Type</td>
                                                <td colspan="2"><?php echo $data['business']->accounttype ?></td>
                                            </tr>
                                            <tr>
                                                <td>Business Name</td>
                                                <td colspan="2"><?php echo $data['business']->businessname ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tin Number</td>
                                                <td colspan="2"><?php echo $data['business']->tinnumber ?></td>
                                            </tr>
                                            <tr>
                                                <td>Nature Of Business</td>
                                                <td colspan="2"><?php echo $data['business']->natureofbusiness ?></td>
                                            </tr>
                                            <tr>
                                                <td>Telephone</td>
                                                <td colspan="2"><?php echo $data['business']->telephone ?></td>
                                            </tr>
                                            <tr>
                                                <td>Mobile</td>
                                                <td colspan="2"><?php echo $data['business']->telephone ?></td>
                                            </tr>
                                            <tr>
                                                <td>Business Email</td>
                                                <td colspan="2"><?php echo $data['business']->email ?></td>
                                            </tr>
                                            <tr>
                                                <td>Website</td>
                                                <td colspan="2"><?php echo $data['business']->website ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                    <span class="glyphicon glyphicon-plus"></span>
                                    Location
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">

                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <!-- <th scope="col">Attributes</th>
      <th scope="col">Value</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Lattitude</td>
                                                <td colspan="2"><?php echo $data['location']->latitude ?></td>
                                            </tr>
                                            <tr>
                                                <td>Longitude</td>
                                                <td colspan="2"><?php echo $data['location']->longitude ?></td>
                                            </tr>
                                            <tr>
                                                <td>Popularname</td>
                                                <td colspan="2"><?php echo $data['location']->popularname ?></td>
                                            </tr>
                                            <tr>
                                                <td>Building Number</td>
                                                <td colspan="2"><?php echo $data['location']->buildingno ?></td>
                                            </tr>
                                            <tr>
                                                <td>Unit Number</td>
                                                <td colspan="2"><?php echo $data['location']->unitno ?></td>
                                            </tr>
                                            <tr>
                                                <td>Street</td>
                                                <td colspan="2"><?php echo $data['location']->street ?></td>
                                            </tr>
                                            <tr>
                                                <td>City</td>
                                                <td colspan="2"><?php echo $data['location']->city ?></td>
                                            </tr>
                                            <tr>
                                                <td>Assembly</td>
                                                <td colspan="2"><?php echo $data['location']->assembly ?></td>
                                            </tr>
                                            <tr>
                                                <td>Region</td>
                                                <td colspan="2"><?php echo $data['location']->region ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                    <span class="glyphicon glyphicon-plus"></span>
                                    Attributes
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td> Business Type</td>
                                                <td colspan="2">Larry the Bird</td>
                                            </tr>
                                            <tr>
                                                <td>Business Category</td>
                                                <td colspan="2">Larry the Bird</td>
                                            </tr>
                                            <tr>
                                                <td>Estimated Annual Revenue</td>
                                                <td colspan="2">@twitter</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Stop   Clearing -->
            <!-- /.col -->

            <div id="gdirection" class="col-md-7">
                <div class="google-container">
                    <div class="row">
                        <div class="col-md-12">

                            <div>
                                <!-- <label class="form-control">Mode of Travel: </label> -->
                                <select id="mode" class="form-control">
                                    <option value="DRIVING" selected disabled>PLEASE SELECT MODE OF TRANSPORT</option>
                                    <option value="DRIVING">Driving</option>
                                    <option value="WALKING">Walking</option>
                                    <option value="BICYCLING">Bicycling</option>
                                    <option value="TRANSIT">Transit</option>
                                </select>
                            </div>

                        </div>
                        <br /><br />
                        <div id="map" style="height:510px" class="col-md-12"></div>
                    </div>
                </div>
            </div>
            <!-- /.col -->
            <div id="bdirection" class="col-md-3 container" style="color:blue;display:none">
                <div>
                    <div class="panel panel-primary">
                        <div id="tod" class="panel-heading">Directions</div>
                        <div id="right-panel" class="panel-body" style="overflow-y: scroll; height:440px;">
                            <!-- <div >

      </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<script>
    var mylat, mylng, infoWindow;

    function dismiss() {
        $("#bdirection").hide();
        $("#gdirection").removeClass("col-md-5");
        $("#gdirection").addClass("col-md-7");
    }

    function initMap() {
        var directionsRenderer = new google.maps.DirectionsRenderer;
        var directionsService = new google.maps.DirectionsService;
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 14,
            center: {
                lat: 5.6027928,
                lng: -0.218137
            }
        });
        infoWindow = new google.maps.InfoWindow;
        newinfoWindow = new google.maps.InfoWindow;
        directionsRenderer.setMap(map);
        directionsRenderer.setPanel(document.getElementById('right-panel'));
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var newpos = {
                    lat: 5.6042928,
                    lng: -1.218137
                };
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                mylat = position.coords.latitude;
                mylng = position.coords.longitude;
                console.log(mylat, mylng);
                newinfoWindow.setPosition(newpos);
                newinfoWindow.setContent('<?php echo $data['data']->businessname ?>' + ' is located is here');
                newinfoWindow.open(map);
                infoWindow.setPosition(pos);
                infoWindow.setContent('You Are Here ' + '<?php echo $data['user']->firstname ?>');
                infoWindow.open(map);
                map.setCenter(pos);
            }, function() {
                handleLocationError(true, infoWindow, map.getCenter());
            });
            calculateAndDisplayRoute(directionsService, directionsRenderer);

        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }

        // calculateAndDisplayRoute(directionsService, directionsRenderer);
        document.getElementById('mode').addEventListener('change', function() {
            $("#gdirection").removeClass("col-md-7");
            $("#gdirection").addClass("col-md-5");
            $("#bdirection").show()
            calculateAndDisplayRoute(directionsService, directionsRenderer);
        });
    }

    function calculateAndDisplayRoute(directionsService, directionsRenderer) {

        var selectedMode = document.getElementById('mode').value;
        var panelheading;
        directionsService.route({
            origin: {
                lat: mylat,
                lng: mylng
            }, // Haight.
            destination: {
                lat: 5.6042928,
                lng: -1.218137
            }, // Ocean Beach.
            // Note that Javascript allows us to access the constant
            // using square brackets and a string value as its
            // "property."
            travelMode: google.maps.TravelMode[selectedMode]
        }, function(response, status) {
            if (status == 'OK') {

                // map.setCenter(newpos);
                directionsRenderer.setDirections(response);
                panelheading = document.getElementById('mode').value;

                document.getElementById("tod").innerHTML = panelheading.split(' ').map(w => w[0].toUpperCase() + w.substr(1).toLowerCase()).join(' ') + "  Directions <span onclick='dismiss()' style='float:right' class='fa fa-window-close'></span>";

            } else {
                window.alert('Directions request failed due to ' + status);
            }
        });
    }



    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
            'Error: The Geolocation service failed.' :
            'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=<?php echo GMAPSAPI ?>&callback=initMap">
</script>
<?php include(APPROOT . "/views/inc/footer.php"); ?>