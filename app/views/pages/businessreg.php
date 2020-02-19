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

  <title>Universal Money</title>
  <!-- Bootstrap core CSS -->
  <!-- <link href="<?php echo URLROOT ?>vendor1/bootstrap/css/bootstrap.min.css" rel="stylesheet" /> -->

  <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css" />
  <link rel="stylesheet" href="<?php echo URLROOT ?>custom-theme/jquery-ui-1.10.0.custom.min.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo URLROOT ?>pcss/themes/flick/theme.css">
  <link rel="stylesheet" href="<?php echo URLROOT ?>vendor1/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="<?php echo URLROOT ?>uploadify/uploadifive.css">
  <link href="<?php echo URLROOT ?>vendor1/bower_components/Ionicons/css/ionicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>

<style>
  body {
    min-height: 100%;
    background: #fff;
    background-size: cover;
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



<script type="text/javascript" src="<?php echo URLROOT ?>vendor1/js/jquery.min.js"> </script>
<script type="text/javascript" src="<?php echo URLROOT ?>vendor1/js/jquery-ui-1.10.0.custom.min.js"> </script>
<script type="text/javascript" src="<?php echo URLROOT ?>vendor1/js/jquery.dataTables.min.js"> </script>
<script type="text/javascript" src="<?php echo URLROOT ?>vendor1/js/bootstrap.min.js"> </script>
<script type="text/javascript" src="<?php echo URLROOT ?>js/notify.min.js"></script>
<script type="text/javascript" src="<?php echo URLROOT ?>js/jquery.blockUI.js"> </script>
<script type="text/javascript" src="<?php echo URLROOT ?>vendor1/js/autoNumeric.js"> </script>
<script type="text/javascript" src="<?php echo URLROOT ?>uploadify/jquery.uploadifive.min.js"> </script>
<script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>


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
          <li class="active"><a href="/">Home</a></li>

          <li style='color:#fff'><a style='color:#000' href="businessreg.php">Business / Merchant Registration</a></li>

        </ul>
      </div>
      <!--/.nav-collapse -->
  </div>
  </nav>

  </div>

  <div style='width:100%;height:730px; margin:0 auto; margin-top:80px;'>

    <div class='row'>

      <div class='col-md-3' style='padding-left:15px '>
        <input type='text' class="form-control" id='searchtxt' placeholder='Search by Business Reg No' />
      </div>
      <div class='col-md-1'>
        <button class="btn btn-primary pull-left " id='searchbtn'> <i class='fa fa-search'></i> </button>
      </div>

      <div class='col-md-7'>
        <div class="formarea"></div>
        <input type='text' class="form-control" id='address' />
      </div>


      <div class='col-md-1'>
        <button class='btn btn-warning pull-left' id='searchmap' placeholder='Search Location'>Search</button>
      </div>

    </div>

    <br />

    <div id='pc' class='row'>
      <div class='col-md-4'>

        <div class="list-group border-bottom" style="padding:5px; height: 600px; overflow-y: scroll">

          <div class="container">
            <div id="exTab1" style="width: 450px">
              <ul class="nav nav-pills">
                <li class="active"><a href="#1a" data-toggle="tab">Basic Information</a></li>
                <li><a href="#2a" data-toggle="tab">Location</a></li>

                <li><a href="#3a" data-toggle="tab">Credentials</a></li>
              </ul>

              <div class="tab-content clearfix">
                <div class="tab-pane active" id="1a">
                  <br />

                  <table width="100%" class='table table-condensed' style="font-size:13px; font-family:Verdana, Geneva, sans-serif">

                    <tr class='info'>
                      <td colspan="2"><span class='alabel'>Buisness Information</td>

                    </tr>



                    <tr>
                      <td><span class='alabel'>Business Name</span></td>
                      <td class="afteritem"><input type="text" class="tx_businness" id="businessname" style="width:100%" /></td>
                    </tr>

                    <tr>
                      <td><span class='alabel'>TIN #:</span></td>
                      <td class="afteritem">
                        <input type="text" class="tx_businness" id="tin" style="width:100%" />
                      </td>
                    </tr>
                    <tr>



                      <td><span class='alabel'>Nature of Business</span></td>
                      <td class="afteritem"> <input type="text" class="tx_businness" id="natureofbusiness" style="width:100%" />
                      </td>
                    </tr>

                    <tr>
                      <td><span class='alabel'>Telephone</span></td>
                      <td class="afteritem">
                        <input type="text" class="tx_businness" id="telephone" style="width:100%" />
                      </td>
                    </tr>

                    <tr>
                      <td><span class='alabel'>Mobile No:</span></td>
                      <td class="afteritem">
                        <input type="text" class="tx_businness" id="atelephone" style="width:100%" />
                      </td>
                    </tr>

                    <tr>
                      <td><span class='alabel'>Email Address:</span></td>
                      <td class="afteritem">

                        <input type="text" class="tx_businness" id="email" style="width:100%" />
                      </td>
                    </tr>

                    <tr>
                      <td><span class='alabel'>Website</span></td>
                      <td class="afteritem">

                        <input type="text" class="tx_businness" id="website" style="width:100%" />
                      </td>
                    </tr>

                    <tr>
                      <td colspan="2"><span class='alabel'>&nbsp</td>

                    </tr>



                    <tr class='info'>
                      <td colspan="2"><span class='alabel'>Account Administrator</td>

                    </tr>

                    <tr>

                    <tr>
                      <td><span class='alabel'>First Name</span></td>
                      <td class="afteritem"><input type="text" class="tx_businness" id="firstname" style="width:100%" /></td>
                    </tr>

                    <tr>
                      <td><span class='alabel'>Last Name</span></td>
                      <td class="afteritem"><input type="text" class="tx_businness" id="lastname" style="width:100%" /></td>
                    </tr>

                    <tr>
                      <td><span class='alabel'>Telephone</span></td>
                      <td class="afteritem"><input type="text" class="tx_businness" id="ptelephone" style="width:100%" /></td>
                    </tr>

                    <tr>
                      <td><span class='alabel'>Email</span></td>
                      <td class="afteritem"><input type="text" class="tx_businness" id="pemail" style="width:100%" /></td>
                    </tr>


                    <tr>
                      <td></td>
                      <td class="afteritem">
                        <button class="btn btn-primary btn-sm btn-block pull-left" id='firstbtn'>Next</button>
                      </td>
                    </tr>

                  </table>



                </div>
                <div class="tab-pane" id="2a">
                  <br />
                  <table class='table table-condensed' width="100%" style="font-size:13px; font-family:Verdana, Geneva, sans-serif">

                    <tr class='info'>
                      <td colspan="2"><span class='alabel'>Get Your Location from the Map</td>

                    </tr>

                    <tr>

                    <tr>
                      <td><span class='alabel'>Latitude</span></td>
                      <td class="afteritem"><input type="text" id="latitude" style="width:100%" /></td>
                    </tr>

                    <tr>

                    <tr>
                      <td><span class='alabel'>Longitude</span></td>
                      <td class="afteritem"><input type="text" id="longitude" style="width:100%" /></td>
                    </tr>

                    <tr>

                    <tr>
                      <td><span class='alabel'>Popular Name</span></td>
                      <td class="afteritem"><input type="text" id="popularname" style="width:100%" /></td>
                    </tr>

                    <tr>
                      <td><span class='alabel'>House/Building No:</span></td>
                      <td class="afteritem">
                        <input type="text" id="buildingno" style="width:100%" />
                      </td>
                    </tr>


                    <tr>
                      <td><span class='alabel'>Unit No:</span></td>
                      <td class="afteritem">
                        <input type="text" id="unitno" style="width:100%" />
                      </td>
                    </tr>


                    <tr>
                      <td><span class='alabel'>Street Address</span></td>
                      <td class="afteritem"> <input type="text" id="street" style="width:100%" />
                      </td>
                    </tr>

                    <tr>
                      <td><span class='alabel'>City</span></td>
                      <td class="afteritem">
                        <input type="text" id="city" style="width:100%" />
                      </td>
                    </tr>

                    <tr>
                      <td><span class='alabel'>Assembly</span></td>
                      <td class="afteritem">

                        <input type="text" id="assembly" style="width:100%" />
                      </td>
                    </tr>

                    <tr>
                      <td><span class='alabel'>Region</span></td>
                      <td class="afteritem">

                        <input type="text" id="region" style="width:100%" />
                      </td>
                    </tr>


                    <tr>
                      <td></td>
                      <td class="afteritem">
                        <button class="btn btn-primary btn-sm btn-block pull-left">Next</button>
                      </td>
                    </tr>

                  </table>

                </div>


                <div class="tab-pane" id="3a">
                  <br />
                  <table class='table table-condensed' style="font-size:13px; font-family:Verdana, Geneva, sans-serif">



                    <tr class='info'>
                      <td colspan="2"><span class='alabel'>Provide Login Information</td>

                    </tr>


                    <tr>
                      <td><span class='alabel'>Login</span></td>
                      <td class="afteritem">
                        <input type="text" id='login' style="width:100%" />
                      </td>
                    </tr>

                    <tr>
                      <td><span class='alabel'>Password</span></td>
                      <td class="afteritem">
                        <input type="password" id='password' style="width:100%" />
                      </td>
                    </tr>

                    <tr>
                      <td><span class='alabel'>Confirm</span></td>
                      <td class="afteritem">

                        <input type="password" id='cpassword' style="width:100%" />
                      </td>
                    </tr>


                    <tr>
                      <td></td>
                      <td class="afteritem">
                        <button class="btn btn-primary btn-sm btn-block pull-left" id='submitinfo'>Submit</button>
                      </td>
                    </tr>

                  </table>
                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
      <div class="col-md-8 form-container" id="map" style="padding-left: 10px; height: 600px">
      </div>
    </div>
  </div>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1nEal4lqDWdBz9mf79KUd0zGZdgArVfY&callback=initMap&v=3.exp&libraries=places"></script>
  <script type="text/javascript">
    $('#firstbtn').click(function(e) {
      alert('prince');
      e.preventDefault();
      $('#exTab1 a[href="#2a"]').tab('show');
    })
    $(function() {
      $("#exTab1").tabs();
    });

    var map, infoWindow;
    var countryRestrict = {
      'country': 'gh'
    };

    function initMap() {
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
        placeMarkerAndPanTo(e.latLng, map);
      });

      function placeMarkerAndPanTo(latLng, map) {
        var marker = new google.maps.Marker({
          position: latLng,
          map: map
        });
        map.panTo(latLng);
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

      var autocomplete = new google.maps.places.Autocomplete(
        (document.getElementById('address')), {
          types: ['geocode'],
          componentRestrictions: countryRestrict
        })

      // Try HTML5 geolocation.
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          var pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
          };
          map.setCenter(pos);
        }, function() {
          handleLocationError(true, infoWindow, map.getCenter());
        });
      } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
      }



    }




    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
      infoWindow.setPosition(pos);
      infoWindow.setContent(browserHasGeolocation ?
        'Error: The Geolocation service failed.' :
        'Error: Your browser doesn\'t support geolocation.');
      infoWindow.open(map);
    }

    function geocodeAddress(geocoder, resultsMap) {
      var address = document.getElementById('address').value;
      geocoder.geocode({
        'address': address
      }, function(results, status) {
        if (status === 'OK') {
          resultsMap.setCenter(results[0].geometry.location);
          var marker = new google.maps.Marker({
            map: resultsMap,
            position: results[0].geometry.location
          });
        } else {
          alert('Geocode was not successful for the following reason: ' + status);
        }
      });
    }
  </script>

</body>

</html>