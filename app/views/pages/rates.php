<!-- Header and CSS Directives-->
<?php //require '../config/config.php';   ?>
<?php require APPROOT .'/views/inc/header.php'  ?>
<?php require APPROOT .'/views/inc/rate.php'  ?>

<?php 

// $getcategory = $con->query("Select * from ratecategory");


?>

<style>
tr td{
    padding: 5px !important;
    margin: 0 !important;
    font-size: 12px
  }

 .pinput{
    padding: 2px !important; 
    width: 200px; 
    border:1px solid green; 
 } 

</style>


  <!-- Commhr content goes here -->
  <div class="content-wrapper" style="background:url('<?php echo URLROOT ?>/img/insurance_solution_large3.jpg'); background-size:cover;rgba(0,0,0,.5);height:100%">
  

    <div class="container-fluid main_container">
     
      <div id='placeholder'>

      <div class='row'>

<div class='col-md-4' >

<div><h3 style='color:#fff'>Configure Rates</h3> </div>

<table class='table table-bordered' style='color:#fff'>
 <tr>
  <td><input type='text' class='form-control ' type='text' id='vehiclecategory' placeholder='Vehicle Category'></td>
</tr>
<!-- <tr>
  <td><input type='text' class='form-control ' type='text' id='baserate' placeholder='Base Rate'></td>
</tr> -->
<!-- 
<tr>
<td>
<select class='form-control' id='useofvehicle'>
  <option value=''>Vehicle Use</option>
  <option>Private</option>
  <option>Commercial</option>
  </select>

</td>
</tr>

<tr>
  <td>
  <select class='form-control' id='insurancetype'>
    <option value=''>Type of Insurance</option>
    <option>Comprehensive</option>
    <option>Third Party</option>
    </select>
  
  </td>
</tr> -->

<tr>
<td><button class='btn btn-warning btn-sm btn-block saverate' style='color:#fff'>Save Rates</button></td>
</tr>

  
 </table>
</div>

<div class='col-md-8 ratearea' >


</div>
   

    </div>
    </div>
   

  <!--Footer and JS directies -->
  
  <?php require APPROOT .'/views/inc/footer.php'  ?>


<script type='text/javascript'>
   
function rates(){

 var posturl = '../ajax/categorytable.php';
 
    $.ajax({
            type: "POST",
            url: posturl,
            data: {},
            beforeSend: function() {
                $.blockUI();
            },
            success: function(text) {
                $(".ratearea").html(text)
            },
            complete: function() {
                $.unblockUI();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + " " + thrownError);
            }
        });
}

rates();

$('.saverate').click(function(){

 var posturl = '../ajax/saverate.php';

 
 var vehiclecategory = $('#vehiclecategory').val();

 $.ajax({
            type: "POST",
            url: posturl,
            data: {vehiclecategory:vehiclecategory},
            beforeSend: function() {
                $.blockUI();
            },
            success: function(text) {
                rates();
            },
            complete: function() {
                $.unblockUI();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + " " + thrownError);
            }
        });

})


$('#comprehensive').click(function(){
    var posturl = '../ajax/comprehensive.php';
 
    $.ajax({
            type: "POST",
            url: posturl,
            data: {},
            beforeSend: function() {
                $.blockUI();
            },
            success: function(text) {
                $("#placeholder").html(text)
            },
            complete: function() {
                $.unblockUI();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + " " + thrownError);
            }
        })
})


$('#dvplates').click(function(){
    var posturl = '../ajax/dvrate.php';
 
    $.ajax({
            type: "POST",
            url: posturl,
            data: {},
            beforeSend: function() {
                $.blockUI();
            },
            success: function(text) {
                $("#placeholder").html(text)
            },
            complete: function() {
                $.unblockUI();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + " " + thrownError);
            }
        })
})



$('#thirdparty').click(function(){
    var posturl = '../ajax/thirdparty.php';
 
    $.ajax({
            type: "POST",
            url: posturl,
            data: {},
            beforeSend: function() {
                $.blockUI();
            },
            success: function(text) {
                $("#placeholder").html(text)
            },
            complete: function() {
                $.unblockUI();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + " " + thrownError);
            }
        })
})    
   </script>



