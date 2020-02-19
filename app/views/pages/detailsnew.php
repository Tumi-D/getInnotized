<?php
// session_start();
// include("conn/conn.php");
// $uid = $_SESSION['uid'];


// if(isset($_GET['applicantid']))  $applicantid = $_GET['applicantid']; 

// $getlocation =  $con->query("SELECT * FROM LOCATION where APPLICANTID = '$applicantid' ");
// $loc = $getlocation->fetch(PDO::FETCH_ASSOC);
// $latitude = $loc['LATITUDE'];
// $longitude = $loc['LONGITUDE'];
// $city = $loc['CITY'];
// $street= $loc['STREET'];


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



})



</script>

<script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
<script src="js/jquery-ui-1.10.0.custom.min.js"></script>
<script src="js/notify.min.js"></script>
<script src="js/jquery.blockUI.js"></script>
<script src="js/autoNumeric.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1nEal4lqDWdBz9mf79KUd0zGZdgArVfY&callback=initMap&v=3.exp&libraries=places"></script>
<script type="text/javascript">




     


      ///////////////////////////////////////////

      var map, infoWindow;
      var countryRestrict = { 'country': 'gh' };
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: <?php echo $latitude  ?>, lng: <?php echo $longitude  ?>},
          zoom: 17,
          mapTypeId: 'hybrid'
        });
        infoWindow = new google.maps.InfoWindow;
        var geocoder = new google.maps.Geocoder();

        document.getElementById('searchmap').addEventListener('click', function() {
          geocodeAddress(geocoder, map);
          alert('prince')
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
            <li class="active"><a href="#">Home</a></li>
            <li style='color:#fff'><a  style='color:#000' href="index.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
 </nav>

 </div>

 <div  style='width:100%;height:730px; margin:0 auto; margin-top:60px;' >

 <div class = 'row'>

   <div class='col-md-4' style='padding-left:15px'>

  </div>
   

  <div class='col-md-7'>
    <input type='text' class="form-control" id='address'  / >
  </div>


  <div class='col-md-1'>
    <button class='btn btn-primary pull-left' id='searchmap' placeholder='Search Location'>Search</button>
  </div>
 
 </div>

 <br/>

 <div id='pc' class ='row'>
  <div class='col-md-4'>
  <div class="list-group border-bottom" style="padding:5px; height: 680px; overflow-y: scroll">
    <div id="exTab1" class="container" style="width: 470px"> 
     <ul  class="nav nav-pills" style="font-size: 13px">
      <li class="active"><a  href="#1a" data-toggle="tab">Basic Information</a></li>
      <li><a href="#2a" data-toggle="tab">Location</a> </li>
      <li><a href="#3a" data-toggle="tab">Attributes</a> </li>
      <li><a href="#4a" data-toggle="tab">Service Type</a></li>
    </ul>

     <div class="tab-content clearfix" style="height:300px; overflow-y: scroll;">
        <div class="tab-pane active" id="1a">
          <br/>
             <table class='table table-condensed' width="100%" style="font-size:13px; font-family:Verdana, Geneva, sans-serif">

                      <tr>
                      <td><span class='alabel'>First Name</span></td>
                      <td class="afteritem"><input type="text" class="tx_businness"    id="businessname" value="" style="width:90%" /></td>
                      </tr>

                       <tr>
                      <td><span class='alabel'>Last Name</span></td>
                      <td class="afteritem"><input type="text" class="tx_businness"    id="businessname" value="" style="width:90%" /></td>
                      </tr>

                    <tr>
                      <td><span class='alabel'>Business Name</span></td>
                      <td class="afteritem"><input type="text" class="tx_businness"    id="businessname" value="" style="width:90%" /></td>
                      </tr>
                   
                    <tr>
                      <td><span class='alabel'>TIN #:</span></td>
                      <td class="afteritem">
                        <input type="text" class="tx_businness"    id="tin" value="" style="width:90%" />
                      </td>
                      </tr>
                     <tr>

                    

                      <td><span class='alabel'>Nature of Business</span></td>
                      <td class="afteritem"> <input type="text" class="tx_businness"    id="tinnumber" value="" style="width:90%" />
                      </td>
                      </tr>

                      <tr>
                      <td><span class='alabel'>Telephone</span></td>
                      <td class="afteritem">
                         <input type="text" class="tx_businness"    id="telephone" value="" style="width:90%" />
                      </td>
                      </tr>

                       <tr>
                      <td><span class='alabel'>Alt Telephone</span></td>
                      <td class="afteritem">
                         <input type="text" class="tx_businness"    id="telephone" value="" style="width:90%" />
                      </td>
                      </tr>

                       <tr>
                      <td><span class='alabel'>Email Address:</span></td>
                      <td class="afteritem">
                        
                         <input type="text" class="tx_businness"    id="tinnumber" value="" style="width:90%" />
                      </td>
                      </tr>



                    </table>

        </div>
        <div class="tab-pane" id="2a">
           <table class='table table-condensed' width="100%" border="0" cellpadding="2" cellspacing="0" style="font-size:13px; font-family:Verdana, Geneva, sans-serif">

                   <br/>
                   
                    <tr>

                      <tr>
                      <td><span class='alabel'>Latitude</span></td>
                      <td class="afteritem"><input type="text"    id="latitude" value="" style="width:90%" /></td>
                      </tr>
                   
                    <tr>

                      <tr>
                      <td><span class='alabel'>Longitude</span></td>
                      <td class="afteritem"><input type="text"    id="longitude" value="" style="width:90%" /></td>
                      </tr>
                   
                    <tr>

                    <tr>
                      <td><span class='alabel'>Popular Name</span></td>
                      <td class="afteritem"><input type="text"    id="popularname" value="" style="width:90%" /></td>
                      </tr>
                   
                    <tr>
                      <td><span class='alabel'>Building No:</span></td>
                      <td class="afteritem">
                      <input type="text" id="areacode" value="" style="width:90%" />
                      </td>
                      </tr>
                     <tr>
                      <td><span class='alabel'>Street Address</span></td>
                      <td class="afteritem"> <input type="text"   id="street" value="" style="width:90%" />
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


                    </table>
        </div>
        <div class="tab-pane" id="3a">
         <table class='table table-condensed' width="100%" style="font-size:13px; font-family:Verdana, Geneva, sans-serif">

                     <br/>
                   
                      <td><span class='alabel'>Business Type</span></td>
                      <td class="afteritem">
                        <select class="form-control">
                           <option>Select</option>
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
                         <select class="form-control">
                          <option>Select</option>
                          <option>Finance</option>
                          <option>Banking</option>
                          <option>Ecommerce</option>
                          <option>ICT Infrastructure</option>
              
                        
                        </select>
                      </td>
                      </tr>
                    
                      <tr>
                      <td><span class='alabel'>Estimate Annual Revenue</span></td>
                      <td class="afteritem">
                          <select class="form-control">
                          <option>Select</option>
                          <option>GHC 100 - GHC 1,000</option>
                          <option>GHC 1,000 - GHC 10,000</option>
                          <option>GHC 10,000 - GHC 20,000</option>
                          <option>GHC 20,000 - GHC 50,000</option>
                          <option>GHC 50,000 - GHC 75,000</option>
                          <option>GHC 75,000 - GHC 100,000</option>
                          <option>GHC 100,000 and above</option>
                      </td>
                      </tr>

                      <tr>
                      <td><span class='alabel'>Number of employees</span></td>
                      <td class="afteritem">
                      <input type="text"    value="" class='form-control' />
                      </td>
                      </tr>

                       <tr>
                      <td><span class='alabel'>Number of branches</span></td>
                      <td class="afteritem">
                       <input type="text" value="" class='form-control' />
                      </td>
                      </tr>

                        <tr>
                      <td><span class='alabel'>Average Annual Account Balance</span></td>
                      <td class="afteritem">
                        <input type="text" value="" class='form-control' />
                      </td>
                      </tr>


                    </table>
        </div>

        <div class="tab-pane" id="4a">


        </div>
     
     </div>

    </div>
    <p>&nbsp</p>

     <a  style='font-weight:700' href="#" class="list-group-item active" id='primarybtn'><span class="fa fa-list"></span> Account  Activities</a>
   
     <div class="list-group border-bottom" style="padding:5px; ">

                <a href="#" class="list-group-item terminal" ><span class="fa fa-cog"></span>Create Terminal </a>

                 <a href="#" class="list-group-item addusers" ><span class="fa fa-cog"></span>Add Users </a>

                <a href="#" class="list-group-item administer" ><span class="fa fa-cog"></span>Administer Privileges </a>

                 <a href="#" class="list-group-item transfers" ><span class="fa fa-cog"></span>Transaction History </a>

    </div> 
  </div> 
                
  </div>



  <div class="col-md-8 form-container" id="map" style="padding-left: 10px; height: 620px">
                           
  </div>
                      
    
   </div>
   
 </div>  



</body>   
</html>
