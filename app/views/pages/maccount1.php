<?php //session_start();  ?>
<?php //require '../config/config.php';   ?>
<?php //require "../conn/conn.php"; ?>
<?php //require "../conn/msconn.php"; ?>
<?php require APPROOT .'/views/inc/header.php'  ?>
<?php require APPROOT .'/views/inc/company.php'  ?>

<?php

// $today = date('Y-m-d');
// $uid = $_SESSION['uid'];

// $getproducts  = $ucon->query("Select * from SELECTEDPRODUCTS where UNIQUEUID = '$uid' and productname <> 'Registrations' ");

// $getbusinfo = $con->query("Select * from BUSINESSINFORMATION  where UNIQUEUID = '$uid' ");
// $bus = $getbusinfo->fetch(PDO::FETCH_ASSOC);

// $getcomusers = $con->query("Select * from secondaryusers where mainid = '$uid' and  access_level = '2' ");
// $getpendingusers = $con->query("Select * from secondaryusers where mainid = '$uid' and  access_level = '1' ");

// $getbranch = $ucon->query("Select * from branch  where UNIQUEUID = '$uid' ");

// $getusers = $con->query("Select * from basicinformation  where UNIQUEUID = '$uid' ");


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
  <div class="content-wrapper" style="background:url('<?php echo URLROOT ?>/img/insurance_solution_large3.jpg'); background-size:cover;rgba(0,0,0,.5);height:100%">
  <div class="row" style='padding-left:20px'> 
  <div class='col-md-6'><h3 style='color:orange'><?php //echo strtoupper($bus['BUSINESSNAME'])  ?></h3></div>

  <div class='col-md-6'>
 
  </div>
  </div>
  <hr style='background:#fff'/>
    
    <div class="container-fluid main_container">
      <div>
      <div class="row" style="margin-bottom:10px">
         
 <div class='col-md-12 reportarea'>
  <div id="stabs">
  <ul style="background:#fff">
    <li><a href="#tabs-1">Activities</a></li>
    <li><a href="#tabs-2">Active Accounts</a></li>
    <li><a href="#tabs-3">Pending Accounts</a></li>
    <li><a href="#tabs-4">Employess</a></li>
    <li><a href="#tabs-5">Branches </a></li>
  </ul>

  <div id="tabs-1">

    <table class="table table-condensed">
    <tr>
    <td width='20%'>
    <select class='form-control'>
    <option>Choose</option>
    <option>Daily</option>
    <option>Weekly</option>
    <option>Monthly</option>
    <option>Quarterly</option>
    <option>Semi-annually</option>
    <option>Year</option>
    
    </select>
     </td>
    <td width='40%' align='center'>OR</td>
    <td><input type='text' id=from class='form-control' placeholder="from" /> </td>
    <td><input type='text' id=to class='form-control' placeholder="to"  /></td>
    <td><button class="btn btn-info" id='searchreport'><i class="fa fa-search"></i> Search</button></td>

    </tr>
    </table>


  </div>


  <div id="tabs-2" style='' class='userarea'>
  <table class='table table-bordered table-condensed transact' width='100%' style='font-size:12px'>
    <thead>  
        <tr class='info'>
        <td>Customer Name</td>
        <td>Telephone</td>
  
        <td>Balance</td>
        <td>Status</td>
        
      </tr>
</thead>

<?php
 
//  while($u = $getcomusers->fetch(PDO::FETCH_ASSOC)){

//   $unid = $u['AGENTID'];

//   $getagent = $con->query("SELECT * FROM businessinformation where UNIQUEUID = '$unid' ");
//   $b = $getagent->fetch(PDO::FETCH_ASSOC);

?>

<tr>
  <td><a  target='_blank' href='agentdetails.php?uniqueuid=<?php //echo $unid  ?>'><?php  //echo $b['BUSINESSNAME']  ?></a></td>
  <td><?php  //echo $b['PHONENUMBER']  ?></td>
 
  <td>0.00</td>
  <td>Active</td>
  
</tr>
<?php
 //}
?>


</table>
    

    </div>

    <div id="tabs-3" style=''>

    <table class='table table-bordered table-condensed transact' width='100%' style='font-size:12px'>
    <thead>  
        <tr class='info'>
        <td>Customer Name</td>
        <td>Telephone</td>
       
        <td>Status</td>
        
      </tr>
