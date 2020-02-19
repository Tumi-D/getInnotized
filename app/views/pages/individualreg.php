<?php
// session_start();
// include("conn/conn.php");
// // $uid = $_SESSION['uid'];


// // if(isset($_GET['applicantid']))  $applicantid = $_GET['applicantid']; 

// // $getlocation =  $con->query("SELECT * FROM LOCATION where APPLICANTID = '$applicantid' ");
// // $loc = $getlocation->fetch(PDO::FETCH_ASSOC);
// // $latitude = $loc['LATITUDE'];
// // $longitude = $loc['LONGITUDE'];
// // $city = $loc['CITY'];
// // $street= $loc['STREET'];


// // $getallocation =  $con->query("SELECT * FROM LOCATION where CITY = '$city' and STREET = '$street' ORDER BY APPLIEDDATE DESC ");

// // $getdata = $con->query("Select * from basicinformation where applicantid = '$applicantid' ");
// // $ba = $getdata->fetch(PDO::FETCH_ASSOC);

// // $getcontact = $con->query("Select * from contactinformation where applicantid = '$applicantid' ");
// // $ca = $getcontact->fetch(PDO::FETCH_ASSOC);

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

    <title>Universal Money</title>


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
  min-height:100%;
  background:#fff
  background-size:cover;
  font-size:14px;
  }
 .form-container{
   margin: 0 auto;
   height: auto;
  background-color: rgba(40, 50, 56, 0.6);
  padding:20px;

 }

 .form-control{
color: #000;
border: 1px solid #000;
border-radius: 0px;
font-size: 14px;
background: rgba(0,0,0,0) !important;
 }
 label{
   color:#fff;
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
$(document).ready(function(){

  $('#dob').datepicker();

$('#searchbtn').click(function(){

var searchtxt = $('#searchtxt').val();
   
$.ajax({
                        type: "POST",
                        url: "ajaxscripts/iservice.php",
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


$('#submitinfo').click(function(){

var firstname              = $('#fname').val();
var lastname               = $('#sname').val();
var telephone              = $('#telephone').val();
var dob                    = $('#dob').val();
var email                  = $('#email').val();
var idtype                 = $('#idtype').val();
var pin                    = $('#pin').val();
var nationality            = $('#nationality').val();

var city                   = $('#city').val();
var street                 = $('#street').val();
var latitude               = $('#latitude').val();
var longitude              = $('#longitude').val();
var buildingno             = $('#buildingno').val();
var assembly               = $('#assembly').val();
var region                 = $('#region').val();
var unitno                 = $('#unitno').val();

var login                  = $('#login').val();
var password               = $('#password').val();
var cpassword              = $('#cpassword').val();




       $.ajax({
              type: "POST",
              url: "ajaxscripts/individualsave.php",
              data:{city:city,street:street, latitude:latitude, longitude:longitude,
                   buildingno:buildingno, assembly:assembly, region:region, unitno:unitno,
                   login:login, password:password, firstname:firstname, lastname:lastname,
                   email:email, telephone:telephone, idtype:idtype, pin:pin, nationality:nationality,
                   dob:dob},
              dataType: "html",
              beforeSend: function(){
              $.blockUI();
              },
              success: function(text) {
               $('#test').html(text);
              //alert('Registration Completely Done !!!!');
              },
              complete: function(){
               $.unblockUI();
              },
              error:function (xhr, ajaxOptions, thrownError){
                alert(xhr.status + " " + thrownError);
              }
              });
})



})

</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1nEal4lqDWdBz9mf79KUd0zGZdgArVfY&callback=initMap&v=3.exp&libraries=places"></script>
<script type="text/javascript">




  
      ///////////////////////////////////////////

      var map, infoWindow;
      var countryRestrict = { 'country': 'gh' };
      function initMap() {
           map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 5.6027928, lng: -0.218137},
          zoom: 17,
          mapTypeId: 'hybrid'
        });
        infoWindow = new google.maps.InfoWindow;
        var geocoder = new google.maps.Geocoder();

        document.getElementById('searchmap').addEventListener('click', function() {
          geocodeAddress(geocoder, map);
         
        });

        var marker = new google.maps.Marker({
          position: {lat: 5.6027928, lng: -0.218137},
          map: map
        });


        //////////////////////////////////////////////////////////////////////////////////

     google.maps.event.addListener(map, 'click', function(event) {
       var lat =  event.latLng.lat(); 
       var lon =  event.latLng.lng();

    
      
     var goecoder ="http://maps.googleapis.com/maps/api/geocode/json?latlng="+lat+","+lon+"&sensor=false"; 
  
       $.ajax({
         
  
            type: "POST",
            url: "ajaxscripts/mapstatus.php",
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
    




        //////////////////////////////////////////////////////////////////////////////////////

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

<body>
<div>
    <nav class="navbar navbar-inverse navbar-fixed-top" style='background:#E00202'>
    
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#" style='color:#fff'>UNIVERSAL MONEY</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav" style='color:#fff'>
            <li class="active"><a href="#">Home</a></li>
           
            <li style='color:#fff'><a style='color:#fff' href="businessreg.php">Business Registration</a></li>
              <li style='color:#fff'><a  style='color:#fff' href="individualreg.php">Individual Registration</a></li>
             <li style='color:#fff'><a  style='color:#fff' href="index.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
 </nav>

 </div>

 <div  style='width:100%;height:730px; margin:0 auto; margin-top:60px;' >

 <div class = 'row'>

   <div class='col-md-3' style='padding-left:15px '>
   <input type='text' class="form-control" id='searchtxt'  placeholder='Search by DVLA PIN, TAX ID, Voters ID' / >
  </div>
   <div class='col-md-1'>
    <button class="btn btn-primary pull-left " id='searchbtn'> <i class='fa fa-search'></i> </button>
  </div>

  <div class='col-md-7'>
    <input type='text' class="form-control" id='address'/>
  </div>


  <div class='col-md-1'>
    <button class='btn btn-warning pull-left' id='searchmap' placeholder='Search Location'>Search</button>
  </div>
 
 </div>

 <br/>

 <div id='pc' class = 'row'>
  <div class='col-md-4' style="padding:5px; height: 600px; overflow-y: scroll">

    <div id="exTab1" class="container" style="width: 480px"> 
      <ul  class="nav nav-pills" style="font-size: 12px">
      <li class="active"><a  href="#1a" data-toggle="tab">Basic Information</a></li>
      <li><a href="#2a" data-toggle="tab">Location</a></li>
      <li><a href="#3a" data-toggle="tab">Login Information</a></li>
    
    </ul>

      <div class="tab-content clearfix">
         <div class="tab-pane active" id="1a">
          <br/>

                    <table width="320"  class="table table-bordered table-condensed" style="font-size:10px">
  <tr>
    <td width="150" rowspan="5"><img src='showimage.php?staffid=<?php print $applicantid  ?>' class='img-circle' 
                  height='150' width='150' /></td>
   
  </tr>
  <tr>
    
    <td colspan="2"><input type="text" class="tx_businness" id='fname'    placeholder="First Name" value="" style="width:90%" /></td>
  </tr>
  <tr>
     
    <td colspan="2"><input type="text" class="tx_businness" id='sname'   placeholder="Last Name" value="" style="width:90%" /></td>
  </tr>
  <tr>
    
    <td colspan="2"><input type="text" class="tx_businness"  id='dob'   placeholder="Date of Birth" value="" style="width:90%" /></td>
  </tr>



   <tr>

      
    <td colspan="2"><input type="text" class="tx_businness"  id='telephone'   placeholder="Telephone" value="" style="width:90%" /></td>
  </tr>

   <tr>
    <td><button class='btn btn-danger btn-sm'><i class='fa fa-camera'></i> Upload Picture</button></td>
    
    <td colspan="2"><input type="text" class="tx_businness"  id='email'   placeholder="Email Address" value="" style="width:90%" /></td>
  </tr>

   <tr>
    <td>&nbsp;</td>
    
    <td colspan="2"><input type="text" class="tx_businness" id='nationality'    placeholder="Nationality" value="" style="width:90%" /></td>
  </tr>

  <tr>
    <td>&nbsp;</td>
     
  <td colspan="2"><input type="text" class="tx_businness"  id='idtype'   placeholder="ID Type" value="" style="width:90%" /></td>
  </tr>

   <tr>
    <td>&nbsp;</td>
    <td colspan="2"><input type="text" class="tx_businness"  id='pin'   placeholder="ID Number" value="" style="width:90%" /></td>
 
  </tr>

  <tr>
    <td colspan="3">&nbsp;</td>
  
  </tr>

 
</table>

</div>



  <div class="tab-pane" id="2a">
                       <table class='table table-condensed' width="100%" style="font-size:13px; font-family:Verdana, Geneva, sans-serif">
                        
                        <br/>
                   
                    <tr>

                      <tr>
                      <td><span class='alabel'>Latitude</span></td>
                      <td class="afteritem"><input type="text"    id="latitude"  style="width:90%" /></td>
                      </tr>
                   
                    <tr>

                      <tr>
                      <td><span class='alabel'>Longitude</span></td>
                      <td class="afteritem"><input type="text"    id="longitude"  style="width:90%" /></td>
                      </tr>
                   
                    <tr>

                    <tr>
                      <td><span class='alabel'>Popular Name</span></td>
                      <td class="afteritem"><input type="text"    id="popularname"  style="width:90%" /></td>
                      </tr>
                   
                      <tr>
                      <td><span class='alabel'>Building No:</span></td>
                      <td class="afteritem">
                        <input type="text"    id="buildingno"  style="width:90%" />
                      </td>
                      </tr>
                    

                       <tr>
                      <td><span class='alabel'>Unit No:</span></td>
                      <td class="afteritem">
                        <input type="text"    id="unitno"  style="width:90%" />
                      </td>
                      </tr>


                     <tr>
                      <td><span class='alabel'>Street Address</span></td>
                      <td class="afteritem"> <input type="text"   id="street"  style="width:90%" />
                      </td>
                      </tr>

                      <tr>
                      <td><span class='alabel'>City</span></td>
                      <td class="afteritem">
                         <input type="text"   id="city"  style="width:90%"  />
                      </td>
                      </tr>

                      <tr>
                      <td><span class='alabel'>Assembly</span></td>
                      <td class="afteritem">
                        
                         <input type="text"  id="assembly"  style="width:90%" />
                      </td>
                      </tr>

                       <tr>
                      <td><span class='alabel'>Region</span></td>
                      <td class="afteritem">
                        
                         <input type="text"    id="region"  style="width:90%" />
                      </td>
                      </tr>


                      <tr>
                      <td></td>
                      <td class="afteritem">
                       <button class="btn btn-primary btn-sm pull-left">Next</button>
                      </td>
                      </tr>

                    </table>

                  </div>


        <div class="tab-pane" id="3a">
                     <br/>

                  <table class='table' width="100%" border="0" cellpadding="2" cellspacing="0" style="font-size:13px; font-family:Verdana, Geneva, sans-serif">

                      <tr>
                      <td><span class='alabel'>Username</span></td>
                     <td class="afteritem"><input type="text" class="tx_businness"    id="login" value="" style="width:90%" /></td>
                      </tr>

                      <tr>
                      <td><span class='alabel'>Password</span></td>
                      <td class="afteritem"><input type="password" class="tx_businness"    id="password" value="" style="width:90%" /></td>
                      </tr>

                       <tr>
                      <td><span class='alabel'>Confirm Password</span></td>
                      <td class="afteritem"><input type="password" class="tx_businness"    id="cpassword" value="" style="width:90%" /></td>
                      </tr>

                       <tr>
                      <td></td>
                      <td class="afteritem">
                       <button  class="btn btn-primary btn-sm pull-left" id='submitinfo' >Save & Continue</button>
                      </td>
                      </tr>
                  

                    </table>

                    <div id='test'></div>
           
         </div>


                     </div>
                  
               
                 </div>                        
              </div>



     <div class="col-md-8 form-container" id="map" style="padding-left: 10px; height: 620px">
                           
          </div>
                      
    
   </div>

 </div>
   
 </div>  



</body>   
</html>
