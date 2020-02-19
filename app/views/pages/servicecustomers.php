<!-- Header and CSS Directives-->
<?php //session_start();  
?>
<?php //require '../config/config.php';   
?>
<?php //require "../conn/conn.php"; 
?>
<?php //require "../conn/msconn.php"; 
?>
<?php require APPROOT . '/views/inc/header.php'  ?>
<?php require APPROOT . '/views/inc/company.php'  ?>

<?php
// $today = date('Y-m-d');
// $uid = $_SESSION['uid'];

// $getproducts  = $ucon->query("Select * from SELECTEDPRODUCTS where UNIQUEUID = '$uid' and productname <> 'Registrations' ");

// $getbusinfo = $con->query("Select * from BUSINESSINFORMATION  where UNIQUEUID = '$uid' ");
// $bus = $getbusinfo->fetch(PDO::FETCH_ASSOC);
// $businessuid = $bus['BUSINESSUID'];

// $getusers = $con->query("Select * from secondaryusers where mainid = '$uid' and  access_level = '1' ");

// $getcustomers = $con->query("Select * from customers where businessuid = '$businessuid' ");

?>

<style>
  tr td {
    padding: 3px !important;
    margin: 0 !important;
    font-size: 12px
  }

  .pinput {
    padding: 4px !important;
    width: 100%;
    border: 1px solid green;
  }
</style>

<!-- Commhr content goes here -->

<body onload=initMap()>
  <div class="content-wrapper">
    <!-- style="background:url('<?php echo URLROOT ?>/img/insurance_solution_large3.jpg'); background-size:cover;rgba(0,0,0,.5);height:100%"> -->
    <div class="row" style='padding-left:20px'>
      <div class='col-md-6'>
        <h3 style='color:orange'><?php //echo strtoupper($bus['BUSINESSNAME'])  
                                  ?></h3>
      </div>

      <div class='col-md-4'>
        <div class="formarea"></div>
        <input type='text' class="form-control" id='address' />
      </div>


      <div class='col-md-1'>
        <button class='btn btn-warning pull-left' id='searchmap' placeholder='Search Location'>Search</button>
      </div>
    </div>
    <hr style='background:#fff' />

    <div class='row' style='padding:5px'>

      <div class='col-md-12'>
        <div id="tabs">
          <ul style="background:#fff">
            <li><a href="#tabs-1">List of Customers </a></li>

          </ul>
          <div id="tabs-1">

            <table class='table table-bordered table-condensed transact' width='100%' style='font-size:12px'>
              <thead>
                <tr class='info'>
                  <td>Customer Name</td>
                  <td>Telephone</td>
                  <td>Email</td>
                  <td>Date Registered</td>
                  <td>Package</td>

                </tr>
              </thead>

              <?php

              //    while($u = $getcustomers->fetch(PDO::FETCH_ASSOC)){

              //     $unid = $u['UNIQUEUID'];

              //     $getcontact = $con->query("SELECT * FROM contactinformation where UNIQUEUID = '$unid' ");
              //     $c = $getcontact->fetch(PDO::FETCH_ASSOC);

              ?>

              <tr>
                <td><a href='customerdetails.php?unid=<?php //echo $unid  
                                                      ?>'><?php  //echo $u['FULLNAME']  
                                                                              ?></a></td>
                <td><?php  //echo $c['TELEPHONE']   
                    ?></td>
                <td><?php  //echo $c['EMAILADDRESS']   
                    ?></td>
                <td><?php  //echo $u['APPLIEDDATE']   
                    ?></td>
                <td><?php  //secho $u['PACKAGE']   
                    ?></td>


              </tr>
              <?php
              // }
              ?>


            </table>

          </div>


        </div>


      </div>


    </div>

  </div>

  </div>
</body>






<!--Footer and JS directies -->

<?php require APPROOT . '/views/inc/footer.php'  ?>

<script type='text/javascript'>
  $('#tabs').tabs();

  $('#firstbtn').click(function(e) {
    $("#tabs").tabs("option", "active", 1);
  })

  $('#secondbtn').click(function(e) {
    $("#tabs").tabs("option", "active", 2);
  })

  $('#isearchbtn').click(function() {

    var searchtxt = $('#searchtxt').val();

    $.ajax({
      type: "POST",
      url: "../ajaxscripts/iservice.php",
      data: {
        searchtxt: searchtxt
      },
      dataType: "xml",
      beforeSend: function() {
        $.blockUI();
      },
      success: function(xml) {
        $(xml).find('records').each(function() {
          $('#fname').val($(this).find('fname').text());
          $('#sname').val($(this).find('sname').text());
          $('#dob').val($(this).find('dob').text());
          $('#pin').val($(this).find('pin').text());


        });

      },

      complete: function() {
        $.unblockUI();
      },
      error: function(xhr, ajaxOptions, thrownError) {
        alert(xhr.status + " " + thrownError);
      }
    });
  })



  $('#savebranch').click(function() {

    var city = $('#city').val();
    var street = $('#street').val();
    var latitude = $('#latitude').val();
    var longitude = $('#longitude').val();
    var buildingno = $('#buildingno').val();
    var assembly = $('#assembly').val();
    var region = $('#region').val();
    var unitno = $('#unitno').val();
    var branch = $('#branch').val();


    $.ajax({
      type: "POST",
      url: "../ajaxscripts/savebranch.php",
      data: {
        city: city,
        street: street,
        latitude: latitude,
        longitude: longitude,
        buildingno: buildingno,
        assembly: assembly,
        region: region,
        unitno: unitno,
        branch: branch
      },
      dataType: "html",
      beforeSend: function() {
        $.blockUI();
      },
      success: function(text) {
        alert('Branch Successfully Saved');
      },
      complete: function() {
        $.unblockUI();
      },
      error: function(xhr, ajaxOptions, thrownError) {
        alert(xhr.status + " " + thrownError);
      }
    });
  })


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

    var panorama = new google.maps.StreetViewPanorama(
      document.getElementById('pano'), {
        position: {
          lat: 5.6027928,
          lng: -0.218137
        },
        pov: {
          heading: 34,
          pitch: 10
        }
      });
    map.setStreetView(panorama);

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


    //////////////////////////////////////////////////////////////////////////////////

    google.maps.event.addListener(map, 'click', function(event) {
      var lat = event.latLng.lat();
      var lon = event.latLng.lng();



      var goecoder = "http://maps.googleapis.com/maps/api/geocode/json?latlng=" + lat + "," + lon + "&sensor=false";
      $("#tabs").tabs("option", "active", 1);
      $.ajax({


        type: "POST",
        url: "../ajaxscripts/mapstatus.php",
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
        // map.setStreetView(panorama);


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