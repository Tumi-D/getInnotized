<!-- Header and CSS Directives-->
<?php // require '../config/config.php';   ?>
<?php // require "../conn/conn.php"; ?>
<?php // require "../conn/msconn.php"; ?>
<?php require APPROOT .'/views/inc/header.php'  ?>
<?php require APPROOT .'/views/inc/admin.php'  ?>

<?php
// session_start();
// $today = date('Y-m-d');
// $uid = $_SESSION['uid'];

// $getproducts  = $ucon->query("Select * from SELECTEDPRODUCTS where UNIQUEUID = '$uid' and productname <> 'Registrations' ");

// $getbusinfo = $con->query("Select * from BUSINESSINFORMATION  where UNIQUEUID = '$uid' ");
// $bus = $getbusinfo->fetch(PDO::FETCH_ASSOC);

// $getusers = $con->query("Select * from secondaryusers where mainid = '$uid' and  access_level = '1' ");

?>

<style>
tr td{
    padding: 3px !important;
    margin: 0 !important;
    font-size: 12px
  }

 .pinput{
    padding: 4px !important; 
    width: 100%; 
    border:1px solid green; 
 } 

</style>

  <!-- Commhr content goes here -->
  <div class="content-wrapper" style="background:url('<?php //echo URLROOT ?>/img/insuance_solution_rge3.jpg'); background-size:cover;rgba(0,0,0,.5);height:100%">
  <div class="row" style='padding-left:20px'> 
  <div class='col-md-6'><h3 style='color:orange'><?php // echo strtoupper($bus['BUSINESSNAME'])  ?></h3></div>
  
  <div class='col-md-4'>
    <div class="formarea"></div>
    <input type='text' class="form-control" id='address'/>
  </div>


  <div class='col-md-1'>
    <button class='btn btn-warning pull-left' id='searchmap' placeholder='Search Location'>Search</button>
  </div>
  </div>
  <hr style='background:#fff'/>
   
   <div class='row' style='padding:5px'>

    <div class = 'col-md-5'> 
    <div id="tabs">
  <ul style="background:#fff">
    <li><a href="#tabs-1">Add A Terminal </a></li>
   
  </ul>
  <div id="tabs-1">

  <table class='table' width="100%" border="0" cellpadding="2" cellspacing="0" style="font-size:11px; font-family:Verdana, Geneva, sans-serif">
                   

                    <tr>
                      <td><span class='alabel'>Terminal Name:</span></td>
                      <td class="afteritem"> <input type="text" class="tx_businness"    id="tname" value="" style="width:90%" />
                      </td>
                      </tr>

                       <tr>
                      <td><span class='alabel'>Model Number:</span></td>
                      <td class="afteritem"> <input type="text" class="tx_businness"    id="tmodel" value="" style="width:90%" />
                      </td>
                      </tr>
                   
                       <tr>
                      <td><span class='alabel'>Mac Address:</span></td>
                      <td class="afteritem"> <input type="text" class="tx_businness"    id="tmac" value="" style="width:90%" />
                      </td>
                      </tr>

                     <tr>
                      <td><span class='alabel'>Serial No:</span></td>
                      <td class="afteritem"> <input type="text" class="tx_businness"    id="tserial" value="" style="width:90%" />
                      </td>
                      </tr>

                      <tr>
                      <td><span class='alabel'>Brand:</span></td>
                      <td class="afteritem"> <input type="text" class="tx_businness"    id="tbrand" value="" style="width:90%" />
                      </td>
                      </tr>

                    
                      </tr>

                      <tr>
                      <td><span class='alabel'></span></td>
                      <td class="afteritem"> 
                        <button class='btn btn-warning saveterminal'><i class="fa fa-plus"></i> Save Terminal</button>
                      </td>
                      </tr>



                      </tr>

                       

                    </table>


  </div>
    

      </div>

      
  </div>

  <div class = 'col-md-7'> 
      <div id="map" style="padding-left: 10px; height: 420px"></div>
      <!-- <div id="pano" style="padding: 10px; height: 200px; margin-top:10px"> </div> -->
       
      

      

    </div>

    </div>

   </div>

  </div>


  

   

  <!--Footer and JS directies -->
  
