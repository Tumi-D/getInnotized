<!-- Header and CSS Directives-->
<?php //require '../config/config.php';   ?>
<?php require APPROOT .'/views/inc/header.php'  ?>
<?php require APPROOT .'/views/inc/blank.php'  ?>


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

.table tr:nth-child(even) {background: #f2f2f2; }
.table tr:nth-child(odd) {background: #fff; }


#area-chart,
#line-chart,
#bar-chart,
#stacked,
#pie-chart, #use-chart, #nic-chart{
  min-height: 250px;
}

</style>

<?php

//  $today = date('Y-m-d');
//  $getdata = $con->query("Select company as y, sum(amount) as a from invoice where invoicedate =
//   '$today' group by company");
//  $data = $getdata->fetchAll(PDO::FETCH_OBJ);

//  $getbycompanytable = $con->query("Select company, sum(quantity) as quantity, sum(amount) as amount from  
//  invoice where invoicedate = '$today' group by company");
//  $com =  $getbycompanytable->fetchAll(PDO::FETCH_OBJ);


//  $getbycategory = $con->query("Select category as y, sum(amount) as a from invoice 
//  where invoicedate = '$today' group by category");
//  $cdata = $getbycategory->fetchAll(PDO::FETCH_OBJ);

//  $getbycategorytable = $con->query("Select category, sum(quantity) as quantity, sum(amount) as amount from  
//  invoice where invoicedate = '$today' group by category");
//  $cat =  $getbycategorytable->fetchAll(PDO::FETCH_OBJ);

//  $getbyinsurancetype = $con->query("Select insurancetype as label, sum(quantity) as value from invoice 
//  where invoicedate = '$today' group by insurancetype");
//  $idata =  $getbyinsurancetype->fetchAll(PDO::FETCH_OBJ);

//  $getbyinsurancetypetable = $con->query("Select insurancetype, sum(amount) as amount from invoice 
//  where invoicedate = '$today' group by insurancetype");
//  $typedata =   $getbyinsurancetypetable->fetchAll(PDO::FETCH_OBJ);


//  $getvehicleuse = $con->query("Select vehicleuse as label, sum(quantity) as value from invoice 
//  where invoicedate = '$today' group by vehicleuse");
//  $udata =   $getvehicleuse->fetchAll(PDO::FETCH_OBJ);


//  $getotal = $con->query("Select sum(amount) as total from invoice where invoicedate = '$today' ");
//  $tot = $getotal->fetch(PDO::FETCH_OBJ);
//  $total = $tot->total;
//  $insurancetotal = 0.30 * $total;

//  $roundfund  = 0.05 * $insurancetotal; 
//  $ecowasfund =  0.05 * $insurancetotal; 


?>



  <!-- Commhr content goes here -->
  <div class="content-wrapper" 
  style="background:url('<?php echo URLROOT ?>/img/insurance_solution_large4.jpg');
   background-size:cover;rgba(0,0,0,.5);height:100%">
  <div class="row" style='padding-left:20px'> 
  <div class='col-md-6'><h3 style='color:orange'>NATIONAL INSURANCE COMMISSION</h3></div>

  <div class='col-md-6'>
  <table>
  <tr>
   <td><input type='text' class='form-control from' placeholder='From' style='width:150px; border:1px solid green;'></td>
   <td><input type='text'  class='form-control to' placeholder='To' style='width:150px; border:1px solid green'></td>
   <td><button class='btn btn-warning rpt' style='color:#fff'><i class='fa fa-search'></i></button></td>
  </tr>
  </table>
  </div>
  </div>
  <hr style='background:#fff' />
    
    <div class="container-fluid main_container">

    <div id='placeholder'>

      <div class="row" style="margin-bottom:20px">
     
      <div class="col-lg-6 col-md-6 col-sm-12 firstchart">
      <a href="#">
      <div class="card" style='padding:10px'>
      <h4>Grouped By Vehicle Categories</h4>
      <div id="area-chart">

     </div>
      
     </div>
      </a>
      </div>

      <div class="col-lg-6 col-md-6 col-sm-12 ">
      <a href="#">
      <div class="card" style='padding:10px'>
      <h4>Grouped By Insurance Companies</h4>

      <div id="bar-chart">
      
     </div>
      
     </div>
      </a>
      </div>
      </div>



      <div class="row" style="margin-bottom:20px">
     
      <div class="col-lg-6 col-md-6 col-sm-12  secondchart">
      <a href="#">
      <div class="card" style='padding:10px; overflow-y:scroll; height:250px'>
      <h4>Grouped By Vehicle Categories</h4>
       <table class='table table-condensed table-bordered'>
       <tr style='font-weight:700; background:#B21516; color:#fff'>
       <td>Vehicle Category</td>
       <td>Quantity</td>
       <td>Amount</td>
       </tr>
       <?php
      // foreach($cat as $c){
       ?>
        <tr>
       <td><?php //echo $c->category ?></td>
       <td><?php //echo $c->quantity ?></td>
       <td><?php //echo $c->amount ?></td>
       </tr>
       <?php
      // }
       ?>
       </table>


     </div>
      </a>
      </div>

      <div class="col-lg-6 col-md-6 col-sm-12 thirdchart">
      <a href="#">
      <div class="card" style='padding:10px; overflow-y:scroll; height:250px'>
      <h4>Grouped By Insurance Companies</h4>

      <table class='table table-condensed table-bordered'>
      <tr style='font-weight:700; background:#0B62A4; color:#fff'>
      <td>Vehicle Category</td>
      <td>Quantity</td>
      <td>Amount</td>
      </tr>
      <?php
     // foreach($com as $c){

      
      ?>
       <tr>
      <td><?php //echo $c->company ?></td>
      <td><?php //echo $c->quantity ?></td>
      <td><?php //echo $c->amount ?></td>
      </tr>
      <?php
     // }
      ?>
      </table>

      
     </div>
      </a>
      </div>



      </div>




      <div class="row" style="margin-bottom:20px">

      <div class="col-lg-4 col-md-4 col-sm-12 " >
      <a href="#">
      <div class="card"  style='padding:10px;'>
      <h4>Grouped By Insurance Type</h4>
     <div id="pie-chart">
     </div>
      
     </div>
     </a>

      </div>

      <div class="col-lg-4 col-md-4 col-sm-12">
      <a href="#">
      <div class="card" style='padding:10px;'>
      <h4>Grouped By Insurance Use</h4>
      <div id="use-chart">
     </div>
      
     </div>
     </a>
   
      </div>


      <div class="col-lg-4 col-md-4 col-sm-12">
      <a href="#">
      <div class="card" style='padding:10px;'>
      <h4>NIC Distribution</h4>
      <div id="nic-chart">
     </div>
     </div>
     </a>
     
      </div>

      </div>
     
      
      


       
      <div class="row" style="margin-bottom:20px">

      <div class="col-lg-4 col-md-4 col-sm-12">
      <a href="#">
      <div class="card"  style='padding:10px;'>
      <h4>NIC Share By Company</h4>
      <table class='table table-condensed table-bordered'>
      <tr style='font-weight:700; background:#0B62A4; color:#fff'>
      <td>Company</td>
      <td>Ecowas Fund</td>
      <td>Road Fund</td>
      </tr>
      <?php
    //   foreach($com as $c){

    //     $cost =  $c->amount;
    //     $service = $cost * 0.70;


      ?>
       <tr>
      <td><?php //echo $c->company ?></td>
      <td><?php //echo $service * 0.05 ?></td>
      <td><?php //echo $service * 0.05  ?></td>
      </tr>
      <?php
      //}
      ?>
      </table>
      
     </div>
     </a>

      </div>

      <div class="col-lg-4 col-md-4 col-sm-12">
      <a href="#">
      <div class="card" style='padding:10px;'>
      <h4>NIC Share by Insurance Type</h4>
      <table class='table table-condensed table-bordered'>
      <tr style='font-weight:700; background:#B21516; color:#fff'>
      <td>Insurance Type</td>
      <td>Ecowas Fund</td>
      <td>Road Fund</td>
      </tr>
      <?php
    //   foreach($typedata as $c){

    //     $cost =  $c->amount;
    //     $service = $cost * 0.70;


      ?>
       <tr>
      <td><?php //echo $c->insurancetype ?></td>
      <td><?php //echo $service * 0.05 ?></td>
      <td><?php //echo $service * 0.05  ?></td>
      </tr>
      <?php
     // }
      ?>
      </table>
     </div>
     </a>
   
      </div>


      <div class="col-lg-4 col-md-4 col-sm-12">
      <a href="#">
      <div class="card" style='padding:10px;'>
      <h4>NIC Share by Category</h4>
      <table class='table table-condensed table-bordered'>
      <tr style='font-weight:700; background:#34A853; color:#fff'>
      <td>Vehicle Type</td>
      <td>Ecowas Fund</td>
      <td>Road Fund</td>
      </tr>
      <?php
    //   foreach($cat as $c){

    //     $cost =  $c->amount;
    //     $service = $cost * 0.70;


      ?>
       <tr>
      <td><?php //echo $c->category ?></td>
      <td><?php //echo $service * 0.05 ?></td>
      <td><?php //echo $service * 0.05  ?></td>
      </tr>
      <?php
     // }
      ?>
      </table>
     </div>
     </a>
     
      </div>

      </div>
     
      
       </div> 
      
   
        </div>
        </div>
   

  <!--Footer and JS directies -->
  
  <?php require APPROOT .'/views/inc/footer.php'  ?>
  <script type='text/javascript'>


  $('.firstchart').hide();
  $('.secondchart').hide();
  $('.thirdchart').hide();

  $('.firstchart').show(5000);
  $('.secondchart').show(1433);
  $('.thirdchart').show(3000);
 

$(".from, .to").datepicker({inline: true, 
  changeMonth: true, changeYear: true, yearRange: "1920:2020", dateFormat: 'dd-mm-yy' });
  
    var data = '<?php echo json_encode($data)   ?>';
    var cdata = '<?php echo json_encode($cdata)   ?>';
    var idata = '<?php echo json_encode($idata)   ?>';
    var udata = '<?php echo json_encode($udata)   ?>';


    var data = JSON.parse(data);
    var cdata = JSON.parse(cdata);
    var idata = JSON.parse(idata);
    var udata = JSON.parse(udata);



    Morris.Bar({
      element: 'bar-chart',
      data: data,
      xkey: 'y',
      ykeys: ['a'],
      labels: ['Total Amount', 'Total Amount'],
      fillOpacity: 0.6,
      hideHover: 'auto',
      behaveLikeLine: true,
      resize: true,
      barColors: ["#B21516", "#1531B2", "#1AB244"],
    });
    

    Morris.Bar({
      element: 'area-chart',
      data: cdata,
      xkey: 'y',
      ykeys: ['a'],
      labels: ['Total Amount', 'Total Amount'],
      fillOpacity: 0.6,
      hideHover: 'auto',
      behaveLikeLine: true,
      resize: true,
      pointFillColors:['#ffffff'],
      pointStrokeColors: ['black'],
      lineColors:['gray','red']
    }); 


    Morris.Donut({
    element: 'pie-chart',
    data:idata,
    colors: [ "#B21516", "#4285F4"]
    });  

    Morris.Donut({
    element: 'use-chart',
    data:udata,
    colors: [ "#c4c4c4", "#E65100"]
    });  

    Morris.Donut({
    element: 'nic-chart',
    data:[
        {'label':'Ecowas Fund', 'value':'<?php echo $ecowasfund  ?>'},
        {'label':'Road Fund', 'value': '<?php echo $roundfund  ?>'},
    ],
    colors: [ "#c4c4c4", "#34A853"]

   
    });  


    $('#companies').click(function(){
    var posturl = '../ajax/insurancecom.php'; 
        $.ajax({
            type: "POST",
            url:posturl,
            data: {},
            beforeSend: function() {
                $.blockUI();
            },
            success: function(text) {
            $('#placeholder').html(text);
            },
            complete: function() {
                $.unblockUI();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + " " + thrownError);
            }
        });

   })   


   $('.rpt').click(function(){

    var from = $('.from').val();
    var to = $('.to').val();

    var posturl = '../ajax/creport.php'; 
        $.ajax({
            type: "POST",
            url:posturl,
            data: {from:from, to:to},
            beforeSend: function() {
                $.blockUI();
            },
            success: function(text) {
            $('#placeholder').html(text);
            },
            complete: function() {
                $.unblockUI();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + " " + thrownError);
            }
        });

   }) 


    $('#specialdiscount').click(function(){
    var posturl = '../ajax/insurancecat.php'; 
        $.ajax({
            type: "POST",
            url:posturl,
            data: {},
            beforeSend: function() {
                $.blockUI();
            },
            success: function(text) {
            $('.reportarea').html(text);
            },
            complete: function() {
                $.unblockUI();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + " " + thrownError);
            }
        });

   }) 


   $('#adduser').click(function(){
    var posturl = '../ajax/nicaccount.php'; 
        $.ajax({
            type: "POST",
            url:posturl,
            data: {},
            beforeSend: function() {
                $.blockUI();
            },
            success: function(text) {
            $('#placeholder').html(text);
            },
            complete: function() {
                $.unblockUI();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + " " + thrownError);
            }
        });

   })


$('#searchpolicy').click(function(){
  
    var posturl = '../ajax/searchcustomer.php'; 
        $.ajax({
            type: "POST",
            url:posturl,
            data: {},
            beforeSend: function() {
                $.blockUI();
            },
            success: function(text) {
            $('#placeholder').html(text);
            },
            complete: function() {
                $.unblockUI();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + " " + thrownError);
            }
        });

   }) 



  </script>



