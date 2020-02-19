<!-- Header and CSS Directives-->
<?php //session_start();  ?>
<?php //require '../config/config.php';   ?>
<?php //require "../conn/conn.php"; ?>
<?php //require "../conn/msconn.php"; ?>
<?php require APPROOT .'/views/inc/header.php'  ?>
<?php require APPROOT .'/views/inc/agent.php'  ?>

<?php

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

 .modal-contentlimit {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 0.3rem;
    outline: 0;
    width: 800px;
}

</style>

<!-- Dialogs -->

<body onload=initMap()>



  <div id="catmodal" class="modal fade" role="dialog">
            <div class="modal-dialog" style="width: 800px" role="document">

                <div class="modal-content">
                    <div class="modal-body" id="catcontent">
                       
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->

                    </div>

                </div>
            </div>
  </div>

  <div id="accessmodal" class="modal fade" role="dialog">
            <div class="modal-dialog" style="width: 200px" role="document">

                <div class="modal-content">
                    <div class="modal-body" id="accesscontent">
                       
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    </div>

                </div>
            </div>
  </div>






  <!-- Commhr content goes here -->
  <div class="content-wrapper" style="background:url('<?php echo URLROOT ?>/img/insurance_solution_large3.jpg'); background-size:cover;rgba(0,0,0,.5);height:100%">
  <div class="row"> 
  <div class='col-md-12'>
  <div id="limitmodal" class="modal fade" role="dialog" >
            <div class="modal-dialog" style="width: 1000px" role="document">

                <div class="modal-contentlimit">
                    <div class="modal-body" id="limitcontent">
                       
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Close</button>

                    </div>

                </div>
            </div>
  </div>

  <div id="transmodal" class="modal fade" role="dialog" >
            <div class="modal-dialog" style="width: 1000px" role="document">

                <div class="modal-content">
                    <div class="modal-body" id="transcontent">
                       
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Closes</button>

                    </div>

                </div>
            </div>
  </div>
  </div>
  </div>
  <div class="row" style='padding-left:20px'> 
  <div class='col-md-6'><h3 style='color:orange'><?php //echo strtoupper($bus['BUSINESSNAME'])  ?></h3></div>
  
  <div class='col-md-4'>
    <div class="formarea"></div>
    <input type='text' class="form-control" id='address' />
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
    <li><a href="#tabs-1">Basic </a></li>
    <li><a href="#tabs-2">Location</a></li>
    <li><a href="#tabs-3">Attributes</a></li>
    <li><a id='affiliates' href="#tabs-4">Affiliates</a></li>
   
  </ul>
  <div id="tabs-1">

           
                  <table width="100%" class='table table-condensed' s
                  tyle="font-size:13px; font-family:Verdana, Geneva, sans-serif">

                     <tr>
                      <td width='320'>
                    <input type='text' class="form-control" id='searchtxt'  placeholder='Search by Business Reg No, TIN No' / ></td>
                    <td><button class="btn btn-primary pull-left " id='searchbtn'> <i class='fa fa-search'></i> </button></td>
                
                      </tr>

                      </table>

                      <table width="100%" class='table table-condensed' s
                  tyle="font-size:13px; font-family:Verdana, Geneva, sans-serif">
                    
                    <tr>
                      <td><span class='alabel'>Type of Agent</span></td>
                      <td class="afteritem">
                      <select class="tx_businness" id='accountype'>
                       <option>Super Agent</option>
                       <option>Fixed Agent</option>
                       <option>Mobile Agent</option>
                      </select>
                      </td>
                    </tr>


                    <tr>
                      <td><span class='alabel'>Business Name</span></td>
                      <td class="afteritem"><input type="text" class="tx_businness"  
                        id="businessname"  style="width:100%" value='<?php //echo $bus['BUSINESSNAME']  ?>' /></td>
                    </tr>
                   
                    <tr>

                      <td><span class='alabel'>TIN #:</span></td>
                      <td class="afteritem">
                        <input type="text" class="tx_businness" id="tin"  style="width:100%"
                        value='<?php //echo $bus['TINNUMBER']  ?>' />
                      </td>
                      </tr>
                     <tr>

                    

                      <td><span class='alabel'>Nature of Business</span></td>
                      <td class="afteritem"> <input type="text" class="tx_businness"  id="natureofbusiness" 
                       style="width:100%" value='<?php //echo $bus['NATUREOFBUSINESS']  ?>'/>
                      </td>
                      </tr>

                      <tr>
                      <td><span class='alabel'>Telephone</span></td>
                      <td class="afteritem">
                         <input type="text" class="tx_businness"    id="telephone"  style="width:100%" 
                         value='<?php //echo $bus['PHONENUMBER']  ?>'/>
                      </td>
                      </tr>

                      

                       <tr>
                      <td><span class='alabel'>Email Address:</span></td>
                      <td class="afteritem">
                        
                         <input type="text" class="tx_businness"    id="businessemail"  style="width:100%" />
                      </td>
                      </tr>

                       <tr>
                      <td><span class='alabel'>Website</span></td>
                      <td class="afteritem">
                        
                         <input type="text" class="tx_businness"    id="website"  style="width:100%"
                         value='<?php //echo $bus['WEBSITE']  ?>' />
                      </td>
                      </tr>

                       <tr>
                      <td colspan="2"><span class='alabel'>&nbsp</td>
                
                      </tr>

                       <tr>
                      <td align='right'><button class="btn btn-danger btn-sm pull-right">Update</button></td>
                      <td class="afteritem">
                       <button class="btn btn-primary btn-sm  pull-left" id='firstbtn'>Next</button>
                      </td>
                      </tr>

                    </table>


                     
        </div>
        <div id="tabs-2">
  
          <table class='table table-condensed' width="100%" style="font-size:13px; font-family:Verdana, Geneva, sans-serif">
                        
                      <tr>
                      <td><span class='alabel'>Latitude</span></td>
                      <td class="afteritem"><input type="text"    id="latitude"  style="width:100%" 
                      value='<?php //echo $latitude  ?>'/></td>
                      </tr>
                   
                    <tr>

                      <tr>
                      <td><span class='alabel'>Longitude</span></td>
                      <td class="afteritem"><input type="text"    id="longitude"  style="width:100%" 
                      value='<?php //echo $longitude  ?>' /></td>
                      </tr>
                   
                    <tr>

                    <tr>
                      <td><span class='alabel'>Popular Name</span></td>
                      <td class="afteritem"><input type="text"    id="popularname"  style="width:100%"
                      value='<?php //echo $loc['POPULARNAME']  ?>' /></td>
                      </tr>
                   
                      <tr>
                      <td><span class='alabel'>House/Building No:</span></td>
                      <td class="afteritem">
                        <input type="text"    id="buildingno"  style="width:100%"
                        value='<?php //echo $loc['HOUSENUMBER']  ?>' />
                      </td>
                      </tr>
                    

                       <tr>
                      <td><span class='alabel'>Unit No:</span></td>
                      <td class="afteritem">
                        <input type="text"    id="unitno"  style="width:100%" />
                      </td>
                      </tr>


                     <tr>
                      <td><span class='alabel'>Street Address</span></td>
                      <td class="afteritem"> <input type="text"   id="street" 
                      value='<?php //echo $street  ?>'  style="width:100%" />
                      </td>
                      </tr>

                      <tr>
                      <td><span class='alabel'>City</span></td>
                      <td class="afteritem">
                         <input type="text"   id="city"  style="width:100%" 
                         value='<?php //echo $city  ?>'  />
                      </td>
                      </tr>

                      <tr>
                      <td><span class='alabel'>Assembly</span></td>
                      <td class="afteritem">
                        
                         <input type="text"  id="assembly"  style="width:100%"
                         value='<?php //secho $loc['ASSEMBLY']  ?>' />
                      </td>
                      </tr>

                       <tr>
                      <td><span class='alabel'>Region</span></td>
                      <td class="afteritem">
                        
                         <input type="text"    id="region"  style="width:100%" 
                         value='<?php //echo $loc['REGION']  ?>' />
                      </td>
                      </tr>


                      <tr>
                      <td align='right'><button class="btn btn-danger btn-sm pull-right">Update</button></td>
                      <td class="afteritem">
                       <button class="btn btn-primary btn-sm  pull-left" id='secondbtn'>Next</button>
                      </td>
                      </tr>

                    </table>

        </div>

  <div id='tabs-3'>

    <table class='table' width="100%" border="0" cellpadding="2" cellspacing="0" style="font-size:13px; font-family:Verdana, Geneva, sans-serif">

                     <br/>
                    <tr>

                    <tr>
                      <td><span class='alabel'>Business Type</span></td>
                      <td class="afteritem">
                        <select class="form-control" id='businesstype'>
                          <option><?php //echo $bus['TYPE']  ?></option>
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
                         <option><?php //echo $bus['CATEGORY']  ?></option>
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
                          <option><?php //echo $bus['ANNUALREVENUE']  ?></option></option>
                          <option>GHC 10,000 - GHC 100,000</option>
                          <option>GHC 100, 000 - GHC 200,000</option>
                          <option>GHC 200,000 - GHC 300,000</option>
                          <option>GHC 300,000 - GHC 400,000</option>
                          <option>GHC 400,000 - GHC 500,000</option>
                          <option>GHC 500,000 and above</option>
                      </td>
                      </tr>

                      <tr>
                      <td><span class='alabel'>Number of employees</span></td>
                      <td class="afteritem">
                      <input type="text"  id='numberofemployees'   value="<?php //echo $bus['NUMBEROFEMPLOYEES'] ?>" 
                      class='form-control' />
                      </td>
                      </tr>

                       <tr>
                      <td><span class='alabel'>Number of branches</span></td>
                      <td class="afteritem">
                       <input type="text"   id='numberofbranches'  class='form-control' 
                        value="<?php //echo $bus['NUMBEROFBRANCHES'] ?>" />
                      </td>
                      </tr>

                        <tr>
                      <td><span class='alabel'>Average Annual Account Balance</span></td>
                      <td class="afteritem">
                        
                         <input type="text"   id='averagerevenue'  class='form-control' 
                         value="<?php //echo $bus['AVERAGEREVENUE'] ?>" />
                      </td>
                      </tr>


                      <tr>
                      <td></td>
                      <td class="afteritem">
                       <button class="btn btn-primary btn-sm pull-left">Update</button>
                      </td>
                      </tr>

                    </table>   
    
               </div>

      <div id="tabs-4">

      <div id='afarea'></div>
        
        
    </div>

 

      </div>

      
  </div>

  <div class = 'col-md-7'> 
      <div id="map" style="padding-left: 10px; height: 390px"></div>
      <!-- <div id="pano" style="padding: 10px; height: 200px; margin-top:10px"> </div> -->
       
      

      <!--  -->

    </div>

    </div>

   </div>

  </div>
  </body>








  

   

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

