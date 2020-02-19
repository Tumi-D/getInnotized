<!-- Header and CSS Directives-->
<?php //session_start();     ?>
<?php //require '../config/config.php';   ?>
<?php //require "../conn/conn.php"; ?>
<?php //require "../conn/msconn.php"; ?>
<?php require APPROOT .'/views/inc/header.php'  ?>
<?php require APPROOT .'/views/inc/admin.php'  ?>

<?php

// session_start(); 
// $uid = $_SESSION['uid'];

// $today = date('Y-m-d');

// $getbusinfo = $con->query("select * from businessinformation inner join credential on 
// businessinformation.uniqueuid = credential.uniqueuid where access_level = 100 OR access_level = 110 ");

// $bus = $getbusinfo->fetch(PDO::FETCH_ASSOC);


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
  <div class='col-md-12'>
  <h3 style='color:orange'>SOFTMASTERS BACK OFFICE</h3></div>

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
   
   <div class='row' style='padding:5px'>

    <div class = 'col-md-12'> 
    <div id="tabs">
  <ul style="background:#fff">
    <li><a href="#tabs-1">Registry </a></li>
    <li><a href="#tabs-2">Terminals</a></li>

  </ul>
  <div id="tabs-1">
  <table class='table table-bordered table-condensed transact' width='100%' style='font-size:12px' id='regtable'>
    <thead>  
        <tr class='info'>
        <td>Customer Name</td>
        <td>Telephone</td>
        <td>TIN NUMBER</td>
        <td>NATURE OF BUSINESS</td>
        <td>Allocate Products</td>
        <td>View</td>
        
      </tr>
</thead>

<?php
 
// while($bus = $getbusinfo->fetch(PDO::FETCH_ASSOC)){

?>

<tr>
  <td width='20%'><?php  //echo $bus['BUSINESSNAME']  ?></td>
  <td width='15%'><?php  //echo $bus['PHONENUMBER']  ?></td>
  <td width='15%'><?php  //echo $bus['TINNUMBER']  ?></td>
  <td width='35%'><?php  //echo $bus['NATUREOFBUSINESS']  ?></td>
  <td width='10%'><a href='#'  unid='<?php  //echo $bus['UNIQUEUID']  ?>'  class='allocateproducts'>Allocate Products</a></td>
  <td width='5%'><a href='#'>View</a></td>
  
</tr>
<?php
//  }
?>


</table>

  </div>

 <div id='tabs-2'>

 
      
  </div>
    

  

      </div>

      
  </div>

 

    </div>

   </div>

  </div>


  

   

  <!--Footer and JS directies -->
  
<?php require APPROOT .'/views/inc/footer.php'  ?>

<script type='text/javascript'>
$('#tabs').tabs();

$('#regtable').dataTable( {
  "sPaginationType": "full_numbers"      
});


$(document).on('click', '.allocateproducts', function(){

$('#viewmodal').modal('show');
var uniqueuid =  $(this).attr('unid');
 
   $.ajax({
        type: "POST",
        url: "../ajaxscripts/softproducts.php",
        data:{uniqueuid:uniqueuid},
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
       

})


</script>

