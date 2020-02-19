<!-- Header and CSS Directives-->
<?php //require '../config/config.php';   ?>
<?php require APPROOT .'/views/inc/header.php'  ?>
<?php require APPROOT .'/views/inc/side_nav.php'  ?>

<?php
// session_start();
// $uid = $_SESSION['uid'];

// $today = date('Y-m-d');
// $getdata = $con->query("Select * from invoice where invoicedate = '$today'  and  uid = '$uid'
// and status = '1' ");

// $getotal = $con->query("Select sum(amount) as total from invoice where invoicedate = '$today' and uid = '$uid' and status = '1' ");
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
  <div class="content-wrapper"
   style="background:url('<?php echo URLROOT ?>/img/insurance_solution_large3.jpg');
    background-size:cover;rgba(0,0,0,.5);height:100%">
  <div class="row" style='padding-left:20px'> 
  <div class='col-md-6'><h3 style='color:orange'>SUMMARY OF TRANSACTIONS</h3>
   
</div>


  <div class='col-md-6'>
  <table>
  <tr>
  <td>
  <select  class='form-control reportype' style='width:200px; border:1px solid green'> 
   <option>Daily Transactions</option>
   <option>Group by Company</option>
  </select>

  
  </td>
   <td><input type='text' placeholder='From' class='form-control from' style='width:150px; border:1px solid green;'></td>
   <td><input type='text' placeholder='To'  class='form-control to' style='width:150px; border:1px solid green'></td>
   <td><button class='btn btn-warning rpt' style='color:#fff'><i class='fa fa-search'></i></button></td>
  </tr>
  </table>
  </div>
  </div>
  <hr style='background:#fff' />
    
    <div class="container-fluid main_container">
      <div>
      <div class="row" style="margin-bottom:10px">
         
        <div class='col-md-12 reportarea'>

        <table class='table table-bordered table-condensed' style='font-size:13px; color:#fff'>
        <tr class='info' style='background:#002b45; color:#fff; font-weight:700'>
        <td>Customer</td>
        <td>Reg Number</td>
        <td>Description</td>
        <td>Company</td>
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
        <td style='color:#fff;'><?php // echo $get->company   ?></td>
        <td style='color:#fff;'><?php //echo $get->amount   ?></td>
        <td><?php //echo $get->invoicedate   ?></td>
        </tr>

        <?php
        // }
        ?>

      <tr>
      <td></td>
      <td></td>
      <td></td>
      <td align='right' style='color:fff; font-weight:700; font-size:15px'>Total</td>
      <td style='color:fff; font-weight:700; font-size:15px'><?php //echo 'GHC '.number_format($total, 2);   ?></td>
      <td></td>
      </tr>
        

        </table>
      
       </div> 
       <div id='placeholder' style='color:#fff'>
       
         </div>
         <!-- End of Placeholder -->
   
        </div>
        </div>
   

  <!--Footer and JS directies -->
  
  <?php require APPROOT .'/views/inc/footer.php'  ?>
  <script type='text/javascript'>
$(".from, .to").datepicker({inline: true, 
  changeMonth: true, changeYear: true, yearRange: "1920:2020", dateFormat: 'dd-mm-yy' });
  
  $('.rpt').click(function(){

    var reportype = $('.reportype').val();
    var from = $('.from').val();
    var to = $('.to').val();
 

   if(reportype == 'Group by Company'){
    $.ajax({
            type: "POST",
            url: '../ajax/summary.php',
            data: {from:from, to:to},
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
      $.ajax({
            type: "POST",
            url: '../ajax/daily.php',
            data: {from:from, to:to},
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


  });


  </script>



