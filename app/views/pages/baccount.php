<?php
// session_start();
// include("conn/msconn.php");
// include("conn/conn.php");
// $uid = $_SESSION['uid'];

// $getproducts  = $ucon->query("Select * from SELECTEDPRODUCTS where UNIQUEUID = '$uid' and productname <> 'Registrations' ");

// $getbusinfo = $con->query("Select * from BUSINESSINFORMATION  where UNIQUEUID = '$uid' ");
// $bus = $getbusinfo->fetch(PDO::FETCH_ASSOC);




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
  $('#accordion').accordion();
  $('#stabs').tabs();

  $('.transact').dataTable({ "sPaginationType": "full_numbers" });

$('#addcard').click(function(){

   $.ajax({
              type: "POST",
              url: "ajaxscripts/addcard.php",
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

$('.bills').click(function(){

$.ajax({
              type: "POST",
              url: "ajaxscripts/bills.php",
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
  <H3><?php  //echo $bus['BUSINESSNAME']  ?></H3>
  </div>


  <div class='col-md-1'>
    <a href="psettings.php" class='btn btn-prinary pull-left' id='searchmap' ><i class='fa fa-cog'></i> Settings</a>
  </div>
 
 </div>

 <br/>

 <div id='pc' class = 'row'>
  <div class='col-md-3'>
 <a style='font-weight:700' href="#" class="list-group-item" id='primarybtn'>
                  <span class="fa fa-shopping-cart"></span>
                   UMO Account  Balance</a>
   
     <div class="list-group border-bottom" style="padding:5px; ">
      <table class='table table-bordered'>
        
       <tr>
       
        <td align="center"><span  style='font-size:50px; font-weight: 700; color: green'>0.00</span> 
          <span  style='font-size:10px; font-weight: 700; color: #000'>GHS</span></td>
       </tr>

       <tr>
       
        <td align="center">
          <span  style='font-size:10px; color: #000'><a href="#" id='addcard'>Manage Your Account</a></span></td>
       </tr>



      </table>
    
                   
    </div> 


     <a  style='font-weight:700' href="#" class="list-group-item" id='primarybtn'><span class="fa fa-list"></span>  SEFRVICES</a>
   
    



    <div id="accordion">
      <?php
          
        //   while($po = $getproducts->fetch(PDO::FETCH_ASSOC)){

        //      $pname =  $po['PRODUCTNAME'];

        //     $getsubproducts = $ucon->query("Select SUBPRODUCT from assignedproducts where 
        //       productname = '$pname'  and  UNIQUEUID = '$uid' ");

          ?>
  
    <h3><?php //echo $po['PRODUCTNAME']  ?> </h3>
    <div>
       <?php 
    //    while($sub = $getsubproducts->fetch(PDO::FETCH_ASSOC))
    //     {
        ?>
      <p><i class='fa fa-list'></i> <?php //echo $sub['SUBPRODUCT']   ?></p>
      <?php
       // }
      ?>
    </div>
  <?php
 //  }
  ?>
</div>



    </div>

     <div class="col-md-7 form-container formarea"  style="padding-left: 10px; 
    background-color: #fff; ">
     <div id="stabs">
  <ul style="background:#fff">
    <li><a href="#tabs-1">Summary of Transactions</a></li>
  </ul>
  <div id="tabs-1" style="height: 400px">
    

     <table class='table table-condensed'>
      <thead>
     <tr>
     <td width="40%">
      <select class="form-control" style="width: 50%">
        <option>Select Duration</option>
         <option>Daily</option>
          <option>Weekly</option>
            <option>Monthly</option>
              <option>Quarterly</option>
              <option>Yearly</option>
      </select>

    </td>
     
      <td>Range</td>
     <td><input type="text" class="form-control datepick" placeholder="From"></td>
     <td><input type="text" class="form-control datepick"  placeholder="To"></td>
     <td><button class='btn btn-success'><i class="fa fa-search"></i></button></td>

     </tr>
   </thead>

     </table>


    <table class='table table-bordered'>
      <thead>
     <tr>
     <td>Service Name</td>
     <td>Description</td>
     <td>Date</td>
     <td>Amount</td>
     </tr>
   </thead>

     <tr>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
     </tr>

  </table>

    



    </div>
     </div>


                           
     </div>
                      
    
   </div>
   
 </div>  



 <div id="sitemodal" class="modal fade" role="dialog">
            <div class="modal-dialog" style="width: 500px" role="document">

                <div class="modal-content">
                    <div class="modal-body" id="sitecontent">
                       
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        


                    </div>

                </div>
            </div>
  </div>


</body>   
</html>
