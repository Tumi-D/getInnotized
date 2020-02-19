<?php
// session_start();
// include("conn/conn.php");
// include("conn/msconn.php");
// $uid = $_SESSION['uid'];


// if(isset($_GET['uniqueuid']))  $uniqueuid = $_GET['uniqueuid']; 

// $getlocation =  $con->query("SELECT * FROM LOCATION where UNIQUEUID = '$uniqueuid' ");
// $loc = $getlocation->fetch(PDO::FETCH_ASSOC);
// $latitude = $loc['LATITUDE'];
// $longitude = $loc['LONGITUDE'];
// $city = $loc['CITY'];
// $street= $loc['STREET'];


// $getdata = $con->query("Select * from basicinformation where UNIQUEUID = '$uniqueuid' ");
// $ba = $getdata->fetch(PDO::FETCH_ASSOC);
// $uniq = $ba['UNIQUEUID'];

// $getcontact = $con->query("Select * from contactinformation where UNIQUEUID = '$uniqueuid' ");
// $ca = $getcontact->fetch(PDO::FETCH_ASSOC);


// $getbus = $con->query("Select * from businessinformation where UNIQUEUID  = '$uniqueuid' ");
// $bus = $getbus->fetch(PDO::FETCH_ASSOC);


// $getservice = $ucon->query("Select * from selectedproducts where UNIQUEUID  = '$uniqueuid' ");




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

 .afteritem{
    font-size: 12px;
    font-weight: 700;

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


$('.terminal').click(function(){

$('#sitemodal').modal('show');

              $.ajax({
              type: "POST",
              url: "ajaxscripts/terminal.php",
              data:{},
              dataType: "html",
              beforeSend: function(){
              $.blockUI();
              },
              success: function(text) {
              $('#sitecontent').html(text);
              },
              complete: function(){
               $.unblockUI();
              },
              error:function (xhr, ajaxOptions, thrownError){
                alert(xhr.status + " " + thrownError);
              }
              });
}) 


$('.manage').click(function(){
             
             $.ajax({
              type: "POST",
              url: "ajaxscripts/manage.php",
              data:{},
              dataType: "html",
              beforeSend: function(){
              $.blockUI();
              },
              success: function(text) {
              $('#sit').html(text);
              },
              complete: function(){
               $.unblockUI();
              },
              error:function (xhr, ajaxOptions, thrownError){
                alert(xhr.status + " " + thrownError);
              }
              });
})  


$('.addusers').click(function(){

$.ajax({
              type: "POST",
              url: "ajaxscripts/newuser.php",
              data:{},
              dataType: "html",
              beforeSend: function(){
              $.blockUI();
              },
              success: function(text) {
              $('.formarea').html(text);
              },
              complete: function(){
               $.unblockUI();
              },
              error:function (xhr, ajaxOptions, thrownError){
                alert(xhr.status + " " + thrownError);
              }
              });
}) 

$('.access').click(function(){

$('#sitemodal').modal('show');
var id = '<?php  echo $uniqueuid  ?>';

$.ajax({
              type: "POST",
              url: "ajaxscripts/access.php",
              data:{id:id},
              dataType: "html",
              beforeSend: function(){
              $.blockUI();
              },
              success: function(text) {
              $('#sitecontent').html(text);
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


<!-- Third Party Code -->

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1nEal4lqDWdBz9mf79KUd0zGZdgArVfY&callback=initMap&v=3.exp&libraries=places"></script>
<script type="text/javascript">
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
        
        });

         var marker = new google.maps.Marker({
          position: {lat: <?php echo $latitude  ?>, lng: <?php echo $longitude  ?>},
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
<!-- 
<script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1nEal4lqDWdBz9mf79KUd0zGZdgArVfY&callback=initMap&v=3.exp&libraries=places"></script>
<script type="text/javascript">



      






</script> -->

<body>

 <div id="sitemodal" class="modal fade" role="dialog">
            <div class="modal-dialog" style="width: 700px" role="document">

                <div class="modal-content">
                    <div class="modal-body" id="sitecontent">
                       
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        


                    </div>

                </div>
            </div>
  </div>


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
    
    </ul>

     <div class="tab-content clearfix" style="height:300px; overflow-y: scroll;">
        <div class="tab-pane active" id="1a">
          <br/>
             <table class='table table-condensed' width="100%" style="font-size:13px; font-family:Verdana, Geneva, sans-serif">

                      <tr>
                      <td><span class='alabel'>First Name</span></td>
                      <td class="afteritem">
                       <?php  //echo $ba['FIRSTNAME'] ?></td>
                      </tr>

                       <tr>
                      <td><span class='alabel'>Last Name</span></td>
                      <td class="afteritem"><?php  //echo $ba['SURNAME'] ?></td>
                      </tr>

                    <tr>
                      <td><span class='alabel'>Business Name</span></td>
                      <td class="afteritem"><?php  //echo $bus['BUSINESSNAME'] ?></td>
                      </tr>
                   
                      <tr>
                      <td><span class='alabel'>TIN #:</span></td>
                      <td class="afteritem">
                        <?php  //echo $bus['TINNUMBER'] ?>
                      </td>
                      </tr>
                     <tr>
                      <td><span class='alabel'>Nature of Business</span></td>
                      <td class="afteritem"> <?php  //echo $bus['NATUREOFBUSINESS'] ?>
                      </td>
                      </tr>

                      <tr>
                      <td><span class='alabel'>Telephone</span></td>
                      <td class="afteritem">
                         <?php  //echo $ca['TELEPHONE'] ?>
                      </td>
                      </tr>

                       <tr>
                      <td><span class='alabel'>Email Address:</span></td>
                      <td class="afteritem">
                        <?php  //echo $ca['EMAILADDRESS'] ?>
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
                      <td class="afteritem"><?php  //echo $loc['LATITUDE'] ?></td>
                      </tr>
                   
                    <tr>

                      <tr>
                      <td><span class='alabel'>Longitude</span></td>
                      <td class="afteritem"><?php  //echo $loc['LONGITUDE'] ?></td>
                      </tr>
                   
                    <tr>

                    <tr>
                      <td><span class='alabel'>Popular Name</span></td>
                      <td class="afteritem"><?php  //echo $loc['POPULARNAME'] ?></td>
                      </tr>

                       <tr>
                      <td><span class='alabel'>Building No:</span></td>
                      <td class="afteritem">
                      <?php  //echo $loc['HOUSENUMBER'] ?>
                      </td>
                      </tr>
                     <tr>
                   
                    <tr>
                      <td><span class='alabel'>Unit No:</span></td>
                      <td class="afteritem">
                      <?php  //echo $loc['FLOORNUMBER'] ?>
                      </td>
                      </tr>
                     <tr>
                      <td><span class='alabel'>Street Address</span></td>
                      <td class="afteritem"><?php  //echo $loc['STREET'] ?>
                      </td>
                      </tr>

                      <tr>
                      <td><span class='alabel'>City</span></td>
                      <td class="afteritem">
                      <?php  //echo $loc['CITY'] ?>
                      </td>
                      </tr>

                      <tr>
                      <td><span class='alabel'>Assembly</span></td>
                      <td class="afteritem">
                       <?php  //echo $loc['ASSEMBLY'] ?>
                      </td>
                      </tr>

                       <tr>
                      <td><span class='alabel'>Region</span></td>
                      <td class="afteritem">
                       <?php  //echo $loc['REGION'] ?>
                      </td>
                      </tr>


                    </table>
        </div>
      

        <div class="tab-pane" id="4a">

           <table class='table table-bordered' width="100%" style="font-size:13px; font-family:Verdana, Geneva, sans-serif">
             <?php
            // while($po = $getservice->fetch(PDO::FETCH_ASSOC)){
          
            ?>
           
            <tr>
              <td><?php //echo $po['PRODUCTNAME'] ?></td>
            </tr>
          <?php
           // }
          ?>

          </table>
        </div>
     
     </div>

    </div>
    <p>&nbsp;</p>

     <a  style='font-weight:700' href="#" class="list-group-item active" id='primarybtn'><span class="fa fa-list"></span> Manage Account</a>
   
     <div class="list-group border-bottom" style="padding:5px; ">       
       <a href="#" class="list-group-item terminal" ><span class="fa fa-cog"></span> Edit Profile </a>     

    </div> 
  </div> 
                
  </div>



  <div class="col-md-8 form-container" id="map" style="padding-left: 10px; height: 620px">
    
                           
  </div>
                      
    
   </div>
   
 </div>  



</body>   
</html>
