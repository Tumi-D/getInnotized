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

// $getusers = $con->query("Select * from secondaryusers where mainid = '$uid' and  access_level = '1' ");

// $getbranch = $ucon->query("Select * from branch  where UNIQUEUID = '$uid' ");

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

<body onload='initMap()'>
  <div class="content-wrapper">
    <!-- style="background:url('<?php echo URLROOT ?>/img/insurance_solution_large3.jpg');background-size:cover;rgba(0,0,0,.5);height:100%"> -->
    <div class="row" style='padding-left:20px'>
      <div class='col-md-6'>
        <!-- <h3 style='color:orange'><?php //echo strtoupper($bus['BUSINESSNAME'])  
                                      ?></h3> -->
        <div class="btn-group btn-group">
          <a href="<?php echo URLROOT . '/pages/businessreg' ?>"><button type="button" class="btn btn-default">Business Registration</button></a>
          <a href="<?php echo URLROOT . '/pages/individualregister' ?>"><button type="button" class="btn btn-danger">Individual Registration</button></a>
        </div>

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

      <div class='col-md-5'>
        <div id="tabs">
          <ul style="background:#fff">
            <li><a href="#tabs-1">Basic </a></li>
            <li><a href="#tabs-2" id='addresses'>Location</a></li>
            <!-- <li><a href="#tabs-3">Attributes</a></li> -->
          </ul>
          <div id="tabs-1">


            <table width="100%" class='table table-condensed' s tyle="font-size:13px; font-family:Verdana, Geneva, sans-serif">

              <tr>
                <td width='320'>
                  <input type='text' class="form-control" id='searchtxt' placeholder='Search by Business Reg No, TIN No' /></td>
                <td><button class="btn btn-primary pull-left " id='searchbtn'> <i class='fa fa-search'></i> </button></td>
              <tr>
                <td colspan='2'>

                  <span style='color:#000' id='resnotification'></span>
                  <span style='color:red' id='messageinfo'></span>

                </td>

              </tr>
              </tr>

            </table>

            <table width="100%" class='table table-condensed' style="font-size:13px; font-family:Verdana, Geneva, sans-serif">


              <tr>
                <td><span class='alabel'>First Name</span></td>
                <td class="afteritem"><input type="text" class="tx_businness" id="fname" style="width:100%" /></td>
              </tr>
              <tr>
                <td><span class='alabel'>Last Name</span></td>
                <td class="afteritem"><input type="text" class="tx_businness" id="sname" style="width:100%" /></td>
              </tr>

              <tr>

                <td><span class='alabel'>TIN #:</span></td>
                <td class="afteritem">
                  <input type="text" class="tx_businness" id="tin" style="width:100%" />
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

                  <input type="text" class="tx_businness" id="businessemail" style="width:100%" />
                </td>
              </tr>

              <tr>
                <td><span class='alabel'>Branch</span></td>
                <td class="afteritem">

                  <select class="form-control" id='branch'>
                    <option value=''>Select Branch</option>
                    <?php
                    //    while($b = $getbranch->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <option value='<?php //echo $b['BRANCHNAME']  
                                    ?>'><?php //echo $b['BRANCHNAME']  
                                                                      ?></option>
                    <?php //} 
                    ?>

                  </select>
                </td>
              </tr>

              <tr>
                <td colspan="2"><span class='alabel'>&nbsp</td>

              </tr>

              <tr>
                <td></td>
                <td class="afteritem">
                  <button class="btn btn-primary btn-sm btn-block pull-left" id='firstbtn'>Next</button>
                </td>
              </tr>

            </table>



          </div>
          <div id="tabs-2">

            <table class='table table-condensed' width="100%" style="font-size:13px; font-family:Verdana, Geneva, sans-serif">

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
            </table>

            <div id='adarea'></div>

            <table>
              <tr>
                <td align='right'><button class="btn btn-danger btn-sm" id='back1'>Back</button></td>
                <td align='left'>
                  <button class="btn btn-primary btn-sm" id='submitinfo'>Submit</button>
                </td>
              </tr>

            </table>

          </div>

          <!-- <div id='tabs-3'>
        <table class='table' width="100%" border="0" cellpadding="2" cellspacing="0" style="font-size:13px; font-family:Verdana, Geneva, sans-serif">

                     <br/>
                    <tr>

                    <tr>
                      <td><span class='alabel'>Business Type</span></td>
                      <td class="afteritem">
                        <select class="form-control" id='businesstype'>
                          <option value=''>Select</option>
                          <option>Individual / Sole Proprietor</option>
                          <option>Partnership</option>
                          <option>Corporation</option>
                          <option>Non-profit organization</option>
                          <option>Government Entity</option>

                        </select>

                      </td>
                      </tr>

                    <tr>
                      <td><span class='alabel'>Business Category</span></td>
                      <td class="afteritem">
                         <select class="form-control" id='businesscategory'>
                          <option vlaue=''>Select</option>
                          <option>Finance</option>
                          <option>Banking</option>
                          <option>Ecommerce</option>
                          <option>ICT Infrastructure</option>


                        </select>
                      </td>
                      </tr>

                      <tr>
                      <td><span class='alabel'>Estimated Annual Revenue</span></td>
                      <td class="afteritem">
                          <select class="form-control" id='revenue' >
                          <option value=''>Select</option>
                          <option>GHC 10,000 - GHC 100,000</option>
                          <option>GHC 100, 000 - GHC 200,000</option>
                          <option>GHC 200,000 - GHC 300,000</option>
                          <option>GHC 300,000 - GHC 400,000</option>
                          <option>GHC 400,000 - GHC 500,000</option>
                          <option>GHC 500,000 and above</option>
                          </select>
                      </td>
                      </tr>

                      <tr>
                      <td><span class='alabel'>Number of employees</span></td>
                      <td class="afteritem">
                      <select class="form-control" id='numberofemployees' >
                          <option value=''>Select</option>
                          <option>0 - 10</option>
                          <option>10 - 50</option>
                          <option>50 - 100</option>
                          <option>Above 100</option>
                      </select>
                      </td>
                      </tr>

                       <tr>
                      <td><span class='alabel'>Number of branches</span></td>
                      <td class="afteritem">
                       <input type="text"   id='numberofbranches'  value="" class='form-control' />
                      </td>
                      </tr>

                        <tr>
                      <td><span class='alabel'>Average Annual Account Balance</span></td>
                      <td class="afteritem">

                         <input type="text"   id='averagerevenue' value="" class='form-control' />
                      </td>
                      </tr>


                      <tr>
                      <td align='right'><button class="btn btn-info btn-sm" id='back2'>Back</button></td>
                      <td align='left'>
                       <button class="btn btn-primary btn-sm" id='submitinfo'>Submit</button>
                      </td>
                      </tr>

                    </table>

        </div> -->






        </div>


      </div>

      <div class='col-md-7'>
        <div id="map" style="padding-left: 10px; height: 390px"></div>
        <div id="pano" style="padding: 10px; height: 200px; margin-top:10px; display:none"> </div>
      </div>

    </div>

  </div>

  </div>

  <body>






    <!--Footer and JS directies -->

    <?php require APPROOT . '/views/inc/footer.php'  ?>

    <script type='text/javascript'>
      $('#tabs').tabs();

      $('#firstbtn').click(function(e) {
        $("#tabs").tabs("option", "active", 1);


        // var biztin = $('#tin').val();
        //
        //    $.ajax({
        //             type: "POST",
        //             url: "rgdadress.php",
        //             data:{biztin:biztin},
        //             dataType: "html",
        //             beforeSend: function(){
        //             $.blockUI();
        //             },
        //             success: function(text) {
        //              $('#adarea').html(text);
        //             },
        //             complete: function(){
        //              $.unblockUI();
        //             },
        //             error:function (xhr, ajaxOptions, thrownError){
        //               alert(xhr.status + " " + thrownError);
        //             }
        //   });
      })

      $('#secondbtn').click(function(e) {
        $("#tabs").tabs("option", "active", 2);
      })

      $('#thirdbtn').click(function(e) {
        $("#tabs").tabs("option", "active", 3);

        // var biztin = $('#tin').val();
        //
        //
        //    $.ajax({
        //             type: "POST",
        //             url: "rgdservice.php",
        //             data:{biztin:biztin},
        //             dataType: "html",
        //             beforeSend: function(){
        //             $.blockUI();
        //             },
        //             success: function(text) {
        //              $('#afarea').html(text);
        //             },
        //             complete: function(){
        //              $.unblockUI();
        //             },
        //             error:function (xhr, ajaxOptions, thrownError){
        //               alert(xhr.status + " " + thrownError);
        //             }
        //   });

      })

      $('#fourbtn').click(function(e) {
        $("#tabs").tabs("option", "active", 4);
      })


      $('#back1').click(function(e) {
        $("#tabs").tabs("option", "active", 0);
      })

      $('#back2').click(function(e) {
        $("#tabs").tabs("option", "active", 1);
      })

      $('#back3').click(function(e) {
        $("#tabs").tabs("option", "active", 2);
      })




      //  var biztin = $('#tin').val();
      //
      //  $.ajax({
      //           type: "POST",
      //           url: "rgdadress.php",
      //           data:{biztin:biztin},
      //           dataType: "html",
      //           beforeSend: function(){
      //           $.blockUI();
      //           },
      //           success: function(text) {
      //            $('#adarea').html(text);
      //           },
      //           complete: function(){
      //            $.unblockUI();
      //           },
      //           error:function (xhr, ajaxOptions, thrownError){
      //             alert(xhr.status + " " + thrownError);
      //           }
      // });
      //})

      // $('#submitinfo').click(function(){

      // var telephone          = $('#telephone').val();
      // var atelephone         = $('#atelephone').val();
      // var tin                = $('#tin').val();
      // var businessemail      = $('#businessemail').val();
      // var branch            = $('#branch').val();

      // var city        = $('#city').val();
      // var street      = $('#street').val();
      // var latitude    = $('#latitude').val();
      // var longitude   = $('#longitude').val();
      // var buildingno  = $('#buildingno').val();
      // var assembly    = $('#assembly').val();
      // var region      = $('#region').val();
      // var unitno      = $('#unitno').val();
      // var popularname = $('#popularname').val();

      // var firstname    = $('#fname').val();
      // var lastname     = $('#sname').val();




      //      $.ajax({
      //               type: "POST",
      //               url: "../ajaxscripts/saveind.php",
      //               data:{city:city,street:street, latitude:latitude, longitude:longitude,
      //                    buildingno:buildingno, assembly:assembly, region:region, unitno:unitno,
      //                    popularname:popularname, businessemail:businessemail, tin:tin,
      //                    telephone:telephone, firstname:firstname, lastname:lastname,
      //                    atelephone:atelephone, branch:branch
      //                   },
      //               dataType: "html",
      //               beforeSend: function(){
      //               $.blockUI();
      //               },
      //               success: function(s) {
      //                 alert(s)
      //                 alert('Registration Completely Done !!');
      //                 //window.location = 'http://localhost:8888/agency/pages/maccount.php';

      //               },
      //               complete: function(){
      //                $.unblockUI();
      //               },
      //               error:function (xhr, ajaxOptions, thrownError){
      //                 alert(xhr.status + " " + thrownError);
      //               }
      //               });
      // })


      // var map, infoWindow;
      // var countryRestrict = { 'country': 'gh' };


      //         function initMap() {
      //            map = new google.maps.Map(document.getElementById('map'), {
      //            center: {lat: 5.6027928, lng: -0.218137},
      //            zoom: 17,
      //            mapTypeId: 'hybrid'
      //         });

      //         var panorama = new google.maps.StreetViewPanorama(
      //             document.getElementById('pano'), {
      //               position: {lat: 5.6027928, lng: -0.218137},
      //               pov: {
      //                 heading: 34,
      //                 pitch: 10
      //               }
      //             });
      //         map.setStreetView(panorama);

      //         infoWindow = new google.maps.InfoWindow;
      //         var geocoder = new google.maps.Geocoder();

      //         document.getElementById('searchmap').addEventListener('click', function() {
      //           geocodeAddress(geocoder, map);


      //         });

      //         var marker = new google.maps.Marker({
      //           position: {lat: 5.6027928, lng: -0.218137},
      //           map: map
      //         });

      //           map.addListener('click', function(e) {
      //           placeMarker(e.latLng, map);
      //         });

      //           function placeMarker(location) {
      //               if (marker) {
      //                   //if marker already was created change positon
      //                   marker.setPosition(location);
      //               } else {
      //                   //create a marker
      //                   marker = new google.maps.Marker({
      //                       position: location,
      //                       map: map,
      //                       draggable: true
      //                   });
      //               }
      //           }


      //         //////////////////////////////////////////////////////////////////////////////////

      //      google.maps.event.addListener(map, 'click', function(event) {
      //        var lat =  event.latLng.lat();
      //        var lon =  event.latLng.lng();



      //      var goecoder ="http://maps.googleapis.com/maps/api/geocode/json?latlng="+lat+","+lon+"&sensor=false";
      //      $( "#tabs" ).tabs( "option", "active", 1);
      //        $.ajax({


      //             type: "POST",
      //             url: "../ajaxscripts/mapstatus.php",
      //             data: {lat:lat, lon:lon, goecoder:goecoder},
      //             dataType: "xml",
      //             success: function(xml) {


      //              $(xml).find('records').each(function(){
      //                $('#city').val($(this).find('city').text());
      //                $('#street').val($(this).find('street').text());
      //                $('#assembly').val($(this).find('assembly').text());
      //                $('#region').val($(this).find('region').text());
      //                $('#country').val($(this).find('country').text());
      //                $('#latitude').val($(this).find('latitude').text());
      //                $('#longitude').val($(this).find('longitude').text());

      //               });

      //               },
      //               error:function (xhr, ajaxOptions, thrownError){
      //                 alert(xhr.status + " " + thrownError);
      //               }
      //         });

      //       });

      //         var autocomplete = new google.maps.places.Autocomplete(
      //          (document.getElementById('address')),
      //            {types: ['geocode'],
      //            componentRestrictions: countryRestrict
      //        })

      //         // Try HTML5 geolocation.
      //         if (navigator.geolocation) {
      //           navigator.geolocation.getCurrentPosition(function(position) {
      //             var pos = {
      //               lat: position.coords.latitude,
      //               lng: position.coords.longitude
      //             };
      //             map.setCenter(pos);
      //            // map.setStreetView(panorama);


      //           }, function() {
      //             handleLocationError(true, infoWindow, map.getCenter());
      //           });
      //         } else {
      //           // Browser doesn't support Geolocation
      //           handleLocationError(false, infoWindow, map.getCenter());
      //         }



      //       }

      //       function handleLocationError(browserHasGeolocation, infoWindow, pos) {
      //         infoWindow.setPosition(pos);
      //         infoWindow.setContent(browserHasGeolocation ?
      //                               'Error: The Geolocation service failed.' :
      //                               'Error: Your browser doesn\'t support geolocation.');
      //         infoWindow.open(map);
      //       }

      //       function geocodeAddress(geocoder, resultsMap) {
      //         var address = document.getElementById('address').value;
      //         geocoder.geocode({'address': address}, function(results, status) {
      //           if (status === 'OK') {
      //             resultsMap.setCenter(results[0].geometry.location);
      //             var marker = new google.maps.Marker({
      //               map: resultsMap,
      //               position: results[0].geometry.location
      //             });
      //           } else {
      //             alert('Geocode was not successful for the following reason: ' + status);
      //           }
      //         });
      //       }
    </script>