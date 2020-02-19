<!-- Header and CSS Directives-->
<?php //require '../config/config.php';   ?>
<?php require APPROOT .'/views/inc/header.php'  ?>
<?php require APPROOT .'/views/inc/blank.php'  ?>

<?php
// $today = date('Y-m-d');
// $getdata = $con->query("Select * from invoice where invoicedate = '$today' 
// and company = 'Metropolitan Insurance Company Limited' ");

// $getotal = $con->query("Select sum(amount) as total from invoice where invoicedate = '$today'
// and company = 'Metropolitan Insurance Company Limited' ");
// $tot = $getotal->fetch(PDO::FETCH_OBJ);
// $total = $tot->total;
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
  <div class="content-wrapper" style="background:url('<?php //echo URLROOT ?>/img/insurance_solution_large3.jpg'); background-size:cover;rgba(0,0,0,.5);height:100%">
  <div class="row" style='padding-left:20px'> 
  <div class='col-md-6'><h3 style='color:orange'>Metropolitan Insurance Company Limited</h3></div>

  <div class='col-md-6'>
  <table>
  <tr>
   <td><input type='text' class='form-control from' placeholder='From' style='width:150px; border:1px solid green;'></td>
   <td><input type='text'  class='form-control to'  placeholder='To' style='width:150px; border:1px solid green'></td>
   <td><button class='btn btn-warning rpt' style='color:#fff'><i class='fa fa-search'></i></button></td>
  </tr>
  </table>
  </div>
  </div>
  <hr/>
    
    <div class="container-fluid main_container">
      <div>
      <div class="row" style="margin-bottom:10px">
         
        <div class='col-md-12 reportarea'>

        <table class='table table-bordered table-condensed' style='font-size:13px'>
        <tr class='info' style='background:#002b45; color:#fff; font-weight:700'>
        <td>Customer</td>
        <td>Reg Number</td>
        <td>Description</td>
        <td>Amount</td>
        <td>Date</td>
        </tr>
        <?php
        //  while($get = $getdata->fetch(PDO::FETCH_OBJ)){
        ?>
        <tr>
        <td><?php //echo $get->owner   ?></td>
        <td><?php //echo $get->regnumber   ?></td>
        <td><?php //echo $get->make.' '.$get->model   ?></td>
        <td style='color:red; font-weight:bold'><?php //echo $get->amount   ?></td>
        <td><?php //echo $get->invoicedate   ?></td>
        </tr>

        <?php
        // }
        ?>
        <tr>
        <td colspan='4'>&nbsp</td>
        </tr>

         <tr>
        <td></td>
        <td></td>
        
        <td align='right'>Total:</td>
        <td style='font-size:18px font-weight:700; color:red;'><?php //echo number_format($total,2)  ?></td>
        <td></td>
        </tr>
        

        </table>
      
       </div> 
       <div id='placeholder'>
       
         </div>
         <!-- End of Placeholder -->
   
        </div>
        </div>
   

  <!--Footer and JS directies -->
  
  <?php require APPROOT .'/views/inc/footer.php'  ?>
  <script type='text/javascript'>

  $('.from, .to').datepicker();
  
  $('.llrpt').click(function(){

    var reportype = $('.reportype').val();


   if(reportype == 'Group Transactions'){
    $.ajax({
            type: "POST",
            url: '../ajax/summary.php',
            data: {},
            beforeSend: function() {
                $.blockUI();
            },
            success: function(text) {
                $(".reportarea").html(text)
            },
            complete: function() {
                $.unblockUI();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + " " + thrownError);
            }
        });
   }  

    if(reportype == 'Daily Transactions'){
     window.location = '../pages/reports.php';
   }      


  });


  </script>