</thead>

<?php
 
//  while($u = $getpendingusers->fetch(PDO::FETCH_ASSOC)){

//   $unid = $u['AGENTID'];

//   $getagent = $con->query("SELECT * FROM businessinformation where UNIQUEUID = '$unid' ");
//   $b = $getagent->fetch(PDO::FETCH_ASSOC);

?>

<tr>
  <td><a  target='_blank' href='agentview.php?uniqueuid=<?php  //echo $unid  ?>'><?php // echo $b['BUSINESSNAME']  ?></a></td>
  <td><?php  //echo $b['PHONENUMBER']  ?></td>


  <td style='color:red'>Pending</td>
  
</tr>
<?php
//  }
?>


</table>

    </div>


    
    <div id="tabs-4">

    <table class='table table-bordered table-condensed transact' width='100%' style='font-size:12px'>
    <thead>  
        <tr class='info'>
        <td>Full name</td>
        <td>Date of Birth</td>
        <td>Nationality</td>
        <td>Edit</td>
        
      </tr>
</thead>

<?php
 
// while($u = $getusers->fetch(PDO::FETCH_ASSOC)){

?>

<tr>
  <td><?php // echo $u['FULLNAME']  ?></td>
  <td><?php  //echo $u['DATEOFBIRTH']  ?></td>
  <td><?php  //secho $u['NATIONALITY']  ?></td>
  <td style='color:red'><a href='#'>Edit</a></td>
  
</tr>
<?php
 //}
?>


</table>


    </div>



<div id="tabs-5" style=''>

<table class='table table-bordered table-condensed transact' width='100%' style='font-size:12px'>
    <thead>  
        <tr class='info'>
        <td>Branch Name</td>
        <td>Longitude</td>
        <td>Latitude</td>
        <td>Location</td>
        
      </tr>
</thead>

<?php
 
// while($b = $getbranch->fetch(PDO::FETCH_ASSOC)){

?>

<tr>
  <td><?php  //echo $b['BRANCHNAME']  ?></td>
  <td><?php  //echo $b['LONGITUDE']  ?></td>
  <td><?php  //echo $b['LATITUDE']  ?></td>
  <td style='color:red'><?php  //echo $b['STREET'].", ".$b['CITY'].' ,'.$b['REGION']  ?></td>
  
</tr>
<?php
 //}
?>


</table>

    </div>




     </div>


       
      
       </div> 
       
        </div>
        </div>
   

  <!--Footer and JS directies -->
  
<?php require APPROOT .'/views/inc/footer.php'  ?>
<script type='text/javascript'>

$(document).ready(function(){

  
  $("#from, #to").datepicker({inline: true,
  changeMonth: true, changeYear: true, yearRange: "2016:2020", dateFormat: 'yy-mm-dd',
   maxDate: 0 });

  
  $('#stabs').tabs();

  $('.transact').dataTable({ "sPaginationType": "full_numbers" });


  function AjaxPost(posturl, postdata){

      $.ajax({
              type: "POST",
              url: posturl,
              data:postdata,
              dataType: "html",
              beforeSend: function(){
              $.blockUI();
              },
              success: function(text) {
              $('.reportarea').html(text);
              },
              complete: function(){
               $.unblockUI();
              },
              error:function (xhr, ajaxOptions, thrownError){
                alert(xhr.status + " " + thrownError);
              }
              });
         }

      $('#addcard').click(function(){
      
      var posturl = '../ajaxscripts/addcard.php';
      var postdata = {};
      AjaxPost(posturl, postdata)

      })

     $('#addcat').click(function(){

      var posturl = '../ajaxscripts/addservice.php';
      var postdata = {};
      AjaxPost(posturl, postdata)
     })

     $('#additem').click(function(){
      var posturl = 'ajaxscripts/additem.php';
      var postdata = {};
      AjaxPost(posturl, postdata)
     }) 


    $('.transfers').click(function(){
      var posturl = 'ajaxscripts/transfer.php';
      var postdata = {};
      AjaxPost(posturl, postdata)
    })   

})


</script>



