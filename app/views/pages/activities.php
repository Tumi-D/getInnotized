
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

// $getitems = $ucon->query("select * from ASSIGNEDSERVICES WHERE AGENTID = '$uid' ");


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
  <div class='col-md-12'><h3 style='color:orange'><?php //echo strtoupper($bus['BUSINESSNAME'])  ?></h3></div>
  <div id="viewmodal" class="modal fade" role="dialog">
            <div class="modal-dialog" style="width: 800px" role="document">

                <div class="modal-content"  style="width: 600px" >
                    <div class="modal-body" id="ajaxcontainer">

                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Close</button> -->

                    </div>

                </div>
            </div>
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
    <!-- <li><a href="#tabs-2">Active Accounts</a></li>
    <li><a href="#tabs-3">Pending Accounts</a></li>
    <li><a href="#tabs-4">Employess</a></li>
    <li><a href="#tabs-5">Branches </a></li> -->
  </ul>

  <div id="tabs-1">

  <table class='table table-bordered table-condensed table-striped' width='100%' style='font-size:12px' id='regtable'>
    <thead>  
        <tr class='info'  style='font-size:20px; font-weight:bold'>
        <td>Category</td>
        <td>Product</td>
        <td>No. of Transactions</td>
        <td>Perform Transaction</td>
        
      </tr>
</thead>

<?php
 
// while($bus = $getitems->fetch(PDO::FETCH_ASSOC)){

?>

<tr>
  <td width='20%'><?php  //echo $bus['CATEGORY']  ?></td>
  <td width='40%'><?php  //echo $bus['PRODUCTNAME']  ?></td>
  <td width='30%'></td>
  <td width='10%'>
  <a href='#' category='<?php  //echo $bus['PRODUCTNAME']  ?>' class='btn btn-default transactions' 
     style='fon-size:10px'><i class='fa fa-plus-circle'></i> Perform Transaction</a></td>
  
</tr>
<?php
// }
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



$(document).on('click', '.transactions', function(){


var category =  $(this).attr('category');

var ajaxurl;
if(category == 'Bill Payments'){ ajaxurl = '../ajaxscripts/bills.php'; } 
if(category == 'Airtime Top-Up'){ ajaxurl = '../ajaxscripts/mobilemoney.php'; } 
if(category == 'Funds Transfer'){ ajaxurl = '../ajaxscripts/transferfund.php'; } 
if(category == 'Cash deposits and withdrawals'){ ajaxurl = '../ajaxscripts/cash.php'; } 
if(category == 'Account Opening'){ ajaxurl = '../ajaxscripts/accountopening.php'; } 

alert(ajaxurl);

if (ajaxurl != undefined){
    $('#viewmodal').modal('show');
   $.ajax({
        type: "POST",
        url: ajaxurl,
        data:{},
        dataType: "html",
        beforeSend: function(){
        $.blockUI();
        },
        success: function(text) {
          $('#ajaxcontainer').html(text);
        },
        complete: function(){
          $.unblockUI();
        },
        error:function (xhr, ajaxOptions, thrownError){
          alert(xhr.status + " " + thrownError);
        }
      });
}
       

}) 

})


</script>



