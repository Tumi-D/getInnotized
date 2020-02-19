<?php
// session_start();

// include("conn/conn.php");
// include("conn/msconn.php");
// $uid = $_SESSION['uid'];


// $uniqueuid = $_GET['uniqueuid'];

// $getbusinfo = $con->query("Select * from BUSINESSINFORMATION  where UNIQUEUID = '$uniqueuid' ");
// $bus = $getbusinfo->fetch(PDO::FETCH_ASSOC);


// $getlocation =  $con->query("SELECT * FROM LOCATION where UNIQUEUID = '$uniqueuid' ");
// $loc = $getlocation->fetch(PDO::FETCH_ASSOC);
// $latitude = $loc['LATITUDE'];
// $longitude = $loc['LONGITUDE'];
// $city = $loc['CITY'];
// $street= $loc['STREET'];


// $getcontact = $con->query("SELECT * from contactinformation where UNIQUEUID = '$uniqueuid'  ");
// $ca = $getcontact->fetch(PDO::FETCH_ASSOC);


?>


<!DOCTYPE html>
<html lang="en">
 <head>

    <!-- Bootstrap core CSS -->
    <link href=<?php echo URLROOT ?>css/bootstrap.css rel="stylesheet">
    <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css" />
    <link rel="stylesheet" type="text/css" href=<?php echo URLROOT ?>custom-theme/jquery-ui-1.10.0.custom.css> <link rel="stylesheet" type="text/css" href=<?php echo URLROOT ?>pcss/themes/flick/theme.css> <link href="css/fontawesome/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href=<?php echo URLROOT ?>uploadify/uploadifive.css rel="stylesheet">
    <link rel="stylesheet" type="text/css" href=<?php echo URLROOT ?>pcss/themes/flick/theme.css>
    <link href=<?php echo URLROOT ?>vendor1/css/font-awesome/css/font-awesome.min.css rel="stylesheet">



    <style> 

    .gcontainer{
     
      width: 100%;
      height: 500px;

    }

    .g1{
      float: left;
      width: 30%;
      padding: 10px
      

    }

     .g2{
      float: left;
      width: 40%;
      padding: 10px
     

    }

     .g3{
      float: left;
      width: 30%;
      padding: 10px


    }



  
    </style>
  
  
  </head>


  <script type="text/javascript" src=<?php echo URLROOT ?>vendor1/js/jquery.min.js></script>