<?php require APPROOT .'/views/inc/footer.php'  ?>

<script type='text/javascript'>
$('#tabs').tabs();

$('#firstbtn').click(function(e){
  $( "#tabs" ).tabs( "option", "active", 1);
})

$('#secondbtn').click(function(e){
  $( "#tabs" ).tabs( "option", "active", 2);
})

$('#isearchbtn').click(function(){

var searchtxt = $('#searchtxt').val();
   
$.ajax({
                        type: "POST",
                        url: "../ajaxscripts/iservice.php",
                        data:{searchtxt:searchtxt},
                        dataType: "xml",
                        beforeSend: function(){
                        $.blockUI();
                        },
                        success: function(xml) {
                         $(xml).find('records').each(function(){
                           $('#fname').val($(this).find('fname').text());
                           $('#sname').val($(this).find('sname').text());
                           $('#dob').val($(this).find('dob').text());
                           $('#pin').val($(this).find('pin').text());
                      
                         
                          });
              
                          },

                          complete: function(){
                             $.unblockUI();
                          },
                        error:function (xhr, ajaxOptions, thrownError){
                            alert(xhr.status + " " + thrownError);
                        }
             });
   })



$('.saveterminal').click(function(){

var tname          = $('#tname').val();
var tmodel         = $('#tmodel').val();
var tserial        = $('#tserial').val();
var tbrand         = $('#tbrand').val();
var tmac           = $('#tmac').val();



       $.ajax({
              type: "POST",
              url: "../ajaxscripts/terminal.php",
              data:{tname:tname, tmodel:tmodel, tserial:tserial, tbrand:tbrand, tmac:tmac },
              dataType: "html",
              beforeSend: function(){
              $.blockUI();
              },
              success: function(text) {
                  alert('Branch Successfully Saved');
              },
              complete: function(){
               $.unblockUI();
              },
              error:function (xhr, ajaxOptions, thrownError){
                alert(xhr.status + " " + thrownError);
              }
              });
})


var map, infoWindow;
var countryRestrict = { 'country': 'gh' };

  
      function initMap() {
           map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 5.6027928, lng: -0.218137},
          zoom: 17,
          mapTypeId: 'hybrid'
        });
       
        var panorama = new google.maps.StreetViewPanorama(
            document.getElementById('pano'), {
              position: {lat: 5.6027928, lng: -0.218137},
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
          position: {lat: 5.6027928, lng: -0.218137},
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
       var lat =  event.latLng.lat(); 
       var lon =  event.latLng.lng();

    
      
     var goecoder ="http://maps.googleapis.com/maps/api/geocode/json?latlng="+lat+","+lon+"&sensor=false"; 
     $( "#tabs" ).tabs( "option", "active", 1);
       $.ajax({
         
  
            type: "POST",
            url: "../ajaxscripts/mapstatus.php",
            data: {goecoder:goecoder},
            dataType: "xml",
            success: function(xml) {
            
            
             $(xml).find('records').each(function(){
               $('#city').val($(this).find('city').text());
               $('#street').val($(this).find('street').text());
               $('#assembly').val($(this).find('assembly').text());
               $('#region').val($(this).find('region').text());
               $('#country').val($(this).find('country').text());
               $('#latitude').val($(this).find('latitude').text());
               $('#longitude').val($(this).find('longitude').text());
             
              });
  
              },
              error:function (xhr, ajaxOptions, thrownError){
                alert(xhr.status + " " + thrownError);
              }
        });
         
      });
    
        var autocomplete = new google.maps.places.Autocomplete(
         (document.getElementById('address')),
           {types: ['geocode'],
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
        geocoder.geocode({'address': address}, function(results, status) {
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