$('#affiliates').click(function(){
      
     //alert('prince');
     var biztin = $('#tin').val();
     

     $.ajax({
              type: "POST",
              url: "rgdservice.php",
              data:{biztin:biztin},
              dataType: "html",
              beforeSend: function(){
              $.blockUI();
              },
              success: function(text) {
               $('#afarea').html(text);
              },
              complete: function(){
               $.unblockUI();
              },
              error:function (xhr, ajaxOptions, thrownError){
                alert(xhr.status + " " + thrownError);
              }
    });
})    


$('#searchbtn').click(function(){

var searchtxt = $('#searchtxt').val();
   
$.ajax({
                        type: "POST",
                        url: "ajaxscripts/service.php",
                        data:{searchtxt:searchtxt},
                        dataType: "xml",
                        beforeSend: function(){
                        $.blockUI();
                        },
                        success: function(xml) {
                         $(xml).find('records').each(function(){
                           $('#businessname').val($(this).find('businessname').text());
                           $('#telephone').val($(this).find('telephone').text());
                           $('#tin').val($(this).find('tin').text());
                      
                         
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

var natureofbusiness   = $('#natureofbusiness').val();
var telephone          = $('#telephone').val();
var atelephone         = $('#atelephone').val();
var tin                = $('#tin').val();
var businessname       = $('#businessname').val();
var businessemail      = $('#businessemail').val(); 
var website            = $('#website').val();  
var accounttype        = $('#accounttype').val();

var city        = $('#city').val();
var street      = $('#street').val();
var latitude    = $('#latitude').val();
var longitude   = $('#longitude').val();
var buildingno  = $('#buildingno').val();
var assembly    = $('#assembly').val();
var region      = $('#region').val();
var unitno      = $('#unitno').val();
var popularname = $('#popularname').val();

var firstname    = $('#fname').val();
var lastname     = $('#sname').val();
var ptelephone    = $('#ptelephone').val();
var dob          = $('#dob').val();
var email        = $('#email').val();
var idtype       = $('#idtype').val();
var pin          = $('#pin').val();
var nationality   = $('#nationality').val();


     $.ajax({
              type: "POST",
              url: "../ajaxscripts/savebusiness.php",
              data:{city:city,street:street, latitude:latitude, longitude:longitude,
                   buildingno:buildingno, assembly:assembly, region:region, unitno:unitno,
                   popularname:popularname, natureofbusiness:natureofbusiness,
                   firstname:firstname, lastname:lastname,  businessemail:businessemail, telephone:telephone, 
                   idtype:idtype, pin:pin, nationality:nationality,dob:dob,
                   email:email, atelephone:atelephone, businessname:businessname, tin:tin,
                   ptelephone:ptelephone, website:website, accounttype:accounttype
                  },
              dataType: "html",
              beforeSend: function(){
              $.blockUI();
              },
              success: function(s) {
                alert(s)
                if(s == 'success'){;
                alert('Registration Completely Done !!');
                //window.location = 'http://localhost:840/modules/registry.php';
                }
              },
              complete: function(){
               $.unblockUI();
              },
              error:function (xhr, ajaxOptions, thrownError){
                alert(xhr.status + " " + thrownError);
              }
              });
})


///////////////////////////////////////////


$('#access').click(function(){
  var agentid = '<?php echo $uniqueuid  ?>';
  $('#accessmodal').modal('show');

  $.ajax({
              type: "POST",
              url: '../ajaxscripts/control.php',
              data: {agentid:agentid},
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


$('#assigncat').click(function(){

  $('#catmodal').modal('show');
   var agentid = '<?php echo $uniqueuid  ?>';
  $.ajax({
              type: "POST",
              url: '../ajaxscripts/assigncategories.php',
              data: {agentid:agentid},
              beforeSend: function() {
                  $.blockUI();
              },
              success: function(text) {
                $("#catcontent").html(text); 
              },
              complete: function() {
                  $.unblockUI();
              },
              error: function(xhr, ajaxOptions, thrownError) {
                  alert(xhr.status + " " + thrownError);
              }
          });

})

$('#limitbtn').click(function(){

  $('#limitmodal').modal('show');
   var agentid = '<?php echo $uniqueuid  ?>';
  $.ajax({
              type: "POST",
              url: '../ajaxscripts/limitsandcomm.php',
              data: {agentid:agentid},
              beforeSend: function() {
                  $.blockUI();
              },
              success: function(text) {
                $("#limitcontent").html(text); 
              },
              complete: function() {
                  $.unblockUI();
              },
              error: function(xhr, ajaxOptions, thrownError) {
                  alert(xhr.status + " " + thrownError);
              }
          });

})


$('#transfers').click(function(){
  var agentid = '<?php echo $uniqueuid  ?>';
  $('#transmodal').modal('show');

  $.ajax({
              type: "POST",
              url: '../ajaxscripts/transfers.php',
              data: {agentid:agentid},
              beforeSend: function() {
                  $.blockUI();
              },
              success: function(text) {
                $("#transcontent").html(text); 
              },
              complete: function() {
                  $.unblockUI();
              },
              error: function(xhr, ajaxOptions, thrownError) {
                  alert(xhr.status + " " + thrownError);
              }
          });

})










///////////////////////////////////////////////

var map, infoWindow;
var countryRestrict = { 'country': 'gh' };
//"lat":5.6458626,"lng":-0.2261138}

let cordinates = {lat:<?php echo (double)($latitude) ?>, lng:<?php echo(double)($longitude) ?>};
//alert(JSON.stringify(cordinates));
  
      function initMap() {
           map = new google.maps.Map(document.getElementById('map'), {
          center: cordinates,
          zoom: 17,
          mapTypeId: 'hybrid'
        });
       
        var panorama = new google.maps.StreetViewPanorama(
            document.getElementById('pano'), {
              position: cordinates,
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