<script src=<?php echo URLROOT ?>vendor1/js/jquery-ui-1.10.0.custom.min.js></script>
<script type="text/javascript" src=<?php echo URLROOT ?>vendor1/js/jquery.dataTables.min.js></script>
<script type="text/javascript" src=<?php echo URLROOT ?>vendor1/js/bootstrap.min.js></script>
<script src=<?php echo URLROOT ?>js/notify.min.js></script>
<script src=<?php echo URLROOT ?>js/jquery.blockUI.js></script>
<script src=<?php echo URLROOT ?>vendor1/js/autoNumeric.js></script>
<script src=<?php echo URLROOT ?>uploadify/jquery.uploadifive.min.js></script>
<script type="text/javascript">
$(document).ready(function(){

$('#limitbtn').click(function(){

  $('#accessmodal').modal('show');

  $.ajax({
              type: "POST",
              url: 'ajaxscripts/maccess.php',
              data: {},
              beforeSend: function() {
                  $.blockUI();
              },
              success: function(text) {
                $("#accesscontent").html(text); 
              },
              complete: function() {
                  $.unblockUI();
              },
              error: function(xhr, ajaxOptions, thrownError) {
                  alert(xhr.status + " " + thrownError);
              }
          });

})

$('#terminal').click(function(){

  $('#terminalmodal').modal('show');

  $.ajax({
              type: "POST",
              url: 'ajaxscripts/terminal.php',
              data: {},
              beforeSend: function() {
                  $.blockUI();
              },
              success: function(text) {
                $("#terminalcontent").html(text); 
              },
              complete: function() {
                  $.unblockUI();
              },
              error: function(xhr, ajaxOptions, thrownError) {
                  alert(xhr.status + " " + thrownError);
              }
          });

})


$('#assign').click(function(){

  var agentid = '<?php  echo $uniqueuid;  ?>';
 
  $.ajax({
            type: "POST",
            url: "ajaxscripts/maddaccess.php",
            data:{pro:$('#proform').serializeArray(), agentid:agentid},
            dataType: "html",
            beforeSend: function(){
            $.blockUI();
            },
            success: function(text) {
            $(".notifyq").html(text);

            },
            complete: function(){
               $.unblockUI();
            },
            error:function (xhr, ajaxOptions, thrownError){
              alert(xhr.status + " " + thrownError);
            }
       });


})

$('#updatebusiness').click(function(){

  var agentid = '<?php  //echo $uniqueuid;  ?>';

  alert('User successfully update');



})


$('#updatebusiness').click(function(){

  var agentid = '<?php  //echo $uniqueuid;  ?>';

  alert('User successfully update');
 
  // $.ajax({
  //           type: "POST",
  //           url: "ajaxscripts/maddaccess.php",
  //           data:{pro:$('#proform').serializeArray(), agentid:agentid},
  //           dataType: "html",
  //           beforeSend: function(){
  //           $.blockUI();
  //           },
  //           success: function(text) {
  //           $(".notifyq").html(text);

  //           },
  //           complete: function(){
  //              $.unblockUI();
  //           },
  //           error:function (xhr, ajaxOptions, thrownError){
  //             alert(xhr.status + " " + thrownError);
  //           }
  //      });


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
          center: {lat: <?php echo $latitude  ?>, lng: <?php // echo $longitude  ?>},
          zoom: 17,
          mapTypeId: 'hybrid'
        });
        infoWindow = new google.maps.InfoWindow;
        var geocoder = new google.maps.Geocoder();

        document.getElementById('searchmap').addEventListener('click', function() {
          geocodeAddress(geocoder, map);
         
        });

        var marker = new google.maps.Marker({
          position: {lat: '<?php echo $latitude  ?>', lng: '<?php // echo $longitude  ?>'},
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


 <div class = 'row'>

  <div><h3><?php //echo $bus['BUSINESSNAME']  ?></h3></div>
        
  <div class='gcontainer'>
        <div class='g1'>

           <table class='table table-condensed' width="100%" style="font-size:13px; font-family:Verdana, Geneva, sans-serif">
                        
                     

                   <tr class='info' >

                   <td colspan='2' >BUSINESS INFORMATION</td>
                   </tr> 
                   
                       <tr>
                      <td><span class='alabel'>Business Name</span></td>
                      <td class="afteritem"><input type="text" class="tx_businness"  id="businessname"  style="width:100%" 
                        value = '<?php // echo $bus['BUSINESSNAME']  ?>'/></td>
                      </tr>
                   
                    <tr>
                      <td><span class='alabel'>TIN #:</span></td>
                      <td class="afteritem">
                        <input type="text" class="tx_businness"    id="tin"
                        value = '<?php //echo $bus['TINNUMBER']  ?>' style="width:100%" />
                      </td>
                      </tr>
                     <tr>

                    

                      <td><span class='alabel'>Nature of Business</span></td>
                      <td class="afteritem"> <input type="text" class="tx_businness"  id="natureofbusiness"  
                       value = '<?php // echo $bus['NATUREOFBUSINESS']  ?>' style="width:100%" />
                      </td>
                      </tr>

                      <tr>
                      <td><span class='alabel'>Telephone</span></td>
                      <td class="afteritem">
                         <input type="text" class="tx_businness" id="telephone"  style="width:100%"
                         value = '<?php //echo $bus['PHONENUMBER']  ?>' />
                      </td>
                      </tr>

              

                       <tr>
                      <td><span class='alabel'>Email Address:</span></td>
                      <td class="afteritem">
                        
                         <input type="text" class="tx_businness"  
                         value = '<?php //echo $bus['EMAILADDRESS']  ?>'  id="email"  style="width:100%" />
                      </td>
                      </tr>

                       <tr>
                      <td><span class='alabel'>Website</span></td>
                      <td class="afteritem">
                        
                         <input type="text" class="tx_businness"    id="website" 

                         value = '<?php //echo $bus['WEBSITE']  ?>' style="width:100%" />
                      </td>
                      </tr>

                    </table>

            <table class='table table-condensed' width="100%" style="font-size:13px; font-family:Verdana, Geneva, sans-serif">
             
             <tr class='info'>

                   <td colspan="2">LOCATION INFORMATION</td>
                   </tr> 
                   
                      <tr>

                  
                      <td class="afteritem"><input type="text"    id="latitude" placeholder='Latitude'
                      value = '<?php //echo $latitude  ?>' style="width:100%" /></td>

                       <td><input type="text"    id="longitude"  placeholder='Longitude' 
                       value = '<?php //echo $longitude  ?>'  style="width:100%" /></td>
                      </tr>
                   
                    <tr>
                    <td class="afteritem"><input type="text" id="popularname" 
                     placeholder="Popular Name" style="width:100%"
                     value = '<?php // echo $loc['POPULARNAME']  ?>'  /></td>
                     <td class="afteritem"> <input type="text" id="buildingno" 
                     placeholder="House / Building No"  style="width:100%"
                     value = '<?php //echo $loc['HOUSENUMBER']  ?>'  /> </td>
                   
                    </tr>

                    <tr>
                    <td class="afteritem"> <input type="text" placeholder="Street Address"   id="street"  
                      value = '<?php //echo $street  ?>' style="width:100%" /></td>
                        <td class="afteritem"><input type="text" placeholder="City"  
                        id="city"  style="width:100%"  
                          value = '<?php //echo $city  ?>' /></td> 
                   </tr>

                    <tr>
                    <td class="afteritem"><input type="text"  id="assembly" placeholder="Assembly"  
                    style="width:100%" value = '<?php //echo $loc['ASSEMBLY']  ?>' /></td>
                    <td class="afteritem"> <input type="text" id="region" placeholder='Region' 
                      value = '<?php //echo $loc['REGION']  ?>'  style="width:100%" /></td> 
                   </tr>
                    
          
                  <tr>
                      <td></td>
                      <td class="afteritem">
                       <button class="btn btn-warning btn-sm btn-block pull-left" id='updatebusiness'>Update</button>
                      </td>
                      </tr>           
                     

           </table>         
                  
        </div>


        <div class="g2" id="map" style=" height: 500px">
          
        </div>

        <div class="g3">

           <div>

             <table class='table table-condensed' width="100%" style="font-size:12px; font-family:Verdana, Geneva, sans-serif">
            <tr>
              <td left='right'><button class='btn btn-default btn-block' id='terminal'>
                <i class='fa fa-dashboard'></i> Add A Terminal</button></td>
             
            </tr>  
   
           </table>
           <table class='table table-condensed' width="100%" style="font-size:12px; font-family:Verdana, Geneva, sans-serif">

            <tr>
             <td class= 'info'>Manage Account</td>
            </tr>
            <tr>
              <td><select>
                 <option>Active</option>
                 <option>Blocked</option>
                  <option>Pending</option>
                  <option>Suspended</option>
               </select>
              </td>
             </tr>
             
           </table>
         </div>


          <div style="height: 300px; overflow-y: scroll;">
            <form name='proform' id='proform'>
           <table class='table table-condensed' width="100%" 
           style="font-size:12px; font-family:Verdana, Geneva, sans-serif">

            <tr>
             <td colspan="4" class= 'info'>Assign Services Limits</td>
            </tr>
            
            <tr>
             
              <td>Products</td>
              <td>Percentage(%)</td>
              <td>Fixed (GHC)</td>
            </tr> 

            <?php
            //  $getitems = $ucon->query("select * from SERVICEITEMS where uniqueuid = '$uid' ");

            //  while($t = $getitems->fetch(PDO::FETCH_ASSOC))
            //   {

            //       $itemname = $t['ITEMNAME'];

            //       $getproducts =  $ucon->query("Select * from  ASSIGNEDSERVICES 
            //       where agentid = '$uniqueuid' and mainid = '$uid' and productname = '$itemname' ");
            //       $get = $getproducts->fetch(PDO::FETCH_ASSOC);
            //       $proname = $get['PRODUCTNAME'];

            ?>

            <tr>
              
              <td><?php // echo $t['ITEMNAME']  ?>
                 <input type="hidden" name="itemname"  value='<?php //echo $t['ITEMNAME']  ?>'>

              </td>

              <td><input type="text" name="percent" value='<?php // echo $get['PERCENTAGEAMOUNT']  ?>' style='width:100px'></td>
              <td><input type="text" name="fixed" value='<?php //echo $get['FIXEDAMOUNT']  ?>'  style='width:100px'></td>
            </tr>  
            <?php
             // }
            ?>          
           </table>
         </form>
         </div>
         <p>&nbsp</p>

         <div>
          <div class='notifyq'></div>
          <table class='table table-condensed' width="100%" style="font-size:12px; font-family:Verdana, Geneva, sans-serif">
            <tr>
              <td align='right'><button class='btn btn-danger' type='button' id='assign'>Submit</button></td>
             
            </tr>  
   
           </table>


         </div>

         
                           
        </div>



  </div>  
                      
    
</div>



 <div id="accessmodal" class="modal fade" role="dialog">
            <div class="modal-dialog" style="width: 500px" role="document">

                <div class="modal-content">
                    <div class="modal-body" id="accesscontent">
                       
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        


                    </div>

                </div>
            </div>
  </div>


 <div id="terminalmodal" class="modal fade" role="dialog">
            <div class="modal-dialog" style="width: 500px" role="document">

                <div class="modal-content">
                    <div class="modal-body" id="terminalcontent">
                       
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        


                    </div>

                </div>
            </div>
  </div>

</body>   
</html>
