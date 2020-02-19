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


// $getallocation =  $con->query("SELECT * FROM LOCATION where CITY = '$city' and STREET = '$street' ORDER BY APPLIEDDATE DESC ");

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

  $('#activity').dataTable( {
      "sPaginationType": "full_numbers"
      
   });


$('.terminal').click(function(){

$.ajax({
              type: "POST",
              url: "ajaxscripts/terminal.php",
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


$('.transfers').click(function(){

$.ajax({
              type: "POST",
              url: "ajaxscripts/transfer.php",
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

$('.administer').click(function(){

$.ajax({
              type: "POST",
              url: "ajaxscripts/access.php",
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

})


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
          <ul class="nav navbar-nav" style='color:#fff'>
            <li class="active"><a href="#">Home</a></li>
           
            <li style='color:#fff'><a style='color:#000' href="businessreg.php">My Account</a></li>
            <li style='color:#fff'><a style='color:#000' href="businessreg.php">Logout</a></li>

          </ul>
        </div>
      

      </div>
 </nav>

 </div>

 <div  style='width:100%;height:730px; margin:0 auto; margin-top:60px;' >

 <div class = 'row'>

   <div class='col-md-3' style='padding-left:15px '>
   
  </div>
   <div class='col-md-1'>
   
  </div>

  <div class='col-md-7'>
  
  </div>


  <div class='col-md-1'>
    <a href="psettings.php" class='btn btn-prinary pull-left' id='searchmap' ><i class='fa fa-cog'></i> Settings</a>
  </div>
 
 </div>

 <br/>

 <div id='pc' class = 'row'>
  <div class='col-md-3'>



     <a  style='font-weight:700' href="#" class="list-group-item" id='primarybtn'><span class="fa fa-list"></span> Account  Activities</a>
   
     <div class="list-group border-bottom" style="padding:5px; ">


                <a href="#" class="list-group-item bills" ><span class="fa fa-cog"></span>Edit Profile </a>

                <a href="details.php" target="_blank"  class="list-group-item" ><span class="fa fa-cog"></span>Edit Location </a>

                <a href="#" class="list-group-item terminal" ><span class="fa fa-cog"></span>Create Terminal </a>

                 <a href="#" class="list-group-item addusers" ><span class="fa fa-cog"></span>Add Users </a>

                <a href="#" class="list-group-item administer" ><span class="fa fa-cog"></span>Administer Privileges </a>

                 <a href="#" class="list-group-item transfers" ><span class="fa fa-cog"></span>Transaction History </a>

    </div> 



    </div>

     <div class="col-md-7 form-container formarea"  style="padding-left: 10px; 
    background-color: #fff;  box-shadow: 1px 1px 1px 1px #888888;">
     <div align="center" > <h3 style="color:green">ACCOUNT INFORMATION </h3></div>

     <table class="table table-bordered">
      <thead>
     <tr>
     <td>Account Owner</td>
     <td></td>
    
     </tr>

     <tr>
     <td>Business Name</td>
     <td></td>
     </tr>


      <tr>
     <td>TIN #</td>
     <td></td>
     </tr>

      <tr>
     <td>Nature of Business</td>
     <td></td>
     </tr>

      <tr>
     <td>Telephone</td>
     <td></td>
     </tr>

     <tr>
     <td>Email Address</td>
     <td></td>
     </tr>
   </thead>

     </table>


                           
     </div>
                      
    
   </div>
   
 </div>  



</body>   
</html>
